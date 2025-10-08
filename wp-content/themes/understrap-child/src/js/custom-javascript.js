// Add your custom JS here.

// Counter Animation for Stats Section
(function() {
    let hasAnimated = false;

    function animateCounters() {
        const counters = document.querySelectorAll('#stats .counter');

        counters.forEach(counter => {
            const target = parseInt(counter.textContent);
            const duration = 2000; // 2 seconds
            const frameDuration = 1000 / 60; // 60fps
            const totalFrames = Math.round(duration / frameDuration);
            let frame = 0;

            const easeOutQuad = t => t * (2 - t);

            const updateCounter = () => {
                frame++;
                const progress = easeOutQuad(frame / totalFrames);
                const current = Math.floor(progress * target);

                counter.textContent = current;

                if (frame < totalFrames) {
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };

            counter.textContent = '0';
            updateCounter();
        });
    }

    // Check if element is in viewport with better detection
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.75 &&
            rect.bottom >= 0
        );
    }

    // Trigger animation when stats section comes into view
    function checkScroll() {
        const statsSection = document.getElementById('stats');
        if (statsSection && !hasAnimated && isInViewport(statsSection)) {
            hasAnimated = true;
            animateCounters();
        }
    }

    // Initialize on page load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            window.addEventListener('scroll', checkScroll);
            checkScroll();
        });
    } else {
        window.addEventListener('scroll', checkScroll);
        checkScroll();
    }
})();