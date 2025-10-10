<!-- Gallery Section -->
<section id="gallery-grid" class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Photo Gallery</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">Moments
                We've Captured</p>
        </div>

        <?php
        // Check if we're on the front page or gallery page
        $is_front_page = is_front_page();
        $number_of_posts = $is_front_page ? 6 : -1; // 6 for front page, all for gallery page

        $gallery_args = array(
            'post_type' => 'gallery',
            'posts_per_page' => $number_of_posts,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $gallery_query = new WP_Query($gallery_args);

        if ($gallery_query->have_posts()) :
            $gallery_index = 0;
        ?>

        <div class="gallery-grid">
            <?php while ($gallery_query->have_posts()) : $gallery_query->the_post();
                    $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $delay = 0.1 * $gallery_index;
                    $gallery_index++;
                ?>

            <div class="gallery-item wow animate__animated animate__flipInY" data-wow-delay="<?php echo $delay; ?>s"
                data-wow-duration="0.8s">
                <div class="gallery-card">
                    <?php if ($thumbnail): ?>
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>"
                        class="gallery-image">
                    <?php else: ?>
                    <img src="https://images.unsplash.com/photo-1519225421980-715cb0215aed?w=600&h=400&fit=crop"
                        alt="<?php echo esc_attr(get_the_title()); ?>" class="gallery-image">
                    <?php endif; ?>

                    <div class="gallery-overlay">
                        <a href="<?php echo esc_url($thumbnail); ?>" class="gallery-zoom" data-fancybox="gallery"
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
            <p class="lead">No gallery items found.</p>
        </div>
        <?php endif;
        wp_reset_postdata();
        ?>

        <?php if ($is_front_page) : ?>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('gallery'))); ?>"
                class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.5s">
                View More
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>
