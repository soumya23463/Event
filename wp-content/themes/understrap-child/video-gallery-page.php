<?php

/**
 * Template Name: Video Gallery Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title gsap-fade-scale-animate">Video Gallery</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Watch Our Amazing Events</p>
            </div>
        </div>
    </div>
</section>

<!-- Video Gallery Section -->
<?php
get_template_part('template-parts/section-video-gallery');
?>

<?php get_footer(); ?>