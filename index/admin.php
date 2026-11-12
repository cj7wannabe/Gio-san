<?php
require 'db.php';

if (empty($_SESSION['user_id'])) {
    header('Location: login.php?need=1');
    exit;
}

// Check the role in the database every time, never trust the browser
$uid  = (int) $_SESSION['user_id'];
$stmt = $conn->prepare('SELECT role FROM users WHERE id = ?');
$stmt->bind_param('i', $uid);
$stmt->execute();
$me = $stmt->get_result()->fetch_assoc();
if (!$me || $me['role'] !== 'admin') {
    header('Location: my_bookings.php');
    exit;
}

if (empty($_SESSION['csrf'])) { $_SESSION['csrf'] = bin2hex(random_bytes(16)); }

// ---- Update status ----
$allowed = ['confirm' => 'Confirmed', 'decline' => 'Declined', 'complete' => 'Completed'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'
    && hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')
    && isset($allowed[$_POST['action'] ?? ''])) {
    $bid    = (int) ($_POST['booking_id'] ?? 0);
    $status = $allowed[$_POST['action']];
    $stmt = $conn->prepare('UPDATE bookings SET status = ? WHERE id = ?');
    $stmt->bind_param('si', $status, $bid);
    $stmt->execute();
    header('Location: admin.php?' . http_build_query(['done' => $status, 'f' => $_POST['f'] ?? '', 'q' => $_POST['q'] ?? '']));
    exit;
}

// ---- Filters ----
$f = $_GET['f'] ?? '';
$q = trim($_GET['q'] ?? '');
$valid = ['Pending', 'Confirmed', 'Completed', 'Declined', 'Cancelled'];

$sql = 'SELECT b.*, u.fullname, u.email
        FROM bookings b JOIN users u ON u.id = b.user_id WHERE 1=1';
