<?php

/**
 * Template Name: About Page
 * Template Post Type: page
 */

get_header(); ?>


<?php
// Get the current page ID
$page_id = get_the_ID();

// Fetch ACF fields from current page
$about_title = get_field('about_title', $page_id);
$about_description = get_field('about_description', $page_id);
$about_image = get_field('about_image', $page_id);
?>
<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title gsap-fade-scale-animate">About Us</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Creating Unforgettable Moments</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<?php
get_template_part('template-parts/section-about');
?>

<!-- Mission & Vision Section -->
<!-- <section id="mission-vision" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-simple scroll-animate">Our Mission & Vision</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card scroll-animate">
                    <div class="info-card-icon">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To offer a service that sets new trends in the wedding and event management industry. We strive
                        to create personalized, memorable experiences that exceed our clients' expectations through
                        innovation, creativity, and exceptional service.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card scroll-animate delay-2">
                    <div class="info-card-icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To become India's most trusted and sought-after event management company, known for our
                        commitment to quality, creativity, and customer satisfaction. We aim to transform every event
                        into a beautiful memory that lasts a lifetime.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Call to Action Section -->
<?php
get_template_part('template-parts/section-cta');
?>


<!-- Quality Policy Section -->
<!-- <section id="quality-policy" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="wow animate__animated animate__fadeInLeft">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality-policy.jpg"
                        alt="Quality Policy" class="img-fluid about-image"
                        onerror="this.src='https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=800&h=600&fit=crop'">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="wow animate__animated animate__fadeInRight">
                    <h2 class="section-title-with-line text-left mb-3">Our Quality Policy</h2>
                    <p class="section-subtitle-small text-left">Excellence in Every Detail</p>
                    <p class="about-text">At Krishna Events, quality is not just a promise – it's our foundation. We are
                        committed to:</p>
                    <ul class="quality-list">
                        <li><i class="fa fa-star"></i> Delivering exceptional service that exceeds client expectations
                        </li>
                        <li><i class="fa fa-star"></i> Maintaining the highest standards in every aspect of event
                            management</li>
                        <li><i class="fa fa-star"></i> Continuous improvement through client feedback and industry best
                            practices</li>
                        <li><i class="fa fa-star"></i> Building long-term relationships based on trust and reliability
                        </li>
                        <li><i class="fa fa-star"></i> Ensuring complete client satisfaction from planning to execution
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->







<?php get_footer(); ?>