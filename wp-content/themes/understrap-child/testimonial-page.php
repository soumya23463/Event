<?php

/**
 * Template Name: Testimonial Page
 * Template Post Type: page
 */

// ============================================
// PHP LOGIC - Data Processing
// ============================================

get_header();

// Get all testimonials
$testimonials = get_posts(array(
    'post_type' => 'testimonial',
    'numberposts' => -1,
    'orderby' => 'ID',
    'order' => 'DESC'
));

// Get testimonial page featured image for default
$default_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');

?>

<!-- ============================================ -->
<!-- HTML STRUCTURE - Presentation -->
<!-- ============================================ -->

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
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <?php if ($testimonials): ?>
            <?php foreach ($testimonials as $index => $testimonial):
                    // Get testimonial user image
                    $user_image = get_the_post_thumbnail_url($testimonial->ID, 'thumbnail');
                    if (!$user_image) {
                        $user_image = $default_image;
                    }

                    // Calculate animation delay
                    $delay = ($index % 3) * 0.2;
                ?>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo $delay; ?>s">

                    <!-- User Image -->
                    <div class="testimonial-user-image wow animate__animated animate__zoomIn"
                        data-wow-delay="<?php echo $delay + 1; ?>s">
                        <img src="<?php echo esc_url($user_image); ?>"
                            alt="<?php echo esc_attr($testimonial->post_title); ?>">
                    </div>

                    <!-- Testimonial Content -->
                    <p class="testimonial-content wow animate__animated animate__fadeInLeftBig"
                        data-wow-delay="<?php echo $delay + 0.6; ?>s">
                        "<?php echo wp_trim_words($testimonial->post_content, 30); ?>"
                    </p>

                    <!-- User Name -->
                    <h5 class="testimonial-author wow animate__animated animate__fadeInRightBig"
                        data-wow-delay="<?php echo $delay + 0.7; ?>s">
                        - <?php echo esc_html($testimonial->post_title); ?>
                    </h5>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <p class="lead">No testimonials found.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>