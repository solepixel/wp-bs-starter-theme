<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( 'THEME_VERSION' ) ) {
	define( 'THEME_VERSION', '1.0.0' );
}

/**
 * Theme Setup
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Theme Assets
 */
require get_template_directory() . '/inc/assets.php';

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Disable comments sitewide.
 */
//require get_template_directory() . '/inc/disable-comments.php';

/**
 * Sidebars/Widget Areas.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Bootstrap navwalker.
 */
require get_template_directory() . '/inc/class-theme-bootstrap-navwalker.php';

/**
 * Simple navwalker.
 */
require get_template_directory() . '/inc/class-theme-simple-walker.php';

/**
 * Bootstrap commentwalker.
 */
require get_template_directory() . '/inc/class-theme-bootstrap-comments-walker.php';

/**
 * ACF Gutenberg blocks
 */
if ( function_exists( 'acf_register_block_type' ) ) {
	require get_template_directory() . '/inc/acf-blocks.php';
}

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
