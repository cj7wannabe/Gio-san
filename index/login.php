<?php
require 'db.php';

if (!empty($_SESSION['user_id'])) {
    header('Location: booking.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    $stmt = $conn->prepare('SELECT id, fullname, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $user = $stmt->get_result()->fetch_assoc();

    if ($user && password_verify($pass, $user['password'])) {
        session_regenerate_id(true);
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['fullname'];
        header('Location: booking.php'); // pagkatapos mag-login, diretso sa booking
        exit;
    }
    $error = 'Mali ang email o password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Gio San Captures Co.</title>
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

    <h1>Welcome Back</h1>
    <p class="subtitle">Log in to book your photography session.</p>

    <?php if (isset($_GET['registered'])): ?>
      <div class="alert alert--ok">Successfully registered! You can now log in.</div>
    <?php endif; ?>
    <?php if (isset($_GET['need'])): ?>
      <div class="alert alert--error">Please log in or create an account first to book a session.</div>
    <?php endif; ?>
    <?php if ($error): ?>
      <div class="alert alert--error"><?= e($error) ?></div>
    <?php endif; ?>

    <form action="login.php" method="post">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email" value="<?= e($_POST['email'] ?? '') ?>"
             placeholder="Enter your email" autocomplete="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password"
             placeholder="Enter your password" autocomplete="current-password" required>

      <div class="form-options">
        <label class="remember">
          <input type="checkbox" name="remember">
          Remember me
        </label>
        <a href="#" class="forgot">Forgot password?</a>
      </div>

      <button type="submit">LOG IN <span>→</span></button>
    </form>

    <p class="switch-page">
      Don't have an account?
      <a href="Register.php">Create an account</a>
    </p>

    <a href="index.php" class="back-home">Return to website</a>
  </main>

</body>
</html>