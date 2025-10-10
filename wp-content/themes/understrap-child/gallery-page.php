<?php

/**
 * Template Name: Gallery Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title gsap-fade-scale-animate">Photo Gallery</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Moments We've Captured</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<?php
get_template_part('template-parts/section-gallery');
?>




<?php get_footer(); ?>