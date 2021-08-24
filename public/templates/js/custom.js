(function ($) {
    "use strict";


    jQuery(document).ready(function ($) {

        // review carousel (home 1)
        $('.review-carousel-rtl').owlCarousel({
            items: 1,
            rtl: true,
            loop: true,
            autoplay: true,
            dots: false,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true
        });

        // Home 3 testimonial carousel

        $('.testimonial-carousel-3-rtl').owlCarousel({
            rtl: true,
            items: 2,
            loop: true,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplaySpeed: 1000,
            dots: false,
            nav: false,
            mouseDrag: true,
            smartSpeed: 1000,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                }
            }
        });


        // review carousel (home 2)
        $('.review-carousel-2-rtl').owlCarousel({
            rtl: true,
            loop: true,
            autoplay: true,
            dots: true,
            nav: false,
            mouseDrag: true,
            margin: 30,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
            }
        });

        // Partner carousel
        $('.partner-carousel-rtl').owlCarousel({
            rtl: true,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplaySpeed: 500,
            autoplayHoverPause: true,
            dots: false,
            margin: 30,
            thumbs: false,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                992: {
                    items: 5
                },
            }
        });

        // hero carousel
        $('.hero-carousel-rtl').owlCarousel({
            rtl: true,
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 8000,
            autoplaySpeed: 2000,
            dots: true,
            nav: false,
            mouseDrag: true,
            smartSpeed: 2000,
            animateOut: 'fadeOut'
        });

        // Project details carousel
        $('.project-carousel-rtl').owlCarousel({
            rtl: true,
            loop: true,
            dots: false,
            nav: true,
            navText: ["<i class='fas fa-angle-left'></i>", "<i class='fas fa-angle-right'></i>"],
            autoplay: false,
            items: 1
        });


        // jquery counter initialization
        if ($('.counter-rtl').length > 0) {
            $('.counter-rtl').counterUp({
                delay: 10,
                time: 2000,
                rtl: true
            });
        }


        $('.language').flagStrap({
            buttonSize: "btn-sm",
            buttonType: "btn-lg",
            labelMargin: "5px",
            scrollable: false,
            scrollableHeight: "350px",
            placeholder: {
                value: "",
                text: ""
            }
        });


    });


}(jQuery));
