<?php
/**
 * Theme Setup
 *
 * @package _s
 */

add_action( 'after_setup_theme', '_s_setup' );

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Gutenberg
		 *
		 * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/
		 */
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-styles' );
		//add_theme_support( 'dark-editor-style' );
		//add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => __( 'White', '_s' ),
					'slug'  => 'white',
					'color' => '#ffffff',
				),
				array(
					'name'  => __( 'Black', '_s' ),
					'slug'  => 'black',
					'color' => '#000000',
				),
				array(
					'name'  => __( 'Blue', '_s' ),
					'slug'  => 'blue',
					'color' => '#007bff',
				),
				array(
					'name'  => __( 'Indigo', '_s' ),
					'slug'  => 'indigo',
					'color' => '#6610f2',
				),
				array(
					'name'  => __( 'Purple', '_s' ),
					'slug'  => 'purple',
					'color' => '#6f42c1',
				),
				array(
					'name'  => __( 'Pink', '_s' ),
					'slug'  => 'pink',
					'color' => '#e83e8c',
				),
				array(
					'name'  => __( 'Red', '_s' ),
					'slug'  => 'red',
					'color' => '#dc3545',
				),
				array(
					'name'  => __( 'Orange', '_s' ),
					'slug'  => 'orange',
					'color' => '#fd7e14',
				),
				array(
					'name'  => __( 'Yellow', '_s' ),
					'slug'  => 'yellow',
					'color' => '#ffc107',
				),
				array(
					'name'  => __( 'Green', '_s' ),
					'slug'  => 'green',
					'color' => '#28a745',
				),
				array(
					'name'  => __( 'Teal', '_s' ),
					'slug'  => 'teal',
					'color' => '#20c997',
				),
				array(
					'name'  => __( 'Cyan', '_s' ),
					'slug'  => 'cyan',
					'color' => '#17a2b8',
				),
			)
		);

		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name' => __( 'Small', '_s' ),
					'size' => 12,
					'slug' => 'small',
				),
				array(
					'name' => __( 'Normal', '_s' ),
					'size' => 16,
					'slug' => 'normal',
				),
				array(
					'name' => __( 'Large', '_s' ),
					'size' => 36,
					'slug' => 'large',
				),
				array(
					'name' => __( 'Huge', '_s' ),
					'size' => 50,
					'slug' => 'huge',
				),
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', '_s' ),
				'footer'  => esc_html__( 'Footer', '_s' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Set up the WordPress core custom background feature.
		/*
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		*/

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;

add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 1920 );
}
