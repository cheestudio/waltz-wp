"use strict";

/* CUSTOM
========================================================= */

/* GSAP Config
  ========================================================= */
gsap.registerPlugin(
  SplitText,
  CSSRulePlugin,
  ScrollTrigger,
  MorphSVGPlugin,
  DrawSVGPlugin
);

gsap.config({
  nullTargetWarn: false,
});

/* Spotlight
========================================================= */

function spotlightEffect(event) {
  const spotlight = document.querySelector('.spotlight-effect');
  const mouseX = event.clientX;
  const mouseY = event.pageY;
  const thresholdX = window.innerWidth * 0.3;
  const thresholdY = window.innerHeight * 0.2;

  gsap.to(spotlight, {
    x: mouseX - 250,
    y: mouseY - 250,
  });

  if (
    mouseX > window.innerWidth - thresholdX ||
    mouseY > window.innerHeight - thresholdY
  ) {
    gsap.to(spotlight, {
      opacity: 0,
      scale: 0.80,
      duration: 0.3
    });
  } else {
    gsap.to(spotlight, {
      opacity: 1,
      scale: 1,
    });
  }
}

document.addEventListener('mousemove', spotlightEffect);

const spotlightWrap = document.querySelector('.spotlight-effect');
ScrollTrigger.create({
  start: 500,
  end: 99999,
  onToggle: ({ direction }) => {
    if (direction == -1) {
      document.addEventListener('mousemove', spotlightEffect);
    } else {
      document.removeEventListener('mousemove', spotlightEffect);
    }
  }
});

gsap.to(".ribbon-bg", {
  scale: 1.1,
  yPercent: -2,
  perspective: 2,
  scrollTrigger: {
    trigger: "main",
    start: "top top",
    end: "bottom bottom",
    scrub: 2,
  }
});

gsap.set('.spotlight-hover', { opacity: 1 });
gsap.from('.spotlight-hover', {
  opacity: 0,
  y: 40,
  duration: 0.65,
  delay: 0.25
});
gsap.set('.hp-featured-copy, .anniversary-copy', { opacity: 1 });
gsap.from('.hp-featured-copy, .anniversary-copy', {
  opacity: 0,
  y: 10,
  duration: 0.8,
  delay: 0.4
});

/* Animated Variable Text
 ========================================================= */

function hoverTextInit() {
  var textElements = document.querySelectorAll(".hover-text");

  new SplitText(textElements, {
    type: "chars",
    charsClass: "char",
    position: "relative",
  });

  gsap.set('.hover-text', {
    opacity: 1
  });

  var chars = gsap.utils.toArray(".char");
  gsap.set(chars, {
    transformOrigin: "center center",
    fontWeight: 900,
    fontStretch: "10%",
    autoAlpha: 0,
  });

  /* Fade In */

  gsap.from('.hover-text', {
    opacity: 0,
    delay: 0.8,
  });

  gsap.to(chars, {
    autoAlpha: 1,
    fontWeight: 500,
    duration: 1,
    stagger: 0.03,
  });

  function followPointer(pX, pY) {
    var fontWMax = 999;
    var fontWMin = 500;
    var fontSMax = 100;
    var fontSMin = 10;

    chars.forEach((char, index) => {
      var rect = char.getBoundingClientRect();
      var charX = rect.left;
      var charY = rect.top;
      var centerX = charX;
      var centerY = charY;
      var dX = pX - centerX;
      var dY = pY - centerY;
      var dist = Math.sqrt(dX * dX + dY * dY) * 1.5;
      gsap.to(char, {
        fontWeight: function () {
          if (dist > fontWMax - fontWMin) {
            dist = fontWMax - fontWMin;
          }
          return fontWMax - dist;
        },
        fontStretch: function () {
          if (dist > fontSMax - fontSMin) {
            dist = fontSMax - fontSMin;
          }
          return `${fontSMax - dist}%`;
        },
        ease: "power2",
        duration: 0.5,
      });
    });
  }

  var pointer = {
    x: window.innerWidth / 2,
    y: window.innerHeight / 2,
  };

  window.addEventListener("mousemove", function (event) {
    pointer.x = event.clientX;
    pointer.y = event.clientY;
    followPointer(pointer.x, pointer.y);
  });
}

var isDesktop = window.matchMedia("(min-width: 1025px)");
if (isDesktop.matches) {
  hoverTextInit();
}


/* Homepage
  ========================================================= */

