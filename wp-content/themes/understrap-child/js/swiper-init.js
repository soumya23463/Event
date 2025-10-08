/**
 * Swiper Slider Initialization - Krishna Events
 */

(function() {
    'use strict';

    // Function to animate slide elements
    function animateSlide(slide) {
        if (!slide) return;

        var wowElements = slide.querySelectorAll('.wow');

        wowElements.forEach(function(el) {
            // Get stored animation classes
            var storedClasses = el.getAttribute('data-animation-classes');
            var delay = el.getAttribute('data-wow-delay') || '0s';
            var delayMs = parseFloat(delay) * 1000;

            if (storedClasses) {
                var animateClasses = storedClasses.split(' ');

                // Reset element - remove all animation classes
                el.style.visibility = 'hidden';
                animateClasses.forEach(function(cls) {
                    if (cls && cls !== 'animate__animated') {
                        el.classList.remove(cls);
                    }
                });

                // Trigger animation after delay
                setTimeout(function() {
                    el.style.visibility = 'visible';
                    animateClasses.forEach(function(cls) {
                        if (cls && cls !== 'animate__animated') {
                            el.classList.add(cls);
                        }
                    });
                }, delayMs);
            }
        });
    }

    // Function to reset slide animations
    function resetSlideAnimation(slide) {
        if (!slide) return;
        var wowElements = slide.querySelectorAll('.wow');
        wowElements.forEach(function(el) {
            var storedClasses = el.getAttribute('data-animation-classes');
            if (storedClasses) {
                var animateClasses = storedClasses.split(' ');
                animateClasses.forEach(function(cls) {
                    if (cls && cls !== 'animate__animated') {
                        el.classList.remove(cls);
                    }
                });
            }
            el.style.visibility = 'hidden';
        });
    }

    // Wait for DOM to be ready
    document.addEventListener('DOMContentLoaded', function() {

        // Store original animation classes before WOW.js removes them
        var sliderWowElements = document.querySelectorAll('.swiper-slide .wow');
        sliderWowElements.forEach(function(el) {
            var animateClasses = el.className.match(/animate__\w+/g);
            if (animateClasses) {
                // Store all animation classes in data attribute
                el.setAttribute('data-animation-classes', animateClasses.join(' '));
            }
        });

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
                    var self = this;
                    // Wait a bit then animate first slide
                    setTimeout(function() {
                        animateSlide(self.slides[self.activeIndex]);
                    }, 100);
                },
                slideChange: function() {
                    var self = this;
                    // Reset all slides
                    var allSlides = this.slides;
                    allSlides.forEach(function(slide) {
                        resetSlideAnimation(slide);
                    });
                    // Animate current slide after a small delay
                    setTimeout(function() {
                        animateSlide(self.slides[self.activeIndex]);
                    }, 50);
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
