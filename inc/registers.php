<?php
/**
 * All the registration of services for WordPress.
 *
 * @package Geoffrey_Crofte
 */

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function geoffreycrofte_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'geoffreycrofte_content_width', 720 );
}
add_action( 'after_setup_theme', 'geoffreycrofte_content_width', 0 );

/**
 * Register widget area.
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function geoffreycrofte_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'geoffreycrofte' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'geoffreycrofte' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'geoffreycrofte_widgets_init' );

/**
 * Custom Post Type Portfolio
 */
add_action( 'init', 'geoffreycrofte_register_post_type_portfolio' );
function geoffreycrofte_register_post_type_portfolio() {
	$args = [
		'label'  => esc_html__( 'Portfolio', 'geoffreycrofte' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Portfolio', 'geoffreycrofte' ),
			'name_admin_bar'     => esc_html__( 'Portfolio', 'geoffreycrofte' ),
			'add_new'            => esc_html__( 'Add a Use Case', 'geoffreycrofte' ),
			'add_new_item'       => esc_html__( 'Add new Use Case', 'geoffreycrofte' ),
			'new_item'           => esc_html__( 'New Use Case', 'geoffreycrofte' ),
			'edit_item'          => esc_html__( 'Edit Use Case', 'geoffreycrofte' ),
			'view_item'          => esc_html__( 'View Use Case', 'geoffreycrofte' ),
			'update_item'        => esc_html__( 'View Use Case', 'geoffreycrofte' ),
			'all_items'          => esc_html__( 'All Use Cases', 'geoffreycrofte' ),
			'search_items'       => esc_html__( 'Search Portfolio', 'geoffreycrofte' ),
			'parent_item_colon'  => esc_html__( 'Parent Use Case', 'geoffreycrofte' ),
			'not_found'          => esc_html__( 'No Use Cases found', 'geoffreycrofte' ),
			'not_found_in_trash' => esc_html__( 'No Use Cases found in Trash', 'geoffreycrofte' ),
			'name'               => esc_html__( 'Portfolio', 'geoffreycrofte' ),
			'singular_name'      => esc_html__( 'Portfolio', 'geoffreycrofte' ),
		],
		'public'              => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'supports' => [
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'custom-fields',
		],
		'rewrite' => [
			'slug' => 'portfolio',
			'with_front' => false,
		]
	];

	register_post_type( 'portfolio', $args );
}
