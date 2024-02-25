// add scroll to nav
window.addEventListener('scroll', function () {
    var nav = document.getElementById('fixedNav');
    if (window.scrollY > 0) {
        nav.classList.add('fixed-nav');
        nav.classList.remove('trans-nav');
    } else {
        nav.classList.remove('fixed-nav');
        nav.classList.add('trans-nav');
    }
});

$(document).ready(function () {
    $('.select2').select2();


});
