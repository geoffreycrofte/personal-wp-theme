<?php
/**
 * The template file for the list of article (Blog Homepage)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

get_header();

	if ( have_posts() ) :
?>

<section class="page-content">
	<header class="page-header section pt-0 pb-40">
		<h1 class="section-title"><?php single_post_title(); ?></h1>
		
	<?php if ( function_exists( 'get_field') ) { ?>
		<p class="section-subtitle">
			<?php echo get_field('page_subtitle', get_option( 'page_for_posts' ) ); ?>
		</p>
	<?php } ?>

	<?php wave(); ?>

	</header>

<?php
	endif;
?>

	<div class="content-n-sidebar section has-ovale">
		
		<?php ovale(); ?>

		<main id="primary" class="site-main">

			<?php if ( have_posts() ) : ?>
			<ul class="card-list grid is-clean" style="--xs-repeat:1;--md-repeat:2;--xxl-repeat:3;--md-gap:var(--blog-gap, 24px)">
			
			<?php

				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() . '-card' );

				endwhile;
			?>
				
			</ul>

			<?php
				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>
</section>
<?php get_footer();
