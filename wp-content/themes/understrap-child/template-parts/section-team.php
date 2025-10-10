<!-- Team Section -->
<section id="team-section" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Our Team</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Meet Our
                Expert Event Planners</p>
        </div>
        <div class="row g-4">
            <?php
            // Check if we're on the front page or team page
            $is_front_page = is_front_page();
            $number_of_posts = $is_front_page ? 3 : -1; // 3 for front page, all for team page

            $team_members = get_posts(array(
                'post_type' => 'team',
                'numberposts' => $number_of_posts,
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
                    <div class="team-image wow animate__animated animate__zoomIn"
                        data-wow-delay="<?php echo $delay; ?>s">
                        <img src="<?php echo esc_url($member_image); ?>"
                            alt="<?php echo esc_attr($member->post_title); ?>">

                        <!-- Social Icons -->
                        <?php if ($has_social): ?>
                        <div class="team-social">
                            <?php if ($whatsapp): ?>
                            <a href="<?php echo esc_url($whatsapp); ?>" class="social-icon" target="_blank"
                                rel="noopener">
                                <i class="fa fa-whatsapp"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($facebook): ?>
                            <a href="<?php echo esc_url($facebook); ?>" class="social-icon" target="_blank"
                                rel="noopener">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($instagram): ?>
                            <a href="<?php echo esc_url($instagram); ?>" class="social-icon" target="_blank"
                                rel="noopener">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <?php endif; ?>

                            <?php if ($twitter): ?>
                            <a href="<?php echo esc_url($twitter); ?>" class="social-icon" target="_blank"
                                rel="noopener">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- Team Member Info -->
                    <div class="team-info">
                        <h4 class="wow animate__animated animate__fadeInLeftBig"
                            data-wow-delay="<?php echo $delay + 0.2; ?>s">
                            <?php echo esc_html(wp_trim_words($member->post_title, 10)); ?>
                        </h4>
                        <?php if ($member->post_content): ?>
                        <p class="team-bio wow animate__animated animate__fadeInRightBig"
                            data-wow-delay="<?php echo $delay + 0.3; ?>s">
                            <?php echo esc_html(wp_trim_words($member->post_content, 20)); ?>
                        </p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php if ($is_front_page) : ?>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('team'))); ?>"
                class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                View More
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
