<?php

/**
 * Template Name: Testimonials Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title gsap-fade-scale-animate">Testimonials</h1>
                <p class="page-subtitle gsap-fade-scale-animate">What Our Customers Say</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<?php
get_template_part('template-parts/section-testimonials');
?>

<?php get_footer(); ?>