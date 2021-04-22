/*-------------------------------------------------------------------*/
/* Project: Blood Donation - Activism & Campaign HTML5 Template */
/* Ver: 1.0.1*/
/* Date: 21-11-2017*/
/* Author: xenioushk*/
/*-------------------------------------------------------------------*/

jQuery(function ($) {

    "use strict";

    // DETECT TOUCH DEVICE
    
    function is_touch_device() {
        return !!('ontouchstart' in window) || (!!('onmsgesturechange' in window) && !!window.navigator.maxTouchPoints);
    }

    // ANIMATIONS //
    function animations() {

        animations = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 120,
            mobile: false,
            live: true
        });

        animations.init();

    }

    // ONE PAGE SMOOTH SCROLLING 

    function smooth_scrolling() {

        $(".nav_menu").on("click", function () {

            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                var offset = $('.header-wrapper').outerHeight();

                if ($('.stuck').length === 1) {
                    offset = $('.stuck').outerHeight();
                } else {
                    offset = parseInt(offset, 0) + 24;
                }

                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top - parseInt(offset, 0)
                    }, 1300);

                    return false;

                }

            }

        });

    }

    // PARALLAX

    if (typeof $.fn.stellar !== 'undefined') {

        if (!is_touch_device()) {

            $(window).stellar({
                horizontalScrolling: false,
                verticalScrolling: true,
                responsive: true,
                verticalOffset: 50
            });

        }

    }
    
    // SLIDER 1

    if ($("#slider_1").length ) {

        $("#slider_1").owlCarousel({
             items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    loop: true
                },
                600: {
                    items: 1,
                    nav: false,
                    loop: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            },
            nav: false,
            navText: ["<i class='fa fa-long-arrow-left'></i>", "<i class='fa fa-long-arrow-right'></i>"]
        });
        
    }
    
    // STICKY HEADER & MENU

   if ( $(".main-header").attr('data-sticky_header')) {
    
        $('.main-header .header-wrapper').waypoint('sticky', {
            wrapper: '<div class="sticky-wrapper" />',
            stuckClass: 'stuck'
        });
    
    }
    
    // GALLERY.
    
    if ( $('.gallery-light-box').length ) {
            
        $('.gallery-light-box').venobox();
        
    }
    
     // GALLERY CAROUSEL

    if ($(".gallery-carousel").length ) {

        $(".gallery-carousel").owlCarousel({
            items: 6,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: true
                },
                1000: {
                    items: 4,
                    nav: true,
                    loop: true
                }
            },
            nav: true,
            navText: ['<i class="fa fa-long-arrow-left"></i>', '<i class="fa fa-long-arrow-right"></i>']
        });
    }

    // COUNTER

    if ($(".counter").length ) {
        $('.counter').counterUp({
            delay: 10,
            time: 2000
        });
    }
    
    //DONORS/CLIENTS LOGOS 

    if ($(".logo-items").length ) {

        $(".logo-items").owlCarousel({
            items: 6,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 6,
                    nav: true,
                    loop: true
                }
            },
            nav: true,
            navText: ["<i class='logo-nav-icon'></i>", "<i class='logo-nav-icon'></i>"]
        });
    }
	
	
	
    //Our Services 

    if ($(".our-services").length ) {

        $(".our-services").owlCarousel({
            items: 6,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            },
            nav: true,
            navText: ["<i class='logo-nav-icon'></i>", "<i class='logo-nav-icon'></i>"]
        });
    }    
    
    
    

    // TESTIMONIAL CAROUSEL.

    if ($(".testimonial-container ").length ) {

        $(".testimonial-container").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false,
                    loop: true,
                    pagination : true,
                    paginationNumbers: false
                }
            },
            nav: false,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
        });
    }

    // GOOGLE MAP FOR CONTACT & EVENT PAGE.

    if ($('#map_canvas').length) {

        var map;

        $('#map_canvas').css({
            'height': '400px'
        });

        map = new GMaps({
            div: '#map_canvas',
            lat: -12.043333,
            lng: -77.028333
        });

    }
    


    //WoW Animation.
    animations();

    //One Page Scrolling.
    smooth_scrolling();


    // BACK TO TOP BUTTON.

    if ($('#backTop').length === 1) {

        $('#backTop').backTop({
            'theme': 'custom'
        });
        
    }

    // PRELOADER

    $(window).on("load", function () {

        $("#preloader").fadeOut(500);

    });

});