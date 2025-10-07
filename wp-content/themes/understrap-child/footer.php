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
                <div class="footer-widget">
                    <h4>Krishna Events</h4>
                    <p>Your premier destination wedding and event planning partner. Creating unforgettable moments across India with passion and perfection.</p>
                    <div class="mt-3">
                        <a href="https://www.facebook.com/krishnaeventss" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/krishnaeventss" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://twitter.com/krishnaeventss" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.youtube.com/@krishnaeventss" class="social-icon" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget">
                    <h4>Quick Links</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo home_url('/'); ?>">Home</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/about'); ?>">About Us</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/gallery'); ?>">Gallery</a></li>
                        <li class="mb-2"><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                    </ul>
                </div>
            </div>

            <!-- Services -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h4>Our Services</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Destination Weddings</a></li>
                        <li class="mb-2"><a href="#">Photography & Video</a></li>
                        <li class="mb-2"><a href="#">Catering Services</a></li>
                        <li class="mb-2"><a href="#">Event Decoration</a></li>
                        <li class="mb-2"><a href="#">Event Planning</a></li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fa fa-phone me-2"></i>
                            <a href="tel:+919876543210">+91 98765 43210</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-envelope me-2"></i>
                            <a href="mailto:info@krishnaeventss.com">info@krishnaeventss.com</a>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-map-marker me-2"></i>
                            123 Event Street, City Name,<br>
                            <span class="ms-4">State - 123456, India</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="row mt-4 pt-4 border-top border-secondary">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0" style="color: rgba(255, 255, 255, 0.7);">
                    &copy; <?php echo date('Y'); ?> Krishna Events. All Rights Reserved.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <p class="mb-0" style="color: rgba(255, 255, 255, 0.7);">
                    Designed with <i class="fa fa-heart" style="color: #c79c6c;"></i> for Perfect Events
                </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</div><!-- #page -->

</body>
</html>
