<!-- Contact Section -->
<section id="contact-section" class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Get In Touch</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Have
                questions? We'd love to hear
                from you!</p>
        </div>

        <?php
       
        // Fetch contact fields
        $phone = get_field('phone');
        $email = get_field('email');
        $address = get_field('address');
        $business_hours = get_field('business_hours');
        ?>

        <div class="row g-4">
            <!-- Contact Card 1 - Address -->
            <?php if ($address): ?>
            <div class="col-lg-3 col-md-6">
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.1s"
                    data-wow-duration="0.8s">
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
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.2s"
                    data-wow-duration="0.8s">
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
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.3s"
                    data-wow-duration="0.8s">
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
                <div class="contact-card wow animate__animated animate__zoomIn" data-wow-delay="0.4s"
                    data-wow-duration="0.8s">
                    <div class="contact-card-icon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <h4>Our Hours</h4>
                    <p><?php echo nl2br(esc_html($business_hours)); ?></p>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>