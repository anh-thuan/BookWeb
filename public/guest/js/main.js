(function ($) {
    "use strict";
    var windowOn = $(window);

    /*======================================
      Preloader activation
      ========================================*/
    $(window).on('load', function (event) {
        $('#preloader').delay(500).fadeOut(500);
    });

    /*======================================
      Mobile Menu Js
      ========================================*/
    $("#mobile-menu").meanmenu({
        meanMenuContainer: ".mobile-menu",
        meanScreenWidth: "991",
        meanExpand: ['<i class="fa-regular fa-angle-right"></i>'],
    });

    $("#mobile-menu-2").meanmenu({
        meanMenuContainer: ".mobile-menu-2",
        meanScreenWidth: "4000",
        meanExpand: ['<i class="fa-regular fa-angle-right"></i>'],
    });

    /*======================================
      Sidebar Toggle
      ========================================*/

    $(".bars_icon").on("click", function () {
        $(".offcanvas-info").addClass("info_open");
        $(".offcanvas_overlay").addClass("overlayopen");
    });

    $(".offcanvas-icon,.offcanvas_overlay").on("click", function () {
        $(".offcanvas-info").removeClass("info_open");
        $(".offcanvas_overlay").removeClass("overlayopen");
    });

    /*======================================
	Sticky Header Js
	========================================*/

	$(window).scroll(function () {
		if ($(this).scrollTop() > 250) {
		  $(".header-sticky").addClass("sticky");
		} else {
		  $(".header-sticky").removeClass("sticky");
		}
	});

	/*======================================
	Sticky Header Js
	========================================*/

    /*======================================
    content hidden class js
    ========================================*/
    $('.contentHidden').remove();

    /*======================================
      Body overlay Js
      ========================================*/
    $(".body-overlay").on("click", function () {
        $(".offcanvas__area").removeClass("opened");
        $(".body-overlay").removeClass("opened");
    });

    /*======================================
     dark mode js
     ========================================*/
    $(document).ready(function () {
        $(".dark-mode-btn2").click(function () {
            $(".dark-mode-btn2").toggleClass("active");
            $("body").toggleClass("dark-mode");
        });
    });

    /*======================================
      Sticky Header Js
      ========================================*/

    $(window).scroll(function () {
        if ($(this).scrollTop() > 250) {
            $("#header-sticky").addClass("bd-sticky");
        } else {
            $("#header-sticky").removeClass("bd-sticky");
        }
    });

     /*======================================
      Subscibe Toggle
      ========================================*/

      $(".subscribe_btn").on("click", function () {
        $(".subscribtion-modal-area").addClass("modal_open");
    });

    $(".offcanvas-icon").on("click", function () {
        $(".subscribtion-modal-area").removeClass("modal_open");
    });


    /*======================================
      Data Css js
      ========================================*/
    $("[data-background").each(function () {
        $(this).css(
            "background-image",
            "url( " + $(this).attr("data-background") + "  )"
        );
    });

    $("[data-width]").each(function () {
        $(this).css("width", $(this).attr("data-width"));
    });

    $("[data-bg-color]").each(function () {
        $(this).css("background-color", $(this).attr("data-bg-color"));
    });

    /*======================================
      MagnificPopup image view
      ========================================*/
    $(".popup-image").magnificPopup({
        type: "image",
        gallery: {
            enabled: true,
        },
    });

    /*======================================
      MagnificPopup video view
      ========================================*/
    $(".popup-video").magnificPopup({
        type: "iframe",
    });


    /*======================================
      Wow Js
      ========================================*/
    if ($('.wow').length) {
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true // act on asynchronously loaded content (default is true)
        });
        wow.init();
    }


    /*======================================
      Button scroll up js
      ========================================*/

    !function (s) { "use strict"; s(".switch").on("click", function () { s("body").hasClass("light") ? (s("body").removeClass("light"), s(".switch").removeClass("switched")) : (s("body").addClass("light"), s(".switch").addClass("switched")) }), s(document).ready(function () { var e = document.querySelector(".progress-wrap path"), t = e.getTotalLength(); e.style.transition = e.style.WebkitTransition = "none", e.style.strokeDasharray = t + " " + t, e.style.strokeDashoffset = t, e.getBoundingClientRect(), e.style.transition = e.style.WebkitTransition = "stroke-dashoffset 10ms linear"; var o = function () { var o = s(window).scrollTop(), r = s(document).height() - s(window).height(), i = t - o * t / r; e.style.strokeDashoffset = i }; o(), s(window).scroll(o); jQuery(window).on("scroll", function () { jQuery(this).scrollTop() > 50 ? jQuery(".progress-wrap").addClass("active-progress") : jQuery(".progress-wrap").removeClass("active-progress") }), jQuery(".progress-wrap").on("click", function (s) { return s.preventDefault(), jQuery("html, body").animate({ scrollTop: 0 }, 550), !1 }) }) }(jQuery);

    /*======================================
    One Page Scroll Js
    ========================================*/
    function scrollNav() {
        $(".onepage-menu li a").click(function () {
            $(".onepage-menu li a.active").removeClass("active");
            $(this).addClass("active");

            $("html, body")
                .stop()
                .animate(
                    {
                        scrollTop: $($(this).attr("href")).offset().top - 96,
                    },
                    300
                );
            return false;
        });
    }
    scrollNav();

    /*======================================
    Smoth animatio Js
    ========================================*/

    $(document).on('click', '.smoth-animation', function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 50
        }, 300);
    });


    /*======================================
    news-slider-active
    ========================================*/
    var text_slide2_active = new Swiper(".news-slide-active", {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 12000,
        loop: true,
        slidesPerView: 3,
        allowTouchMove: false,
        disableOnInteraction: false,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 3,
            },
            1600: {
                slidesPerView: 3,
            },
        },

    });

    /*======================================
    text-slider1
	========================================*/
    var text_slide2_active = new Swiper(".text-slide-active", {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 12000,
        loop: true,
        slidesPerView: 4,
        allowTouchMove: false,
        disableOnInteraction: false,
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            500: {
                slidesPerView: 1,
            },
            600: {
                slidesPerView: 2,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 2,
            },
            1200: {
                slidesPerView: 2,
            },
            1150: {
                slidesPerView: 3,
            },
            1400: {
                slidesPerView: 3.2,
            },
        },

    });

     /*======================================
    text-slider2-active
	========================================*/
    var text_slide2_active = new Swiper(".text-slide-2-active", {
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
        speed: 12000,
        loop: true,
        slidesPerView: 1,
        allowTouchMove: false,
        disableOnInteraction: false,
        breakpoints: {
            450: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 1,
            },
            1200: {
                slidesPerView: 1,
            },
            1400: {
                slidesPerView: 1,
            },
            1600: {
                slidesPerView: 1,
            },
        },

    });

     /*======================================
    recent-update-news-slider
	========================================*/

