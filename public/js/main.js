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

document.addEventListener('DOMContentLoaded', function () {
    if (document.body.classList.contains('home') || document.body.classList.contains('citizenship')) {
        testimonial();
    }
});
const cookieBox = document.querySelector(".wrapper"), buttons = document.querySelectorAll(".button");

const executeCodes = () => {
    //if cookie contains codinglab it will be returned and below of this code will not run
    if (document.cookie.includes("codinglab")) return;
    cookieBox.classList.add("show");

    buttons.forEach((button) => {
        button.addEventListener("click", () => {
            cookieBox.classList.remove("show");

            //if button has acceptBtn id
            if (button.id == "acceptBtn") {
                //set cookies for 1 month. 60 = 1 min, 60 = 1 hours, 24 = 1 day, 30 = 30 days
                document.cookie = "cookieBy= codinglab; max-age=" + 60 * 60 * 24 * 30;
            }
        });
    });
};

//executeCodes function will be called on webpage load
window.addEventListener("load", executeCodes);

var acc = document.getElementsByClassName("accordion-nav");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}

  $( function() {
    $( "#accordion" ).accordion();
  } );
