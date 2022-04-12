<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */

?>
	</div><?php // #content ?>

	<footer id="colophon" class="site-footer">
		<div class="site-info container">

			<?php if ( _s_menu_has_items( 'footer' ) ) : ?>
				<div class="col-12">
					<?php
					wp_nav_menu(
						array(
							'menu'        => 'footer',
							'depth'       => 1,
							'fallback_cb' => false,
							'container'   => false,
							'menu_class'  => 'nav footer-nav justify-content-center mb-3',
							'walker'      => new Theme_Simple_Walker(),
						)
					);
					?>
				</div>
			<?php endif; ?>

			<?php _s_copyright(); ?>
		</div>
	</footer>
</div><?php // #page ?>

<?php wp_footer(); ?>

<?php _s_custom_code( '_s_before_closing_body' ); ?>
</body>
</html>
