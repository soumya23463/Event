<?php

/**
 * Template Name: Contact Page
 * Template Post Type: page
 */

get_header(); ?>

<?php
// Get the current page ID
$page_id = get_the_ID();
?>

<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title">Contact Us</h1>
                <p class="page-subtitle">Get In Touch With Us</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact-section" class="py-5">
    <div class="container">
        <?php
        // Get the homepage ID
        $home_id = get_option('page_on_front');

        // Get contact info from homepage custom fields
        $phone = get_field('phone', $home_id);
        $email = get_field('email', $home_id);
        $address = get_field('address', $home_id);
        $business_hours = get_field('business_hours', $home_id);
        $facebook_url = get_field('facebook', $home_id);
        $instagram_url = get_field('instagram', $home_id);
        $twitter_url = get_field('twitter', $home_id);
        $youtube_url = get_field('youtube', $home_id);
        ?>

        <div class="row g-4">
            <!-- Contact Card 1 - Address -->
            <?php if ($address): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
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
                <div class="contact-card">
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
                <div class="contact-card">
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
                <div class="contact-card">
                    <div class="contact-card-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h4>Our Hours</h4>
                    <p><?php echo nl2br(esc_html($business_hours)); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Social Links Section -->
        <?php if ($facebook_url || $instagram_url || $twitter_url || $youtube_url): ?>
        <div class="row mt-5">
            <div class="col-12">
                <div class="social-section text-center">
                    <h3 class="mb-4">Connect With Us</h3>
                    <div class="social-links-wrapper">
                        <?php if ($facebook_url): ?>
                        <a href="<?php echo esc_url($facebook_url); ?>" target="_blank"
                            class="social-link-large facebook">
                            <i class="fa fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <?php endif; ?>

                        <?php if ($instagram_url): ?>
                        <a href="<?php echo esc_url($instagram_url); ?>" target="_blank"
                            class="social-link-large instagram">
                            <i class="fa fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <?php endif; ?>

                        <?php if ($twitter_url): ?>
                        <a href="<?php echo esc_url($twitter_url); ?>" target="_blank"
                            class="social-link-large twitter">
                            <i class="fa fa-twitter"></i>
                            <span>Twitter</span>
                        </a>
                        <?php endif; ?>

                        <?php if ($youtube_url): ?>
                        <a href="<?php echo esc_url($youtube_url); ?>" target="_blank"
                            class="social-link-large youtube">
                            <i class="fa fa-youtube"></i>
                            <span>YouTube</span>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Map Section -->
<?php
$map_embed_url = get_field('map_embed_url', $home_id);
if ($map_embed_url):
?>
<section id="map-section" class="py-0">
    <div class="map-container">
        <iframe
            src="<?php echo esc_url($map_embed_url); ?>"
            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<?php endif; ?>




<?php get_footer(); ?>