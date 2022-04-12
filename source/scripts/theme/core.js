/**
 * Core JS
 *
 * @package _s
 */

var _s = window._s || {};

_s.Core = ( function( $ ) {

	'use strict';

	var init = function() {};

	// Expose any publicly accessible functions.
	return {
		init: init
	};

})( jQuery );

jQuery( window ).on( 'load', _s.Core.init );
