/**
 * Swiper Slider Initialization - Krishna Events
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {

        // Initialize Swiper
        var heroSwiper = new Swiper('#heroSwiper', {
            // Basic settings
            direction: 'horizontal',
            loop: true,
            speed: 1200,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },

            // Effects
            effect: 'slide',

            // Navigation
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // Keyboard control
            keyboard: {
                enabled: true,
            },

            // Touch
            touchRatio: 1,
            grabCursor: true,

            // Responsive breakpoints
            breakpoints: {
                320: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 1,
                }
            },

            // Events
            on: {
                init: function() {
                    console.log('Swiper initialized');
                },
                slideChange: function() {
                    // Optional: Add animations on slide change
                }
            }
        });

        // Optional: Pause autoplay on hover
        var swiperContainer = document.querySelector('#heroSwiper');
        if (swiperContainer && heroSwiper) {
            swiperContainer.addEventListener('mouseenter', function() {
                if (heroSwiper.autoplay) {
                    heroSwiper.autoplay.stop();
                }
            });
            swiperContainer.addEventListener('mouseleave', function() {
                if (heroSwiper.autoplay) {
                    heroSwiper.autoplay.start();
                }
            });
        }
    });

})();
