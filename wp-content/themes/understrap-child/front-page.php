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
                    <h2 class="section-title-with-line text-left mb-3 gsap-text-animate"><?php echo $about_title; ?></h2>
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
            <h2 class="section-title-with-line gsap-text-animate">Our Services</h2>
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
                    <div class="row g-3">
                        <div class="col-auto">
                            <i class="fa <?php echo esc_attr($service_icon); ?> wow animate__animated animate__bounceIn"
                                data-wow-delay="<?php echo $delay + 0.2; ?>s"></i>
                        </div>
                        <div class="col">
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
            <h2 class="section-title-with-line gsap-text-animate">Why Choose Krishna Events?</h2>
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
            <h2 class="section-title-with-line gsap-text-animate">Photo Gallery</h2>
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

<!-- Video Gallery Section -->
<section id="video-gallery-grid" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Video Gallery</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Watch Our Amazing Events</p>
        </div>

        <?php
        $video_args = array(
            'post_type' => 'video_gallery',
            'posts_per_page' => 6,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $video_query = new WP_Query($video_args);

        if ($video_query->have_posts()) :
            $video_index = 0;
        ?>

        <div class="gallery-grid">
            <?php while ($video_query->have_posts()) : $video_query->the_post();
                    // Use title as YouTube URL
                    $youtube_url = get_the_title();

                    // Extract YouTube video ID from URL
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $youtube_url, $matches);
                    $youtube_id = isset($matches[1]) ? $matches[1] : '';

                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumbnail && $youtube_id) {
                        $thumbnail = 'https://img.youtube.com/vi/' . $youtube_id . '/maxresdefault.jpg';
                    }

                    $delay = 0.1 * $video_index;
                    $video_index++;
                ?>

            <div class="gallery-item wow animate__animated animate__flipInY" data-wow-delay="<?php echo $delay; ?>s" data-wow-duration="0.8s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="Video" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <a href="<?php echo esc_url($youtube_url); ?>" class="gallery-zoom" data-fancybox="video-gallery">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <p class="lead">No videos found.</p>
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
            <h2 class="section-title-with-line gsap-text-animate">What Our Customers Say</h2>
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

<!-- Team Section -->
<section id="team-section" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Our Team</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Meet Our Expert Event Planners</p>
        </div>
        <div class="row g-4">
            <?php
            $team_members = get_posts(array(
                'post_type' => 'team',
                'numberposts' => 4,
                'orderby' => 'ID',
                'order' => 'DESC'
            ));

            $default_team_image = get_stylesheet_directory_uri() . '/images/default-user.webp';

            if ($team_members):
                foreach ($team_members as $index => $member):
                    // Get social links
                    $whatsapp = get_post_meta($member->ID, 'team_whatsapp', true);
                    $facebook = get_post_meta($member->ID, 'team_facebook', true);
                    $instagram = get_post_meta($member->ID, 'team_instagram', true);
                    $twitter = get_post_meta($member->ID, 'team_twitter', true);

                    // Get member image
                    $member_image = get_the_post_thumbnail_url($member->ID, 'medium');
                    if (!$member_image) {
                        $member_image = $default_team_image;
                    }

                    // Check if has social links
                    $has_social = ($whatsapp || $facebook || $instagram || $twitter);

                    // Calculate animation delay
                    $delay = $index * 0.1;
                ?>
            <div class="col-lg-3 col-md-6">
                <div class="team-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    <!-- Team Member Image -->
                    <div class="team-image wow animate__animated animate__zoomIn" data-wow-delay="<?php echo $delay; ?>s">
                        <img src="<?php echo esc_url($member_image); ?>" alt="<?php echo esc_attr($member->post_title); ?>">

                        <!-- Social Icons -->
                        <?php if ($has_social): ?>
                        <div class="team-social">
                            <?php if ($whatsapp): ?>
                            <a href="<?php echo esc_url($whatsapp); ?>" class="social-icon" target="_blank" rel="noopener">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($facebook): ?>
                            <a href="<?php echo esc_url($facebook); ?>" class="social-icon" target="_blank" rel="noopener">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($instagram): ?>
                            <a href="<?php echo esc_url($instagram); ?>" class="social-icon" target="_blank" rel="noopener">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($twitter): ?>
                            <a href="<?php echo esc_url($twitter); ?>" class="social-icon" target="_blank" rel="noopener">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Team Member Info -->
                    <div class="team-info">
                        <h4 class="wow animate__animated animate__fadeInLeftBig" data-wow-delay="<?php echo $delay + 0.2; ?>s">
                            <?php echo esc_html(wp_trim_words($member->post_title, 10)); ?>
                        </h4>
                        <?php if ($member->post_content): ?>
                        <p class="team-bio wow animate__animated animate__fadeInRightBig" data-wow-delay="<?php echo $delay + 0.3; ?>s">
                            <?php echo esc_html(wp_trim_words($member->post_content, 20)); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section id="home-cta" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container text-center">
        <div class="wow animate__animated animate__zoomIn" data-wow-duration="0.8s">
            <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 700;">Ready to Plan Your Dream Event?</h2>
            <p class="lead mb-4" style="font-size: 1.2rem;">Let's create something magical together. Contact us today
                for a free consultation!</p>
            <?php
            $contact_phone = get_field('phone', $home_id);
            $phone_link = $contact_phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $contact_phone) : '#contact-section';
            ?>
            <a href="<?php echo esc_url($phone_link); ?>" class="btn btn-light btn-lg wow animate__animated animate__pulse"
                data-wow-delay="0.3s" data-wow-duration="1s"
                style="padding: 15px 40px; font-weight: 600;">
                <i class="fa fa-phone me-2"></i>Get in Touch
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact-section" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Get In Touch</h2>
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