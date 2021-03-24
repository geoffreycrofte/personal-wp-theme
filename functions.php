<?php
/**
 * Geoffrey Crofte functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geoffrey_Crofte
 */

if ( ! defined( 'GEOFFREYCROFTE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GEOFFREYCROFTE_VERSION', '1.0.0' );
}

if ( ! defined( 'GC_ASSETS' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GC_ASSETS', get_template_directory_uri() . '/assets/' );
}

if ( ! function_exists( 'geoffreycrofte_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function geoffreycrofte_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Geoffrey Crofte, use a find and replace
		 * to change 'geoffreycrofte' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'geoffreycrofte', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'geoffreycrofte' ),
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
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'geoffreycrofte_setup' );

/**
 * Register CTP, Sidebar and Menus
 */

require get_template_directory() . '/inc/registers.php';

/**
 * Enqueue scripts and styles.
 */
function geoffreycrofte_scripts() {
	wp_enqueue_style( 'geoffreycrofte-style', get_stylesheet_uri(), array(), GEOFFREYCROFTE_VERSION );
	wp_style_add_data( 'geoffreycrofte-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'geoffreycrofte_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Admin functions
 */
require get_template_directory() . '/inc/admin.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

