/**
 * Common GSAP Animations for All Pages
 * Krishna Events Theme
 */

document.addEventListener("DOMContentLoaded", () => {
    // Check if GSAP is loaded
    if (typeof gsap === "undefined") {
        console.warn("GSAP not loaded");
        return;
    }

    // Check if ScrollTrigger is loaded
    if (typeof ScrollTrigger === "undefined") {
        console.warn("ScrollTrigger not loaded");
        return;
    }

    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // ============================================
    // ANIMATIONS - Add classes manually in HTML/PHP files
    // ============================================

    // ============================================
    // SECTION TITLE ANIMATIONS (Optional - for gsap-text-animate class)
    // ============================================
    const textAnimateElements = document.querySelectorAll(".gsap-text-animate");

    textAnimateElements.forEach(el => {
        // Wrap each character in a span
        el.innerHTML = el.textContent
            .split("")
            .map(ch => `<span style="display:inline-block;">${ch === " " ? "&nbsp;" : ch}</span>`)
            .join("");

        const chars = el.querySelectorAll("span");

        // 3D Rotate animation with ScrollTrigger
        gsap.fromTo(
            chars,
            {
                opacity: 0,
                y: 50,
                rotationX: -90
            },
            {
                opacity: 1,
                y: 0,
                rotationX: 0,
                duration: 0.6,
                ease: "back.out(1.7)",
                stagger: 0.05,
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            }
        );
    });

    // ============================================
    // FADE & SCALE ANIMATION (for specific elements)
    // ============================================
    const fadeScaleElements = document.querySelectorAll(".gsap-fade-scale-animate");

    fadeScaleElements.forEach(el => {
        el.innerHTML = el.textContent
            .split("")
            .map(ch => `<span style="display:inline-block;">${ch === " " ? "&nbsp;" : ch}</span>`)
            .join("");

        const chars = el.querySelectorAll("span");

        gsap.fromTo(
            chars,
            {
                opacity: 0,
                scale: 0
            },
            {
                opacity: 1,
                scale: 1,
                duration: 0.8,
                ease: "elastic.out(1, 0.5)",
                stagger: 0.05,
                scrollTrigger: {
                    trigger: el,
                    start: "top 80%",
                    toggleActions: "play none none none"
                }
            }
        );
    });
});
