<?php

/**
 * Template Name: Video Gallery Page
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
                <h1 class="page-title wow animate__animated animate__fadeInDown">Video Gallery</h1>
                <p class="page-subtitle wow animate__animated animate__fadeInUp">Watch Our Amazing Events</p>
            </div>
        </div>
    </div>
</section>

<!-- Video Gallery Section -->
<section id="video-gallery-grid" class="py-5 bg-white">
    <div class="container">
        <?php
        // Query Video Gallery Custom Post Type
        $args = array(
            'post_type' => 'video_gallery',
            'posts_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $video_query = new WP_Query($args);

        if ($video_query->have_posts()) :
        ?>

        <div class="gallery-grid">
            <?php
                $index = 0;
                while ($video_query->have_posts()) : $video_query->the_post();

                    // Use title as YouTube URL
                    $youtube_url = get_the_title();

                    // Extract YouTube video ID from URL
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $youtube_url, $matches);
                    $youtube_id = isset($matches[1]) ? $matches[1] : '';

                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumbnail && $youtube_id) {
                        $thumbnail = 'https://img.youtube.com/vi/' . $youtube_id . '/maxresdefault.jpg';
                    }

                    // Calculate staggered delay - 0.1s increment per item
                    $delay = ($index % 12) * 0.5;
                    $index++;
                ?>

            <div class="gallery-item wow animate__animated animate__zoomIn" data-wow-delay="<?php echo $delay; ?>s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="Video" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <a href="<?php echo esc_url($youtube_url); ?>"
                            class="gallery-zoom wow animate__animated animate__bounceIn"
                            data-wow-delay="<?php echo $delay + 0.3; ?>s" data-fancybox="video-gallery">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <p class="lead">No videos found. Please add videos from the WordPress admin.</p>
        </div>
        <?php endif;
        wp_reset_postdata();
        ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    Fancybox.bind('[data-fancybox="video-gallery"]', {
        Toolbar: {
            display: ["close"]
        },
        Youtube: {
            autohide: 1,
            fs: 1,
            rel: 0,
            hd: 1,
            wmode: "transparent",
            enablejsapi: 1,
            html5: 1
        }
    });
});
</script>

<?php get_footer(); ?>