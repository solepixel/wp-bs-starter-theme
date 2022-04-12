<?php
/**
 * Custom walker that only shows the menuitem's ID's (and active items get active classes), delevering clean menu code (in WordPress > 3.0)
 *
 * @package _s
 */

/**
 * Simple nav walker class.
 */
class Theme_Simple_Walker extends Walker_Nav_Menu {

	/**
	 * Start element.
	 *
	 * @param string           $output Passed by reference, output string.
	 * @param WP_Nav_Menu_Item $item Menu item object.
	 * @param int              $depth Depth of menu item.
	 * @param array            $args Arguments array.
	 * @param int              $id Current page ID.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';
		$value       = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$current_indicators = array( 'current-menu-item', 'current-menu-parent', 'current_page_item', 'current_page_parent' );

		$new_classes = array();

		foreach ( $classes as $el ) {
			// check if it's indicating the current page, otherwise we don't need the class.
			if ( in_array( $el, $current_indicators, true ) ) {
				array_push( $new_classes, $el );
			}
		}

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $new_classes ), $item ) );
		$class_names = ' class="nav-item ' . esc_attr( $class_names ) . '"';

		$output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
		$attributes .= ' class="nav-link"';

		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID );
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * Start level.
	 *
	 * @param string $output Passed by reference, level output.
	 * @param int    $depth Navigation depth level.
	 * @param array  $args Arguments array.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent  = str_repeat( "\t", $depth );
		$output .= "\n$indent<ul class=\"dropdown\">\n";
	}
}
