const body = document.body;

function dark() {
    body.classList.toggle('dark-mode');
}

let slideIndex = 0;
const slides = document.querySelectorAll('.slideshow-img');

function showSlides() {
    slides.forEach((slide) => {
        slide.classList.remove('active');
    });
    slideIndex = (slideIndex + 1) % slides.length; 
    slides[slideIndex].classList.add('active');
}
setInterval(showSlides, 3000); 

const bookNowBtn = document.getElementById('book-now'); 
const bookNowNav = document.getElementById('book-now-nav'); 
const bookingPopup = document.getElementById('booking-popup');
const closePopupBtn = document.getElementById('close-popup');

if (bookNowBtn) {
    bookNowBtn.addEventListener('click', () => {
        bookingPopup.style.display = 'flex';
    });
}

if (bookNowNav) {
    bookNowNav.addEventListener('click', () => {
        bookingPopup.style.display = 'flex';
    });
}

if (closePopupBtn) {
    closePopupBtn.addEventListener('click', () => {
        bookingPopup.style.display = 'none';
    });
}

const infoButtons = document.querySelectorAll('.info-btn');
infoButtons.forEach((btn) => {
    const campPopupId = `${btn.dataset.camp}-popup`;
    const campPopup = document.getElementById(campPopupId);
    btn.addEventListener('click', () => {
        campPopup.style.display = 'flex';
    });

    const closeCampPopupBtn = campPopup.querySelector('.close');
    closeCampPopupBtn.addEventListener('click', () => {
        campPopup.style.display = 'none';
    });
});

const bookingForm = document.getElementById('booking-form');
if (bookingForm) {
    bookingForm.addEventListener('submit', () => {
        bookingPopup.style.display = 'none';
    });
}

const hamburger = document.getElementById('hamburger-menu');
const navbar = document.getElementById('navbar');

if (hamburger) {
    hamburger.addEventListener('click', () => {
        navbar.classList.toggle('active');
    });
}