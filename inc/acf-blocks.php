<?php
/**
 * Adds Gutenberg content blocks through Advance Custom Fields Plugin
 *
 * See the full list of parameters at: https://www.advancedcustomfields.com/resources/acf_register_block_type/
 *
 * @package _s
 */

//add_filter( 'block_categories_all', '_s_block_categories', 10, 2 );

/**
 * Custom block category
 *
 * @param array $categories Categories array.
 *
 * @return array
 */
function _s_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => '_s',
				'title' => __( '_s', '_s' ),
			),
		),
		$categories
	);
}

/**
 * Register custom ACF blocks.
 */
function _s_register_acf_block_types() {
	// Text widths.
//	acf_register_block_type(
//		array(
//			'name'            => 'text_custom_width',
//			'title'           => __( 'Text Custom Width', '_s' ),
//			'description'     => __( 'Adjustable Width Text.', '_s' ),
//			'render_template' => 'template-parts/blocks/text-custom-width.php',
//			'category'        => '_s',
//			'icon'            => 'editor-paragraph',
//			'keywords'        => array( __( 'text', '_s' ) ),
//		)
//	);
}

// Check if function exists and hook into setup.
if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', '_s_register_acf_block_types' );
}

/**
 * Render an ACF block with your chosen properties in place
 * Allows you to use the block within PHP templates
 *
 * @param string $block_name Name of the block.
 * @param array  $props      Block properties array.
 */
function _s_render_acf_block( $block_name, $props = array() ) {
	if ( 'acf/' !== substr( $block_name, 0, 4 ) ) {
		$block_name = 'acf/' . $block_name;
	}

	acf_render_block(
		array_merge(
			array(
				'name' => $block_name,
			),
			$props
		)
	);
}

/**
 * Render the block default attributes.
 *
 * @param array  $block        The block array.
 * @param string $custom_class Custom classname.
 */
function _s_acf_block_attr( $block, $custom_class = '' ) {
	echo ' id="';
	_s_acf_block_id( $block );
	echo '" class="';
	_s_acf_block_class( $block, $custom_class );
	echo '"';
}

/**
 * Render the block ID attribute.
 *
 * @param array $block The block array.
 */
function _s_acf_block_id( $block ) {
	$prefix = str_replace( 'acf/', '', $block['name'] );
	$id     = $prefix . '_' . $block['id'];

	if ( ! empty( $block['anchor'] ) ) {
		$id = $block['anchor'];
	}

	echo esc_attr( $id );
}

/**
 * Render the block class attribute.
 *
 * @param array  $block        The block array.
 * @param string $custom_class Custom classname.
 */
function _s_acf_block_class( $block, $custom_class ) {
	$class = array_merge(
		array(
			str_replace( 'acf/', '', $block['name'] ),
			'row', // Bootstrap class.
		),
		explode( ' ', $custom_class )
	);

	if ( ! empty( $block['className'] ) ) {
		$class[] = $block['className'];
	}

	if ( ! empty( $block['align'] ) ) {
		$class[] = 'align' . $block['align'];
	}

	if ( ! empty( $block['align_content'] ) ) {
		$class[] = 'align-content-' . $block['align_content'];
	}

	echo esc_attr( implode( ' ', array_unique( $class ) ) );
}

/**
 * Get ACF field property.
 *
 * @param string $selector The ACF field selector.
 * @param string $property The property to return.
 * @param int    $group_id Setting Group ID.
 *
 * @return mixed
 */
function _s_acf_get_field_property( $selector, $property, $group_id = null ) {
	if ( null !== $group_id ) {
		$fields = acf_get_fields( $group_id );
		foreach ( $fields as $field_array ) {
			if ( $selector === $field_array['name'] ) {
				$field = $field_array;
				break;
			}
		}
	} else {
		$field = get_field_object( $selector );
	}

	if ( ! $field || ! is_array( $field ) ) {
		return '';
	}
	if ( empty( $field[ $property ] ) ) {
		return '';
	}

	return $field[ $property ];
}

