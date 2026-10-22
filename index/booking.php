<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book a Session | Gio San Captures Co.</title>
  <link rel="icon" type="image/x-icon" href="images/icon.ico">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Allura&family=Merriweather:wght@300;400;700;900&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">

</head>
<body class="booking-page">
  <header class="booking-page__header">
    <a href="index.php" class="auth-brand" aria-label="Gio San Captures Co. photography">
      <span class="auth-brand__name">Gio San Captures Co.</span>
      <span class="auth-brand__sub">photography</span>
    </a>
    <a href="index.php" class="booking-page__back">← Back to home</a>
  </header>

  <main class="booking-page__main">
    <p class="contact-label">RESERVE YOUR DATE</p>
    <h1>Book Your Session</h1>
    <p class="booking-page__intro">Choose your preferred date and tell us a little about the photography session you have in mind.</p>

    <div class="booking-page__form-wrap">
      <form id="bookingForm" class="booking-form" novalidate>
        <label for="bookingDate">Select Date</label>
        <input type="date" id="bookingDate" class="booking-input" required>
        <div id="dateMessage" class="booking-message" aria-live="polite"></div>

        <label for="bookingService">Choose Service</label>
        <select id="bookingService" class="booking-input" required>
          <option value="Sports and Game Photography">Sports and Game Photography</option>
          <optgroup label="Outdoor Photography">
            <option value="Pre-Birthday">Pre-Birthday</option>
            <option value="Pre-Nuptial">Pre-Nuptial</option>
            <option value="Outdoor Shoot">Outdoor Shoot</option>
            <option value="Collab Shoot">Collab Shoot</option>
            <option value="Graduation Shoot">Graduation Shoot</option>
            <option value="OTD Photography">OTD Photography</option>
          </optgroup>
          <optgroup label="Event Photography">
            <option value="Bronze Package">Bronze Package (Jollibee, McDonald's, Shakey's, Max's, Kenny Rogers)</option>
            <option value="Silver Package">Silver Package (Civil Weddings, Baptismal, Birthdays)</option>
            <option value="Product Photography">Product Photography (Church Weddings, Debuts, Reunions, Big Events)</option>
          </optgroup>
        </select>

        <label for="bookingNotes">Additional Notes</label>
        <textarea id="bookingNotes" class="booking-input" placeholder="Share any details about your session..."></textarea>

        <div class="success booking-message" id="message" role="status" aria-live="polite"></div>
        <button type="submit" class="booking-btn">SUBMIT BOOKING REQUEST <i class="ri-arrow-right-line" aria-hidden="true"></i></button>

        <div class="booking-page__auth">
          <a href="login.php" class="booking-btn-secondary">Login</a>
          <a href="Register.php" class="booking-btn-secondary">Register</a>
        </div>
      </form>
    </div>
  </main>

  <footer class="booking-page__footer">
    <a href="https://www.instagram.com/giyowsan" aria-label="Instagram"><i class="ri-instagram-line"></i></a>
    <a href="https://www.facebook.com/giyowsan" aria-label="Facebook"><i class="ri-facebook-fill"></i></a>
    <a href="mailto:akoposichoco@gmail.com" aria-label="Email"><i class="ri-mail-fill"></i></a>
    <p>© <span data-current-year></span> Gio San Captures Co. · <a href="termsandconditions.html">Terms and Conditions</a></p>
  </footer>

  <script src="main.js"></script>

  <style>
 /* booking.css — styles for booking.php */

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
.booking-page {
  min-height: 100vh;
  background: var(--pg-bg);
  color: var(--pg-text);
  font-family: "Montserrat", sans-serif;
}

.booking-page .booking-page__header {
  width: 100%;
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px 32px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
}

.booking-page .auth-brand {
  margin: 0;
}

.booking-page .booking-page__back {
  color: var(--pg-muted);
  font-size: 13px;
  text-decoration: none;
  transition: color 0.25s ease;
}

.booking-page .booking-page__back:hover {
  color: #ffffff;
}

.booking-page .booking-page__main {
  width: 100%;
  max-width: 760px;
  margin: 35px auto 80px;
  padding: 0 24px;
}

.booking-page .contact-label {
  margin-bottom: 12px;
  color: var(--pg-accent);
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.3em;
  text-align: center;
}

.booking-page .booking-page__main h1 {
  margin: 0 0 16px;
  font-family: "Merriweather", serif;
  font-size: clamp(30px, 5vw, 44px);
  font-weight: 700;
  line-height: 1.3;
  text-align: center;
  color: #f4f4f4;
}

.booking-page .booking-page__intro {
  max-width: 540px;
  margin: 0 auto 35px;
  color: var(--pg-muted);
  font-size: 14px;
  line-height: 1.9;
  text-align: center;
}

.booking-page .booking-page__form-wrap {
  padding: 38px;
  background: var(--pg-card);
  border: 1px solid var(--pg-border);
  border-radius: 12px;
  box-shadow: 0 14px 40px rgba(0, 0, 0, 0.35);
}

/* Form */
.booking-page .booking-form {
  display: flex;
  flex-direction: column;
  gap: 12px;
}

.booking-page .booking-form label {
  margin-top: 8px;
  color: #e6e6e6;
  font-size: 13px;
  font-weight: 600;
}

.booking-page .booking-input {
  width: 100%;
  min-height: 48px;
  padding: 13px 14px;
  border: 1px solid #444444;
  border-radius: 6px;
  outline: none;
  background: var(--pg-field);
  color: var(--pg-text);
  color-scheme: dark;
  font-family: inherit;
  font-size: 13px;
  transition: border-color 0.25s ease, box-shadow 0.25s ease;
}

.booking-page .booking-input:hover {
  border-color: #666666;
}

.booking-page .booking-input:focus {
  border-color: var(--pg-accent);
  box-shadow: 0 0 0 3px rgba(200, 185, 166, 0.18);
}

.booking-page .booking-input::placeholder {
  color: #8a8a8a;
}

.booking-page select.booking-input {
  cursor: pointer;
}

.booking-page select.booking-input option,
.booking-page select.booking-input optgroup {
  background: #262626;
  color: #f0f0f0;
}

.booking-page textarea.booking-input {
  min-height: 125px;
  resize: vertical;
  line-height: 1.7;
}

.booking-page .booking-message {
  font-size: 12px;
  line-height: 1.6;
}

.booking-page #dateMessage {
  margin-top: -5px;
}

