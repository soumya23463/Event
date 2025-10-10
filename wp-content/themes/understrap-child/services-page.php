<?php

/**
 * Template Name: Services Page
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
                <h1 class="page-title gsap-fade-scale-animate">Our Services</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Complete Event Management Solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<?php
get_template_part('template-parts/section-services');
?>


<!-- WhatsApp Floating Button -->
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