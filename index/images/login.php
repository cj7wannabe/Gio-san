
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Gio San Captures Co.</title>
  <link rel="stylesheet" href="auth.css">
</head>
<body>

  <main class="auth-container">
    <a href="index.html" class="back-link">← Back to Home</a>

    <img src="images/icon3.png" alt="Gio San Captures Logo" class="logo">

    <p class="eyebrow">GIO SAN CAPTURES CO.</p>
    <h1>Create Account</h1>
    <p class="subtitle">Join us and start planning your next session.</p>

    <form action="#" method="post">
      <label for="fullname">Full Name</label>
      <input type="text" id="fullname" name="fullname"
             placeholder="Enter your full name" required>

      <label for="email">Email Address</label>
      <input type="email" id="email" name="email"
             placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password"
             placeholder="Create a password" required>

      <label for="confirm-password">Confirm Password</label>
      <input type="password" id="confirm-password"
             name="confirm-password"
             placeholder="Re-enter your password" required>

      <button type="submit">CREATE ACCOUNT <span>→</span></button>
    </form>

    <p class="switch-page">
      Already have an account?
      <a href="login.html">Log in</a>
    </p>

    <a href="index.html" class="back-home">Return to website</a>
  </main>

</body>
</html>

<style>

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #f9f9f9;
        color: #333;
        margin: 0;
        padding: 0;
    }
</style>