
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Gio San Captures Co.</title>
  <link rel="stylesheet" href="auth.css">
</head>
<body>

  <main class="auth-container">
    <a href="index.html" class="back-link">← Back to Home</a>

    <img src="images/icon3.png" alt="Gio San Captures Logo" class="logo">

    <p class="eyebrow">GIO SAN CAPTURES CO.</p>
    <h1>Welcome Back</h1>
    <p class="subtitle">Log in to book your photography session.</p>

    <form action="#" method="post">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email"
             placeholder="Enter your email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password"
             placeholder="Enter your password" required>

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
      <a href="register.html">Create an account</a>
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

  .auth-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }