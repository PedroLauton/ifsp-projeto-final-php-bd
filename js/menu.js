document.addEventListener("DOMContentLoaded", function () {
    var menuIcon_1 = document.querySelector('.nav-icon');
    var menuIcon_2 = document.querySelector('#nav_usuario');
    var menuNav = document.querySelector('.nav_menu');

    menuIcon_1.addEventListener('click', function () {
        menuNav.classList.toggle('show');
        
        
    });
    menuIcon_2.addEventListener('click', function () {
        menuNav.classList.toggle('show');
    });
});
