<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Hero Swiper Slider Section - Krishna Events Style -->
<section id="hero-swiper" class="hero-swiper-section">
    <?php
    // Query for slider posts (Custom Post Type)
    $slider_args = array(
        'post_type'      => 'slider',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'post_status'    => 'publish'
    );

    $slider_query = new WP_Query($slider_args);

    if ($slider_query->have_posts()) :
    ?>
    <div class="next-container-center">
        <div class="swiper" id="heroSwiper">
            <div class="swiper-wrapper">
                <?php
                    $slide_index = 0;
                    while ($slider_query->have_posts()) : $slider_query->the_post();
                        $slide_index++;

                        // Get slider data
                        $slide_title = get_the_title(); // WordPress title
                        $slide_subtitle = get_field('subtitle'); // ACF field only
                        $slide_description = get_the_content(); // WordPress content editor
                        $slide_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); // Featured image



                        $slide_button_text = 'Read More';
                        $slide_button_link = get_permalink(get_page_by_path('about-page'));
                    ?>
                <div class="swiper-slide">
                    <div class="swiper-slide-block">
                        <div class="swiper-slide-block-img wow animate__animated animate__fadeInRight"
                            data-wow-duration="1s">
                            <a href="<?php echo esc_url($slide_button_link); ?>">
                                <img src="<?php echo esc_url($slide_image_url); ?>"
                                    alt="<?php echo esc_attr($slide_title); ?>">
                            </a>
                        </div>
                        <div class="swiper-slide-block-text">
                            <h2 class="next-main-title wow animate__animated animate__fadeInDown" data-wow-delay="0.2s"
                                data-wow-duration="0.8s">
                                <a
                                    href="<?php echo esc_url($slide_button_link); ?>"><?php echo esc_html($slide_title); ?></a>
                            </h2>
                            <h3 class="next-main-subtitle wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"
                                data-wow-duration="0.8s"><?php echo wp_trim_words($slide_subtitle, 5); ?></h3>
                            <?php if ($slide_description) : ?>
                            <p class="next-paragraph wow animate__animated animate__fadeInUp" data-wow-delay="0.6s"
                                data-wow-duration="0.8s"><?php echo wp_trim_words($slide_description, 25); ?></p>
                            <?php endif; ?>
                            <a class="next-link wow animate__animated animate__fadeInLeft" data-wow-delay="0.8s"
                                data-wow-duration="0.8s"
                                href="<?php echo esc_url($slide_button_link); ?>"><?php echo esc_html($slide_button_text); ?></a>
                            <span class="next-number wow animate__animated animate__fadeIn" data-wow-delay="0.3s"
                                data-wow-duration="1s"><?php echo $slide_index; ?></span>
                        </div>
                    </div>
                </div>
                <?php endwhile;
                    wp_reset_postdata(); ?>
            </div>

            <!-- Navigation Buttons -->
            <div class="swiper-button-next"><i class="fa fa-arrow-right"></i></div>
            <div class="swiper-button-prev"><i class="fa fa-arrow-left"></i></div>
        </div>
    </div>
    <?php endif; ?>
</section>

<?php
// Get the homepage ID automatically
$home_id = get_option('page_on_front');

// Fetch ACF fields
$about_title = get_field('about_title', $home_id);
$about_description = get_field('about_description', $home_id);
$about_image = get_field('about_image', $home_id);
$happy_customers = get_field('happy_customers', $home_id);
$events_completed = get_field('events_completed', $home_id);
$team_members = get_field('team_members', $home_id);
$years_experience = get_field('years_experience', $home_id);
$phone = get_field('phone', $home_id);
$phone_number_two = get_field('phone_number_two', $home_id);
$email = get_field('email', $home_id);
$address = get_field('address', $home_id);
$business_hours = get_field('business_hours', $home_id);
$whatsapp_number = get_field('whatsapp_number', $home_id);
?>



<!-- Know About Krishna Events Section -->
<section id="know-about" class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1s">
                    <h2 class="section-title-with-line text-left mb-3 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s"><?php echo $about_title; ?></h2>
                    <p class="section-subtitle-small text-left wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"><?php echo $about_description; ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <?php if ($about_image): ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>"
                        alt="<?php echo esc_attr($about_image['alt']); ?>" class="img-fluid about-image shadow">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<section id="services-overview" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInDown" data-wow-duration="0.8s">Our Services</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Complete Event Management
                Solutions</p>
        </div>
        <div class="row g-4">
            <?php
            $services = get_posts(array('post_type' => 'service', 'numberposts' => -1, 'orderby' => 'ID', 'order' => 'DESC'));

            foreach ($services as $index => $service) :
                $service_icon = 'fa-diamond';
                $delay = $index * 0.1;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="service-list-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    <div class="row g-2">
                        <div class="col-2">
                            <i class="fa <?php echo esc_attr($service_icon); ?> wow animate__animated animate__bounceIn"
                                data-wow-delay="<?php echo $delay + 0.2; ?>s"></i>
                        </div>
                        <div class="col-10">
                            <h5 class="wow animate__animated animate__fadeInUp"
                                data-wow-delay="<?php echo $delay + 0.3; ?>s"><?php echo esc_html($service->post_title); ?>
                            </h5>
                            <?php if ($service->post_content): ?>
                            <p class="service-description wow animate__animated animate__fadeIn"
                                data-wow-delay="<?php echo $delay + 0.4; ?>s">
                                <?php echo wp_trim_words($service->post_content, 15); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- About/Stats Section -->
