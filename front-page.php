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

			<?php
				if ( function_exists( 'have_rows' ) && have_rows( 'what_i_do_best', 7850 ) ):
			?>
			
			<div class="skills flex">

			<?php
				while ( have_rows('what_i_do_best') ) : the_row();
					$icon     = get_sub_field('icon');
					$title    = get_sub_field('title');
					$desc     = get_sub_field('description');
					$btn_text = get_sub_field('button_text');
					$btn_url  = get_sub_field('button_url');
			?>

				<article class="skill-item col-3">
					<div class="skill-icon">
						<?php echo $icon; ?>
					</div>
					<h3 class="skill-title">
						<?php echo $title; ?>
					</h3>
					<p class="skill-desc">
						<?php echo $desc; ?>
					</p>
					<p class="skill-cta">
						<a href="<?php echo $btn_url; ?>" class="button-primary"><?php echo $btn_text; ?></a>
					</p>
				</article>

			<?php endwhile; ?>

			</div>

			<?php endif; ?>
		</div>
	</main><!-- #main -->

	<section id="projects">
		<div class="container">
			<h2 class="section-title">
				<?php _e('My latest works', 'geoffreycrofte'); ?>
			</h2>

			<p class="section-subtitlre">
				<?php _e('I work on different kinds of project, from the user research, passing by the UI, followed by user testing and continuous care for product improvement.', 'geoffreycrofte'); ?>
			</p>
		</div>

		<div class="container is-bleeding">
			
		</div>
	</section>

	<section id="trusted">
		<div class="container">
			
		</div>
	</section>

	<section id="talks">
		<div class="container">
			
		</div>
	</section>

	<section id="blog">
		<div class="container">
			
		</div>
	</section>
<?php
get_footer();
