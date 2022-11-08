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

	<aside aria-label="<?php _e('Author Info', 'juiz'); ?>" class="article-aside section is-dark">
		<?php echo geoffreycrofte_get_author_box(); ?>
	</aside>

	<?php edit_post_link( geoffrey_crofte_get_icon_def('edit') ,'',''); ?>

	<footer class="article-footer cols-3 entry-footer">
		<div class="col col-art-1">
			<p class="title-col"><?php _e( 'Categories', 'juiz' ); ?></p>
			<?php 
			//the_category(', ') 
			$post_cats = get_the_category();
			$categories_list = '';

			foreach ( $post_cats as $cat ) {
				$categories_list .= '<a itemprop="about" href="' . esc_url( get_category_link( $cat->term_id ) ) . '">' . $cat->name . '</a>, ';
			}

			$categories_list = trim( $categories_list, ', ' );
			echo $categories_list;
			?>
		</div>

		<div class="col col-art-2">
			<p class="title-col"><?php _e( 'Keywords', 'juiz' ); ?></p>
			<ul class="keywords">
				<?php
					the_tags(
						'<li itemprop="keywords" rel="tag">',
						'</li> <li itemprop="keywords" rel="tag">',
						'</li>'
					);
				?> 
			</ul>
		</div>

		<div class="col col-art-3">
			<p class="title-col"><?php _e( 'Informations', 'juiz' ); ?></p>
			<?php _e( 'Last update:', 'juiz' ); ?> <time class="updated" datetime="<?php the_modified_time('c'); ?>" itemprop="dateModified"><?php the_modified_time('j M. Y'); ?></time>
			<br>
			<a title="<?php echo esc_attr( 
									sprintf( 
										__( 'Permalink to the post &quot;%s&quot;', 'juiz'),
										esc_attr( get_the_title() )
									)
								); 
						?>" itemprop="url" rel="bookmark" class="article-permalink" href="<?php the_permalink(); ?>"><?php _e( 'Permalink', 'juiz' ); ?></a>
		</div>

	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
