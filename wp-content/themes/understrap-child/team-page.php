<?php

/**
 * Template Name: Team Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title gsap-fade-scale-animate">Our Team</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Meet Our Expert Event Planners</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<?php
get_template_part('template-parts/section-team');
?>

<?php get_footer(); ?>