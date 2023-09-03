/* the megamenu script */

const megadropElements = document.querySelectorAll('.megadrop');
const navbarwrap = document.querySelector('.navbarwrap');

megadropElements.forEach(megadrop => {
    megadrop.addEventListener('shown.bs.dropdown', function () {
        navbarwrap.classList.add('navbar-white');
    });

    megadrop.addEventListener('hidden.bs.dropdown', function () {
        navbarwrap.classList.remove('navbar-white');
    });
});

const dropdownElements = document.querySelectorAll('.dropdown'); 
const overlay = document.querySelector('.bcdl-dropdown-overlay');

dropdownElements.forEach(dropdown => {

    dropdown.addEventListener('shown.bs.dropdown', function () {
        overlay.classList.add('ovlactive');
    });

    dropdown.addEventListener('hidden.bs.dropdown', function () {
        overlay.classList.remove('ovlactive');
    });

});