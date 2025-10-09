<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>
<nav id="main-nav"
    class="navbar navbar-expand-lg navbar-light bg-white sticky-top wow animate__animated animate__fadeInDown"
    data-wow-duration="1s" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e('Main Navigation', 'understrap'); ?>
    </h2>


    <div class="<?php echo esc_attr($container); ?>">

        <!-- Your site branding in the menu -->
        <div class="wow animate__animated animate__fadeInDownBig" data-wow-delay="0.2s">
            <?php get_template_part('global-templates/navbar-branding'); ?>
        </div>

        <button class="navbar-toggler wow animate__animated animate__pulse" data-wow-delay="0.3s" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
            aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The WordPress Menu goes here -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="wow animate__animated animate__fadeInUpBig" data-wow-delay="0.4s">
                <?php
                wp_nav_menu([
                    'theme_location'  => 'primary',
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => 'navbar-nav ms-auto align-items-lg-center',
                    'fallback_cb'     => '',
                    'menu_id'         => 'main-menu',
                    'depth'           => 2,
                    'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
                ]);
                ?>
            </div>

            <!-- Contact CTA Button -->
            <!-- <div class="ms-lg-3 mt-3 mt-lg-0 wow animate__animated animate__bounceIn" data-wow-delay="0.6s">
                <a href="#contact-section" class="btn btn-primary btn-sm">
                    <i class="fa fa-phone me-2"></i>Get Quote
                </a>
            </div> -->
        </div>

    </div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->