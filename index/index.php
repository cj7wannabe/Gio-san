<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allura&family=Merriweather:wght@400;700&family=Montserrat:wght@500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css" />
    <title>Gio San Captures Co.</title>
    <link rel="icon" type="image/x-icon" href="images/icon.ico">
  </head>
  <body>

    <!-- ── HEADER / HERO ── -->
    <header class="header" id="home">

      <!-- Hero Content -->
      <div class="hero__content">
        <p class="hero__subtitle">Gio San Captures Co.</p>
        <h1 class="hero__title">We Capture<br/>Your Moments</h1>
        <p class="hero__description">Preserving your most cherished memories through our lens.</p>
        <a href="#contact" class="hero__btn">Book Now <i class="ri-arrow-right-line"></i></a>
      </div>

      <nav>
  <div class="nav__header">
    <div class="nav__logo">
      <a href="#home">
        <span class="brand-name">Gio San Captures Co.</span>
        <span class="brand-subtitle">photography</span>
      </a>
    </div>
    <button class="nav__menu__btn" id="menu-btn" type="button" aria-label="Toggle navigation" aria-expanded="false">
      <i class="ri-menu-line"></i>
    </button>
  </div>

  <ul class="nav__links" id="nav-links">
    <li class="nav__logo">
      <a href="#home">
        <span class="brand-name">Gio San Captures Co.</span>
        <span class="brand-subtitle">photography</span>
      </a>
    </li>
    <li><a href="#home">Home</a></li>
    <li><a href="#about">About Us</a></li>
    <li><a href="#contact">Contact Us</a></li>
    <li><a href="#portfolio">Portfolio</a></li>
    <li><a href="#gallery">Gallery</a></li>
  </ul>
