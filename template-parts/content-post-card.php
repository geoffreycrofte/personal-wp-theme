<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

?>

<li id="list-item-<?php the_ID(); ?>" class="card-item">
	<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?>>
		<div class="card-image">
			<?php echo /*get_the_post_thumbnail()*/geoffreycrofte_post_thumbnail(); ?>
		</div>
		<div class="card-content">
			<header class="entry-header">
				<h1 class="entry-title">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php echo get_the_title() ?>
					</a>
				</h1>
			</header>

			<div class="card-description entry-content">
				<?php echo get_the_excerpt(); ?>
			</div>

			<p class="card-cta">
				<a class="button-primary" href="<?php echo get_the_permalink(); ?>">
					<?php get_icon('read'); ?>

					<span>
						<?php
							printf( 
							_x( 'Read this post %sabout%s', 'Blog Post Lists' , 'geoffreycrofte' ),
							'<span class="screen-reader-text">',
							' "' . esc_html( get_the_title() ) . '"</span>' );
						?>
					</span>
				</a>	
			</p>

			<dl class="card-meta">
				<dt class="card-meta-name">
					<?php get_icon('calendar', __( 'Written on', 'geoffreycrofte' ) ); ?>
				</dt>
				<dd class="card-meta-value">
					<?php geoffreycrofte_posted_on(); ?>
				</dd>
				<?php if ( comments_open() || get_comments_number() ) { ?>
				<dt class="card-meta-name">
					<?php get_icon('chat-bubble', __( 'Comments', 'geoffreycrofte' ) ); ?>
				</dt>
				<dd class="card-meta-value">

					<?php $nb_comments = (int) get_comments_number(); ?>

					<a href="<?php comments_link(); ?>"><?php printf(
						/* translators: %s: post title */
						_n( '%s comment', '%s comments', $nb_comments, 'geoffreycrofte' ),
						number_format_i18n( $nb_comments )
					); ?></a>

				</dd>

			<?php } ?>

			</dl>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</li><!-- #list-item-<?php the_ID(); ?> -->
