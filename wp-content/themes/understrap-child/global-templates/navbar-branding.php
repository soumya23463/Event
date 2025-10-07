<?php
/**
 * Navbar branding
 *
 * @package Understrap
 * @since 1.2.0
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Get site icon
$site_icon = get_site_icon_url();
$site_name = get_bloginfo('name');
$site_description = get_bloginfo('description');

if (!has_custom_logo()) { ?>

	<?php if (is_front_page() && is_home()) : ?>

		<h1 class="navbar-brand mb-0">
			<a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url" class="d-flex align-items-center text-decoration-none">
				<?php if ($site_icon) : ?>
					<img src="<?php echo esc_url($site_icon); ?>" alt="<?php echo esc_attr($site_name); ?>" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 5px;">
				<?php endif; ?>
				<div class="d-flex flex-column">
					<div>
						<span style="font-size: 1.8rem; font-weight: 700; color: #c79c6c;">Krishna</span>
						<span style="font-size: 1.8rem; font-weight: 300; color: #2c2c2c; margin-left: 5px;">Magical Events</span>
					</div>
					<?php if ($site_description) : ?>
						<small style="font-size: 0.8rem; color: #666; font-weight: 400;"><?php echo esc_html($site_description); ?></small>
					<?php endif; ?>
				</div>
			</a>
		</h1>

	<?php else : ?>

		<a class="navbar-brand d-flex align-items-center text-decoration-none" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
			<?php if ($site_icon) : ?>
				<img src="<?php echo esc_url($site_icon); ?>" alt="<?php echo esc_attr($site_name); ?>" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 5px;">
			<?php endif; ?>
			<div class="d-flex flex-column">
				<div>
					<span style="font-size: 1.8rem; font-weight: 700; color: #c79c6c;">Krishna</span>
					<span style="font-size: 1.8rem; font-weight: 300; color: #2c2c2c; margin-left: 5px;">Magical Events</span>
				</div>
				<?php if ($site_description) : ?>
					<small style="font-size: 0.8rem; color: #666; font-weight: 400;"><?php echo esc_html($site_description); ?></small>
				<?php endif; ?>
			</div>
		</a>

	<?php endif; ?>

	<?php
} else {
	?>
	<a class="navbar-brand d-flex align-items-center text-decoration-none" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url">
		<?php if ($site_icon) : ?>
			<img src="<?php echo esc_url($site_icon); ?>" alt="<?php echo esc_attr($site_name); ?>" style="width: 40px; height: 40px; margin-right: 10px; border-radius: 5px;">
		<?php endif; ?>
		<div class="d-flex flex-column">
			<?php the_custom_logo(); ?>
			<?php if ($site_description) : ?>
				<small style="font-size: 0.8rem; color: #666; font-weight: 400; margin-top: 2px;"><?php echo esc_html($site_description); ?></small>
			<?php endif; ?>
		</div>
	</a>
	<?php
}
