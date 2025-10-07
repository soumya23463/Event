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
<nav id="main-nav" class="navbar navbar-expand-lg navbar-light bg-white" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e('Main Navigation', 'understrap'); ?>
    </h2>


    <div class="<?php echo esc_attr($container); ?>">

        <!-- Your site branding in the menu -->
        <?php get_template_part('global-templates/navbar-branding'); ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false"
            aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- The WordPress Menu goes here -->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
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

            <!-- Contact CTA Button -->
            <div class="ms-lg-3 mt-3 mt-lg-0">
                <a href="#contact-section" class="btn btn-primary btn-sm">
                    <i class="fa fa-phone me-2"></i>Get Quote
                </a>
            </div>
        </div>

    </div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->