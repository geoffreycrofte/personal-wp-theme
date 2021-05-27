<?php
/**
 * Enqueue scripts and styles.
 */
function geoffreycrofte_scripts() {
	wp_enqueue_style( 'geoffreycrofte-style', get_stylesheet_uri(), array(), GEOFFREYCROFTE_VERSION );
	wp_style_add_data( 'geoffreycrofte-style', 'rtl', 'replace' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'geoffreycrofte-script', get_template_directory_uri() . '/assets/main.js', array(), true, GEOFFREYCROFTE_VERSION );
	
	wp_localize_script( 'geoffreycrofte-script', 'gct', array(
			'loadMoreButtonLabel' => __('Load more articles', 'geoffreycrofte'),
			'iconBook' => geoffrey_crofte_get_icon_def('book-open'),
			'iconLoader' => geoffrey_crofte_get_icon_def('loader'),
			'noMorePosts' => __( 'You just arrived at the end of this list, congratz I suppose 😁', 'geoffreycrofte' ),
			'errorOnMorePost' => sprintf( __( 'Something went wrong, sorry about that. Try to access %sthis page%s directly, or come back later. Server might be busy 😅', 'geoffreycrofte' ), '<a href="#next-page-link" class="next-page-link">', '</a>'),
		)
	);
}
add_action( 'wp_enqueue_scripts', 'geoffreycrofte_scripts' );