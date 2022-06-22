<?php
/**
 * Geoffrey Crofte functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Geoffrey_Crofte
 */

include_once('inc/colors.php');

if ( ! defined( 'GEOFFREYCROFTE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GEOFFREYCROFTE_VERSION', '1.0.0' );
}

if ( ! defined( 'GC_ASSETS' ) ) {
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
		add_theme_support( 'custom-line-height' );
		add_theme_support( 'custom-units', array('px', 'em', 'rem', 'vh', 'vw', 'ch') );

		// Set color palette for the editor.
		add_theme_support( 'editor-color-palette', geoffreycrofte_get_color_palette()  );  
	}
endif;
add_action( 'after_setup_theme', 'geoffreycrofte_setup' );

/**
 * Register CTP, Sidebar and Menus
 */

require get_template_directory() . '/inc/registers.php';
require get_template_directory() . '/inc/enqueues.php';

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
 * Widgets functions
 */
require get_template_directory() . '/inc/widgets/class-gc-widget-search.php';
require get_template_directory() . '/inc/widgets/class-gc-widget-categories.php';
require get_template_directory() . '/inc/widgets/class-gc-widget-ads.php';
require get_template_directory() . '/inc/widgets/class-gc-widget-recent-comments.php';
require get_template_directory() . '/inc/widgets/class-gc-widget-links.php';

if ( ! function_exists( 'gc_register_widgets' ) ) {
	function gc_register_widgets() {
		register_widget( 'GC_Widget_Search' );
		register_widget( 'GC_Widget_Categories' );
		register_widget( 'GC_Ads_Widget' );
		register_widget( 'GC_Widget_Recent_Comments' );
		register_widget( 'GC_Widget_Links' );
		//register_widget( 'Juiz_Newsletter_Widget' );
		//register_widget( 'Juiz_Categories_Widget' );
		//register_widget( 'Juiz_WP_Plugin_Widget' );
		//register_widget( 'Juiz_Video_Information_Widget' );
		
		add_filter( 'wp_list_categories', 'gc_wp_list_categories' );
	}
	add_action( 'widgets_init', 'gc_register_widgets' );

	function gc_wp_list_categories( $html ) {
		$post_text = get_locale() === 'fr_FR' ? 'articles' : 'posts';
		$html = preg_replace( '#\(([0-9]{1,})\)#', '<span>($1 ' . $post_text . ')</span>', $html );
		return $html;
	}
}
