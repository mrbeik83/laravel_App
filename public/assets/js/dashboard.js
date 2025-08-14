// JavaScript اسلایدر و تایمر شمارش معکوس
const slides = document.querySelectorAll(".card-slide");
const dots = document.querySelectorAll(".slider-dot");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");

let currentIndex = 0;
const totalSlides = slides.length;
const countdownTimeSeconds = 10 * 60; // 10 دقیقه
let slideInterval;
let countdownInterval;

// زمان شروع برای هر اسلاید
const countdownStarts = [
  new Date(Date.now() + countdownTimeSeconds * 1000),
  new Date(Date.now() + countdownTimeSeconds * 1000),
  new Date(Date.now() + countdownTimeSeconds * 1000),
];

function showSlide(index) {
  // انیمیشن خروج برای اسلاید فعلی
  if (slides[currentIndex]) {
    slides[currentIndex].style.animation = "none";
    void slides[currentIndex].offsetWidth; // Trigger reflow
  }

  slides.forEach((slide, i) => {
    if (i === index) {
      slide.style.display = "flex";
      // تعیین انیمیشن بر اساس جهت حرکت
      if (index > currentIndex) {
        slide.style.animation = "slideInRight 0.8s forwards";
      } else if (index < currentIndex) {
        slide.style.animation = "slideInLeft 0.8s forwards";
      } else {
        slide.style.animation = "fadeIn 0.8s forwards";
      }
    } else {
      slide.style.display = "none";
      slide.style.animation = "none";
    }
    dots[i].classList.toggle("active", i === index);
  });

  currentIndex = index;
  resetTimer(index);
}

function resetTimer(index) {
  clearInterval(countdownInterval);
  startCountdown(index);
}

function startCountdown(index) {
  const now = new Date();
  const endTime = countdownStarts[index];
  const total = countdownTimeSeconds;

  function updateTimer() {
    const now = new Date();
    let diff = Math.floor((endTime - now) / 1000);

    if (diff < 0) diff = 0;

    const hours = Math.floor(diff / 3600);
    const minutes = Math.floor((diff % 3600) / 60);
    const seconds = diff % 60;

    // عناصر ساعت
    const hEl = document.getElementById(
      "hours" + (index === 0 ? "" : index + 1)
    );
    const mEl = document.getElementById(
      "minutes" + (index === 0 ? "" : index + 1)
    );
    const sEl = document.getElementById(
      "seconds" + (index === 0 ? "" : index + 1)
    );
    const progressBar = document.getElementById(
      "progressBar" + (index === 0 ? "" : index + 1)
    );

    if (hEl && mEl && sEl && progressBar) {
      hEl.textContent = String(hours).padStart(2, "0");
      mEl.textContent = String(minutes).padStart(2, "0");
      sEl.textContent = String(seconds).padStart(2, "0");
      const progressPercent = (diff / total) * 100;
      progressBar.style.width = progressPercent + "%";
    }

    if (diff <= 0) {
      clearInterval(countdownInterval);
    }
  }

  updateTimer();
  countdownInterval = setInterval(updateTimer, 1000);
}

// تابع تغییر خودکار اسلایدها
function startSlideShow() {
  slideInterval = setInterval(() => {
    nextSlide();
  }, 5000); // تغییر اسلاید هر 5 ثانیه
}

function nextSlide() {
  let newIndex = currentIndex + 1;
  if (newIndex >= totalSlides) newIndex = 0;
  showSlide(newIndex);
}

function prevSlide() {
  let newIndex = currentIndex - 1;
  if (newIndex < 0) newIndex = totalSlides - 1;
  showSlide(newIndex);
}

// دکمه‌های ناوبری
prevBtn.addEventListener("click", () => {
  clearInterval(slideInterval);
  prevSlide();
  startSlideShow();
});

nextBtn.addEventListener("click", () => {
  clearInterval(slideInterval);
  nextSlide();
  startSlideShow();
});

dots.forEach((dot) => {
  dot.addEventListener("click", () => {
    clearInterval(slideInterval);
    const index = parseInt(dot.getAttribute("data-index"));
    showSlide(index);
    startSlideShow();
  });
});

// شروع اولیه
showSlide(0);
startSlideShow(); // شروع تغییر خودکار اسلایدها

document
  .getElementById("searchTrigger")
  .addEventListener("click", function (e) {
    e.preventDefault();
    const box = document.getElementById("searchBox");
    box.classList.toggle("search-box-expanded");

    if (box.classList.contains("search-box-expanded")) {
      box.querySelector(".search-input").focus();
    }
  });

document.addEventListener("click", function (e) {
  if (!e.target.closest(".search-container")) {
    document
      .getElementById("searchBox")
      .classList.remove("search-box-expanded");
  }
});