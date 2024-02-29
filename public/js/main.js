
window.addEventListener('scroll', function () {
    var nav = document.getElementById('fixedNav');
    var sidebar = document.getElementById('sidebar');
    if (window.scrollY > 0) {
        nav.classList.add('fixed-nav');
        nav.classList.remove('trans-nav');
        if (sidebar) {
            sidebar.classList.add('sticky-sidebar');
        }

    } else {
        nav.classList.remove('fixed-nav');
        nav.classList.add('trans-nav');
        if (sidebar) {
            sidebar.classList.remove('sticky-sidebar');
        }
    }
});

function testimonial() {
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.item');
    const btns = document.querySelectorAll('.testimonials-btn');
    const isRTL = document.documentElement.dir === 'rtl';

    function reset() {
        for (let i = 0; i < items.length; i++) {
            btns[i].classList.remove('expand');
            items[i].classList.remove('animation');
        }
    }

    function animate(i) {
        btns[i].classList.add('expand');
        items[i].classList.add('animation');
    }

    function scrollTo(i) {
        const directionMultiplier = isRTL ? 1 : -1; // Adjust direction based on RTL or LTR
        slider.style.transform = `translateX(${directionMultiplier * i * slider.offsetWidth}px)`;
        reset();
        animate(i);
    }

    const activate = (e) => e.target.matches('.testimonials-btn') && scrollTo(e.target.dataset.index);

    const init = () => animate(0);

    window.addEventListener('load', init, false);
    window.addEventListener('click', activate, false);
}

$(document).ready(function () {
    $('.select2').select2();
    $("#accordion").accordion();

});
document.addEventListener('DOMContentLoaded', function () {
    if (document.body.classList.contains('home') || document.body.classList.contains('citizenship')) {
        testimonial();
    }
});
