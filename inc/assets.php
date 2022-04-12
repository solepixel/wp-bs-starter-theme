<?php
/**
 * Theme Assets
 *
 * @package _s
 */

add_action( 'wp_enqueue_scripts', '_s_assets' );

/**
 * Enqueue scripts and styles.
 */
function _s_assets() {
	$stylesheet = get_stylesheet_uri();
	$debug      = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	$ver        = $debug ? gmdate( 'YmdHis' ) : THEME_VERSION;
	if ( ! $debug ) {
		$stylesheet = str_replace( '.css', '.min.css', $stylesheet );
	}
	wp_enqueue_style( '_s-style', $stylesheet, array(), $ver );

	wp_register_script( '_s-lazy-of', get_template_directory_uri() . '/assets/js/plugins/object-fit/ls.object-fit.min.js', array(), $ver, false );

	/**
	 * Lazysizes unveil hooks
	 * Uncomment to use lazy loading background images by adding a class of "lazyload" and data-bg="/path/to/image.jpg"
	Be sure to add '_s-lazy-uh' to the dependencies for '_s-lazy'
	 */
	//wp_register_script( '_s-lazy-uh', get_template_directory_uri() . '/assets/js/plugins/unveilhooks/ls.unveilhooks.min.js', array(), $ver, false );

	wp_enqueue_script( '_s-lazy', get_template_directory_uri() . '/assets/js/lazysizes.min.js', array( '_s-lazy-of' ), $ver, false );

	wp_register_script( '_s-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), $ver, true );

	wp_register_script( '_s-script', get_template_directory_uri() . '/assets/js/theme.min.js', array( 'jquery', '_s-bootstrap' ), $ver, true );

	$ajax_url = admin_url( 'admin-ajax.php' );

	wp_localize_script(
		'_s-script',
		'themeVars',
		array(
			'ajaxURL' => $ajax_url,
		)
	);

	wp_enqueue_script( '_s-script' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'after_setup_theme', '_s_load_editor_style' );

/**
 * Editor stylesheet
 */
function _s_load_editor_style() {
	if ( file_exists( get_template_directory() . '/assets/css/editor.min.css' ) ) {
		add_editor_style( get_template_directory_uri() . '/assets/css/editor.min.css' );
	}
}

add_action( 'enqueue_block_editor_assets', '_s_editor_enqueue' );

/**
 * Editor script
 */
function _s_editor_enqueue() {
	if ( file_exists( get_template_directory() . '/assets/js/editor.min.js' ) ) {
		wp_enqueue_script( '_s-editor', get_template_directory_uri() . '/assets/js/editor.min.js', array(), THEME_VERSION, true );
	}
}

add_action( 'admin_enqueue_scripts', '_s_admin_assets' );

/**
 * Enqueue admin scripts and styles.
 */
function _s_admin_assets() {
	if ( file_exists( get_template_directory() . '/assets/css/admin.min.css' ) ) {
		wp_enqueue_style( '_s-admin-style', get_template_directory_uri() . '/assets/css/admin.min.css', array(), THEME_VERSION );
	}

	if ( file_exists( get_template_directory() . '/assets/js/admin.min.js' ) ) {
		wp_enqueue_script( '_s-admin-script', get_template_directory_uri() . '/assets/js/admin.min.js', array( 'jquery' ), THEME_VERSION, true );
	}
}

add_filter( 'body_class', '_s_body_classes' );

/**
 * Add theme body classes
 *
 * @param array $body_classes Body classes array.
 *
 * @return array
 */
function _s_body_classes( $body_classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$body_classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar' ) ) {
		$body_classes[] = 'no-sidebar';
	}

	if ( is_page() ) {
		$page_obj       = get_queried_object();
		$body_classes[] = 'pagename-' . $page_obj->post_name;
	}

	return $body_classes;
}

add_filter( 'admin_body_class', '_s_admin_body_classes' );

/**
 * Add custom classes to WP Admin body.
 *
 * @param string $classes List of classes.
 *
 * @return string
 */
function _s_admin_body_classes( $classes ) {
	$post_id = ! empty( $_GET['post'] ) ? (int) sanitize_text_field( $_GET['post'] ) : false;

	if ( ! $post_id ) {
		return $classes;
	}

	$frontpage_id = get_option( 'page_on_front' );

	if ( $post_id === (int) $frontpage_id ) {
		$classes .= ' theme-front-page';
	} elseif ( is_page( $post_id ) ) {
		$page = get_post( $post_id );
		if ( $page ) {
			$classes .= ' pagename-' . $page->post_name;
		}
	}

	return $classes;
}

add_filter( 'block_editor_settings_all', '_s_remove_editor_inline_styles' );

/**
 * Adjust Gutenberg settings.
 *
 * @param array $settings Editor settings array.
 *
 * @return array
 */
function _s_remove_editor_inline_styles( $settings ) {
	// Disable inline CSS (font family) and pre-defined classes.
	if ( isset( $settings['styles'] ) && ! empty( $settings['styles'] ) ) {
		$settings['styles'] = array();
	}

	return $settings;
}
