<?php
require 'db.php';

// Kailangan naka-login para makapasok
if (empty($_SESSION['user_id'])) {
    header('Location: login.php?need=1');
    exit;
}

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date    = $_POST['booking_date'] ?? '';
    $service = $_POST['service'] ?? '';
    $method  = $_POST['payment_method'] ?? '';

    // Presyo ay galing sa server, hindi sa browser
    $price = null;
    foreach ($SERVICES as $group) {
        if (isset($group[$service])) { $price = $group[$service]; }
    }

    $d = DateTime::createFromFormat('Y-m-d', $date);
    $validDate = $d && $d->format('Y-m-d') === $date && $date > date('Y-m-d');

    if (!$validDate) {
        $error = 'Please choose a valid date (starting tomorrow).';
    } elseif ($price === null) {
        $error = 'Please choose a service.';
    } elseif (!isset($PAYMENTS[$method])) {
        $error = 'Please choose a payment method.';
    } elseif (empty($_FILES['proof']['name']) || $_FILES['proof']['error'] !== UPLOAD_ERR_OK) {
        $error = 'Please upload a screenshot of your 50% downpayment.';
    } else {
        $ext  = strtolower(pathinfo($_FILES['proof']['name'], PATHINFO_EXTENSION));
        $info = @getimagesize($_FILES['proof']['tmp_name']);
        if (!in_array($ext, ['jpg', 'jpeg', 'png']) || !$info) {
            $error = 'Proof of payment must be a JPG or PNG image.';
        } elseif ($_FILES['proof']['size'] > 5 * 1024 * 1024) {
            $error = 'File is too large (max 5MB).';
        } else {
            if (!is_dir('uploads')) { mkdir('uploads', 0755, true); }
            $file = 'proof_' . $_SESSION['user_id'] . '_' . time() . '.' . $ext;
            move_uploaded_file($_FILES['proof']['tmp_name'], 'uploads/' . $file);

            $down = $price / 2;
            $stmt = $conn->prepare('INSERT INTO bookings (user_id,booking_date,service,price,downpayment,payment_method,proof_file) VALUES (?,?,?,?,?,?,?)');
            $stmt->bind_param('issddss', $_SESSION['user_id'], $date, $service, $price, $down, $method, $file);
            $stmt->execute();
            $success = true;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Session | Gio San Captures Co.</title>
  <link rel="icon" type="image/x-icon" href="images/icon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="auth.css">
</head>
<body class="auth-page">

  <main class="auth-container">
    <div class="top-links">
      <a href="index.php" class="back-link">← Back to Home</a>
      <a href="logout.php" class="back-link">Log out</a>
    </div>

    <a href="index.php" class="auth-brand" aria-label="Gio San Captures Co. photography">
      <span class="auth-brand__name">Gio San Captures Co.</span>
      <span class="auth-brand__sub">photography</span>
    </a>

<?php if ($success): ?>
    <h1>Booking Received!</h1>
    <p class="subtitle">Thank you, <?= e($_SESSION['user_name']) ?>.</p>
    <div class="alert alert--ok">We received your booking and proof of payment. Status: <b>Pending</b>. We'll contact you once your booking is confirmed.</div>
    <a href="index.php" class="auth-btn">BACK TO HOME <span>→</span></a>

<?php else: ?>
    <h1>Book a Session</h1>
    <p class="subtitle">Hi <?= e($_SESSION['user_name']) ?>! Choose your date and service, then pay the 50% downpayment.</p>

    <?php if ($error): ?><div class="alert alert--error"><?= e($error) ?></div><?php endif; ?>

    <form action="booking.php" method="post" enctype="multipart/form-data">
      <label for="booking_date">Session Date</label>
      <input type="date" id="booking_date" name="booking_date"
             min="<?= date('Y-m-d', strtotime('+1 day')) ?>"
             value="<?= e($_POST['booking_date'] ?? '') ?>" required>

      <label for="service">Type of Service</label>
      <select id="service" name="service" required>
        <option value="" data-price="0">-- Select a service --</option>
        <?php foreach ($SERVICES as $group => $items): ?>
          <optgroup label="<?= e($group) ?>">
            <?php foreach ($items as $name => $p): ?>
              <option value="<?= e($name) ?>" data-price="<?= $p ?>" <?= (($_POST['service'] ?? '') === $name) ? 'selected' : '' ?>><?= e($name) ?></option>
            <?php endforeach; ?>
          </optgroup>
        <?php endforeach; ?>
      </select>

      <div class="info-box" id="pricebox" style="display:none">
        Price: <b id="price">₱0.00</b><br>
        50% Downpayment: <b id="down">₱0.00</b>
      </div>

      <label for="method">Payment Method</label>
      <select id="method" name="payment_method" required>
        <option value="">-- Select payment method --</option>
        <?php foreach ($PAYMENTS as $m => $detail): ?>
          <option value="<?= e($m) ?>" <?= (($_POST['payment_method'] ?? '') === $m) ? 'selected' : '' ?>><?= e($m) ?></option>
        <?php endforeach; ?>
      </select>

      <div class="info-box" id="paybox" style="display:none">
        Send your downpayment to:<br><b id="paydetail"></b>
      </div>

      <label for="proof">Screenshot of Payment (JPG/PNG)</label>
      <input type="file" id="proof" name="proof" accept="image/png,image/jpeg" required>

      <button type="submit">BOOK NOW <span>→</span></button>
    </form>

    <script>
      const PAY = <?= json_encode($PAYMENTS) ?>;
      const fmt = n => '₱' + Number(n).toLocaleString('en-PH', {minimumFractionDigits: 2});
      const service = document.getElementById('service');
      const method  = document.getElementById('method');

      function updatePrice() {
        const p = Number(service.selectedOptions[0].dataset.price || 0);
        document.getElementById('pricebox').style.display = p ? 'block' : 'none';
        document.getElementById('price').textContent = fmt(p);
        document.getElementById('down').textContent  = fmt(p / 2);
      }
      function updatePay() {
        const d = PAY[method.value];
        document.getElementById('paybox').style.display = d ? 'block' : 'none';
        document.getElementById('paydetail').textContent = d || '';
      }
      service.addEventListener('change', updatePrice);
      method.addEventListener('change', updatePay);
      updatePrice(); updatePay();
    </script>
<?php endif; ?>
  </main>

</body>
</html>