.booking-page #message,
.booking-page .success {
  margin-top: 5px;
  color: #7fd99a;
  font-size: 12px;
  font-weight: 600;
}

.booking-page #message:empty,
.booking-page #dateMessage:empty {
  display: none;
}

/* Submit button */
.booking-page .booking-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 10px;
  width: 100%;
  min-height: 52px;
  margin-top: 12px;
  padding: 15px 20px;
  border: 1px solid #e6e6e6;
  border-radius: 7px;
  background: #f3f3f3;
  color: #111111;
  box-shadow: none;
  font-family: inherit;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  cursor: pointer;
  transition: background 0.25s ease, border-color 0.25s ease, transform 0.25s ease;
}

.booking-page .booking-btn:hover {
  background: var(--pg-accent);
  border-color: var(--pg-accent);
  box-shadow: none;
  transform: translateY(-2px);
}

.booking-page .booking-btn:focus-visible,
.booking-page .booking-btn-secondary:focus-visible,
.booking-page .booking-page__back:focus-visible {
  outline: 2px solid var(--pg-accent);
  outline-offset: 3px;
}

.booking-page .booking-btn i {
  font-size: 16px;
}

/* Login / Register buttons */
.booking-page .booking-page__auth {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 12px;
  margin-top: 16px;
  padding-top: 18px;
  border-top: 1px solid var(--pg-border);
}

.booking-page .booking-btn-secondary {
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 46px;
  padding: 12px;
  border: 1px solid #666666;
  border-radius: 7px;
  background: transparent;
  color: #e6e6e6;
  font-family: inherit;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: 0.14em;
  text-transform: uppercase;
  text-decoration: none;
  transition: border-color 0.25s ease, color 0.25s ease, background 0.25s ease, transform 0.25s ease;
}

.booking-page .booking-btn-secondary:hover {
  border-color: var(--pg-accent);
  background: rgba(200, 185, 166, 0.1);
  color: var(--pg-accent);
  transform: translateY(-1px);
}

/* Footer */
.booking-page .booking-page__footer {
  padding: 25px 20px;
  border-top: 1px solid var(--pg-border);
  text-align: center;
}

.booking-page .booking-page__footer > a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  margin: 0 12px 15px;
  color: #d8d8d8;
  font-size: 18px;
  text-decoration: none;
  transition: color 0.25s ease;
}

.booking-page .booking-page__footer > a:hover {
  color: var(--pg-accent);
}

.booking-page .booking-page__footer p {
  margin: 8px 0 0;
  color: #8a8a8a;
  font-size: 11px;
  line-height: 1.8;
}

.booking-page .booking-page__footer p a {
  color: var(--pg-accent);
  text-decoration: underline;
  text-underline-offset: 3px;
}

/* Mobile */
@media (max-width: 600px) {
  .booking-page .booking-page__header {
    padding: 16px 20px;
  }

  .booking-page .auth-brand__name {
    font-size: 1.9rem;
  }

  .booking-page .auth-brand__sub {
    font-size: 1.2rem;
  }

  .booking-page .booking-page__back {
    font-size: 11px;
  }

  .booking-page .booking-page__main {
    margin: 30px auto 50px;
    padding: 0 16px;
  }

  .booking-page .booking-page__main h1 {
    font-size: 30px;
  }

  .booking-page .booking-page__intro {
    font-size: 12px;
  }

  .booking-page .booking-page__form-wrap {
    padding: 23px 18px;
  }
}
    </style>


</body>
</html>