document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.querySelector(".hamburger");
    const header = document.querySelector("header");

    if (hamburger) {
        hamburger.addEventListener("click", function () {
            header.classList.toggle("menu-active");
        });
    }
});