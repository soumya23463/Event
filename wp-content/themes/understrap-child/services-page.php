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
                <h1 class="page-title wow animate__animated animate__fadeInDown">Our Services</h1>
                <p class="page-subtitle wow animate__animated animate__fadeInUp">Complete Event Management Solutions</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services-overview" class="py-5 bg-light">
    <div class="container">

        <?php
        // Get all services from custom post type
        $services = get_posts(array(
            'post_type' => 'service',
            'numberposts' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ));

        if ($services) :
        ?>

        <div class="row g-4">
            <?php
                foreach ($services as $index => $service) :
                    $service_icon = get_post_meta($service->ID, 'service_icon', true);

                    // Default icon if not set
                    if (empty($service_icon)) {
                        $service_icon = 'fa-check-circle';
                    }
                ?>

            <div class="col-md-4">
                <div class="service-list-card wow animate__animated animate__fadeInUp"
                    data-wow-delay="<?php echo ($index * 0.05); ?>s">
                    <i class="fa <?php echo esc_attr($service_icon); ?>"></i>
                    <h5><?php echo esc_html($service->post_title); ?></h5>
                </div>
            </div>

            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <div class="alert alert-info">
                <i class="fa fa-info-circle me-2"></i>
                No services found. Please add services from the WordPress admin.
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>


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