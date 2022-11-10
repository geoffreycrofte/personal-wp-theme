<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="section comments-area">
	<div class="container">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$geoffreycrofte_comment_count = get_comments_number();
			if ( '1' === $geoffreycrofte_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on %1$s&ldquo;%2$s&rdquo;%3$s', 'geoffreycrofte' ),
					'<span>',
					wp_kses_post( get_the_title() ),
					'</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on %2%s&ldquo;%3$s&rdquo;%4$s', '%1$s thoughts on %2$s&ldquo;%3$s&rdquo;%4$s', $geoffreycrofte_comment_count, 'comments title', 'geoffreycrofte' ) ),
					number_format_i18n( $geoffreycrofte_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>',
					wp_kses_post( get_the_title() ),
					'</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'type'       => 'comment', //pingback
					'style'      => 'ol',
					'short_ping' => true,
					'max_depth'  => 3,
					'per_page'   => -1,
					'avatar_size'=> 64,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments">
				<?php esc_html_e( 'Comments are closed.', 'geoffreycrofte' ); ?>
			</p>
			<?php
		endif;

	else:
	?>
		<h2 class="comment-title no-comments">
			<?php esc_html_e( 'No comment, be the first to give your thought!', 'geoffreycrofte' ); ?>
		</h2>
	<?php

	endif; // Check for have_comments().

	comment_form();
	?>
	</div>
</section><!-- #comments -->
