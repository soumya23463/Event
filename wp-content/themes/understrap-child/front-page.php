<?php

/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header(); ?>

<!-- Hero Video Background Section - Krishna Events Style -->
<section id="hero-video" class="hero-video-section">
    <?php
    // Get ACF video fields
    $hero_video_url = get_field('hero_video_url'); // YouTube URL
    $hero_video_file = get_field('hero_video_file'); // Direct video file
    $hero_title = get_field('hero_title');
    $hero_subtitle = get_field('hero_subtitle');
    $hero_description = get_field('hero_description');
    $hero_button_text = get_field('hero_button_text') ?: 'Read More';
    $hero_button_link = get_field('hero_button_link') ?: home_url('/about-page');

    // Check which video source to use (YouTube has priority)
    $youtube_id = '';
    if ($hero_video_url) {
        // Extract YouTube video ID
        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $hero_video_url, $matches);
        $youtube_id = isset($matches[1]) ? $matches[1] : '';
    }

    // Show video section if either YouTube or direct video exists
    if ($youtube_id || $hero_video_file) :
    ?>
    <div class="hero-video-container">
        <?php if ($youtube_id) : ?>
        <!-- YouTube Video Background -->
        <div class="hero-video-bg">
            <iframe
                src="https://www.youtube.com/embed/<?php echo esc_attr($youtube_id); ?>?autoplay=1&mute=1&loop=1&playlist=<?php echo esc_attr($youtube_id); ?>&controls=0&showinfo=0&rel=0&modestbranding=1&playsinline=1&enablejsapi=1"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
        <?php elseif ($hero_video_file) : ?>
        <!-- Direct Video File -->
        <video class="hero-video-bg" autoplay muted loop playsinline>
            <source src="<?php echo esc_url($hero_video_file); ?>" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <?php endif; ?>

        <!-- Overlay -->
        <div class="hero-video-overlay"></div>

        <!-- Content -->
        <div class="hero-video-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <?php if ($hero_subtitle) : ?>
                        <h3 class="hero-subtitle wow animate__animated animate__fadeInDown" data-wow-delay="0.2s">
                            <?php echo esc_html($hero_subtitle); ?>
                        </h3>
                        <?php endif; ?>

                        <?php if ($hero_title) : ?>
                        <h1 class="hero-title wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                            <?php echo esc_html($hero_title); ?>
                        </h1>
                        <?php endif; ?>

                        <?php if ($hero_description) : ?>
                        <p class="hero-description wow animate__animated animate__fadeInUp" data-wow-delay="0.6s">
                            <?php echo esc_html($hero_description); ?>
                        </p>
                        <?php endif; ?>

                        <?php if ($hero_button_text && $hero_button_link) : ?>
                        <a href="<?php echo esc_url($hero_button_link); ?>"
                            class="hero-btn wow animate__animated animate__fadeInUp" data-wow-delay="0.8s">
                            <?php echo esc_html($hero_button_text); ?>
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</section>

<?php

$happy_customers = get_field('happy_customers');
$events_completed = get_field('events_completed');
$team_members = get_field('team_members');
$years_experience = get_field('years_experience');
?>



<!-- Know About Section -->
<?php
get_template_part('template-parts/section-about');
?>


<!-- Services Section -->
<?php
get_template_part('template-parts/section-services');
?>

<!-- About/Stats Section -->
<section id="stats" class="py-5 bg-gradient-primary text-white section-overlay">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.1s" data-wow-duration="1s">
                    <div class="counter" data-count="500" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $happy_customers; ?></div>
                    <p style="font-size: 1.1rem;">Happy Customers</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.2s" data-wow-duration="1s">
                    <div class="counter" data-count="1000" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $events_completed; ?></div>
                    <p style="font-size: 1.1rem;">Events Completed</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.3s" data-wow-duration="1s">
                    <div class="counter" data-count="50" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $team_members; ?></div>
                    <p style="font-size: 1.1rem;">Team Members</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="wow animate__animated animate__bounceIn" data-wow-delay="0.4s" data-wow-duration="1s">
                    <div class="counter" data-count="15" style="font-size: 3rem; font-weight: 700;">
                        <?php echo $years_experience; ?></div>
                    <p style="font-size: 1.1rem;">Years Experience</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title-with-line gsap-text-animate">Why Choose Krishna Events?</h2>
            <p class="section-subtitle-small wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">What Makes
                Us Different</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.1s"
                    data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <h4>Personalized Attention</h4>
                    <p>Every event is unique, and we provide customized solutions tailored to your specific needs and
                        preferences.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.2s"
                    data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-globe"></i>
                    </div>
                    <h4>Pan-India Network</h4>
                    <p>Extensive network of trusted vendors across major cities in India for seamless event execution.
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.3s"
                    data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-lightbulb-o"></i>
                    </div>
                    <h4>Creative Excellence</h4>
                    <p>Our creative team brings fresh, innovative ideas to make your event truly one-of-a-kind.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="feature-box wow animate__animated animate__fadeInUp" data-wow-delay="0.4s"
                    data-wow-duration="0.8s">
                    <div class="feature-icon">
                        <i class="fa fa-money"></i>
                    </div>
                    <h4>Cost-Effective</h4>
                    <p>Premium quality services at competitive prices, ensuring maximum value for your investment.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Gallery Section -->
<?php
get_template_part('template-parts/section-gallery');
?>

<!-- Video Gallery Section -->
<?php
get_template_part('template-parts/section-video-gallery');
?>

<!-- Call to Action Section -->
<?php
get_template_part('template-parts/section-cta');
?>


<!-- Testimonials Section -->
<?php
get_template_part('template-parts/section-testimonials');
?>

<!-- Team Section -->
<?php
get_template_part('template-parts/section-team');
?>

<!-- Contact Section -->
<?php
get_template_part('template-parts/section-contact');
?>

<?php get_footer(); ?>