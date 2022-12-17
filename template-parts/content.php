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

		<ul class="post-meta">
			<li>
				<span class="post-meta-name">
					<?php get_icon( 'calendar', __( 'Written on', 'geoffreycrofte' ) ); ?>
				</span>
				<span class="post-meta-value">
					<?php geoffreycrofte_posted_on(); ?>
				</span>
			</li>

			<?php if ( isset( $_GET['preview'] ) && $_GET['preview'] == true ) { ?>
			
			<li>
				<span class="post-meta-name">
					<?php get_icon( 'eye', __( 'Number of views', 'geoffreycrofte' ) ); ?>
				</span>
				<span class="post-meta-value">
					<?php echo __('Preview mode', 'geoffreycrofte' ); ?>
				</span>
			</li>	
			
			<?php } elseif ( shortcode_exists('juiz_post_view') ) { ?>
			
			<li>
				<span class="post-meta-name">
					<?php get_icon( 'eye', __( 'Number of views', 'geoffreycrofte' ) ); ?>
				</span>
				<span class="post-meta-value">
					<?php printf( __( '%s readings', 'juiz' ), do_shortcode( '[juiz_post_view]' ) ); ?>
				</span>
			</li>
			
			<?php } ?>

			<?php if ( comments_open() || get_comments_number() ) { ?>

			<li>
				<span class="post-meta-name">
					<?php get_icon('chat-bubble', __( 'Comments', 'geoffreycrofte' ) ); ?>
				</span>
				<span class="post-meta-value">

					<?php $nb_comments = (int) get_comments_number(); ?>

					<a href="<?php comments_link(); ?>"><?php printf(
						/* translators: %s: post title */
						_n( '%s comment', '%s comments', $nb_comments, 'geoffreycrofte' ),
						number_format_i18n( $nb_comments )
					); ?></a>

				</span>
			</li>

			<?php } ?>

		</ul>

		<?php } ?>

		<?php wave(); ?>
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

		<?php edit_post_link( geoffrey_crofte_get_icon_def('edit') ,'',''); ?>
	</div><!-- .entry-content -->

	<aside id="author" aria-label="<?php _e('Author Info', 'juiz'); ?>" class="article-aside section is-dark has-small-padding">
		<?php echo geoffreycrofte_get_author_box(); ?>
	</aside>

	<footer class="section is-small-section is-dark is-darker entry-footer">
		<div class="article-footer grid container is-medium" style="--xs-repeat:1;--md-repeat:3;">
			<div class="col">
				<?php 
					$post_cats = get_the_category();
					$categories_list = '';

					foreach ( $post_cats as $cat ) {
						$categories_list .= '<a itemprop="about" href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . $cat->name . '</a>, ';
					}
					$categories_list = trim( $categories_list, ', ' );
				?>

				<p class="title-col">
					<?php 
						get_icon('folder');
						echo _n( 'Category', 'Categories', count( $post_cats ), 'juiz' );
					?>
				</p>

				<?php echo $categories_list; ?>

			</div>

			<div class="col">
				<p class="title-col" id="keywords-title">
					<?php
						get_icon('tag');
						_e( 'Keywords', 'juiz' );
					?>
				</p>
				<ul class="keywords" aria-labelledby="keywords-title">
					<?php
						the_tags(
							'<li itemprop="keywords" rel="tag">',
							'</li> <li itemprop="keywords" rel="tag">',
							'</li>'
						);
					?> 
				</ul>
			</div>

			<dl class="col">
				<dt class="title-col">
					<?php
						get_icon('info');
						_e( 'Informations', 'juiz' );
					?>
				</dt>
				<dd>
					<?php _e( 'Last update:', 'juiz' ); ?>
					<time class="updated" datetime="<?php the_modified_time('c'); ?>" itemprop="dateModified"><?php the_modified_time('j M. Y'); ?></time>
				</dd>
				<dd>
					<a title="<?php echo esc_attr( 
							sprintf( 
								__( 'Permalink to the post &quot;%s&quot;', 'juiz'),
								esc_attr( get_the_title() )
							)
						); 
						?>" itemprop="url" rel="bookmark" class="article-permalink" href="<?php the_permalink(); ?>"><?php _e( 'Permalink', 'juiz' ); ?></a>
				</dd>
			</dl>
		</div>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->

<aside class="section is-alt">
	<div class="container">
		<p>A section to put some notification system like the newsletter form or the notification subcription.</p>
	</div>
</aside>