$types = ''; $args = [];
if (in_array($f, $valid, true)) { $sql .= ' AND b.status = ?'; $types .= 's'; $args[] = $f; }
if ($q !== '') {
    $sql .= ' AND (u.fullname LIKE ? OR u.email LIKE ? OR b.service LIKE ?)';
    $like = '%' . $q . '%';
    $types .= 'sss'; array_push($args, $like, $like, $like);
}
$sql .= " ORDER BY FIELD(b.status,'Pending','Confirmed','Completed','Declined','Cancelled'), b.booking_date ASC";
$stmt = $conn->prepare($sql);
if ($args) { $stmt->bind_param($types, ...$args); }
$stmt->execute();
$rows = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// ---- Summary numbers (always across all bookings) ----
$sum = $conn->query("SELECT
    SUM(status='Pending') AS pending,
    SUM(status='Confirmed') AS confirmed,
    SUM(status='Completed') AS completed,
    COALESCE(SUM(CASE WHEN status IN ('Confirmed','Completed') THEN downpayment END),0) AS collected,
    COALESCE(SUM(CASE WHEN status='Confirmed' THEN price - downpayment END),0) AS balance
    FROM bookings")->fetch_assoc();
$nx = $conn->query("SELECT booking_date FROM bookings WHERE status='Confirmed' AND booking_date >= CURDATE() ORDER BY booking_date LIMIT 1")->fetch_assoc();

// Dates already taken by a confirmed booking (to warn about double booking)
$taken = [];
foreach ($conn->query("SELECT booking_date, COUNT(*) c FROM bookings WHERE status='Confirmed' GROUP BY booking_date") as $t) {
    $taken[$t['booking_date']] = (int) $t['c'];
}
function peso($n) { return '₱' . number_format((float) $n, 2); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Owner Dashboard | Gio San Captures Co.</title>
  <link rel="icon" type="image/x-icon" href="images/icon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<header class="topbar">
  <div class="topbar__in">
    <a href="index.php" class="brand"><b>Gio San Captures Co.</b><span>owner dashboard</span></a>
    <nav class="nav">
      <a href="admin.php" class="on">Bookings</a>
      <a href="index.php">View website</a>
      <a href="logout.php">Log out</a>
    </nav>
  </div>
</header>

<main class="wrap">
  <h1>Bookings</h1>
  <p class="sub">Review payments, confirm sessions, and keep your calendar clear.</p>

  <?php if (!empty($_GET['done'])): ?><div class="flash">Booking marked as <?= e($_GET['done']) ?>.</div><?php endif; ?>

  <section class="stats">
    <div class="stat stat--lead"><small>Needs your review</small><strong><?= (int) $sum['pending'] ?></strong></div>
    <div class="stat"><small>Confirmed sessions</small><strong><?= (int) $sum['confirmed'] ?></strong></div>
    <div class="stat"><small>Downpayments collected</small><strong><?= peso($sum['collected']) ?></strong></div>
    <div class="stat"><small>Balance to collect</small><strong><?= peso($sum['balance']) ?></strong></div>
    <div class="stat"><small>Next session</small><strong><?= $nx ? e(date('M j', strtotime($nx['booking_date']))) : '—' ?></strong></div>
  </section>

  <section class="panel">
    <div class="panel__head">
      <h2>All bookings</h2>
      <form class="filters" method="get">
        <input type="search" name="q" value="<?= e($q) ?>" placeholder="Search client or service" aria-label="Search">
        <select name="f" aria-label="Filter by status" onchange="this.form.submit()">
          <option value="">All status</option>
          <?php foreach ($valid as $s): ?>
            <option value="<?= $s ?>" <?= $f === $s ? 'selected' : '' ?>><?= $s ?></option>
          <?php endforeach; ?>
        </select>
        <button class="btn" type="submit">Search</button>
      </form>
    </div>

    <?php if (!$rows): ?>
      <div class="empty">No bookings match this view.</div>
    <?php else: ?>
      <div class="scroll">
        <table>
          <thead>
            <tr>
              <th>Client</th><th>Service</th><th>Session date</th>
              <th class="num">Price</th><th class="num">Downpayment</th>
              <th>Proof</th><th>Status</th><th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($rows as $r):
              $clash = $r['status'] === 'Pending' && !empty($taken[$r['booking_date']]); ?>
            <tr>
              <td><?= e($r['fullname']) ?><small><?= e($r['email']) ?></small></td>
              <td><?= e($r['service']) ?><small><?= e($r['payment_method']) ?></small></td>
              <td><?= e(date('M j, Y', strtotime($r['booking_date']))) ?>
                  <?php if ($clash): ?><span class="warn">Date already taken</span><?php endif; ?></td>
              <td class="num"><?= peso($r['price']) ?></td>
              <td class="num"><?= peso($r['downpayment']) ?></td>
              <td><a href="uploads/<?= e($r['proof_file']) ?>" target="_blank" rel="noopener">View</a></td>
              <td><span class="badge b-<?= e(strtolower($r['status'])) ?>"><?= e($r['status']) ?></span></td>
              <td>
                <div class="actions">
                <?php
                  $buttons = [];
                  if ($r['status'] === 'Pending')   { $buttons = ['confirm' => 'Confirm', 'decline' => 'Decline']; }
                  if ($r['status'] === 'Confirmed') { $buttons = ['complete' => 'Mark completed', 'decline' => 'Decline']; }
                  foreach ($buttons as $act => $label): ?>
                    <form method="post">
                      <input type="hidden" name="csrf" value="<?= e($_SESSION['csrf']) ?>">
                      <input type="hidden" name="booking_id" value="<?= (int) $r['id'] ?>">
                      <input type="hidden" name="action" value="<?= $act ?>">
                      <input type="hidden" name="f" value="<?= e($f) ?>">
                      <input type="hidden" name="q" value="<?= e($q) ?>">
                      <button type="submit" class="btn <?= $act === 'confirm' ? 'btn--main' : ($act === 'decline' ? 'btn--danger' : '') ?>"
                        <?= $act === 'decline' ? 'onclick="return confirm(\'Decline this booking?\');"' : '' ?>><?= $label ?></button>
                    </form>
                <?php endforeach; ?>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>
</main>

</body>
</html>