<?php

/**
 * Template Name: Team Page
 * Template Post Type: page
 */

// ============================================
// PHP LOGIC - Data Processing
// ============================================

get_header();

// Get all team members
$team_members = get_posts(array(
    'post_type' => 'team',
    'numberposts' => -1,
    'orderby' => 'ID',
    'order' => 'DESC'
));

// Get team page featured image for default
$default_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
if (!$default_image) {
    $default_image = get_stylesheet_directory_uri() . '/images/default-user.webp';
}

?>

<!-- ============================================ -->
<!-- HTML STRUCTURE - Presentation -->
<!-- ============================================ -->

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
            <?php if ($team_members): ?>
            <?php foreach ($team_members as $index => $member):
                    // Get social links
                    $whatsapp = get_post_meta($member->ID, 'team_whatsapp', true);
                    $facebook = get_post_meta($member->ID, 'team_facebook', true);
                    $instagram = get_post_meta($member->ID, 'team_instagram', true);
                    $twitter = get_post_meta($member->ID, 'team_twitter', true);

                    // Get member image
                    $member_image = get_the_post_thumbnail_url($member->ID, 'medium');
                    if (!$member_image) {
                        $member_image = $default_image;
                    }

                    // Check if has social links
                    $has_social = ($whatsapp || $facebook || $instagram || $twitter);

                    // Calculate animation delay
                    $delay = ($index % 3) * 0.5;
                ?>
            <div class="col-lg-3 col-md-6">
                <div class="team-card wow animate__animated animate__fadeInUp" data-wow-delay="<?php echo $delay; ?>s"">

                    <!-- Team Member Image -->
                    <div class=" team-image wow animate__animated animate__zoomIn"
                    data-wow-delay="<?php echo $delay; ?>s">
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
                    <h4 class="wow animate__animated animate__fadeInLeftBig"
                        data-wow-delay="<?php echo $delay + 0.3; ?>s">
                        <?php echo esc_html(wp_trim_words($member->post_title, 10)); ?>
                    </h4>
                    <?php if ($member->post_content): ?>
                    <p class="team-bio wow animate__animated animate__fadeInRightBig"
                        data-wow-delay="<?php echo $delay + 0.5; ?>s">
                        <?php echo esc_html(wp_trim_words($member->post_content, 20)); ?>
                    </p>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
        <div class="col-12">
            <div class="text-center py-5">
                <p class="lead">No team members found.</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
    </div>
</section>

<?php
$whatsapp_number = get_field('whatsapp_number', get_option('page_on_front'));
if ($whatsapp_number):
?>
<a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20services"
    class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>
<?php endif; ?>

<?php get_footer(); ?>