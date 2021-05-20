<?php
/**
 * The homepage
 *
 * This is the template that displays the homepage content.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="blob">
				<svg width="605" height="664" viewBox="0 0 605 664" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.38" fill-rule="evenodd" clip-rule="evenodd" d="M265.055 4.2205C361.222 -17.5123 458.196 47.5391 520.399 133.863C583.68 221.683 634.111 349.857 585.685 449.183C540.991 540.854 416.033 481.596 331.12 522.09C257.653 557.125 217.535 682.249 139.95 661.744C56.7984 639.768 6.64642 531.623 0.299822 434.656C-5.28135 349.384 68.3742 296.312 111.449 226.282C161.394 145.082 179.68 23.5146 265.055 4.2205Z" fill="#EBF3FA"/></svg>
			</div>

			<div class="ninja-desc">
			<?php
				if ( have_posts() ) :

					while ( have_posts() ) :
						the_post();

						the_content();

					endwhile;

				endif;
			?>
			</div>
		</div>

		<div class="wave">
			<svg preserveAspectRatio="none" width="1680" height="218" viewBox="0 0 1680 218" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M754.5 103C961.916 195.057 1268.35 235.385 1678.5 52.0001V217.5L3.76617e-06 213L0 19C262 -24.5 547.083 10.9434 754.5 103Z" fill="#E05DAB"/><path d="M756 113.5C970.5 209 1252.5 229.499 1680 22L1680 218H0L1.32798e-07 53.4999C260.549 2.06553 541.5 17.9997 756 113.5Z" fill="#8F64B2"/><path d="M746 119.5C966 209.5 1258.7 242.919 1680 25V218L1.21204e-05 214.418L0 84C259.113 25.7629 526 29.4995 746 119.5Z" fill="#CFE4F2"/><path d="M758 164.5C972 240 1285.5 244 1680 29.0001V218H0V142C257.5 77.0001 544 89.0007 758 164.5Z" fill="#FBF7FE"/></svg>
		</div>
		
		<?php
			if ( function_exists( 'have_rows' ) && have_rows( 'what_i_do_best' ) ):
		?>

		<section class="section is-alt">
			<div class="container">
				<div class="skills grid is-text-center" style="--xs-repeat:1;--md-repeat:3;">

				<?php
					while ( have_rows('what_i_do_best') ) : the_row();
						$icon     = get_sub_field( 'icon' );
						$title    = get_sub_field( 'title' );
						$desc     = get_sub_field( 'description' );
						$btn_text = get_sub_field( 'button_text' );
						$btn_url  = get_sub_field( 'button_url' );
				?>

					<article class="skill-item">
						<div class="skill-icon">
							<?php echo $icon; ?>
						</div>
						<h3 class="skill-title">
							<?php echo $title; ?>
						</h3>
						<div class="skill-desc">
							<?php echo $desc; ?>
						</div>
						<p class="skill-cta">
							<a href="<?php echo $btn_url; ?>" class="button-primary is-big"><?php echo $btn_text; ?></a>
						</p>
					</article>

				<?php endwhile; ?>

				</div>
			</div><!-- .container #2-->
		</section>
		<?php endif; ?>

	</main><!-- #main -->

	<section class="section is-alt is-reference" id="projects">
		<div class="container">
			<h2 class="section-title">
				<?php echo get_field( 'latest_work_title' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php echo get_field( 'latest_work_description', false, false ); ?>
			</p>
		</div>

		<div class="container is-bleeding">
			<?php
				$usecases = new WP_Query(array(
					'post_type' => array('portfolio'),
					'post_count' => 6,
					'no_found_rows' => true, 
					'update_post_meta_cache' => false, 
					'update_post_term_cache' => false,
				));
				// The Loop
				if ( $usecases->have_posts() ) :
			?>

			<ul class="portfolio grid" style="--xs-repeat:1;--md-repeat:2;--l-repeat:3;">

			<?php
				while ( $usecases->have_posts() ) :
					$usecases->the_post();
					
					$title = get_the_title();
					$img   = get_the_post_thumbnail();
					$desc  = get_the_excerpt();
					$link  = get_the_permalink();
			?>

				<li class="case-study">
					<a href="<?php echo esc_url( $link ); ?>">
						<?php echo $img; ?>
						<div class="case-study-text">
							<h3 class="case-study-title"><?php echo $title; ?></h3>
							<p class="case-study-desc">
								<?php echo $desc; ?>
							</p>
						</div>
					</a>
				</li>

				<li class="case-study">
					<a href="<?php echo esc_url( $link ); ?>">
						<?php echo $img; ?>
						<div class="case-study-text">
							<h3 class="case-study-title"><?php echo $title; ?></h3>
							<p class="case-study-desc">
								<?php echo $desc; ?>
							</p>
						</div>
					</a>
				</li>

			<?php endwhile; ?>

			</ul>

			<p class="section-cta is-text-center">
				<a class="button-primary is-big" href="<?php echo get_post_type_archive_link( 'portfolio' ); ?>">
					<span><?php echo _e( 'See all my Design Works', 'geoffreycrofte' ) ?></span>
					<?php get_icon('arrow-right'); ?>
				</a>
			</p>

			<?php 
				endif; 
				wp_reset_postdata();
			?>

		</div>
	</section>


	<section id="trusted" class="section is-reference has-ovale">
		<div class="container grid" style="--l-pattern: 4fr 1fr 7fr; --repeat: 1;">
			<div>
				<h2 class="section-title is-text-left">
					<?php echo get_field( 'trusted_title' ); ?>
				</h2>
				<p class="section-subtitle is-text-left">
					<?php echo get_field( 'trusted_description', false, false ); ?>
				</p>
			</div>
			<div></div>
			<div>

			<?php
				if ( function_exists( 'have_rows' ) && have_rows( 'trusted_companies' ) ):
			?>

				<ul class="logos is-clean">
					<?php
					while ( have_rows( 'trusted_companies' ) ) : the_row();
						$name = get_sub_field( 'company_name' );
						$link = get_sub_field( 'company_link' );
						$logo = get_sub_field( 'company_logo' );

						$img = '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" width="' . ( $logo['width'] / 2 ) . '" height="' . ( $logo['height'] / 2 ) . '">';

						$img = empty( $link ) ? $img : '<a href="' . esc_url( $link ) . '"> ' . $img . '</a>';
					?>

					<li><?php echo $img; ?></li>

					<?php endwhile; ?>
				</ul>
			<?php endif; ?>
				
			</div>
		</div>
	</section>

	<section id="talks" class="section is-dark has-ovale">
		<div class="container">
			<h2 class="section-title">
				<?php echo get_field( 'latest_talks_title' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php echo get_field( 'latest_talks_description', false, false ); ?>
			</p>

			<?php
			$posts = get_field( 'latest_talks_posts' );
			if ( ! empty( $posts ) ) {
			?>

			<ul class="card-list grid is-clean" style="--xs-repeat:1;--md-repeat:2;--l-repeat:3;">
				<?php
					foreach ($posts as $post) {
						$post_link = get_the_permalink( $post->ID );
						$talk_metas = speekr_get_talk_metas( $post->ID );

						if ( $talk_metas['error'] ) return;
				?>

				<li class="card-item">
					<article class="card">
						<div class="card-image">
							<?php echo get_the_post_thumbnail( $post->ID ); ?>
						</div>
						<div class="card-content">
							<header>
								<h1>
								<?php echo $talk_metas['as_article'] === 'on' ? '<a href="' . get_the_permalink( $post->ID ) . '">' . $post->post_title . '</a>' : $post->post_title; ?>
								</h1>
							</header>

							<div class="card-description">
								<?php echo $talk_metas['summary']; ?>
							</div>

							<?php if ( $talk_metas['as_article'] === 'on' ) { ?>

							<p class="card-cta">
								<a class="button-primary" href="<?php echo get_the_permalink( $post->ID ); ?>">
									<?php get_icon('read'); ?>
									<span><?php _e('Read the transcript', 'geoffreycrofte' ); ?></span>
								</a>	
							</p>

							<?php } ?>

							<?php if ( $talk_metas['conf_infos'] && ! empty( $talk_metas['conf_infos']['name'] ) ) { ?>
							<dl class="card-meta">
								<dt class="card-meta-name">
									<?php get_icon('map-plan', __( 'Conference Info', 'geoffreycrofte' ) ); ?>
								</dt>
								<dd class="card-meta-value">
									<?php echo ! empty( $talk_metas['conf_infos']['url'] ) ? '<a href="' . esc_url( $talk_metas['conf_infos']['url'] ) . '" rel="nofollow">' . esc_html( $talk_metas['conf_infos']['name'] ) . '</a>' : esc_html( $talk_metas['conf_infos']['name'] ); ?>
								</dd>
							</dl>
							<?php } ?>
						</div>
					</article>
				</li>

			<?php 
				}
				wp_reset_postdata();
			}
			?>
			</ul>

			<p class="section-cta is-text-center">
				<a class="button-primary is-big" href="<?php echo get_post_type_archive_link( 'talks' ); ?>">
					<span><?php echo _e( 'See all the talks', 'geoffreycrofte' ) ?></span>
					<?php get_icon('arrow-right'); ?>
				</a>
			</p>
		</div>
	</section>

	<section id="blog" class="section has-ovale">
		<div class="container">
			<h2 class="section-title">
				<?php echo get_field( 'latest_posts_title' ); ?>
			</h2>
			<p class="section-subtitle">
				<?php echo get_field( 'latest_posts_description', false, false ); ?>
			</p>

			<?php
			$posts = new WP_Query( array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => 3,
				'no_found_rows' => true, 
				'update_post_meta_cache' => false, 
				'update_post_term_cache' => false,
			) );

			$posts = $posts->get_posts();
			if ( ! empty( $posts ) ) {
			?>

			<ul class="card-list grid is-clean" style="--xs-repeat:1;--md-repeat:2;--l-repeat:3;">
				<?php
				foreach ( $posts as $post ) {
					$post_link = get_the_permalink();
				?>

				<li class="card-item">
					<article class="card">
						<div class="card-image">
							<?php echo /*get_the_post_thumbnail()*/geoffreycrofte_post_thumbnail(); ?>
						</div>
						<div class="card-content">
							<header>
								<h1>
								<a href="<?php echo get_the_permalink(); ?>">
									<?php echo get_the_title() ?>
								</a>
								</h1>
							</header>

							<div class="card-description">
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
					</article>
				</li>

			<?php 
				}
				wp_reset_postdata();
			}
			?>
			</ul>

			<p class="section-cta is-text-center">
				<a class="button-primary is-big" href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>">
					<span><?php echo _e( 'See all articles', 'geoffreycrofte' ) ?></span>
					<?php get_icon('arrow-right'); ?>
				</a>
			</p>
		</div>
	</section>
<?php
get_footer();
