<!-- Video Gallery Section -->
<section id="video-gallery-grid" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Video Gallery</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Watch Our
                Amazing Events</p>
        </div>

        <?php
        // Check if we're on the front page or video gallery page
        $is_front_page = is_front_page();
        $number_of_posts = $is_front_page ? 6 : -1; // 6 for front page, all for video gallery page

        $video_args = array(
            'post_type' => 'video_gallery',
            'posts_per_page' => $number_of_posts,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $video_query = new WP_Query($video_args);

        if ($video_query->have_posts()) :
            $video_index = 0;
        ?>

        <div class="gallery-grid">
            <?php while ($video_query->have_posts()) : $video_query->the_post();
                    // Use title as YouTube URL
                    $youtube_url = get_the_title();

                    // Extract YouTube video ID from URL
                    preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $youtube_url, $matches);
                    $youtube_id = isset($matches[1]) ? $matches[1] : '';

                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    if (!$thumbnail && $youtube_id) {
                        $thumbnail = 'https://img.youtube.com/vi/' . $youtube_id . '/maxresdefault.jpg';
                    }

                    $delay = 0.1 * $video_index;
                    $video_index++;
                ?>

            <div class="gallery-item wow animate__animated animate__flipInY" data-wow-delay="<?php echo $delay; ?>s"
                data-wow-duration="0.8s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="Video" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <a href="<?php echo esc_url($youtube_url); ?>" class="gallery-zoom"
                            data-fancybox="video-gallery">
                            <i class="fa fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>

            <?php endwhile; ?>
        </div>

        <?php else: ?>
        <div class="text-center py-5">
            <p class="lead">No videos found.</p>
        </div>
        <?php endif;
        wp_reset_postdata();
        ?>

        <?php if ($is_front_page) : ?>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('video-gallery'))); ?>"
                class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                View More
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>