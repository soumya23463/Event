<?php

/**
 * Template Name: About Page
 * Template Post Type: page
 */

get_header(); ?>


<?php
// Get the current page ID
$page_id = get_the_ID();

// Fetch ACF fields from current page
$about_title = get_field('about_title', $page_id);
$about_description = get_field('about_description', $page_id);
$about_image = get_field('about_image', $page_id);
?>
<!-- Page Header -->
<section class="page-header-section">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="page-title wow animate__animated animate__fadeInDown">About Us</h1>
                <p class="page-subtitle wow animate__animated animate__fadeInUp">Creating Unforgettable Moments Since 2010</p>
            </div>
        </div>
    </div>
</section>

<!-- About Krishna Events Section -->
<section id="about-company" class="py-5 bg-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="wow animate__animated animate__fadeInRight">
                    <h2 class="section-title-with-line text-left mb-3">Welcome to Krishna Events</h2>
                    <p class="section-subtitle-small text-left">Your Trusted Event Partner</p>
                    <p class="know-about-text">
                        <?php
                        if ($about_description) {
                            echo $about_description;
                        } else {
                            // Default text if ACF field is empty
                            echo "Krishna Events is a premier event management company dedicated to creating unforgettable experiences. With over a decade of expertise in wedding planning, corporate events, and social celebrations, we bring your vision to life with meticulous attention to detail, creative excellence, and unparalleled service quality.";
                        }
                        ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wow animate__animated animate__fadeInLeft">
                    <?php if ($about_image): ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>"
                        alt="<?php echo esc_attr($about_image['alt']); ?>" class="img-fluid about-image shadow">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Section -->
<!-- <section id="mission-vision" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-simple scroll-animate">Our Mission & Vision</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card scroll-animate">
                    <div class="info-card-icon">
                        <i class="fa fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To offer a service that sets new trends in the wedding and event management industry. We strive
                        to create personalized, memorable experiences that exceed our clients' expectations through
                        innovation, creativity, and exceptional service.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card scroll-animate delay-2">
                    <div class="info-card-icon">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To become India's most trusted and sought-after event management company, known for our
                        commitment to quality, creativity, and customer satisfaction. We aim to transform every event
                        into a beautiful memory that lasts a lifetime.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Call to Action Section -->
<section id="about-cta" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container text-center">
        <div class="wow animate__animated animate__zoomIn">
            <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 700;">Ready to Plan Your Dream Event?</h2>
            <p class="lead mb-4" style="font-size: 1.2rem;">Let's create something magical together. Contact us today
                for a free consultation!</p>
            <?php
            $contact_phone = get_field('contact_phone', $page_id);
            $phone_link = $contact_phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $contact_phone) : '#contact-section';
            ?>
            <a href="<?php echo esc_url($phone_link); ?>" class="btn btn-light btn-lg" style="padding: 15px 40px; font-weight: 600;">
                <i class="fa fa-phone me-2"></i>Get in Touch
            </a>
        </div>
    </div>
</section>


<!-- Quality Policy Section -->
<section id="quality-policy" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="wow animate__animated animate__fadeInLeft">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/quality-policy.jpg"
                        alt="Quality Policy" class="img-fluid about-image"
                        onerror="this.src='https://images.unsplash.com/photo-1464366400600-7168b8af9bc3?w=800&h=600&fit=crop'">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="wow animate__animated animate__fadeInRight">
                    <h2 class="section-title-with-line text-left mb-3">Our Quality Policy</h2>
                    <p class="section-subtitle-small text-left">Excellence in Every Detail</p>
                    <p class="about-text">At Krishna Events, quality is not just a promise – it's our foundation. We are
                        committed to:</p>
                    <ul class="quality-list">
                        <li><i class="fa fa-star"></i> Delivering exceptional service that exceeds client expectations
                        </li>
                        <li><i class="fa fa-star"></i> Maintaining the highest standards in every aspect of event
                            management</li>
                        <li><i class="fa fa-star"></i> Continuous improvement through client feedback and industry best
                            practices</li>
                        <li><i class="fa fa-star"></i> Building long-term relationships based on trust and reliability
                        </li>
                        <li><i class="fa fa-star"></i> Ensuring complete client satisfaction from planning to execution
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Contact Section -->
<!-- <section id="contact-section" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title underline scroll-animate">Contact Us</h2>
            <p class="lead scroll-animate delay-1">We'd love to hear from you!</p>
        </div>

        <div class="row g-5">
            <!-- Contact Information -->
<!-- <div class="col-lg-5"> 
<div class="scroll-animate">
    <div class="mb-4">
        <div class="d-flex align-items-center mb-4">
            <div class="icon-box" style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
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
            <div class="icon-box" style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
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
            <div class="icon-box" style="width: 60px; height: 60px; margin-right: 1.5rem; flex-shrink: 0;">
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
<!-- <div class="col-lg-7"> 
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
                <textarea class="form-control-custom" id="message" name="message" rows="5" required></textarea>
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
</section> -->

<!-- WhatsApp Floating Button -->
<a href="https://wa.me/919876543210?text=Hi%2C%20I%20would%20like%20to%20inquire%20about%20your%20event%20planning%20services"
    class="whatsapp-float" target="_blank" rel="noopener noreferrer" aria-label="Contact us on WhatsApp">
    <i class="fa fa-whatsapp"></i>
</a>

<?php get_footer(); ?>