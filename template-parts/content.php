<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-header entry-header section pt-16 pb-40">
		
		<h1 class="section-title entry-title"><?php single_post_title(); ?></h1>

		<?php if ( 'post' === get_post_type() ) { ?>

		<dl class="post-meta">
			<dt class="post-meta-name">
				<?php get_icon( 'calendar', __( 'Written on', 'geoffreycrofte' ) ); ?>
			</dt>
			<dd class="post-meta-value">
				<?php geoffreycrofte_posted_on(); ?>
			</dd>

			<?php if ( isset( $_GET['preview'] ) && $_GET['preview'] == true ) { ?>
				
			<dt class="post-meta-name">
				<?php get_icon( 'eye', __( 'Number of views', 'geoffreycrofte' ) ); ?>
			</dt>
			<dd class="post-meta-value">
				<?php echo __('Preview mode', 'geoffreycrofte' ); ?>
			</dd>
			
			<?php } elseif ( shortcode_exists('juiz_post_view') ) { ?>
			
			<dt class="post-meta-name">
				<?php get_icon( 'eye', __( 'Number of views', 'geoffreycrofte' ) ); ?>
			</dt>
			<dd class="post-meta-value">
				<?php printf( __( '%s readings', 'juiz' ), do_shortcode( '[juiz_post_view]' ) ); ?>
			</dd>
			
			<?php } ?>

			<?php if ( comments_open() || get_comments_number() ) { ?>

			<dt class="post-meta-name">
				<?php get_icon('chat-bubble', __( 'Comments', 'geoffreycrofte' ) ); ?>
			</dt>
			<dd class="post-meta-value">

				<?php $nb_comments = (int) get_comments_number(); ?>

				<a href="<?php comments_link(); ?>"><?php printf(
					/* translators: %s: post title */
					_n( '%s comment', '%s comments', $nb_comments, 'geoffreycrofte' ),
					number_format_i18n( $nb_comments )
				); ?></a>

			</dd>

			<?php } ?>

		</dl>

		<?php } ?>

		<svg class="wave" preserveAspectRatio="none" width="1679" height="322" viewBox="0 0 1679 322" fill="none" xmlns="http://www.w3.org/2000/svg" role="presentation" tabindex="-1" role="presentation" tabindex="-1"><path d="M758 114.5C972 189.999 1284.5 215 1679 0V321.5H-5V92C252.5 27 544 39.0006 758 114.5Z" fill="#F8F6FA"/></svg>
	</header>

	<?php geoffreycrofte_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'geoffreycrofte' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'geoffreycrofte' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php geoffreycrofte_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