var body = document.getElementsByTagName("body")[0];
if (body.classList.contains("home")) {
  const headerElement = document.querySelector('header.main-banner');
  const brand = document.querySelector(".brand");
  const brandFull = document.querySelector(".brand-full");

  logoTL = gsap.timeline({ paused: true });
  logoTL.to(
    brand, {
    autoAlpha: 1,
    scale: 1,
    y: 0,
    duration: 0.2
  }).to(
    brandFull, {
    autoAlpha: 0,
    y: 5,
    duration: 0.2
  }, "<");


  ScrollTrigger.create({
    start: 1,
    end: 99999,
    onToggle: ({ direction }) => {
      if (direction == -1) {
        logoTL.reverse();

      } else {
        logoTL.play();
      }
    }
  });

}


/* Main Nav
  ========================================================= */

function animateToggle() {
  var bars = document.querySelectorAll(".icon-bar-entry");
  var mobileBarsTL = gsap.timeline().to(bars, {
    autoAlpha: 1,
    x: 0,
    duration: 1,
    stagger: -0.2,
    delay: 0.2,
    ease: "power3.inOut",
  });
}

function animateMenu() {
  var mqDesktop = window.matchMedia("(min-width: 1281px)");
  var listItems = document.querySelectorAll("#menu-primary-nav li a");
  var navToggle = document.querySelector(".navbar-toggle");
  var navMenuWrap = document.querySelector(".nav-inner");
  var navMenu = document.querySelector(".nav-menu");
  var navStamp = document.querySelector(".nav-stamp.primary img");

  var menuTimelineOpen = gsap.timeline({
    paused: true,
  });

  var menuTimelineClose = gsap.timeline({
    paused: true
  });

  animateMenu.init = function () {
    if (mqDesktop.matches) {
      var navMenuSlideOpen = gsap.from(navMenu, {
        x: "101%",
        duration: 0.4,
        ease: "power3.inOut",
      });
    }

    menuTimelineOpen
      .from(navMenuWrap, {
        autoAlpha: 1,
        x: "100%",
        duration: 0.45,
        ease: "power3.inOut",
      })
      .add(navMenuSlideOpen)
      .to(
        listItems, {
        opacity: 1,
        y: 0,
        duration: 0.3,
        stagger: 0.1,
        ease: "power3.inOut",
      },
        "-=0.2"
      )
      .from(
        navStamp, {
        autoAlpha: 0,
        scale: 0.8,
      },
        "<"
      );

    if (mqDesktop.matches) {
      menuTimelineClose
        .to(navMenu, {
          x: "101%",
          duration: 0.3,
          ease: "power3.inOut",
        })
        .to(
          navStamp, {
          autoAlpha: 0,
          scale: 0.8,
        },
          "<-0.1"
        )
        .to(navMenuWrap, {
          autoAlpha: 1,
          y: "100%",
          duration: 0.3,
          ease: "power3.inOut",
        })
        .to(listItems, {
          opacity: 0,
          y: "100%",
          duration: 0.1,
          ease: "power3.inOut",
        })
        .set(navMenuWrap, {
          y: 0,
          x: "100%",
        });
    } else {
      menuTimelineClose
        .to(navMenuWrap, {
          autoAlpha: 1,
          x: "-100%",
          duration: 0.4,
          ease: "power3.inOut",
        });
    }
  };

  animateMenu.toggle = function () {
    var menuOpen = false;
    navToggle.addEventListener("click", function (event) {
      if (menuOpen == true) {
        navToggle.classList.remove("open");
        menuTimelineClose.play(0);
        menuOpen = false;
        gsap.to(".overlay", {
          display: "none",
          autoAlpha: 0,
          duration: 1,
        });
      } else {
        navToggle.classList.add("open");
        menuTimelineOpen.play(0);
        menuOpen = true;
        gsap.to(".overlay", {
          display: "block",
          autoAlpha: 1,
          duration: 1,
        });
      }
    });
  };

  animateMenu.reset = function () {
    navToggle.classList.remove("open");
    menuTimelineOpen.progress(0).pause();
    menuOpen = false;
  };

  animateMenu.reset();
  animateMenu.toggle();
  animateMenu.init();
} //end animateMenu()

animateMenu();
animateToggle();

