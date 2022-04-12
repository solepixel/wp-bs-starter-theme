/**
 * Automatically add custom classnames to editor blocks.
 *
 * @package _s
 */

/**
 * Convert a string to a slug.
 *
 * @param {string} str
 *
 * @returns {string}
 */
function slugify( str ) {
	str = str.toLowerCase()
		.replace( /^\s+|\s+$/g, '' )
		.replace( /<\/?[^>]+(>|$)/g, '' );

	// remove accents, swap ñ for n, etc
	let from = 'àáãäâèéëêìíïîòóöôùúüûñç',
		to = 'aaaaaeeeeiiiioooouuuunc',
		i = 0,
		l = from.length;

	for ( i = 0; i < l ; i++ ) {
		str = str.replace( new RegExp( from.charAt( i ), 'g' ), to.charAt( i ) );
	}

	str = str.replace( /[^a-z0-9 -]/g, '' ) // remove invalid chars
		.replace( /\s+/g, '-' ) // collapse whitespace and replace by -
		.replace( /-+/g, '-' ); // collapse dashes

	return str;
}

/**
 * Modifies core blocks to add classes
 *
 * @param props
 * @param blockType
 * @param attributes
 * @returns {{className}|*}
 */
const setExtraPropsToBlockType = ( props, blockType, attributes ) => {
	const clsPrefix = 'gutenberg-',
		clsBasename = blockType.name.replace( 'core/', '' ),
		elClass = 'undefined' !== typeof props.className && props.className ? props.className : '',
		classList = [ clsPrefix + clsBasename ];

	let elID = 'undefined' !== typeof props.id && props.id ? props.id : '';

	if ( elClass ) {
		classList.concat( elClass.split( ' ' ) );
	}

	if ( 'core/heading' === blockType.name ) {
		if ( 'undefined' !== typeof props.tagName ) {
			classList[ classList.length ] = clsPrefix + clsBasename + '-' + props.tagName;
		} else if ( 'undefined' !== typeof attributes.level ) {
			classList[ classList.length ] = clsPrefix + clsBasename + '-h' + attributes.level;
		}

		if ( ! elID && 'undefined' !== typeof attributes.content && attributes.content ) {
			elID = slugify( attributes.content );
		}

		return Object.assign( props, {
			id: elID,
			className: [ ...new Set( classList ) ].join( ' ' )
		});
	}

	return props;
};

if ( 'undefined' !== typeof wp.hooks ) {
	wp.hooks.addFilter(
		'blocks.getSaveContent.extraProps',
		'_s/block-filters',
		setExtraPropsToBlockType
	);
}