</nav>
    </header>

    <!-- ── ABOUT ── -->
    <div class="section__container about__container" id="about">
      <h2 class="section__header">WE CAPTURE THE MOMENTS</h2>
      <p class="section__description">
        We cherish the moments we capture. We are a team of passionate 
        photographers dedicated to preserving your most cherished memories through our lens.
      </p>
      <p class="section__description">
        With a keen eye for detail and a commitment to excellence, we strive to 
        create timeless images that tell your unique story. Whether it's a wedding, family gathering, 
        or a special event, we are here to capture the emotions and beauty of every moment, 
        ensuring that your memories are preserved for generations to come.
      </p>
      <img src="images/icon3.png" alt="logo" />
    </div>

    <!-- ── PORTFOLIO ── -->
    <div class="section__container portfolio__container" id="portfolio">
      <h2 class="section__header">~ PORTFOLIO ~</h2>
      <div class="portfolio__grid">
        <div class="portfolio__card">
          <img src="images/portrait1.jpg" alt="Portraits" loading="lazy" decoding="async" />
          <div class="portfolio__content">
            <div class="portfolio__overlay">
              <i class="ri-user-smile-line"></i>
              <span>Portraits</span>
            </div>
          </div>
        </div>
        <div class="portfolio__card">
          <img src="images/wedding.jpg" alt="Weddings" loading="lazy" decoding="async" />
          <div class="portfolio__content">
            <div class="portfolio__overlay">
              <i class="ri-heart-line"></i>
              <span>Weddings</span>
            </div>
          </div>
        </div>
        <div class="portfolio__card">
          <img src="images/sports1.jpg" alt="Sports and Activities" loading="lazy" decoding="async" />
          <div class="portfolio__content">
            <div class="portfolio__overlay">
              <i class="ri-run-line"></i>
              <span>Sports & Activities</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ── SERVICES ── -->
    <section class="service" id="service">
      <div class="section__container service__container">
        <h2 class="section__header">~ SERVICES ~</h2>
        <p class="section__description">
          At Gio San Captures Co. we provide a diverse range of professional photography services designed 
          to capture your most meaningful moments. Whether it's a lively celebration, a formal event, 
          or a personalized outdoor session, our team is dedicated to delivering high-quality images 
          that reflect your unique story. With creativity, precision, and a passion for excellence, 
          we turn every moment into timeless memories you can cherish.
        </p>
        <div class="service__grid">
          <div class="service__card">
            <div class="service__icon">
              <i class="ri-trophy-line"></i>
            </div>
            <h4>Sports &amp; Activities</h4>
            <ul class="service__list">
              <li>Sports Events</li>
              <li>School Events</li>
              <li>Birthday Parties</li>
              <li>Family Gatherings</li>
            </ul>
          </div>
          <div class="service__card">
            <div class="service__icon">
              <i class="ri-camera-lens-line"></i>
            </div>
            <h4>Event Photography</h4>
            <ul class="service__list">
              <li>Weddings</li>
              <li>Debut</li>
              <li>Baptismal</li>
              <li>Corporate Events</li>
            </ul>
          </div>
          <div class="service__card">
            <div class="service__icon">
              <i class="ri-sun-line"></i>
            </div>
            <h4>Outdoor Sessions</h4>
            <ul class="service__list">
              <li>Pre-Birthday Shoot</li>
              <li>Pre-Nuptial Shoot</li>
              <li>Collab Shoot</li>
              <li>Grad Shoot</li>
              <li>OTD Shoot</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ── TESTIMONIALS ── -->
    <section class="section__container client__container" id="testimonials">
      <h2 class="section__header">~ TESTIMONIALS ~</h2>
      <div class="swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="client__card">
              <img src="images/testimonial1.jpg" alt="Client testimonial portrait" loading="lazy" decoding="async" />
              <p>
                Thank you for capturing my son's memorable christening and 1st birthday 💞 
                The photos are excellent and vibrant! 
                🩵 We'll definitely hire your team again for our future events.
              </p>
              <h4>Maria Rocamora</h4>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <img src="images/testimonial4.jpg" alt="Client testimonial portrait" loading="lazy" decoding="async" />
              <p>
                a great photographer, Magandaa quality ng pictures and easy to communicate with.  
                100% recommended  you won't regret kapag siya yung kinuha niyongg photographer!
              </p>
              <h4>Lovely Gwyneth</h4>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="client__card">
              <img src="images/testimonial5.jpg" alt="Client testimonial portrait" loading="lazy" decoding="async" />
              <p>
                ganda ng mga kuha and malinaw, pa pitik narin kayo!!!
              </p>
              <h4>Rian</h4>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- ── GALLERY ── -->
    <section class="section__container gallery__container" id="gallery">
      <h2 class="section__header">~ GALLERY ~</h2>
      <div class="gallery__grid">
        <img src="images/gallery1.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/image11.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery3.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery4.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery5.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery6.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery7.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery8.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery9.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery10.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery11.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
        <img src="images/gallery12.jpg" alt="Photography portfolio image" loading="lazy" decoding="async" />
      </div>
    </section>

    <!-- ── BLOG ── -->
    <section class="blog">
      <div class="section__container blog__container">
        <div class="blog__content">
          <h2 class="section__header">~ LATEST BLOG ~</h2>
          <h4>Capturing Emotion in Every Frame</h4>
          <p>
            Photography is more than just taking pictures--it's about preserving emotions, 
            telling stories, and capturing moments that might otherwise fade with time. 
            In this blog, we explore how thoughtful composition, lighting, and timing come 
            together to create powerful images that truly connect with people.

            At Gio San Captures and Prints Co., we believe every photo should reflect genuine 
            emotion and authenticity. From intimate celebrations to grand events, our approach 
            focuses on turning real-life moments into timeless visual stories that you can revisit 
            and cherish for years to come.
          </p>
        </div>
      </div>
    </section>

    <!-- ── INSTAGRAM ── -->
    <section class="section__container instagram__container">
      <h2 class="section__header">~ INSTAGRAM ~</h2>
      <div class="instagram__flex">
        <img src="images/gallery1.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image11.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image12.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image13.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image14.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image15.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image16.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
        <img src="images/image17.jpg" alt="Photography from Gio San Captures Co." loading="lazy" decoding="async" />
      </div>
    </section>

    <!-- ── FAQ ── -->
    <section class="faq">
      <div class="section__container faq__container" id="faq">

        <h2 class="section__header">~ FREQUENTLY ASKED QUESTIONS ~</h2>

        <div class="faq__content">

          <div class="faq__item active">
            <button class="faq__question">
              How do I book a photography session?
              <span>−</span>
            </button>
            <div class="faq__answer">
              <p>
                You can book a session through our booking form in the footer section
                or message us directly through our social media pages.
              </p>
            </div>
          </div>

          <div class="faq__item">
            <button class="faq__question">
              What payment methods do you accept?
              <span>+</span>
            </button>
            <div class="faq__answer">
              <p>
                We accept GCash, bank transfer, and cash payments.
                A reservation fee may be required to secure your booking schedule.
              </p>
            </div>
          </div>

          <div class="faq__item">
            <button class="faq__question">
              Do you offer promotional packages?
              <span>+</span>
            </button>
            <div class="faq__answer">
              <p>
                Yes, we have special promotional packages. Message us on our official Facebook page for more details.
              </p>
            </div>
          </div>

          <div class="faq__item">
            <button class="faq__question">
              Do you travel outside the city?
              <span>+</span>
            </button>
            <div class="faq__answer">
              <p>
                Yes, we accept out-of-town bookings depending on the schedule and location.
              </p>
            </div>
          </div>

          <div class="faq__item">
            <button class="faq__question">
              How long before we receive the photos?
              <span>+</span>
            </button>
            <div class="faq__answer">
              <p>
                Edited photos are usually delivered within 7–14 business days.
              </p>
            </div>
          </div>

          <div class="faq__item">
            <button class="faq__question">
              Can we reschedule our session?
              <span>+</span>
            </button>
            <div class="faq__answer">
              <p>
                Yes, rescheduling is allowed depending on availability and weather conditions.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section>

    <!-- ── CONTACT US ── -->
    <footer class="contact-section" id="contact">
      <div class="contact-heading">
        <p class="contact-label">CONTACT US</p>
        <h2>Get in Touch</h2>
        <p>Have a question or want to book a session? Feel free to reach out.</p>
      </div>

      <div class="contact__container">
        <div class="contact__location">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d690.8525552221109!2d121.09280170192739!3d14.650665528779925!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1778910656461!5m2!1sen!2sph"
            title="Gio San Captures Co. location map"
            class="contact__map"
            width="100%"
            height="300"
            style="border:0;"
            allowfullscreen
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>

          <div class="contact__address">
            <i class="ri-map-pin-line" aria-hidden="true"></i>
            <div>
              <h3>Our Location</h3>
              <p>Gio San Captures Co.</p>
              <a href="https://www.google.com/maps?q=14.650665528779925,121.09280170192739" target="_blank" rel="noopener noreferrer">
                Get Directions <i class="ri-arrow-right-line" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="contact__details">
          <img class="contact__logo" src="images/icon3.png" alt="Gio San Captures Co. logo" />

          <div class="contact__item">
            <i class="ri-mail-line" aria-hidden="true"></i>
            <div>
              <h3>Email</h3>
              <a href="mailto:akoposichoco@gmail.com">akoposichoco@gmail.com</a>
            </div>
          </div>

          <div class="contact__item">
            <i class="ri-instagram-line" aria-hidden="true"></i>
            <div>
              <h3>Instagram</h3>
              <a href="https://www.instagram.com/giyowsan" target="_blank" rel="noopener noreferrer">Visit our Instagram</a>
            </div>
          </div>

          <div class="contact__item">
            <i class="ri-facebook-fill" aria-hidden="true"></i>
            <div>
              <h3>Facebook</h3>
              <a href="https://www.facebook.com/giyowsan" target="_blank" rel="noopener noreferrer">Gio San Captures Co.</a>
            </div>
          </div>

          <div class="contact__booking">
            <a href="booking.php" class="contact__booking-btn">BOOK A SESSION <i class="ri-arrow-right-line" aria-hidden="true"></i></a>
            <p>Choose a date and tell us about the session you have in mind.</p>
          </div>
        </div>
      </div>

      <div class="contact__bottom">
        <div class="contact__socials">
          <a href="https://www.instagram.com/giyowsan" aria-label="Instagram" target="_blank" rel="noopener noreferrer"><i class="ri-instagram-line"></i></a>
          <a href="https://www.facebook.com/giyowsan" aria-label="Facebook" target="_blank" rel="noopener noreferrer"><i class="ri-facebook-fill"></i></a>
          <a href="mailto:akoposichoco@gmail.com" aria-label="Email"><i class="ri-mail-fill"></i></a>
        </div>
        <div class="footer__bar">
          <span>© <span data-current-year></span> Gio San Captures Co.</span>
          <a href="termsandconditions.html">Terms and Conditions</a>
        </div>
      </div>
    </footer>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>