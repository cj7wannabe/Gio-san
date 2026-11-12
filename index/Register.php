<?php
require 'db.php';

if (!empty($_SESSION['user_id'])) {
    header('Location: booking.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['fullname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';
    $pass2 = $_POST['confirm-password'] ?? '';

    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter your full name and a valid email.';
    } elseif (strlen($pass) < 6) {
        $error = 'Password must be at least 6 characters.';
    } elseif ($pass !== $pass2) {
        $error = 'Passwords do not match.';
    } else {
        $stmt = $conn->prepare('SELECT id FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        if ($stmt->get_result()->num_rows > 0) {
            $error = 'This email is already registered. Please log in instead.';
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $ins = $conn->prepare('INSERT INTO users (fullname, email, password) VALUES (?,?,?)');
            $ins->bind_param('sss', $name, $email, $hash);
            $ins->execute();
            header('Location: login.php?registered=1'); // after register -> login
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Gio San Captures Co.</title>
  <link rel="icon" type="image/x-icon" href="images/icon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Merriweather:wght@400;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="auth.css">
</head>
<body class="auth-page">

  <main class="auth-container">
    <a href="index.php" class="back-link">← Back to Home</a>

    <a href="index.php" class="auth-brand" aria-label="Gio San Captures Co. photography">
      <span class="auth-brand__name">Gio San Captures Co.</span>
      <span class="auth-brand__sub">photography</span>
    </a>

    <h1>Create Account</h1>
    <p class="subtitle">Join us and start planning your next session.</p>

    <?php if ($error): ?>
      <div class="alert alert--error"><?= e($error) ?></div>
    <?php endif; ?>

    <form action="Register.php" method="post">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname" value="<?= e($_POST['fullname'] ?? '') ?>"
             placeholder="Enter your full name" autocomplete="name" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>"
             placeholder="Enter your email" autocomplete="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password"
             placeholder="Create a password" autocomplete="new-password" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password" name="confirm-password"
             placeholder="Re-enter your password" autocomplete="new-password" required>

      <button type="submit">CREATE ACCOUNT <span>→</span></button>
    </form>

    <p class="switch-page">
      Already have an account?
      <a href="login.php">Log in</a>
    </p>

    <a href="index.php" class="back-home">Return to website</a>
  </main>

</body>
</html>