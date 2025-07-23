"use strict";


(function ($) {


  /* Countdown
  ========================================================= */

  function countdown(targetDate) {
    const target = new Date(targetDate).getTime();

    // Update the countdown every 1 second
    const interval = setInterval(function () {
      const now = new Date().getTime();
      const distance = target - now;

      // Time calculations for days, hours, minutes, and seconds
      const days = Math.floor(distance / (1000 * 60 * 60 * 24));
      const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the respective elements by ID
      document.getElementById("days").textContent = days;
      document.getElementById("hours").textContent = hours;
      document.getElementById("minutes").textContent = minutes;
      document.getElementById("seconds").textContent = seconds;

      // If the countdown is finished, write some text
      if (distance < 0) {
        clearInterval(interval);
        document.getElementById("days").textContent = "00";
        document.getElementById("hours").textContent = "00";
        document.getElementById("minutes").textContent = "00";
        document.getElementById("seconds").textContent = "00";
      }
    }, 1000);
  }
  countdown("April 25, 2024 23:59:59");

  /* Parallax
  ========================================================= */

  function initParallax() {
    // Select all elements with the 'data-parallax' attribute
    document.querySelectorAll('[data-parallax]').forEach(element => {
      const strength = element.dataset.parallax; // Strength of the parallax effect

      gsap.to(element, {
        y: (i, target) => `+=${strength * 100}px`, // Adjust the strength multiplier as needed
        ease: 'none',
        scrollTrigger: {
          trigger: element,
          start: 'top bottom', // When the top of the element hits the bottom of the viewport
          end: 'bottom top', // When the bottom of the element leaves the top of the viewport
          scrub: true // Smooth parallax effect
        }
      });
    });
  }
  // Initialize the parallax effect when the document is ready
  document.addEventListener('DOMContentLoaded', initParallax);

  const getHoverDirection = function (event) {
    var directions = ['top', 'right', 'bottom', 'left'];
    var item = event.currentTarget;
    var w = item.offsetWidth;
    var h = item.offsetHeight;
    var x = (event.clientX - item.getBoundingClientRect().left - (w / 2)) * (w > h ? (h / w) : 1);
    var y = (event.clientY - item.getBoundingClientRect().top - (h / 2)) * (h > w ? (w / h) : 1);
    var d = Math.round(Math.atan2(y, x) / 1.57079633 + 5) % 4;
    return directions[d];
  };

  document.addEventListener('DOMContentLoaded', function (event) {
    var items = document.getElementsByClassName('service-link');
    for (var i = 0; i < items.length; i++) {
      ['mouseenter', 'mouseleave'].forEach(function (eventname) {
        items[i].addEventListener(eventname, function (event) {
          var dir = getHoverDirection(event);
          event.currentTarget.classList.remove('mouseenter');
          event.currentTarget.classList.remove('mouseleave');
          event.currentTarget.classList.remove('top');
          event.currentTarget.classList.remove('right');
          event.currentTarget.classList.remove('bottom');
          event.currentTarget.classList.remove('left');
          event.currentTarget.className += ' ' + event.type + ' ' + dir;
        }, false);
      });
    }
  });

  const handClickTl = gsap.timeline({ repeatDelay: 2, repeat: -1, defaults: { duration: 0.65 } });
  handClickTl.to(".waltz-cursor", { x: 10, y: -10 })
    .to(".waltz-cursor", { x: -10, y: 10 })
    .to(".waltz-cursor", { x: 15, y: 15 })
    .to(".waltz-cursor", { x: -10, y: -10 })
    .to(".waltz-cursor", { x: 0, y: 0 })
    .to(".waltz-cursor", { scale: 0.95, duration: 0.35 })
    .to(".cursor-click", { autoAlpha: 1, duration: 0.35 }, '<')
    .to(".waltz-cursor", { scale: 1, duration: 0.2 })
    .to(".cursor-click", { autoAlpha: 0, duration: 0.2 }, '<')
    ;


  $(".number-entry").mouseover(function () {
    $(".diamond-entry").addClass("hovered");
  });
  $(".number-entry").mouseout(function () {
    $(".diamond-entry").removeClass("hovered");
  });

})(jQuery);
