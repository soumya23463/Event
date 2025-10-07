<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Hero Swiper Slider Section - Krishna Events Style -->
<section id="hero-swiper" class="hero-swiper-section">
    <?php
    // Query for slider posts
    $slider_args = array(
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'category_name'  => 'slider',
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

                        // Get featured image or fallback
                        $slide_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        if (!$slide_image) {
                            $slide_image = 'https://images.unsplash.com/photo-1519741497674-611481863552?w=1920&h=800&fit=crop';
                        }

                        // Get custom fields
                        $slide_subtitle = get_post_meta(get_the_ID(), 'slider_subtitle', true);
                        $slide_button_text = get_post_meta(get_the_ID(), 'slider_button_text', true);
                        $slide_button_link = get_post_meta(get_the_ID(), 'slider_button_link', true);

                        // Fallback values
                        if (empty($slide_subtitle)) $slide_subtitle = 'Wedding & Event Planner';
                        if (empty($slide_button_text)) $slide_button_text = 'Read More';
                        if (empty($slide_button_link)) $slide_button_link = '#contact-section';
                    ?>
                <div class="swiper-slide">
                    <div class="swiper-slide-block">
                        <div class="swiper-slide-block-img">
                            <a href="<?php echo esc_url($slide_button_link); ?>">
                                <img src="<?php echo esc_url($slide_image); ?>"
                                    alt="<?php echo esc_attr(get_the_title()); ?>">
                            </a>
                        </div>
                        <div class="swiper-slide-block-text">
                            <h2 class="next-main-title">
                                <a href="<?php echo esc_url($slide_button_link); ?>"><?php the_title(); ?></a>
                            </h2>
                            <h3 class="next-main-subtitle"><?php echo esc_html($slide_subtitle); ?></h3>
                            <?php if (get_the_content()) : ?>
                            <p class="next-paragraph"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
                            <?php endif; ?>
                            <a class="next-link"
                                href="<?php echo esc_url($slide_button_link); ?>"><?php echo esc_html($slide_button_text); ?></a>
                            <span class="next-number"><?php echo $slide_index; ?></span>
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
    <?php else : ?>
    <!-- Fallback Slider -->
    <div class="next-container-center">
        <div class="swiper" id="heroSwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="swiper-slide-block">
                        <div class="swiper-slide-block-img">
                            <img src="https://images.unsplash.com/photo-1519741497674-611481863552?w=1920&h=800&fit=crop"
                                alt="Krishna Events">
                        </div>
                        <div class="swiper-slide-block-text">
                            <h2 class="next-main-title"><a href="#contact-section">Krishna Events</a></h2>
                            <h3 class="next-main-subtitle">Wedding & Event Planner</h3>
                            <p class="next-paragraph">We would love to meet up and chat about how we can make YOUR DREAM
                                wedding happen!</p>
                            <a class="next-link" href="#contact-section">Read More</a>
                            <span class="next-number">1</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

<!-- Know About Krishna Events Section -->
<section id="know-about" class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="scroll-animate">
                    <h2 class="section-title-simple mb-4">Know About Krishna Events</h2>
                    <p class="know-about-text">Krishna Events is an Event Management Company, Destination wedding
                        planner located in Jaipur, Rajasthan. We are managing Destination Weddings, events and shows
                        across India in major cities like Jaipur, Udaipur, Jodhpur, Pushkar, Goa, Kerala, Mumbai, Delhi,
                        Agra, Manali, Shimla and many more.</p>
                    <p class="know-about-text">We provide complete event management solutions including venue selection,
                        decoration, catering, entertainment, photography & videography for your special occasions.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="scroll-animate delay-2">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/about-krishna.jpg"
                        alt="About Krishna Events" class="img-fluid about-image"
                        onerror="this.src='https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=600&h=400&fit=crop'">
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Services Section -->
<section id="services" class="py-5 services-section">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-simple scroll-animate">Our Services</h2>
        </div>

        <div class="row g-4">
            <!-- Service 1: Wedding & Event Planner -->
            <div class="col-md-6">
                <div class="service-card-image scroll-animate">
                    <div class="service-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&h=400&fit=crop"
                            alt="Wedding & Event Planner" class="img-fluid">
                    </div>
                    <div class="service-content">
                        <h3>Wedding & Event Planner</h3>
                        <p>We specialize in planning and executing memorable weddings and events. From intimate
                            ceremonies to grand celebrations, our expert team ensures every detail is perfect.</p>
                        <a href="#contact-section" class="btn-read-more">Read More</a>
                    </div>
                </div>
            </div>

            <!-- Service 2: Destination Wedding Planner -->
            <div class="col-md-6">
                <div class="service-card-image scroll-animate delay-2">
                    <div class="service-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1519167758481-83f29da8fd74?w=600&h=400&fit=crop"
                            alt="Destination Wedding Planner" class="img-fluid">
                    </div>
                    <div class="service-content">
                        <h3>Destination Wedding Planner</h3>
                        <p>Create your dream destination wedding in exotic locations across India including Goa,
                            Udaipur, Jaipur, Kerala and more. We handle all logistics for a seamless experience.</p>
                        <a href="#contact-section" class="btn-read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About/Stats Section -->
<section id="stats" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="scroll-animate">
                    <div class="counter" data-count="500" style="font-size: 3rem; font-weight: 700;">0</div>
                    <p style="font-size: 1.1rem;">Happy Clients</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="scroll-animate delay-1">
                    <div class="counter" data-count="1000" style="font-size: 3rem; font-weight: 700;">0</div>
                    <p style="font-size: 1.1rem;">Events Completed</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="scroll-animate delay-2">
                    <div class="counter" data-count="50" style="font-size: 3rem; font-weight: 700;">0</div>
                    <p style="font-size: 1.1rem;">Team Members</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="scroll-animate delay-3">
                    <div class="counter" data-count="15" style="font-size: 3rem; font-weight: 700;">0</div>
                    <p style="font-size: 1.1rem;">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-simple scroll-animate">Photo Gallery</h2>
        </div>

        <div class="row g-3">
            <?php
            // Gallery Query - Get posts from 'gallery' category or recent posts
            $gallery_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 6,
                'category_name'  => 'gallery', // Create 'gallery' category for gallery posts
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $gallery_query = new WP_Query($gallery_args);

            if ($gallery_query->have_posts()) :
                $delay_index = 0;
                while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    $delay_index++;
                    $gallery_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if ($gallery_image) :
            ?>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item scroll-animate">
                    <img src="<?php echo esc_url($gallery_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="img-fluid">
                </div>
            </div>
            <?php
                    endif;
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback - Show placeholder images
                $gallery_images = array(
                    'https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1511285560929-80b456fea0bc?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1519741497674-611481863552?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1519167758481-83f29da8fd74?w=400&h=400&fit=crop'
                );
                foreach ($gallery_images as $index => $img) :
                    ?>
            <div class="col-md-4 col-sm-6">
                <div class="gallery-item scroll-animate">
                    <img src="<?php echo $img; ?>" alt="Gallery <?php echo ($index + 1); ?>" class="img-fluid">
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section id="testimonials" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title underline scroll-animate">What Our Clients Say</h2>
            <p class="lead scroll-animate delay-1">Read testimonials from our happy clients</p>
        </div>

        <div class="row g-4">
            <?php
            // Testimonials Query - Get posts from 'testimonials' category
            $testimonial_args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'category_name'  => 'testimonials', // Create 'testimonials' category
                'orderby'        => 'date',
                'order'          => 'DESC'
            );
            $testimonial_query = new WP_Query($testimonial_args);

            if ($testimonial_query->have_posts()) :
                $delay_index = 0;
                while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
                    $delay_index++;
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card scroll-animate delay-<?php echo $delay_index; ?>">
                    <p style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        "<?php echo wp_trim_words(get_the_content(), 30); ?>"
                    </p>
                    <h5 style="color: #667eea; font-weight: 600;">- <?php the_title(); ?></h5>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Fallback testimonials
                $default_testimonials = array(
                    array('name' => 'Rajesh & Priya', 'text' => 'Krishna Events made our wedding absolutely perfect! Their attention to detail and professionalism was outstanding. Highly recommend their services.'),
                    array('name' => 'Amit Kumar', 'text' => 'Excellent event management service. They handled everything from decoration to catering with great care. Our corporate event was a huge success!'),
                    array('name' => 'Neha Sharma', 'text' => 'Amazing team! They understood our vision and brought it to life beautifully. Our anniversary celebration was memorable because of them.')
                );
                foreach ($default_testimonials as $index => $testimonial) :
                ?>
            <div class="col-md-6 col-lg-4">
                <div class="testimonial-card scroll-animate delay-<?php echo ($index + 1); ?>">
                    <p style="font-size: 1.05rem; line-height: 1.7; margin-bottom: 1.5rem;">
                        "<?php echo esc_html($testimonial['text']); ?>"
                    </p>
                    <h5 style="color: #667eea; font-weight: 600;">- <?php echo esc_html($testimonial['name']); ?></h5>
                </div>
            </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact-section" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title underline scroll-animate">Get In Touch</h2>
            <p class="lead scroll-animate delay-1">Have questions? We'd love to hear from you!</p>
        </div>

        <div class="row g-5">
            <!-- Contact Information -->
            <div class="col-lg-5">
                <div class="scroll-animate">
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box"
                                style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div>
                                <h5 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.2rem;">Phone</h5>
                                <p style="color: #666; margin: 0;"><a href="tel:+919876543210"
                                        style="color: #666; text-decoration: none;">+91 98765 43210</a></p>
                                <p style="color: #666; margin: 0;"><a href="tel:+919876543211"
                                        style="color: #666; text-decoration: none;">+91 98765 43211</a></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box"
                                style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div>
                                <h5 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.2rem;">Email</h5>
                                <p style="color: #666; margin: 0;"><a href="mailto:info@krishnaeventss.com"
                                        style="color: #666; text-decoration: none;">info@krishnaeventss.com</a></p>
                                <p style="color: #666; margin: 0;"><a href="mailto:contact@krishnaeventss.com"
                                        style="color: #666; text-decoration: none;">contact@krishnaeventss.com</a></p>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box"
                                style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
                                <i class="fa fa-map-marker"></i>
                            </div>
                            <div>
                                <h5 style="font-weight: 600; margin-bottom: 0.5rem; font-size: 1.2rem;">Address</h5>
                                <p style="color: #666; margin: 0;">123 Event Street, City Name,<br>State - 123456, India
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="scroll-animate delay-2">
                    <form id="contact-form" class="p-4" style="background: #f8f9fa; border-radius: 15px;">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="name" class="form-label" style="font-weight: 600;">Your Name *</label>
                                <input type="text" class="form-control-custom" id="name" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label" style="font-weight: 600;">Phone Number *</label>
                                <input type="tel" class="form-control-custom" id="phone" name="phone" required>
                            </div>
                            <div class="col-md-6">
                                <label for="event-type" class="form-label" style="font-weight: 600;">Event Type</label>
                                <select class="form-control-custom" id="event-type" name="event_type">
                                    <option value="">Select Event Type</option>
                                    <option value="wedding">Wedding</option>
                                    <option value="birthday">Birthday Party</option>
                                    <option value="corporate">Corporate Event</option>
                                    <option value="anniversary">Anniversary</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label" style="font-weight: 600;">Your Message *</label>
                                <textarea class="form-control-custom" id="message" name="message" rows="5"
                                    required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-primary-custom btn-shine">
                                    Send Message <i class="fa fa-paper-plane ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/919876543210?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20event%20planning%20services"
    class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>

<?php get_footer(); ?>