var productTwo = new Swiper('.update-news-slide-box', {
    slidesPerView: 3,
    spaceBetween: 10,
    loop: true,
    roundLengths: true,
    observer: true,
    observeParents: true,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: ".bd-swiper-dot",
        clickable: true,
    },
    navigation: {
        nextEl: ".discount-slider-button-prev",
        prevEl: ".discount-slider-button-next",
    },
    breakpoints: {
        '1400': {
            slidesPerView: 2,
        },
        '1200': {
            slidesPerView: 2,
        },
        '992': {
            slidesPerView: 2,
        },
        '768': {
            slidesPerView: 2,
        },
        '576': {
            slidesPerView: 1,
        },
        '0': {
            slidesPerView: 1,
        },
    },
});
    /*======================================
    sports-slider-slider
	========================================*/
var productTwo = new Swiper('.sport-slider-active', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: true,
    roundLengths: true,
    observer: true,
    observeParents: true,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: ".bd-swiper-dot",
        clickable: true,
    },
    navigation: {
        nextEl: ".discount-slider-button-prev",
        prevEl: ".discount-slider-button-next",
    },
    breakpoints: {
        '1400': {
            slidesPerView: 4,
        },
        '1200': {
            slidesPerView: 4,
        },
        '992': {
            slidesPerView: 3,
        },
        '768': {
            slidesPerView: 2,
        },
        '576': {
            slidesPerView: 2,
        },
        '0': {
            slidesPerView: 1,
        },
    },
});
    /*======================================
    gallery-post-slider
	========================================*/
var productTwo = new Swiper('.gallery-post-slider-active', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: true,
    roundLengths: true,
    observer: true,
    observeParents: true,
    autoplay: {
        delay: 3000,
    },
    pagination: {
        el: ".bd-swiper-dot",
        clickable: true,
    },
    navigation: {
        nextEl: ".discount-slider-button-prev",
        prevEl: ".discount-slider-button-next",
    },
    breakpoints: {
        '1400': {
            slidesPerView: 4,
        },
        '1200': {
            slidesPerView: 4,
        },
        '992': {
            slidesPerView: 3,
        },
        '768': {
            slidesPerView: 2,
        },
        '576': {
            slidesPerView: 2,
        },
        '0': {
            slidesPerView: 1,
        },
    },
});
  
    /*======================================
    gellary-slider
	========================================*/
    var swiper = new Swiper(".gallery-slide-active", {

        slidesPerView: "auto",
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
        },
        coverflowEffect: {
            slideShadows: true,
        },
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        breakpoints: {
            '1400': {
                slidesPerView: 3,
            },
            '1200': {
                slidesPerView: 3,
            },
            '992': {
                slidesPerView: 3,
            },
            '768': {
                slidesPerView: 2,
            },
            '576': {
                slidesPerView: 2,
            },
            '0': {
                slidesPerView: 1,
            },
        },
    });

    /*======================================
    featured-slide-active
	========================================*/

    var swiper = new Swiper(".featured-slide-active", {
        slidesPerView: 4,
        spaceBetween: 30,
        loop:true,
        navigation: {
            nextEl: ".next",
            prevEl: ".prev",
          },
        autoplay: {
            delay: 3000,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        breakpoints: {
            1400: {
                slidesPerView: 4,
            },
            1200: {
                slidesPerView: 4,
            },
            992: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            },
            576: {
                slidesPerView: 1,
            },
            0: {
                slidesPerView: 1,
            },
        },
      });

})(jQuery);
