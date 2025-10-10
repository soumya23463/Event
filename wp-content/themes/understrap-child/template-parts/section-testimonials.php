<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">What Our Customers Say</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Read
                testimonials from our happy
                customers</p>
        </div>

        <div class="row g-4">
            <?php
            // Check if we're on the front page or testimonials page
            $is_front_page = is_front_page();
            $number_of_posts = $is_front_page ? 3 : -1; // 3 for front page, all for testimonials page

            $testimonials = get_posts(array('post_type' => 'testimonial', 'numberposts' => $number_of_posts, 'orderby' => 'ID', 'order' => 'DESC'));

            // Get default image
            $default_image = get_the_post_thumbnail_url(get_the_ID(), 'thumbnail');
            if (!$default_image) {
                $default_image = get_stylesheet_directory_uri() . '/images/default-user.webp';
            }

            foreach ($testimonials as $index => $testimonial) :
                // Get testimonial user image
                $user_image = get_the_post_thumbnail_url($testimonial->ID, 'thumbnail');
                if (!$user_image) {
                    $user_image = $default_image;
                }

                $delay = 0.1 * $index;
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo $delay; ?>s" data-wow-duration="0.8s">

                    <!-- User Image -->
                    <div class="testimonial-user-image wow animate__animated animate__zoomIn"
                        data-wow-delay="<?php echo $delay + 0.1; ?>s">
                        <img src="<?php echo esc_url($user_image); ?>"
                            alt="<?php echo esc_attr($testimonial->post_title); ?>">
                    </div>

                    <!-- Testimonial Content -->
                    <p class="testimonial-content">
                        "<?php echo wp_trim_words($testimonial->post_content, 30); ?>"
                    </p>

                    <!-- User Name -->
                    <h5 class="testimonial-author">- <?php echo esc_html($testimonial->post_title); ?></h5>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($is_front_page) : ?>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('testimonials'))); ?>"
                class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                View More
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
