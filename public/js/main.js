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


var acc = document.getElementsByClassName("accordion-nav");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
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

document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('multiStepForm');
  const fieldsets = form.querySelectorAll('fieldset');
  const messageInput = document.getElementById('messageInput');

  let currentStep = 0;
  let selectedCountry = '';
  let selectedType = '';

  function showStep(step) {
    fieldsets.forEach((fieldset, index) => {
      if (index === step) {
        fieldset.style.display = 'flex';
      } else {
        fieldset.style.display = 'none';
      }
    });
  }

  function nextStep() {
    if (currentStep < fieldsets.length - 1) {
      currentStep++;
      showStep(currentStep);
    } else {
      // If it's the last step, submit the form
      form.submit();
    }
  }

  function prevStep() {
    if (currentStep > 0) {
      currentStep--;
      showStep(currentStep);
    }
  }

  document.querySelectorAll('.option').forEach(option => {
    option.addEventListener('click', function() {
      if (currentStep === 0) {
        selectedCountry = this.dataset.value;
        nextStep(); // Move to the next step after selecting the country
      } else if (currentStep === 1) {
        selectedType = this.dataset.value;
        // Concatenate both selected values
          messageInput.value = `Hey Bagdad Team! 🌟 I'm ready to invest in ${selectedType} in beautiful ${selectedCountry}!  Let's talk about that! 💼`;
        nextStep(); // Move to the next step after selecting the type
      }
    });
  });

  document.querySelectorAll('.prev-btn').forEach(button => {
    button.addEventListener('click', function() {
      prevStep();
    });
  });
});


$(function () {
    $("#accordion").accordion();
    $("#tabs").tabs();
});
