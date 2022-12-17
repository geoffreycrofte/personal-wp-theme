<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Geoffrey_Crofte
 */

get_header();
?>

<section class="page-content">

	<header class="page-header section pt-0 pb-40">
		<?php
			the_archive_title( '<h1 class="section-title page-title">', '</h1>' );
			the_archive_description( '<div class="section-subtitle archive-description">', '</div>' );
		?>

		<?php wave(); ?>

	</header>

	<div class="content-n-sidebar section has-ovale">

		<?php ovale(); ?>
		
		<main id="primary" class="site-main">

			<?php if ( have_posts() ) : ?>

			<ul class="card-list grid is-clean" style="--xs-repeat:1;--md-repeat:2;--xxl-repeat:3;--md-gap:var(--blog-gap, 24px)">
			
			<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() . '-card' );

				endwhile;
			?>
				
			</ul>

			<?php the_posts_navigation(); ?>

			<?php 
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
			?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>
</section>

<?php get_footer();
