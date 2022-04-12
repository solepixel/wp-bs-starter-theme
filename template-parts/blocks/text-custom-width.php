<?php
/**
 * This is an example block output.
 * First, register the block in /inc/acf-blocks.php
 * Register your fields in ACF and assign a field group to the block.
 * Then add the output here as usual.
 *
 * $post_id can be used for the ID of the current post.
 * $block['id'] can be used as a unique identifier for a block instance for ID/JavaScript.
 *
 * @package _s
 */

$block_width = get_field( '_s_block_width' );
$content     = get_field( '_s_content' );

if ( ! $content ) :
	if ( is_admin() ) {
		printf( '<p style="text-align:center;">%s</p>', esc_html__( 'Nothing to display.', '_s' ) );
	}
	return;
endif;
?>
<div<?php _s_acf_block_attr( $block, 'col-md-' . $block_width ); ?>>
	<div class="block-inside">
		<?php echo wp_kses_post( $content ); ?>
	</div>
</div>
