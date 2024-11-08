// Star Rating
document.addEventListener('DOMContentLoaded', function () {
    const starRating = document.querySelector('.star-rating');
    const stars = starRating.querySelectorAll('.fa-star');
    const userRatingInput = document.getElementById('userRating');
    const ratingForm = document.querySelector('.star-rating-form');
    let userRating = parseInt(starRating.dataset.userRating) || 0;

    // Fungsi untuk memperbarui tampilan bintang
    function updateStars(rating) {
        stars.forEach((star, index) => {
            if (index < rating) {
                star.classList.add('checked');
            } else {
                star.classList.remove('checked');
            }
        });
    }

    // Atur bintang sesuai rating user saat halaman dimuat
    if (userRating) {
        updateStars(userRating);
    }

    // Hover dan klik event untuk bintang
    stars.forEach(star => {
        star.addEventListener('mouseover', function () {
            const hoveredRating = parseInt(star.dataset.star);
            updateStars(hoveredRating);
        });

        star.addEventListener('mouseout', function () {
            updateStars(userRating);
        });

        star.addEventListener('click', function () {
            const clickedRating = parseInt(star.dataset.star);
            userRatingInput.value = clickedRating;
            userRating = clickedRating;
            updateStars(userRating);
            ratingForm.submit();
        });
    });
});

// Darkmode
let darkmode = localStorage.getItem('darkmode');
const themeSwitch = document.getElementById('theme-switch');

const enableDarkMode = () => {
    document.body.classList.add('darkmode');
    localStorage.setItem('darkmode', 'active');
};

const disableDarkMode = () => {
    document.body.classList.remove('darkmode');
    localStorage.setItem('darkmode', null);
};

if (darkmode === 'active') {
    enableDarkMode();
} else {
    disableDarkMode(); 
}

themeSwitch.addEventListener('click', () => {
    darkmode = localStorage.getItem('darkmode');
    darkmode !== "active" ? enableDarkMode() : disableDarkMode();
});
