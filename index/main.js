// ── Hamburger menu ──
const menuBtn = document.getElementById("menu-btn");
const navLinks = document.getElementById("nav-links");
const menuBtnIcon = menuBtn ? menuBtn.querySelector("i") : null;

if (menuBtn && navLinks && menuBtnIcon) {
  menuBtn.addEventListener("click", () => {
    navLinks.classList.toggle("open");
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class", isOpen ? "ri-close-line" : "ri-menu-line");
    menuBtn.setAttribute("aria-expanded", String(isOpen));
  });

  navLinks.addEventListener("click", (event) => {
    if (event.target.closest("a")) {
      navLinks.classList.remove("open");
      menuBtnIcon.setAttribute("class", "ri-menu-line");
      menuBtn.setAttribute("aria-expanded", "false");
    }
  });
}

// ── Sticky navbar scroll effect ──
const nav = document.querySelector("nav");

if (nav) {
  const updateNav = () => nav.classList.toggle("scrolled", window.scrollY > 50);
  updateNav();
  window.addEventListener("scroll", updateNav, { passive: true });
}

// ── ScrollReveal ──
if (typeof ScrollReveal === "function") {
  const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
  };

  ScrollReveal().reveal(".about__container .section__header", scrollRevealOption);
  ScrollReveal().reveal(".about__container .section__description", {
    ...scrollRevealOption,
    delay: 500,
    interval: 500,
  });
  ScrollReveal().reveal(".about__divider", { ...scrollRevealOption, delay: 1500 });

  ScrollReveal().reveal(".service__container .section__header", scrollRevealOption);
  ScrollReveal().reveal(".service__container .section__description", {
    ...scrollRevealOption,
    delay: 500,
  });
  ScrollReveal().reveal(".service__card", {
    duration: 1000,
    delay: 1000,
    interval: 500,
  });

  ScrollReveal().reveal(".blog__content .section__header", scrollRevealOption);
  ScrollReveal().reveal(".blog__content h4", { ...scrollRevealOption, delay: 500 });
  ScrollReveal().reveal(".blog__content p", { ...scrollRevealOption, delay: 1000 });
  ScrollReveal().reveal(".blog__content .blog__btn", { ...scrollRevealOption, delay: 1500 });
}

// ── Swiper ──
if (typeof Swiper === "function" && document.querySelector(".swiper")) {
  new Swiper(".swiper", {
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
}

// ── Gallery: justified rows, every row ends flush, no cropping ──
(function () {
  const grid = document.querySelector(".gallery__grid");
  if (!grid) return;

  const imgs = Array.from(grid.querySelectorAll("img"));

  // Real ratio once loaded, otherwise width/height attributes, otherwise a guess
  const ratio = (img) => {
    const w = img.naturalWidth || Number(img.getAttribute("width"));
    const h = img.naturalHeight || Number(img.getAttribute("height"));
    return w && h ? w / h : 1.5;
  };

  function layout() {
    const W = grid.clientWidth;
    if (!W) return;

    const gap = parseFloat(getComputedStyle(grid).columnGap) || 8;
    const H = W < 700 ? 140 : W < 1100 ? 200 : 240; // target row height

    let row = [];
    let sum = 0;

    const flush = (isLast) => {
      const h = isLast ? H : (W - gap * (row.length - 1)) / sum;
      row.forEach((img) => {
        img.style.height = Math.round(h) + "px";
        img.style.width = Math.floor(h * ratio(img)) + "px";
      });
      row = [];
      sum = 0;
    };

    imgs.forEach((img) => {
      row.push(img);
      sum += ratio(img);
      if (sum * H + gap * (row.length - 1) >= W) flush(false);
    });
    if (row.length) flush(true);
  }

  let frame;
  const schedule = () => {
    cancelAnimationFrame(frame);
    frame = requestAnimationFrame(layout);
  };

  layout();                                            // run immediately
  imgs.forEach((img) => img.addEventListener("load", schedule));
  window.addEventListener("load", schedule);           // again when everything is loaded
  window.addEventListener("resize", schedule);

  if ("ResizeObserver" in window) {
    new ResizeObserver(schedule).observe(grid);        // also reacts to container width changes
  }
})();

// ── Instagram scroll duplicate ──
const instagram = document.querySelector(".instagram__flex");

if (instagram && !instagram.dataset.duplicated) {
  Array.from(instagram.children).forEach((item) => {
    const duplicateNode = item.cloneNode(true);
    duplicateNode.setAttribute("aria-hidden", "true");
    instagram.appendChild(duplicateNode);
  });
  instagram.dataset.duplicated = "true";
}

// ── Booking form validation (runs only if a booking form exists on this page) ──
const form = document.getElementById("bookingForm");
const message = document.getElementById("message");
const dateInput = document.getElementById("bookingDate");
const dateMessage = document.getElementById("dateMessage");

// Colors that stay readable on the dark booking card
const ERROR_COLOR = "#ff8a80";
const SUCCESS_COLOR = "#7fd99a";

function getLocalDateString(date) {
  const year = date.getFullYear();
  const month = String(date.getMonth() + 1).padStart(2, "0");
  const day = String(date.getDate()).padStart(2, "0");
  return `${year}-${month}-${day}`;
}

if (dateInput) {
  dateInput.min = getLocalDateString(new Date());

  dateInput.addEventListener("change", () => {
    if (dateInput.value && dateInput.value < getLocalDateString(new Date())) {
      if (dateMessage) {
        dateMessage.textContent = "Booking is unavailable on past dates.";
        dateMessage.style.color = ERROR_COLOR;
      }
      dateInput.value = "";
    } else if (dateMessage) {
      dateMessage.textContent = "";
    }
  });
}

if (form && dateInput && message) {
  form.addEventListener("submit", (event) => {
    event.preventDefault();

    if (!dateInput.value || dateInput.value < getLocalDateString(new Date())) {
      message.textContent = "Please select a valid available date.";
      message.style.color = ERROR_COLOR;
      return;
    }

    message.textContent = "Your request is ready. Please contact us to confirm your booking.";
    message.style.color = SUCCESS_COLOR;
  });
}

// ── FAQ toggle ──
const faqItems = document.querySelectorAll(".faq__item");

faqItems.forEach((item) => {
  const question = item.querySelector(".faq__question");
  const icon = question ? question.querySelector("span") : null;
  if (!question || !icon) return;

  question.addEventListener("click", () => {
    const isOpen = item.classList.toggle("active");
    icon.textContent = isOpen ? "−" : "+";
    question.setAttribute("aria-expanded", String(isOpen));
  });
});

// ── Current year ──
document.querySelectorAll("[data-current-year]").forEach((element) => {
  element.textContent = new Date().getFullYear();
});