<section id="stats" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.1s" data-wow-duration="1s">
                    <div class="counter" data-count="500" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $happy_customers; ?></div>
                    <p style="font-size: 1.1rem;">Happy Customers</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.2s" data-wow-duration="1s">
                    <div class="counter" data-count="1000" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $events_completed; ?></div>
                    <p style="font-size: 1.1rem;">Events Completed</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.3s" data-wow-duration="1s">
                    <div class="counter" data-count="50" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $team_members; ?></div>
                    <p style="font-size: 1.1rem;">Team Members</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.4s" data-wow-duration="1s">
                    <div class="counter" data-count="15" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $years_experience; ?></div>
                    <p style="font-size: 1.1rem;">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInDown" data-wow-duration="0.8s">Why Choose Krishna Events?</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">What Makes Us Different</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.1s" data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h4>Personalized Attention</h4>
                    <p>Every event is unique, and we provide customized solutions tailored to your specific needs and
                        preferences.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h4>Pan-India Network</h4>
                    <p>Extensive network of trusted vendors across major cities in India for seamless event execution.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <h4>Creative Excellence</h4>
                    <p>Our creative team brings fresh, innovative ideas to make your event truly one-of-a-kind.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <h4>Cost-Effective</h4>
                    <p>Premium quality services at competitive prices, ensuring maximum value for your investment.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Gallery Section -->
<section id="gallery-grid" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInDown" data-wow-duration="0.8s">Photo Gallery</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Moments We've Captured</p>
        </div>

        <?php
        $gallery_args = array(
            'post_type' => 'gallery',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $gallery_query = new WP_Query($gallery_args);

        if ($gallery_query->have_posts()) :
            $gallery_index = 0;
        ?>

        <div class="gallery-grid">
            <?php while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $delay = 0.1 * $gallery_index;
                    $gallery_index++;
                ?>

            <div class="gallery-item wow animate__animated animate__flipInY" data-wow-delay="<?php echo $delay; ?>s" data-wow-duration="0.8s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="gallery-image">
                    <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&h=400&fit=crop"
                        alt="<?php echo esc_attr(get_the_title()); ?>" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <h4><?php the_title(); ?></h4>
                        <a href="<?php echo esc_url($thumbnail); ?>" class="gallery-zoom" data-fancybox="gallery"
                            data-caption="<?php echo esc_attr(get_the_title()); ?>">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <p class="lead">No gallery items found.</p>
        </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInDown" data-wow-duration="0.8s">What Our Customers Say</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Read testimonials from our happy
                customers</p>
        </div>

        <div class="row g-4">
            <?php
            $testimonials = get_posts(array('post_type' => 'testimonial', 'numberposts' => 3, 'orderby' => 'ID', 'order' => 'DESC'));

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
                <div class="testimonial-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s" data-wow-duration="0.8s">

                    <!-- User Image -->
                    <div class="testimonial-user-image wow animate__animated animate__zoomIn" data-wow-delay="<?php echo $delay + 0.1; ?>s">
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
    </div>
</section>

<!-- Contact Section -->
<section id="contact-section" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line wow animate__animated animate__fadeInDown" data-wow-duration="0.8s">Get In Touch</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Have questions? We'd love to hear
                from you!</p>
        </div>

        <div class="row g-4">
            <!-- Contact Card 1 - Address -->
            <?php if ($address): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.1s" data-wow-duration="0.8s">
                    <div class="contact-card-icon">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h4>Address</h4>
                    <p><?php echo nl2br(esc_html($address)); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 2 - Phone -->
            <?php if ($phone): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.2s" data-wow-duration="0.8s">
                    <div class="contact-card-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h4>Phone</h4>
                    <p><a
                            href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 3 - Email -->
            <?php if ($email): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.3s" data-wow-duration="0.8s">
                    <div class="contact-card-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h4>Email</h4>
                    <p><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 4 - Business Hours -->
            <?php if ($business_hours): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.4s" data-wow-duration="0.8s">
                    <div class="contact-card-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h4>Our Hours</h4>
                    <p><?php echo nl2br(esc_html($business_hours)); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/<?= $whatsapp_number ?>?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20event%20planning%20services"
    class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>

<?php get_footer(); ?>