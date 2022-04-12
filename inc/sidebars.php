<?php
/**
 * Sidebars/Widget Areas
 *
 * @package _s
 */

add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
//	register_sidebar(
//		array(
//			'name'           => esc_html__( 'Sidebar', '_s' ),
//			'id'             => 'sidebar',
//			'description'    => esc_html__( 'Add widgets here.', '_s' ),
//			'before_widget'  => '<section id="%1$s" class="widget %2$s">',
//			'after_widget'   => '</section>',
//			'before_title'   => '<h2 class="widget-title">',
//			'after_title'    => '</h2>',
//			'before_sidebar' => '<aside class="%1$s">',
//			'after_sidebar'  => '</aside>',
//		)
//	);
}
