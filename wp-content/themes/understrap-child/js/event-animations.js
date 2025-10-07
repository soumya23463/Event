/**
 * Event Website - Animation JavaScript
 * Handles scroll animations and interactive effects
 */

(function($) {
    'use strict';

    // Scroll Animation Observer
    function initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    // Optional: Stop observing after animation
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with scroll-animate class
        const animateElements = document.querySelectorAll('.scroll-animate');
        animateElements.forEach(function(element) {
            observer.observe(element);
        });
    }

    // Counter Animation (for numbers)
    function animateCounters() {
        $('.counter').each(function() {
            const $this = $(this);
            const countTo = $this.data('count');

            if (!countTo) return;

            $({ countNum: 0 }).animate(
                { countNum: countTo },
                {
                    duration: 2000,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                }
            );
        });
    }

    // Smooth Scroll for Anchor Links
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') &&
                location.hostname === this.hostname) {

                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');

                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 800);
                    return false;
                }
            }
        });
    }

    // Add animation classes on scroll
    function addAnimationOnScroll() {
        const elements = {
            '.service-card': 'animate-fade-in-up',
            '.feature-card': 'animate-fade-in-up',
            '.testimonial-card': 'animate-fade-in-up',
            '.pricing-card': 'animate-scale-up',
            '.image-card': 'animate-zoom-in'
        };

        Object.keys(elements).forEach(function(selector) {
            $(selector).each(function(index) {
                const $element = $(this);
                $element.addClass('scroll-animate');

                // Add stagger delay
                $element.css('animation-delay', (index * 0.1) + 's');
            });
        });
    }

    // Parallax Effect for Background Images
    function initParallax() {
        $(window).scroll(function() {
            const scrolled = $(window).scrollTop();
            $('.parallax-bg').each(function() {
                const $this = $(this);
                const speed = $this.data('parallax-speed') || 0.5;
                const offset = $this.offset().top;
                const yPos = -(scrolled - offset) * speed;

                $this.css('background-position', 'center ' + yPos + 'px');
            });
        });
    }

    // Navbar Background Change on Scroll
    function navbarScrollEffect() {
        $(window).scroll(function() {
            const scroll = $(window).scrollTop();

            if (scroll >= 100) {
                $('.navbar').addClass('navbar-scrolled');
            } else {
                $('.navbar').removeClass('navbar-scrolled');
            }
        });
    }

    // Image Lazy Load with Fade Effect
    function lazyLoadImages() {
        const images = document.querySelectorAll('img[data-src]');

        const imageObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.add('fade-in');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(function(img) {
            imageObserver.observe(img);
        });
    }

    // Animated Number Counter on Scroll
    function initCountersOnScroll() {
        let hasAnimated = false;

        $(window).scroll(function() {
            if (hasAnimated) return;

            const counterSection = $('.counter-section');
            if (counterSection.length) {
                const sectionTop = counterSection.offset().top;
                const windowBottom = $(window).scrollTop() + $(window).height();

                if (windowBottom > sectionTop) {
                    animateCounters();
                    hasAnimated = true;
                }
            }
        });
    }

    // Typing Effect for Headings
    function initTypingEffect() {
        $('.typing-effect').each(function() {
            const $element = $(this);
            const text = $element.text();
            const speed = $element.data('typing-speed') || 50;

            $element.text('');
            $element.css('display', 'inline-block');

            let i = 0;
            const typeWriter = function() {
                if (i < text.length) {
                    $element.text($element.text() + text.charAt(i));
                    i++;
                    setTimeout(typeWriter, speed);
                }
            };

            typeWriter();
        });
    }

    // Card Flip Effect
    function initCardFlip() {
        $('.flip-card').click(function() {
            $(this).toggleClass('flipped');
        });
    }

    // Gallery Lightbox (if needed)
    function initGalleryLightbox() {
        $('.gallery-item img').click(function() {
            const src = $(this).attr('src');
            const lightbox = `
                <div class="lightbox-overlay">
                    <div class="lightbox-content">
                        <span class="lightbox-close">&times;</span>
                        <img src="${src}" alt="">
                    </div>
                </div>
            `;

            $('body').append(lightbox);
            $('.lightbox-overlay').fadeIn();

            $('.lightbox-close, .lightbox-overlay').click(function() {
                $('.lightbox-overlay').fadeOut(function() {
                    $(this).remove();
                });
            });
        });
    }

    // Scroll to Top Button
    function initScrollToTop() {
        // Create button if it doesn't exist
        if ($('.scroll-to-top').length === 0) {
            $('body').append('<button class="scroll-to-top"><i class="fa fa-arrow-up"></i></button>');
        }

        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('.scroll-to-top').addClass('show');
            } else {
                $('.scroll-to-top').removeClass('show');
            }
        });

        $('.scroll-to-top').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
            return false;
        });
    }

    // Add CSS for Scroll to Top Button
    function addScrollToTopStyles() {
        const styles = `
            <style>
                .scroll-to-top {
                    position: fixed;
                    bottom: 30px;
                    right: 30px;
                    width: 50px;
                    height: 50px;
                    border-radius: 50%;
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: #ffffff;
                    border: none;
                    cursor: pointer;
                    opacity: 0;
                    visibility: hidden;
                    transition: all 0.3s ease;
                    z-index: 9999;
                    box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
                }
                .scroll-to-top.show {
                    opacity: 1;
                    visibility: visible;
                }
                .scroll-to-top:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.6);
                }
                .navbar-scrolled {
                    background-color: rgba(255, 255, 255, 0.98) !important;
                    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
                }
                .lightbox-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.9);
                    z-index: 10000;
                    display: none;
                    align-items: center;
                    justify-content: center;
                }
                .lightbox-content {
                    position: relative;
                    max-width: 90%;
                    max-height: 90%;
                }
                .lightbox-content img {
                    width: 100%;
                    height: auto;
                    border-radius: 10px;
                }
                .lightbox-close {
                    position: absolute;
                    top: -40px;
                    right: 0;
                    font-size: 40px;
                    color: #ffffff;
                    cursor: pointer;
                }
            </style>
        `;
        $('head').append(styles);
    }

    // Initialize all functions on document ready
    $(document).ready(function() {
        // Add styles
        addScrollToTopStyles();

        // Initialize features
        initScrollAnimations();
        addAnimationOnScroll();
        initSmoothScroll();
        initParallax();
        navbarScrollEffect();
        lazyLoadImages();
        initCountersOnScroll();
        initCardFlip();
        initScrollToTop();

        // Optional features (uncomment if needed)
        // initTypingEffect();
        // initGalleryLightbox();
    });

    // Re-initialize on window load
    $(window).on('load', function() {
        // Ensure all animations are ready
        setTimeout(function() {
            $('.preloader').fadeOut();
        }, 500);
    });

})(jQuery);
