<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! has_custom_logo() ) { ?>

	<?php if ( is_front_page() && is_home() ) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url" class="d-flex align-items-center text-decoration-none">
				<span style="font-size: 1.8rem; font-weight: 700; color: #c79c6c;">Krishna</span>
				<span style="font-size: 1.8rem; font-weight: 300; color: #2c2c2c; margin-left: 5px;">Events</span>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand d-flex align-items-center text-decoration-none" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
			<span style="font-size: 1.8rem; font-weight: 700; color: #c79c6c;">Krishna</span>
			<span style="font-size: 1.8rem; font-weight: 300; color: #2c2c2c; margin-left: 5px;">Events</span>
		</a>

	<?php endif; ?>

	<?php
} else {
	the_custom_logo();
}
