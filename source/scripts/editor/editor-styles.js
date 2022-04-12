/**
 * Custom editor styles.
 *
 * @package _s
 */

if ( 'undefined' === typeof wp.domReady ) {
	return
}

const { __ } = wp.i18n;

wp.domReady( () => {

	if ( 'undefined' === typeof wp.blocks ) {
		return;
	}

	wp.blocks.registerBlockStyle( 'core/group', [
		{
			name: 'section',
			label: __( 'Section', '_s' )
		}
	]);

});