<?php

/**
 * Template Name: Gallery Page
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
                <h1 class="page-title gsap-fade-scale-animate">Our Gallery</h1>
                <p class="page-subtitle gsap-fade-scale-animate">Capturing Beautiful Moments</p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section id="gallery-grid" class="py-5 bg-white">
    <div class="container">
        <?php
        // Get gallery items from custom post type
        $gallery_args = array(
            'post_type' => 'gallery',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $gallery_query = new WP_Query($gallery_args);

        if ($gallery_query->have_posts()) :
        ?>

        <div class="gallery-grid">
            <?php
                $index = 0;
                while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');

                    // Calculate staggered delay - 0.1s increment per item
                    $delay = ($index % 12) * 0.5;
                    $index++;
                ?>

            <div class="gallery-item wow animate__animated animate__zoomIn" data-wow-delay="<?php echo $delay; ?>s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="gallery-image">
                    <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&h=400&fit=crop"
                        alt="<?php echo esc_attr(get_the_title()); ?>" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <h4 class="wow animate__animated animate__fadeInUp"
                            data-wow-delay="<?php echo $delay + 0.2; ?>s"><?php the_title(); ?></h4>
                        <a href="<?php echo esc_url($thumbnail); ?>"
                            class="gallery-zoom wow animate__animated animate__bounceIn"
                            data-wow-delay="<?php echo $delay + 0.3; ?>s" data-fancybox="gallery"
                            data-caption="<?php echo esc_attr(get_the_title()); ?>">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <p class="lead">No gallery items found. Please add some images from the WordPress admin.</p>
        </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>




<?php get_footer(); ?>