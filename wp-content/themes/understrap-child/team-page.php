<?php

/**
 * Template Name: Team Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title wow animate__animated animate__fadeInDown">Our Team</h1>
                <p class="page-subtitle wow animate__animated animate__fadeInUp">Meet Our Expert Event Planners</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section id="team-section" class="py-5">
    <div class="container">


        <div class="row g-4">
            <?php
            $team_members = get_posts(array(
                'post_type' => 'team',
                'numberposts' => -1,
                'orderby' => 'date',
                'order' => 'ASC'
            ));

            if ($team_members) :
                foreach ($team_members as $index => $member) :
                    setup_postdata($member);

                    // Get team member meta data
                    $position = get_post_meta($member->ID, 'team_position', true);
                    $phone = get_post_meta($member->ID, 'team_phone', true);
                    $email = get_post_meta($member->ID, 'team_email', true);
                    $facebook = get_post_meta($member->ID, 'team_facebook', true);
                    $instagram = get_post_meta($member->ID, 'team_instagram', true);
                    $twitter = get_post_meta($member->ID, 'team_twitter', true);

                    // Get featured image
                    $member_image = get_the_post_thumbnail_url($member->ID, 'medium');
                    if (!$member_image) {
                        $member_image = 'https://via.placeholder.com/400x400?text=Team+Member';
                    }

                    $delay = ($index % 3) * 0.1;
            ?>
            <div class="col-lg-3 col-md-6">
                <div class="team-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s">
                    <div class="team-image">
                        <img src="<?php echo esc_url($member_image); ?>"
                            alt="<?php echo esc_attr($member->post_title); ?>">
                    </div>
                    <div class="team-info">
                        <h4><?php echo esc_html($member->post_title); ?></h4>
                        <?php if ($position): ?>
                        <p class="team-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>

                        <?php if ($member->post_content): ?>
                        <p class="team-bio"><?php echo wp_trim_words($member->post_content, 20); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endforeach;
                wp_reset_postdata();
            else:
                ?>
            <div class="col-12">
                <div class="text-center py-5">
                    <p class="lead">No team members found.</p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>