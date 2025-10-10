<?php

/**
 * Template part for displaying About section
 *
 * @package UnderstrapChild
 */

// Get section data from parameters or use defaults
$about_title = get_field('about_title') ?? 'Know About';
$about_description = get_field('about_description') ?? '';
$about_image = get_field('about_image') ?? null;;

?>

<section id="know-about" class="py-5 bg-white>">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="wow animate__animated animate__fadeInLeft" data-wow-duration="1s">
                    <h2 class="section-title-with-line text-left mb-3 gsap-text-animate"><?php echo $about_title; ?></h2>
                    <p class="section-subtitle-small text-left wow animate__animated animate__fadeInUp know-about-text"
                        data-wow-delay="0.4s"><?php echo $about_description; ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="wow animate__animated animate__zoomIn" data-wow-duration="1s" data-wow-delay="0.3s">
                    <?php if ($about_image): ?>
                    <img src="<?php echo esc_url($about_image['url']); ?>"
                        alt="<?php echo esc_attr($about_image['alt']); ?>" class="img-fluid about-image shadow">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>