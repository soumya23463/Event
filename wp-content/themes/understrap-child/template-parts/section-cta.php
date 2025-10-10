<!-- Call to Action Section -->
<section id="home-cta" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container text-center">
        <div class="wow animate__animated animate__zoomIn" data-wow-duration="0.8s">
            <h2 class="mb-4" style="font-size: 2.5rem; font-weight: 700;">Ready to Plan Your Dream Event?</h2>
            <p class="lead mb-4" style="font-size: 1.2rem;">Let's create something magical together. Contact us today
                for a free consultation!</p>
            <?php
            // Get phone from homepage
            $contact_phone = get_field('phone');
            $phone_link = $contact_phone ? 'tel:' . preg_replace('/[^0-9+]/', '', $contact_phone) : '#contact-section';
            ?>
            <a href="<?php echo esc_url($phone_link); ?>"
                class="btn btn-light btn-lg wow animate__animated animate__pulse" data-wow-delay="0.3s"
                data-wow-duration="1s" style="padding: 15px 40px; font-weight: 600;">
                <i class="fa fa-phone me-2"></i>Get in Touch
            </a>
        </div>
    </div>
</section>