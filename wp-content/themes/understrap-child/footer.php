<?php

/**
 * The template for displaying the footer
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>

</div><!-- #content -->

<!-- Footer -->
<footer class="site-footer py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-widget wow animate__animated animate__fadeInUpBig" data-wow-delay="0.1s"
                    data-wow-duration="0.8s">
                    <h4 class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.1s">
                        <?php bloginfo('name'); ?></h4>
                    <p><?php
                        // Get the homepage ID
                        $home_id = get_option('page_on_front');

                        // Get the about description from homepage custom field
                        $about_description = get_field('about_description', $home_id);

                        if ($about_description) {
                            // Show the custom field content (limit to first 500 characters)
                            $about_text = wp_strip_all_tags($about_description);
                            if (strlen($about_text) > 500) {
                                echo esc_html(substr($about_text, 0, 200)) . '...';
                            } else {
                                echo esc_html($about_text);
                            }
                        }
                        ?></p>
                    <div class="mt-3">
                        <?php
                        // Get social media links from homepage custom fields
                        $facebook_url = get_field('facebook', $home_id);
                        $instagram_url = get_field('instagram', $home_id);
                        $youtube_url = get_field('youtube', $home_id);
                        ?>


                        <a href="<?php echo esc_url($facebook_url); ?>"
                            class="social-icon wow animate__animated animate__bounceIn" data-wow-delay="0.3s"
                            target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="<?php echo esc_url($instagram_url); ?>"
                            class="social-icon wow animate__animated animate__bounceIn" data-wow-delay="0.4s"
                            target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>

                        <a href="<?php echo esc_url($youtube_url); ?>"
                            class="social-icon wow animate__animated animate__bounceIn" data-wow-delay="0.5s"
                            target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <i class="fa fa-youtube"></i>
                        </a>

                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget wow animate__animated animate__fadeInUpBig" data-wow-delay="0.2s"
                    data-wow-duration="0.8s">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <?php
                        // Use the same primary menu as navbar
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => '',
                            'items_wrap' => '%3$s',
                            'depth' => 1,
                            'fallback_cb' => '__return_false'
                        ));
                        ?>
                    </ul>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget wow animate__animated animate__fadeInUp" data-wow-delay="0.3s"
                    data-wow-duration="0.8s">
                    <h4>Our Services</h4>
                    <ul class="list-unstyled">
                        <?php
                        // Get services from custom post type (limit to 6)
                        $services = get_posts(array(
                            'post_type' => 'service',
                            'numberposts' => 6,
                            'orderby' => 'menu_order',
                            'order' => 'ASC'
                        ));

                        if ($services) :
                            foreach ($services as $service) : ?>
                        <li class="mb-2">
                            <a href="<?php echo get_permalink($service->ID); ?>">
                                <?php echo esc_html($service->post_title); ?>
                            </a>
                        </li>
                        <?php endforeach;
                        else : ?>
                        <li>No services found.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget wow animate__animated animate__fadeInLeftBig" data-wow-delay="0.4s"
                    data-wow-duration="0.8s">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <?php
                        // Get the homepage ID
                        $home_id = get_option('page_on_front');

                        // Get contact info from homepage custom fields
                        $phone = get_field('phone', $home_id);
                        $email = get_field('email', $home_id);
                        $address = get_field('address', $home_id);
                        ?>

                        <?php if ($phone): ?>
                        <li class="mb-2">
                            <i class="fa fa-phone me-2"></i>
                            <a
                                href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if ($email): ?>
                        <li class="mb-2">
                            <i class="fa fa-envelope me-2"></i>
                            <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                        </li>
                        <?php endif; ?>

                        <?php if ($address): ?>
                        <li class="mb-2">
                            <i class="fa fa-map-marker me-2"></i>
                            <?php echo nl2br(esc_html($address)); ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4 pt-4 border-top border-secondary">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0 wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s"
                    style="color: rgba(255, 255, 255, 0.7);">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0 wow animate__animated animate__fadeInRight" data-wow-delay="0.5s"
                    style="color: rgba(255, 255, 255, 0.7);">
                    Designed By <span style="color: #c79c6c;"> Soumya Kesarwani</span> for Perfect Events
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<?php
// Get WhatsApp number from homepage ACF field
$home_id = get_option('page_on_front');
$whatsapp_number = get_field('whatsapp_number', $home_id);

if ($whatsapp_number) :
?>
<a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20event%20planning%20services"
    class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>
<?php endif; ?>

<!-- Query Modal -->
<div class="modal fade" id="queryModal" tabindex="-1" aria-labelledby="queryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="queryModalLabel">Send Us a Query</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <?php echo do_shortcode('[contact-form-7 id="ceb1c3e" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>

</div><!-- #page -->

</body>

</html>