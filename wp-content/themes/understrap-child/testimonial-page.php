<?php

/**
 * Template Name: Testimonial Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title wow animate__animated animate__fadeInDown">Testimonials</h1>
                <p class="page-subtitle wow animate__animated animate__fadeInUp">What Our Customers Say</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInUp">Customer Reviews</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp">Read testimonials from our happy customers</p>
        </div>

        <div class="row g-4">
            <?php
            $testimonials = get_posts(array('post_type' => 'testimonial', 'numberposts' => -1));

            foreach ($testimonials as $index => $testimonial) :
                $delay = ($index % 3) * 0.1;
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    <p style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        "<?php echo wp_trim_words($testimonial->post_content, 30); ?>"
                    </p>
                    <h5 style="color: #667eea; font-weight: 600;">- <?php echo $testimonial->post_title; ?></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if (empty($testimonials)): ?>
        <div class="text-center py-5">
            <p class="lead">No testimonials found.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
