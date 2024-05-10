// Меню бургер
const openMenuBtn = document.querySelector('#top-panel-menu-link');
const closeMenuBtn = document.querySelector('#aside-btn-close-menu');
const aside = document.querySelector('#aside');

if (openMenuBtn) {
    openMenuBtn.addEventListener("click", function(e) {
        aside.classList.toggle('_active');
    })
}

if (closeMenuBtn) {
    closeMenuBtn.addEventListener("click", function(e) {
        aside.classList.toggle('_active');
    })
}