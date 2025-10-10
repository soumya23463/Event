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
                <h1 class="page-title gsap-fade-scale-animate wow animate__animated animate__fadeInDown">Contact Us</h1>
                <p class="page-subtitle gsap-fade-scale-animate wow animate__animated animate__fadeInDown">Get In Touch
                    With Us</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact-section" class="py-5">
    <div class="container">
        <?php

        // Get contact info from homepage custom fields
        $phone = get_field('phone');
        $email = get_field('email');
        $address = get_field('address');
        $business_hours = get_field('business_hours');
        $facebook_url = get_field('facebook');
        $instagram_url = get_field('instagram');
        $twitter_url = get_field('twitter');
        $youtube_url = get_field('youtube');
        ?>

        <div class="row g-4">
            <!-- Contact Card 1 - Address -->
            <?php if ($address): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.1s">
                    <div class="contact-card-icon wow animate__animated animate__bounceIn" data-wow-delay="0.3s">
                        <i class="fa fa-map-marker"></i>
                    </div>
                    <h4 class="wow animate__animated animate__fadeInLeftBig" data-wow-delay="0.4s">Address
                    </h4>
                    <p class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.5s">
                        <?php echo nl2br(esc_html($address)); ?></p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 2 - Phone -->
            <?php if ($phone): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.6s">
                    <div class="contact-card-icon wow animate__animated animate__bounceIn" data-wow-delay="0.9s">
                        <i class="fa fa-phone"></i>
                    </div>
                    <h4 class="wow animate__animated animate__fadeInLeftBig" data-wow-delay="0.10s">Phone</h4>
                    <p class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.11s">
                        <a
                            href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a>
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 3 - Email -->
            <?php if ($email): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.12s">
                    <div class="contact-card-icon wow animate__animated animate__bounceIn" data-wow-delay="0.15s">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h4 class="wow animate__animated animate__fadeInLeftBig" data-wow-delay="0.16s">Email</h4>
                    <p class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.17s">
                        <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
                    </p>
                </div>
            </div>
            <?php endif; ?>

            <!-- Contact Card 4 - Business Hours -->
            <?php if ($business_hours): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.18s">
                    <div class="contact-card-icon wow animate__animated animate__bounceIn" data-wow-delay="0.21s">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h4 <h4 class="wow animate__animated animate__fadeInLeftBig" data-wow-delay="0.22s">Our Hours</h4>
                    </h4>
                    <p class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.23s">
                        <?php echo nl2br(esc_html($business_hours)); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>


    </div>
</section>

<!-- Map Section -->
<?php
$map_embed_url = get_field('map_embed_url');
if ($map_embed_url):
?>
<section id="map-section" class="py-0" class="wow animate__animated animate__fadeInRightBig" data-wow-delay="0.24s">
    <div class="map-container" class="wow animate__animated animate__fadeInRightLeft" data-wow-delay="0.25s">
        <iframe class="map-container" class="wow animate__animated animate__fadeInRightLeft" data-wow-delay="0.26s"
            src="<?php echo esc_url($map_embed_url); ?>" width="100%" height="450" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>
<?php endif; ?>




<?php get_footer(); ?>