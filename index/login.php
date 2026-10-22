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

    <form action="#" method="post">
      <label for="email">Email Address</label>
      <input type="email" id="email" name="email"
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

<style>
  /* login.css — styles for login.php */

:root {
  --pg-bg: #303030;
  --pg-card: #1c1c1c;
  --pg-field: #262626;
  --pg-border: rgba(255, 255, 255, 0.12);
  --pg-text: #f0f0f0;
  --pg-muted: #b0b0b0;
  --pg-accent: #c8b9a6;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Brand block */
.auth-brand {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-bottom: 1.4rem;
  text-decoration: none;
}

.auth-brand__name {
  font-family: "Allura", cursive;
  font-size: 2.4rem;
  line-height: 1;
  color: #f4f4f4;
  white-space: nowrap;
}

.auth-brand__sub {
  margin-top: -4px;
  font-family: "Allura", cursive;
  font-size: 1.4rem;
  line-height: 1;
  color: var(--pg-accent);
}

/* Page */
.auth-page {
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 30px 18px;
  background: var(--pg-bg);
  color: var(--pg-text);
  font-family: "Montserrat", sans-serif;
}

.auth-container {
  width: 100%;
  max-width: 460px;
  padding: 38px 40px;
  background: var(--pg-card);
  border: 1px solid var(--pg-border);
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.35);
}

.back-link {
  display: inline-block;
  margin-bottom: 22px;
  color: var(--pg-muted);
  font-size: 13px;
  text-decoration: none;
  transition: color 0.2s;
}

.back-link:hover,
.back-home:hover {
  color: #ffffff;
}

.auth-container h1 {
  margin-bottom: 10px;
  font-family: "Merriweather", serif;
  font-size: 28px;
  font-weight: 700;
  text-align: center;
  color: #f4f4f4;
}

.subtitle {
  margin-bottom: 28px;
  color: var(--pg-muted);
  font-size: 13px;
  line-height: 1.6;
  text-align: center;
}

/* Form */
.auth-container form {
  display: flex;
  flex-direction: column;
}

.auth-container label {
  margin-bottom: 8px;
  color: #e6e6e6;
  font-size: 13px;
  font-weight: 600;
}

.auth-container input:not([type="checkbox"]) {
  width: 100%;
  margin-bottom: 18px;
  padding: 13px 14px;
  border: 1px solid #444444;
  border-radius: 6px;
  outline: none;
  background: var(--pg-field);
  color: var(--pg-text);
  font-family: inherit;
  font-size: 13px;
  transition: border-color 0.2s, box-shadow 0.2s;
}

.auth-container input::placeholder {
  color: #8a8a8a;
}

.auth-container input:not([type="checkbox"]):hover {
  border-color: #666666;
}

.auth-container input:not([type="checkbox"]):focus {
  border-color: var(--pg-accent);
  box-shadow: 0 0 0 3px rgba(200, 185, 166, 0.18);
}

/* Remember me + Forgot password */
.form-options {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 10px;
  margin: -4px 0 22px;
}

.remember {
  display: flex;
  align-items: center;
  gap: 8px;
  margin: 0 !important;
  color: var(--pg-muted) !important;
  font-weight: 500 !important;
  cursor: pointer;
}

.remember input {
  width: 16px;
  height: 16px;
  margin: 0;
  accent-color: var(--pg-accent);
  cursor: pointer;
}

.forgot {
  color: var(--pg-accent);
  font-size: 13px;
  text-decoration: none;
  transition: color 0.2s;
}

.forgot:hover {
  color: #ffffff;
  text-decoration: underline;
  text-underline-offset: 3px;
}

/* Submit button */
.auth-container button[type="submit"] {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 12px;
  width: 100%;
  min-height: 50px;
  margin-top: 4px;
  border: 1px solid #e6e6e6;
  border-radius: 7px;
  background: #f3f3f3;
  color: #111111;
  font-family: inherit;
  font-size: 12px;
  font-weight: 700;
  letter-spacing: 0.12em;
  cursor: pointer;
  transition: background 0.25s ease, border-color 0.25s ease, transform 0.25s ease;
}

.auth-container button[type="submit"] span {
  font-size: 16px;
}

.auth-container button[type="submit"]:hover {
  background: var(--pg-accent);
  border-color: var(--pg-accent);
  transform: translateY(-2px);
}

.auth-container button[type="submit"]:focus-visible {
  outline: 2px solid var(--pg-accent);
  outline-offset: 3px;
}

.auth-container button[type="submit"]:active {
  transform: translateY(0);
}

/* Bottom links */
.switch-page {
  margin-top: 25px;
  color: var(--pg-muted);
  font-size: 13px;
  text-align: center;
}

.switch-page a {
  margin-left: 4px;
  color: var(--pg-accent);
  font-weight: 700;
  text-decoration: none;
}

.switch-page a:hover {
  color: #ffffff;
  text-decoration: underline;
  text-underline-offset: 3px;
}

.back-home {
  display: block;
  margin-top: 18px;
  color: #8a8a8a;
  font-size: 12px;
  text-align: center;
  text-decoration: none;
  transition: color 0.2s;
}

/* Mobile */
@media (max-width: 480px) {
  .auth-container {
    padding: 28px 22px;
  }

  .auth-container h1 {
    font-size: 24px;
  }

  .auth-brand__name {
    font-size: 2.1rem;
  }
}
    </style>

</body>
</html>