// Doc Ready
(function ($) {
  $(window).load(function () {
    $("body").addClass("visible");
  });

  /*  InView Trigger
   ========================================================= */
  function inViewTriggers() {
    gsap.utils.toArray(".scrolled, .animated").forEach(function (section, i) {
      if (section.ST) {
        section.ST.refresh();
      } else {
        section.ST = ScrollTrigger.create({
          trigger: section,
          start: "top 50%",
          onEnter: function onEnter() {
            section.classList.add("inview");
          },
          onEnterBack: function onEnterBack() {
            section.classList.add("inview");
          },
        });
      }
    });


  }
  inViewTriggers();

  // Animate Single Element
  var animateElement = gsap.utils.toArray(".animated-element");
  animateElement.forEach(function (element) {
    var positionValueX = element.getAttribute("data-anim-x") || 0;
    var positionValueY = element.getAttribute("data-anim-y") || 0;
    var scaleValue = element.getAttribute("data-anim-scale") || 1;
    var delayValue = element.getAttribute("data-anim-delay") || 0;
    var durationValue = element.getAttribute("data-anim-duration") || 1;
    gsap.set(element, { opacity: 1 });
    gsap.from(element, {
      opacity: 0,
      x: positionValueX,
      y: positionValueY,
      duration: durationValue,
      ease: "power3.inOut",
      delay: delayValue,
      scale: scaleValue,
      transformOrigin: "center center",
      scrollTrigger: {
        trigger: element,
        start: "top 70%",
      },
    });
  });

  // Animate Grouped Elements
  var staggerGroup = gsap.utils.toArray(".animated-group");
  staggerGroup.forEach(function (group) {
    var elements = group.querySelectorAll(".animated-entry");
    gsap.set(elements, { opacity: 1 });
    gsap.from(elements, {
      scrollTrigger: {
        trigger: group,
        start: "top 70%",
      },
      y: -10,
      opacity: 0,
      duration: 1,
      ease: "power3.inOut",
      stagger: 0.1,
    });
  });


  gsap.utils.toArray(".fade-left").forEach(function (fadeLeftElement, i) {
    gsap.from(fadeLeftElement, {
      scrollTrigger: {
        trigger: fadeLeftElement,
        start: "top 70%",
      },
      autoAlpha: 0,
      x: -50,
      duration: 1,
      ease: "power3.inOut",
    });
  });

  gsap.utils.toArray(".fade-right").forEach(function (fadeRightElement, i) {
    gsap.from(fadeRightElement, {
      scrollTrigger: {
        trigger: fadeRightElement,
        start: "top 70%",
      },
      autoAlpha: 0,
      x: 50,
      duration: 1,
      ease: "power3.inOut",
    });
  });

  gsap.utils.toArray(".fade-up").forEach(function (fadeUpElement, i) {
    gsap.from(fadeUpElement, {
      scrollTrigger: {
        trigger: fadeUpElement,
        start: "top 70%",
      },
      autoAlpha: 0,
      y: 50,
      duration: 1,
      ease: "power3.inOut",
    });
  });

  gsap.utils.toArray(".fade-down").forEach(function (fadeDownElement, i) {
    gsap.from(fadeDownElement, {
      scrollTrigger: {
        trigger: fadeDownElement,
        start: "top 70%",
      },
      autoAlpha: 0,
      y: -50,
      duration: 1,
      ease: "power3.inOut",
    });
  });



  /* About
   ========================================================= */

  const memberBlocks = gsap.utils.toArray(".members-block");
  memberBlocks.forEach(function (block) {
    gsap.from(block.querySelectorAll(".team-member-entry"), {
      autoAlpha: 0,
      scaleX: 0.8,
      duration: 1,
      ease: "power3.inOut",
      stagger: 0.2,
      "-webkit-filter": "grayscale(100%)",
      filter: "grayscale(100%)",
      scrollTrigger: {
        trigger: block,
        start: "top 80%",
      },
    });
  });

  /* Portfolio Filters
   ========================================================= */

  // $(document).on("facetwp-refresh", function () {
  //   setTimeout(function () {
  //     inViewTriggers();
  //   }, 2000);
  // });

  $(document).on("facetwp-loaded", function () {
    $("[data-tilt]").tilt({
      maxTilt: 10,
      perspective: 5000,
      speed: 600,
    });
  });

  /* Page Transition
   ======================================================== */

  // var anchors = document.querySelectorAll('a');
  // anchors.forEach(function(anchor, i) {
  //     anchor.addEventListener('click', function(e) {
  //         gsap.to('html', {
  //             autoAlpha: 0,
  //             scale: 0.98,
  //             duration: 0.15
  //         });
  //     });
  // });

  /* Sliders
   ========================================================= */

  /* Testimonial Slider */

  var testimonialSlider = document.querySelector(".portfolio-testimonials");
  if (document.body.contains(testimonialSlider)) {
    new Glide(testimonialSlider, {
      //  type: "carousel",
      startAt: 0,
      perView: 1,
      bound: true,
      peek: {
        before: 0,
        after: 200,
      },
      breakpoints: {
        1024: {
          perView: 1,
          peek: {
            before: 0,
            after: 50
          }
        }
      }
    }).mount();
  }

  /* Portfolio Slider */

  var portfolioSlider = document.querySelector(".related-projects-slider");
  if (document.body.contains(portfolioSlider)) {
    new Glide(".related-projects-slider", {
      type: "carousel",
    }).mount();
  }

  /* Services
   ========================================================= */

  gsap
    .timeline({
      scrollTrigger: {
        trigger: ".services-outro",
        start: "top 80%",
        end: "top 10%",
        scrub: 1,
        // markers:true
      },
    })
    .from(".services-waves", {
      y: -200,
      x: 300,
      scaleX: 3,
    });

  /*  Service Steps
   ========================================================= */

  gsap.utils.toArray(".step-entry").forEach(function (section, i) {
    linePath = section.querySelector(".line-cover");
    gsap.to(linePath, {
      drawSVG: 0,
      duration: 1,
      scrollTrigger: {
        trigger: section,
        start: "top 70%",
      },
    });
  });

  /* TiltJS for Images
   ========================================================= */

  $("[data-tilt]").tilt({
    maxTilt: 10,
    perspective: 5000,
    speed: 600,
  });

  /* Misc Scroll Events
   ========================================================= */

  $(window).scroll(function () {
    var currentPos = $(this).scrollTop();
    if (currentPos > 100) {
      $(".scroll-down").addClass("scrolled");
    } else {
      $(".scroll-down").removeClass("scrolled");
    }
  });

  /* Keyboard Events
   ========================================================= */

  var navToggle = $(".navbar-toggle");
  $(document).keyup(function (e) {
    if (navToggle.hasClass("open")) {
      if (e.keyCode == 27) {
        $(".navbar-toggle").click();
      }
    }
  });

  /* Schipper Stamp
  ========================================================= */

  $(".nav-stamp.hero").click(function (e) {
    var popupElement = $(this);
    var popupIsOpen = popupElement.hasClass("opened");
    if (popupIsOpen) {
      gsap.to(".stamp-popup", {
        display: "none",
        x: 30,
        autoAlpha: 0,
      });
      popupElement.removeClass("opened");
    } else {
      popupElement.addClass("opened");
      gsap.fromTo(
        ".stamp-popup", {
        display: "none",
        y: -10,
        x: -10,
        autoAlpha: 0,
      }, {
        display: "block",
        y: 0,
        x: 0,
        autoAlpha: 1,
      }
      );
    }
    return false;
  });

  $(".stamp-popup .close").click(function (e) {
    var popupElement = $(this);
    gsap.to(".stamp-popup", {
      display: "none",
      x: 30,
      autoAlpha: 0,
    });
    popupElement.removeClass("opened");
    return false;
  });

  /* Vimeo Pause
  ========================================================= */

  $(function () {

    var vimeoWrap = $('.row-bg-vimeo');
    var vmPlayer = vimeoWrap.find('.fl-bg-video').data('VMPlayer');
    var createToggle = vimeoWrap.append('<a aria-label="Pause or Play Video" class="video-toggle bare-link" href=""><span class="fas fa-pause"></span></a>');
    var videoToggle = $('.video-toggle');

    videoToggle.click(function (e) {
      e.preventDefault();
      var _this = $(this);
      if (_this.hasClass('paused')) {
        vmPlayer.play();
        _this.removeClass('paused');
        _this.find('span').removeClass('fa-play').addClass('fa-pause');
      } else {
        vmPlayer.pause();
        _this.addClass('paused');
        _this.find('span').removeClass('fa-pause').addClass('fa-play');
      }
    });

  });


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
  if ($('.countdown-widget').length) {
    countdown("April 15, 2024 00:00:00");
  }

  //   function applyAspectRatioClass() {
  //   const aspectRatio = window.innerWidth / window.innerHeight;
  //   const animationWindow = document.querySelector('.anniversary-animation.desktop');
  //   const ratio16_9 = 16 / 9;
  //   const ratio4_3 = 4 / 3;
  //   const diff16_9 = Math.abs(aspectRatio - ratio16_9);
  //   const diff4_3 = Math.abs(aspectRatio - ratio4_3);
  //   animationWindow.classList.remove('aspect-16-9', 'aspect-4-3');
  //   if (diff16_9 < diff4_3) {
  //     animationWindow.classList.add('aspect-16-9');
  //   } else {
  //     animationWindow.classList.add('aspect-4-3');
  //   }
  // }

  // window.onload = applyAspectRatioClass;
  // window.onresize = applyAspectRatioClass;



  function portfolioMasonry() {

    // Init Masonry
    const $grid = $('.client-masonry-grid').masonry({
      itemSelector: '.client-masonry-entry',
      gutter: 10,
      stagger: 0,
      transitionDuration: 0,
      percentPosition: true
    });

    // Reload and update on facetwp-loaded
    $(document).on('facetwp-loaded', function () {

      // Scroll to top on filters, not pagination
      if (FWP.buildQueryString() !== '' && FWP.load_more_paged < 2) {
        $('html, body').animate({
          scrollTop: $('.portfolio-wrap').offset().top
        }, 300);
      }


      // Refresh Grid
      $grid.masonry('reloadItems');

      // Ensure images are loaded
      $grid.imagesLoaded().progress(function () {
        $grid.masonry('layout');
        const fadeImageLoop = (index, img) => {
          const $img = $(img);
          setTimeout(function () {
            $img.css({
              'opacity': '1',
              'transform': 'translateY(0)'
            });
          }, index * 50);
        }
        // Fade all images loaded
        $('.client-masonry-entry img').each(fadeImageLoop);
      });

    });

    const handleFadeImages = () => {
      $('.client-masonry-entry img').each(function (index, img) {
        const $img = $(img);
        setTimeout(function () {
          $img.css({
            'transition': 'opacity 0.3s ease, transform 0.3s ease',
            'opacity': '0',
            'transform': 'translateY(-10px)'
          });
        }, index * 30);
      });
    };

    // Fade on Radio filters only
    $(document).on('click', '.facetwp-radio:not(.disabled)', handleFadeImages);

  }

  if ($('body').hasClass('page-template-tpl-portfolio-masonry')) {
    portfolioMasonry();
  }

  /* Fancybox
========================================================= */

  const handleBannerOpacity = (opacity) => {
    $('header.main-banner').css({ 'opacity': opacity });
  };

  Fancybox.bind('[data-fancybox="gallery"]', {
    Thumbs: false,
    autoFocus: false,
    Hash: false,
    on: {
      reveal: (fancybox) => {
        handleBannerOpacity(0);
      },
      close: (fancybox) => {
        handleBannerOpacity(1);
      }
    }
  });

  /* FacetWP Filter Functions
  ========================================================= */

  // Filter Toggle
  const handleFilterToggle = (event) => {
    event.preventDefault();
    const target = $(event.currentTarget);
    target.toggleClass('active');
    target.next('.facetwp-type-radio').slideToggle();
    target.parent().siblings().find('h3').removeClass('active');
    target.parent().siblings().find('.facetwp-type-radio').slideUp();
  };

  // Work Tags Search
  const handleWorkTags = (event) => {
    event.preventDefault();
    const tags = $(event.target).text();
    FWP.facets['expertise'] = [];
    FWP.facets['industry'] = [];
    FWP.facets['search'] = '';
    Fancybox.close();
    FWP.is_reset = true;
    FWP.facets['work_tags'] = tags;
    FWP.refresh();
  };


  const handleSingleFacetFiltering = () => {
    const facetNames = ['industry', 'expertise', 'work_tags', 'search'];
    const activeFacet = FWP.active_facet ? fUtil(FWP.active_facet.nodes[0]).attr('data-name') : null;
    if (activeFacet && facetNames.includes(activeFacet)) {
      const otherFacets = FWP.facets;
      Object.keys(otherFacets).forEach(key => {
        if (facetNames.includes(key) && key !== activeFacet) {
          otherFacets[key] = [];
        }
      });
    }
  };

  const handleFacetGhost = () => {
    $('.facetwp-radio.disabled').each(function () {
      var $entry = $(this);
      $entry.removeClass('disabled').addClass('facetwp-ghost');
    });
  };

  const handleBackToTopClick = (e) => {
    e.preventDefault();
    $('html, body').animate({
      scrollTop: 0
    }, 300);
  };

  const handleScroll = () => {
    const backToTopButton = $('.portfolio-back-to-top');
    $(window).scrollTop() > 100 ? backToTopButton.addClass('active') : backToTopButton.removeClass('active');
  };


  $(document).on('click touchend', '.filter-entry h3', handleFilterToggle);
  $(document).on('click touchend', '.work-tags-list a', handleWorkTags);
  $(document).on('facetwp-refresh', handleSingleFacetFiltering);
  $(document).on('facetwp-loaded', handleFacetGhost);
  $(document).on('click', '.portfolio-back-to-top', handleBackToTopClick);
  $(window).on('scroll', handleScroll);

})(jQuery); 