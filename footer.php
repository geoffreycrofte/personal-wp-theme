<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geoffrey_Crofte
 */

?>

	<footer id="colophon" class="site-footer section is-dark has-ovale">
		<div class="site-info container grid" style="--l-pattern: 3fr 2fr 2fr 2fr 3fr; --repeat: 1;">
			<div class="footer-logo">
				<img loading="lazy" src="<?php echo GC_ASSETS; ?>img/geoffreycrofte-logo-neutral.svg" width="123" height="100" alt="">
			</div>
			<div>
				<p class="footer-title">Courses</p>
				<ul class="is-clean">
					<li><a href="#">Figma Module</a></li>
					<li><a href="#">UI Design Module</a></li>
					<li><a href="#">All Design Courses</a></li>
				</ul>
			</div>
			<div>
				<p class="footer-title">About me</p>
				<ul class="is-clean">
					<li><a href="#">My Story</a></li>
					<li><a href="#">On Medium</a></li>
					<li><a href="#">On other places</a></li>
				</ul>
			</div>
			<div>
				<p class="footer-title">Support my Work</p>
				<ul class="is-clean">
					<li><a href="#">Buy Me a Coffee</a></li>
					<li><a href="#">Donate on Paypal</a></li>
					<li><a href="#">Promote my Work</a></li>
				</ul>
			</div>
			<div class="text-right">
				<p class="footer-title">Courses</p>
				<ul class="is-clean">
					<li><a href="https://twitter.com/geoffreycrofte">Twitter</a></li>
					<li><a href="https://linkedin.com/in/geoffreycrofte">LinkedIn</a></li>
					<li><a href="/contact">Contact</a></li>
				</ul>

				<p><?php echo sprintf( __('You can be too with this %ssocial button plugin for WordPress%s', 'geoffreycrofte' ), '<a href="https://sharebuttons.social/?utm_source=geoffreycrofte&amp;utm_medium=website&amp;utm_campaign=footer">', '</a>' ); ?></p>
			</div>
		</div><!-- .site-info -->
		<p class="container is-text-center">
			<?php echo __('Made with 🗡 by a Ninja on WordPress', 'geoffreycrofte' ); ?>
		</p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
