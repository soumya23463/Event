<?php

/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts()
{
	wp_dequeue_style('understrap-styles');
	wp_deregister_style('understrap-styles');

	wp_dequeue_script('understrap-scripts');
	wp_deregister_script('understrap-scripts');
}
add_action('wp_enqueue_scripts', 'understrap_remove_scripts', 20);



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles()
{

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get('Version');

	$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	$css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_styles);

	wp_enqueue_style('child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version);

	// Enqueue Krishna Events custom CSS (main styles with responsiveness)
	wp_enqueue_style('krishna-events-custom', get_stylesheet_directory_uri() . '/css/krishna-events-custom.css', array(), $theme_version);

	// Enqueue Swiper CSS
	wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.0.0');

	// Enqueue Swiper Slider Custom CSS (with cache busting)
	$swiper_css_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . '/css/swiper-slider-custom.css');
	wp_enqueue_style('swiper-slider-custom', get_stylesheet_directory_uri() . '/css/swiper-slider-custom.css', array(), $swiper_css_version);

	wp_enqueue_script('jquery');

	// Enqueue Swiper JS
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), '8.0.0', true);

	// Enqueue Swiper Init JS
	wp_enqueue_script('swiper-init', get_stylesheet_directory_uri() . '/js/swiper-init.js', array('swiper-js'), $theme_version, true);

	$js_version = $theme_version . '.' . filemtime(get_stylesheet_directory() . $theme_scripts);

	wp_enqueue_script('child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain()
{
	load_child_theme_textdomain('understrap-child', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'add_child_theme_textdomain');



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version()
{
	return 'bootstrap5';
}
add_filter('theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20);



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js()
{
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array('customize-preview'),
		'20130508',
		true
	);
}
add_action('customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js');





/**
 * Register Services Custom Post Type
 */
function my_register_services_cpt()
{
	$labels = array(
		'name'               => 'Services',
		'singular_name'      => 'Service',
		'add_new'            => 'Add New Service',
		'add_new_item'       => 'Add New Service',
		'edit_item'          => 'Edit Service',
		'new_item'           => 'New Service',
		'view_item'          => 'View Service',
		'search_items'       => 'Search Services',
		'not_found'          => 'No services found',
		'not_found_in_trash' => 'No services found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'services'),
		'supports'           => array('title', 'editor', 'thumbnail'),
		'menu_icon'          => 'dashicons-hammer',
		'show_in_rest'       => true,
	);

	register_post_type('service', $args);
}
add_action('init', 'my_register_services_cpt');


/**
 * Register Gallery Custom Post Type
 */
function my_register_gallery_cpt()
{
	$labels = array(
		'name'               => 'Gallery',
		'singular_name'      => 'Gallery Item',
		'add_new'            => 'Add New Image',
		'add_new_item'       => 'Add New Image',
		'edit_item'          => 'Edit Gallery Item',
		'new_item'           => 'New Gallery Item',
		'view_item'          => 'View Gallery Item',
		'search_items'       => 'Search Gallery',
		'not_found'          => 'No gallery items found',
		'not_found_in_trash' => 'No gallery items found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'gallery'),
		'supports'           => array('title', 'thumbnail'),
		'menu_icon'          => 'dashicons-format-gallery',
		'show_in_rest'       => true,
	);

	register_post_type('gallery', $args);
}
add_action('init', 'my_register_gallery_cpt');


/**
 * Register Testimonials Custom Post Type
 */
function my_register_testimonials_cpt()
{
	$labels = array(
		'name'               => 'Testimonials',
		'singular_name'      => 'Testimonial',
		'add_new'            => 'Add New Testimonial',
		'add_new_item'       => 'Add New Testimonial',
		'edit_item'          => 'Edit Testimonial',
		'new_item'           => 'New Testimonial',
		'view_item'          => 'View Testimonial',
		'search_items'       => 'Search Testimonials',
		'not_found'          => 'No testimonials found',
		'not_found_in_trash' => 'No testimonials found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'testimonials'),
		'supports'           => array('title', 'editor', 'thumbnail'),
		'menu_icon'          => 'dashicons-testimonial',
		'show_in_rest'       => true,
	);

	register_post_type('testimonial', $args);
}
add_action('init', 'my_register_testimonials_cpt');


/**
 * Register Slider Custom Post Type
 */
function my_register_slider_cpt()
{
	$labels = array(
		'name'               => 'Sliders',
		'singular_name'      => 'Slider',
		'add_new'            => 'Add New Slider',
		'add_new_item'       => 'Add New Slider',
		'edit_item'          => 'Edit Slider',
		'new_item'           => 'New Slider',
		'view_item'          => 'View Slider',
		'search_items'       => 'Search Sliders',
		'not_found'          => 'No sliders found',
		'not_found_in_trash' => 'No sliders found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'slider'),
		'supports'           => array('title', 'editor', 'thumbnail'),
		'menu_icon'          => 'dashicons-images-alt2',
		'show_in_rest'       => true,
	);

	register_post_type('slider', $args);
}
add_action('init', 'my_register_slider_cpt');


/**
 * Register Video Gallery Custom Post Type
 */
function my_register_video_gallery_cpt()
{
	$labels = array(
		'name'               => 'Video Gallery',
		'singular_name'      => 'Video',
		'add_new'            => 'Add New Video',
		'add_new_item'       => 'Add New Video',
		'edit_item'          => 'Edit Video',
		'new_item'           => 'New Video',
		'view_item'          => 'View Video',
		'search_items'       => 'Search Videos',
		'not_found'          => 'No videos found',
		'not_found_in_trash' => 'No videos found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'videos'),
		'supports'           => array('title', 'thumbnail'),
		'menu_icon'          => 'dashicons-video-alt3',
		'show_in_rest'       => true,
	);

	register_post_type('video_gallery', $args);
}
add_action('init', 'my_register_video_gallery_cpt');


/**
 * Register Team Custom Post Type
 */
function my_register_team_cpt()
{
	$labels = array(
		'name'               => 'Team Members',
		'singular_name'      => 'Team Member',
		'add_new'            => 'Add New Member',
		'add_new_item'       => 'Add New Team Member',
		'edit_item'          => 'Edit Team Member',
		'new_item'           => 'New Team Member',
		'view_item'          => 'View Team Member',
		'search_items'       => 'Search Team Members',
		'not_found'          => 'No team members found',
		'not_found_in_trash' => 'No team members found in Trash',
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => false,
		'rewrite'            => array('slug' => 'team'),
		'supports'           => array('title', 'editor', 'thumbnail'),
		'menu_icon'          => 'dashicons-groups',
		'show_in_rest'       => true,
	);

	register_post_type('team', $args);
}
add_action('init', 'my_register_team_cpt');





// Enqueue Animate.css and WOW.js
function enqueue_animate_css()
{
	// Enqueue Animate.css from CDN
	wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');

	// Enqueue WOW.js from CDN
	wp_enqueue_script('wow-js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), '1.1.2', true);

	// Initialize WOW.js
	wp_add_inline_script('wow-js', 'new WOW().init();');
}
add_action('wp_enqueue_scripts', 'enqueue_animate_css');