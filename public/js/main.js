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

    $(".owl-carousel").owlCarousel({

        margin: 15, autoplay: true, autoplayTimeout: 100, responsive: {
            0: {
                items: 1.5
            }, 600: {
                items: 2 // Number of items to show for medium screens
            }, 1000: {
                items: 3 // Number of items to show for large screens
            }
        }, nav: true, // Show navigation
        navText: ["<span class='owl-prev-icon'></span>", "<span class='owl-next-icon'></span>"] // Customize navigation text or icons

    });

});
