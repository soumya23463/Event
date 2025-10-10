<!-- Services Section -->
<section id="services-overview" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Our Services</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Complete
                Event Management
                Solutions</p>
        </div>
        <div class="row g-4">
            <?php
            // Check if we're on the front page or services page
            $is_front_page = is_front_page();
            $number_of_posts = $is_front_page ? 4 : -1; // 4 for front page, all for services page

            $services = get_posts(array('post_type' => 'service', 'numberposts' => $number_of_posts, 'orderby' => 'ID', 'order' => 'DESC'));

            foreach ($services as $index => $service) :
                $service_icon = 'fa-diamond';
                $delay = $index * 0.1;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="service-list-card wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo $delay; ?>s">
                    <div class="row g-3">
                        <div class="col-auto">
                            <i class="fa <?php echo esc_attr($service_icon); ?> wow animate__animated animate__bounceIn"
                                data-wow-delay="<?php echo $delay + 0.2; ?>s"></i>
                        </div>
                        <div class="col">
                            <h5 class="wow animate__animated animate__fadeInUp"
                                data-wow-delay="<?php echo $delay + 0.3; ?>s">
                                <?php echo esc_html($service->post_title); ?>
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

        <?php if ($is_front_page) : ?>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>"
                class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                View All Services
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>