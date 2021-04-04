<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Geoffrey_Crofte
 */

if ( ! function_exists( 'geoffreycrofte_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function geoffreycrofte_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'geoffreycrofte' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'geoffreycrofte_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function geoffreycrofte_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'geoffreycrofte' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'geoffreycrofte_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function geoffreycrofte_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'geoffreycrofte' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'geoffreycrofte' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'geoffreycrofte' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'geoffreycrofte' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'geoffreycrofte' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'geoffreycrofte' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'geoffreycrofte_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function geoffreycrofte_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/**
 * SVG Sprite for icon
 */
function geoffrey_crofte_get_icon_def( $name, $title ){
	$title = isset( $title ) ? 'title="' . $title . '" tabindex="0"' : 'role="presentation" tabindex="-1"';

	$icons = array(
		'book-open' => '<path d="M2.667 4h8A5.333 5.333 0 0116 9.333V28a4 4 0 00-4-4H2.667V4zm26.666 0h-8A5.333 5.333 0 0016 9.333V28a4 4 0 014-4h9.333V4z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'trash' => '<path d="M4 8h24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path><path d="M10.667 8V5.333a2.667 2.667 0 012.666-2.666h5.334a2.667 2.667 0 012.666 2.666V8m4 0v18.667a2.667 2.667 0 01-2.666 2.666H9.333a2.667 2.667 0 01-2.666-2.666V8h18.666zm-12 6.667v8m5.334-8v8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',
	  
	  'alert-triangle' => '<path d="M13.72 5.147L2.427 24a2.667 2.667 0 002.28 4h22.586a2.666 2.666 0 002.28-4L18.28 5.147a2.667 2.667 0 00-4.56 0v0zM16 12v5.333m0 5.334h.013" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',
	  
	  'info' => '<path d="M16 29.333c7.364 0 13.333-5.97 13.333-13.333 0-7.364-5.97-13.333-13.333-13.333C8.636 2.667 2.667 8.637 2.667 16c0 7.364 5.97 13.333 13.333 13.333zm0-8V16m0-5.333h.013" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'bookmark' => '<path d="M25.333 28L16 21.333 6.667 28V6.667A2.667 2.667 0 019.333 4h13.334a2.667 2.667 0 012.666 2.667V28z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'tag' => '<path d="M27.453 18.88l-9.56 9.56a2.666 2.666 0 01-3.773 0L2.667 17V3.667H16L27.453 15.12a2.667 2.667 0 010 3.76v0z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M9.333 10.333h.014" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'eye' => '<path d="M1.333 16S6.667 5.333 16 5.333 30.667 16 30.667 16 25.333 26.667 16 26.667 1.333 16 1.333 16z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M16 20a4 4 0 100-8 4 4 0 000 8z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'download-cloud' => '<path d="M10.667 22.667L16 28l5.333-5.333M16 16v12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M27.84 24.12A6.666 6.666 0 0024 12h-1.68A10.666 10.666 0 104 21.72" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'download' => '<path d="M28 20v5.333A2.667 2.667 0 0125.333 28H6.667A2.667 2.667 0 014 25.333V20m5.333-6.667L16 20l6.667-6.667M16 20V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'folder' => '<path d="M29.333 25.333A2.667 2.667 0 0126.667 28H5.333a2.667 2.667 0 01-2.666-2.667V6.667A2.667 2.667 0 015.333 4H12l2.667 4h12a2.667 2.667 0 012.666 2.667v14.666z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'plus-circle' => '<path d="M16 29.333c7.364 0 13.333-5.97 13.333-13.333 0-7.364-5.97-13.333-13.333-13.333C8.636 2.667 2.667 8.637 2.667 16c0 7.364 5.97 13.333 13.333 13.333zm0-18.666v10.666M10.667 16h10.666" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'loader' => '<path d="M16 2.667V8m0 16v5.333M6.573 6.573l3.774 3.774m11.306 11.306l3.774 3.774M2.667 16H8m16 0h5.333m-22.76 9.427l3.774-3.774m11.306-11.306l3.774-3.774" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>',

	  'read' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M27.296 25.091H4.573a.852.852 0 100 1.703h22.723a.85.85 0 100-1.703zM4.573 20.166h14.501a.85.85 0 100-1.702H4.573a.852.852 0 100 1.702zm0-6.626h22.723a.85.85 0 100-1.703H4.573a.852.852 0 100 1.703zm-.852-7.48c0-.47.38-.852.852-.852h14.501a.852.852 0 110 1.703H4.573a.85.85 0 01-.852-.85z" fill="currentColor"></path>',

	  'marker' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M15.997 16.357c-1.653 0-3-1.346-3-3 0-1.653 1.347-3 3-3 1.654 0 3 1.347 3 3 0 1.654-1.346 3-3 3zm0-7.499c-2.48 0-4.5 2.019-4.5 4.5 0 2.48 2.02 4.5 4.5 4.5s4.5-2.02 4.5-4.5c0-2.481-2.02-4.5-4.5-4.5zm6.792 11.645l-6.792 6.792-6.792-6.792c-3.744-3.744-3.744-9.838 0-13.582a9.57 9.57 0 016.792-2.81c2.46 0 4.92.937 6.792 2.81 3.745 3.744 3.745 9.838 0 13.582zM23.85 5.86c-4.33-4.33-11.375-4.33-15.706 0-4.328 4.33-4.328 11.376 0 15.705l7.323 7.322c.146.148.339.22.53.22a.743.743 0 00.53-.22l7.323-7.322c4.328-4.33 4.328-11.375 0-15.705z" fill="currentColor"></path>',

	  'certified' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M20.129 9.938a.736.736 0 010 1.04l-4.895 4.895a.735.735 0 01-1.041 0l-2.197-2.197a.736.736 0 111.041-1.04l1.675 1.676 4.375-4.374a.737.737 0 011.042 0zm-.263 10.467a.725.725 0 00-.235.118 8.388 8.388 0 01-3.625.819 8.386 8.386 0 01-3.624-.82.739.739 0 00-.234-.117 8.442 8.442 0 01-4.576-7.499c0-4.65 3.783-8.435 8.434-8.435 4.652 0 8.436 3.784 8.436 8.435a8.442 8.442 0 01-4.576 7.499zm-.532 6.516l-2.932-1.874a.74.74 0 00-.792 0l-2.93 1.873v-4.684a9.875 9.875 0 003.327.575 9.874 9.874 0 003.328-.575v4.684zm6.58-14.015C25.914 7.443 21.469 3 16.006 3 10.543 3 6.1 7.443 6.1 12.906c0 3.722 2.064 6.971 5.107 8.664v6.694a.74.74 0 00.383.646.74.74 0 00.749-.025l3.667-2.344 3.667 2.344a.736.736 0 001.132-.621V21.57c3.044-1.693 5.109-4.942 5.109-8.664z" fill="currentColor"></path>',

	  'help' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M24.658 23.621l-4.181-4.183a5.605 5.605 0 001.165-3.436c0-1.26-.41-2.457-1.165-3.437l4.181-4.183c3.826 4.344 3.826 10.896 0 15.24zm-16.277 1.04l4.182-4.183A5.593 5.593 0 0016 21.646a5.59 5.59 0 003.436-1.168l4.183 4.184c-4.342 3.824-10.895 3.824-15.238 0zM7.341 8.384l4.18 4.182a5.605 5.605 0 00-1.165 3.437c0 1.259.41 2.456 1.165 3.436l-4.18 4.182c-3.824-4.342-3.824-10.894 0-15.237zm12.83 7.619a4.14 4.14 0 01-1.223 2.95c-1.574 1.575-4.323 1.576-5.898-.002a4.135 4.135 0 01-1.222-2.948 4.14 4.14 0 011.222-2.95A4.145 4.145 0 0116 11.83a4.14 4.14 0 012.95 1.223 4.14 4.14 0 011.221 2.949zM16 4.474c2.724 0 5.447.957 7.618 2.868l-4.182 4.184A5.59 5.59 0 0016 10.358a5.6 5.6 0 00-3.437 1.166L8.38 7.342A11.508 11.508 0 0116 4.474zm9.196 2.332c-5.071-5.074-13.323-5.075-18.394 0-5.07 5.07-5.07 13.32 0 18.392A12.963 12.963 0 0016 29.003c3.33 0 6.66-1.268 9.196-3.805 5.072-5.071 5.072-13.321 0-18.392z" fill="currentColor"></path>',

	  'time-clock' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M20.242 19.202a.736.736 0 01-1.04 1.04L15.48 16.52a.73.73 0 01-.216-.519V7.636a.735.735 0 011.472 0v8.059l3.506 3.507zM16 27.528C9.642 27.528 4.472 22.357 4.472 16 4.472 9.642 9.642 4.47 16 4.47c6.358 0 11.528 5.172 11.528 11.53 0 6.357-5.17 11.528-11.528 11.528zM16 3C8.832 3 3 8.832 3 16c0 7.167 5.832 12.999 13 12.999S29 23.167 29 16c0-7.168-5.832-13-13-13z" fill="currentColor"></path>',

	  'fav-star' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M23.166 18.463a2.087 2.087 0 00-.543 1.67l.732 6.13a.609.609 0 01-.252.574.61.61 0 01-.623.061l-5.602-2.59a2.084 2.084 0 00-1.756 0l-5.603 2.59a.609.609 0 01-.623-.06.611.611 0 01-.252-.576l.734-6.13a2.095 2.095 0 00-.543-1.669L4.64 13.936a.608.608 0 01-.136-.614.608.608 0 01.468-.415l6.057-1.197a2.086 2.086 0 001.42-1.031l3.009-5.391a.608.608 0 01.54-.316c.11 0 .382.03.543.316l3.009 5.39c.3.536.817.913 1.42 1.032l6.055 1.198a.602.602 0 01.469.415.605.605 0 01-.135.613l-4.194 4.527zm5.274-3.527a2.069 2.069 0 00.455-2.067 2.067 2.067 0 00-1.583-1.406l-6.056-1.196a.624.624 0 01-.421-.306l-3.01-5.39A2.067 2.067 0 0016 3.5c-.768 0-1.45.4-1.825 1.07l-3.01 5.391a.624.624 0 01-.421.306l-6.055 1.196a2.065 2.065 0 00-1.584 1.406 2.066 2.066 0 00.455 2.067l4.197 4.528a.62.62 0 01.16.494l-.733 6.13c-.09.763.224 1.489.847 1.94a2.072 2.072 0 002.106.206l5.603-2.592a.621.621 0 01.52 0l5.604 2.592a2.066 2.066 0 002.104-.206c.623-.451.94-1.177.849-1.94l-.734-6.129a.614.614 0 01.162-.495l4.195-4.528z" fill="currentColor"></path>',

	  'heart-like' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M25.642 16.777l-9.294 9.294a.493.493 0 01-.696 0l-9.294-9.294a6.41 6.41 0 01-1.888-4.56 6.41 6.41 0 011.888-4.56 6.433 6.433 0 014.561-1.887c1.652 0 3.303.63 4.561 1.887a.736.736 0 001.04 0 6.458 6.458 0 019.122 0 6.405 6.405 0 011.887 4.56c0 1.723-.67 3.343-1.887 4.56zm1.04-10.162c-2.919-2.919-7.572-3.078-10.681-.475-3.11-2.603-7.762-2.444-10.682.475A7.867 7.867 0 003 12.217c0 2.115.823 4.105 2.32 5.601l9.293 9.294c.382.383.885.574 1.388.574.502 0 1.004-.191 1.387-.574l9.294-9.294A7.869 7.869 0 0029 12.217a7.869 7.869 0 00-2.318-5.602z" fill="currentColor"></path>',

	  'play' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M4.15 15.992c0-6.529 5.312-11.841 11.841-11.841 6.53 0 11.843 5.312 11.843 11.841 0 6.53-5.312 11.842-11.843 11.842-6.529 0-11.841-5.312-11.841-11.841zm25.195 0c0-7.363-5.99-13.353-13.354-13.353C8.63 2.64 2.64 8.63 2.64 15.993c0 7.363 5.99 13.353 13.352 13.353 7.364 0 13.354-5.99 13.354-13.354zm-15.468 4.213l.108-8.483 6.18 4.253-6.288 4.23zm7.14-2.906c.864-.59.864-2.023 0-2.613l-6.18-4.212a1.578 1.578 0 00-2.47 1.306v8.425a1.578 1.578 0 002.47 1.307l6.18-4.213z" fill="currentColor"></path>',

	  'cart' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M24.807 24.99a1.563 1.563 0 11-3.126.002 1.563 1.563 0 013.126-.002zm-7.677 0a1.564 1.564 0 11-3.129 0 1.564 1.564 0 013.129 0zm10.372-12.804l-2.101 6.259a2.703 2.703 0 01-2.565 1.844h-7.413c-1.151 0-2.18-.73-2.556-1.817l-2.42-6.966h16.567a.514.514 0 01.488.68zm1.123-1.326a1.99 1.99 0 00-1.611-.826H9.936L8.909 7.088A2.458 2.458 0 006.59 5.44H3.735a.735.735 0 000 1.472H6.59c.418 0 .792.266.93.66l1.192 3.424.01.032 2.756 7.927a4.178 4.178 0 003.945 2.806h7.413a4.173 4.173 0 003.96-2.848l2.102-6.26c.202-.605.1-1.276-.273-1.793z" fill="currentColor"></path>',

	  'calendar' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M20.998 22.508a1.696 1.696 0 113.393.001 1.696 1.696 0 01-3.393 0zm-6.694 0a1.696 1.696 0 113.393.001 1.696 1.696 0 01-3.393 0zm-6.692 0a1.695 1.695 0 113.39 0 1.695 1.695 0 01-3.39 0zm13.386-5.531a1.696 1.696 0 113.393 0 1.696 1.696 0 01-3.393 0zm-6.694 0a1.696 1.696 0 113.393 0 1.696 1.696 0 01-3.393 0zm-6.692 0a1.695 1.695 0 113.39 0 1.695 1.695 0 01-3.39 0zm19.762-6.582H4.628V7.963c0-1.204.98-2.185 2.185-2.185h1.561v.936a.815.815 0 001.63 0v-.936H22v.936a.813.813 0 101.626 0v-.936h1.561c1.206 0 2.187.98 2.187 2.185v2.432zm0 15.49a2.19 2.19 0 01-2.187 2.187H6.813a2.188 2.188 0 01-2.185-2.186V12.023h22.746v13.863zM25.187 4.15h-1.561V3.114a.812.812 0 10-1.627 0V4.15H10.004V3.114a.814.814 0 10-1.629 0V4.15H6.813A3.817 3.817 0 003 7.963v17.923A3.818 3.818 0 006.813 29.7h18.374A3.817 3.817 0 0029 25.886V7.963a3.816 3.816 0 00-3.813-3.813z" fill="currentColor"></path>',

	  'graph-level' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M25.414 23.237h-3.138v-7.172c0-.248.2-.45.448-.45h2.241a.45.45 0 01.449.45v7.172zm-7.845 0H14.43V9.34c0-.247.2-.449.448-.449h2.242a.45.45 0 01.448.45v13.896zm-7.845 0H6.586v-8.293c0-.248.2-.45.449-.45h2.24a.45.45 0 01.45.45v8.293zm18.604 0h-1.57v-7.172c0-.99-.804-1.794-1.793-1.794h-2.24c-.99 0-1.794.804-1.794 1.794v7.172h-2.017V9.34c0-.99-.805-1.793-1.793-1.793h-2.242c-.988 0-1.793.804-1.793 1.793v13.897H11.07v-8.293c0-.99-.805-1.793-1.793-1.793H7.034c-.988 0-1.793.803-1.793 1.793v8.293H3.672a.672.672 0 100 1.344h24.656a.672.672 0 100-1.344z" fill="currentColor"></path>',

	  'basket' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M20.384 22.72l.896-5.978a.672.672 0 111.33.2l-.895 5.978a.672.672 0 01-1.33-.2zm-3.224.061v-5.9a.673.673 0 111.345 0v5.9a.671.671 0 11-1.345 0zm-3.665 0v-5.9a.672.672 0 111.345 0v5.9a.672.672 0 01-1.345 0zm-4.105-5.84a.672.672 0 111.33-.199l.896 5.979a.674.674 0 01-1.33.2l-.896-5.98zm14.688 7.402a1.951 1.951 0 01-1.913 1.577H9.833a1.951 1.951 0 01-1.913-1.578l-2.054-10.6h20.266l-2.054 10.6zm4.25-11.946h-4.224L21.702 5.19a.673.673 0 00-1.276.426l2.26 6.781H9.324l2.26-6.781a.672.672 0 10-1.275-.426l-2.403 7.207H3.673a.671.671 0 100 1.345h.823L6.6 24.599a3.297 3.297 0 003.233 2.666h12.332a3.297 3.297 0 003.233-2.666l2.104-10.857h.826a.673.673 0 000-1.345z" fill="currentColor"></path>',

	  'chat-bubble' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M23.029 13.78a1.556 1.556 0 11-3.111 0 1.556 1.556 0 013.111 0zm-5.472 0a1.556 1.556 0 11-3.112 0 1.556 1.556 0 013.112 0zm-5.474 0a1.556 1.556 0 11-3.111 0 1.556 1.556 0 013.111 0zm12.966 6.13a8.201 8.201 0 01-1.74 1.326c-.682.388-1.09 1.064-1.09 1.81v2.943l-4.037-3.011a2.034 2.034 0 00-1.45-.602H12.93c-4.665 0-8.46-3.789-8.46-8.446 0-2.265.876-4.388 2.466-5.976a8.468 8.468 0 015.994-2.482h5.756c2.4 0 4.75.998 6.447 2.74 1.6 1.642 2.449 3.755 2.392 5.948a8.363 8.363 0 01-2.477 5.75zm1.14-12.725C24.216 5.16 21.483 4 18.686 4H12.93A9.93 9.93 0 005.9 6.912 9.85 9.85 0 003 13.93c0 5.468 4.454 9.916 9.93 9.916h3.801c.155 0 .3.06.49.24l4.74 3.537a1.01 1.01 0 001.105.22 1.01 1.01 0 00.625-.935v-3.864c0-.208.129-.407.346-.53a9.658 9.658 0 002.05-1.563 9.83 9.83 0 002.91-6.754c.067-2.593-.93-5.085-2.809-7.013z" fill="currentColor"></path>',

	  'map-plan' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M20.773 14.467v6.132a.736.736 0 11-1.471 0v-6.132a.735.735 0 111.471 0zM12.597 11.4v6.132a.735.735 0 11-1.472 0V11.4a.736.736 0 111.472 0zm14.931 9.885a.49.49 0 01-.231.415l-6.952 4.313a.487.487 0 01-.516 0l-6.934-4.273a1.948 1.948 0 00-2.068.006l-5.605 3.496a.476.476 0 01-.496.013.48.48 0 01-.254-.43V10.711a.49.49 0 01.231-.415l6.903-4.307a.49.49 0 01.516-.002l6.935 4.273a1.951 1.951 0 002.065-.002l5.658-3.509a.481.481 0 01.497-.012.48.48 0 01.251.429v14.12zm.464-15.836a1.934 1.934 0 00-1.988.048l-5.659 3.509c-.16.1-.355.1-.516.001l-6.934-4.274a1.947 1.947 0 00-2.068.006L3.925 9.047A1.95 1.95 0 003 10.711v14.115c0 .724.378 1.367 1.012 1.717a1.937 1.937 0 001.99-.051l5.604-3.498a.49.49 0 01.516-.001l6.936 4.274a1.961 1.961 0 002.064-.004l6.95-4.31c.58-.36.928-.983.928-1.667V7.166a1.94 1.94 0 00-1.008-1.716z" fill="currentColor"></path>',

	  'mail' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M25.183 11.367c.237.33.162.79-.169 1.026l-7.846 5.635a1.963 1.963 0 01-2.284.005l-7.897-5.638a.737.737 0 01-.171-1.027.734.734 0 011.026-.17l7.896 5.636c.17.122.4.123.572 0l7.847-5.635a.733.733 0 011.026.168zm2.346 10.586a1.72 1.72 0 01-1.717 1.719H6.19a1.72 1.72 0 01-1.717-1.719V9.69c0-.947.77-1.717 1.717-1.717h19.623c.946 0 1.717.77 1.717 1.717v12.264zM25.812 6.5H6.19A3.193 3.193 0 003 9.689v12.265a3.192 3.192 0 003.189 3.188h19.623A3.192 3.192 0 0029 21.954V9.689A3.192 3.192 0 0025.812 6.5z" fill="currentColor"></path>',

	  'arrow-right' => '<path fill-rule="evenodd" clip-rule="evenodd" d="M28.764 15.44l-8.041-7.88a.818.818 0 00-1.138 0 .778.778 0 000 1.115l6.677 6.54H3.805a.796.796 0 00-.805.789c0 .435.36.788.805.788h22.441l-6.661 6.526a.778.778 0 000 1.115.82.82 0 001.137 0l8.042-7.88a.776.776 0 000-1.114" fill="currentColor"></path>',
	);

	if ( isset( $name ) && isset( $icons[ $name ] ) ) {
		return '<svg ' . $title . ' fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" id="icon-' . esc_attr( $name ) . '">' . $icons[ $name ] . '</svg>';
	} else if ( isset( $name ) && ! isset( $icons[ $name ] ) ) {
		return 'This icon name does’nt exist.';
	} else {
		return $icons;
	}
}

function get_icon( $name = null, $title = null ) {
	echo geoffrey_crofte_get_icon_def( $name, $title );
}
