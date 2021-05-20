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
			<div class="is-text-right">
				<p class="footer-title">I’m social, <span>contact me</span></p>
				<ul class="is-clean social-list">
					<li><a href="https://twitter.com/geoffreycrofte"><svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg"><title>Twitter</title><path d="M8.362 21.1571C17.796 21.1571 22.956 13.3411 22.956 6.56306C22.956 6.34106 22.956 6.12006 22.941 5.90006C23.9448 5.17397 24.8114 4.27494 25.5 3.24506C24.5639 3.65986 23.5708 3.93189 22.554 4.05206C23.6247 3.41104 24.4261 2.40283 24.809 1.21506C23.8022 1.81252 22.7006 2.23357 21.552 2.46006C20.7787 1.63775 19.7559 1.09323 18.6419 0.910775C17.5279 0.72832 16.3848 0.918098 15.3895 1.45074C14.3943 1.98339 13.6023 2.8292 13.1362 3.8573C12.6701 4.8854 12.5558 6.03846 12.811 7.13806C10.7718 7.03583 8.7768 6.50589 6.95564 5.58265C5.13448 4.65941 3.52784 3.36351 2.24 1.77906C1.58409 2.90822 1.3832 4.24492 1.67823 5.517C1.97326 6.78908 2.74202 7.90089 3.828 8.62606C3.01174 8.60187 2.21328 8.38167 1.5 7.98406C1.5 8.00506 1.5 8.02706 1.5 8.04906C1.50032 9.23328 1.91026 10.3809 2.66028 11.2974C3.4103 12.2138 4.45423 12.8426 5.615 13.0771C4.85987 13.283 4.06758 13.3131 3.299 13.1651C3.62676 14.1842 4.26486 15.0755 5.12407 15.7141C5.98328 16.3528 7.02061 16.707 8.091 16.7271C6.27474 18.1545 4.03106 18.9294 1.721 18.9271C1.3129 18.9263 0.905204 18.9016 0.5 18.8531C2.84564 20.3583 5.57491 21.1568 8.362 21.1531" fill="#D8E2F1"/></svg></a></li>
					<li><a href="https://linkedin.com/in/geoffreycrofte"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.4491 20.4496H16.8931V14.8805C16.8931 13.5525 16.8694 11.8429 15.0436 11.8429C13.1915 11.8429 12.9081 13.2899 12.9081 14.7838V20.4492H9.35203V8.99689H12.7658V10.562H12.8136C13.1553 9.97782 13.649 9.49726 14.2421 9.17149C14.8352 8.84572 15.5056 8.68693 16.1819 8.71203C19.7861 8.71203 20.4506 11.0828 20.4506 14.167L20.4491 20.4496ZM5.33963 7.43144C4.93148 7.43151 4.53247 7.31055 4.19307 7.08385C3.85367 6.85715 3.58913 6.53489 3.43287 6.15783C3.27661 5.78077 3.23566 5.36584 3.31521 4.96551C3.39477 4.56517 3.59125 4.19743 3.8798 3.90876C4.16835 3.6201 4.53602 3.42348 4.93631 3.34378C5.3366 3.26408 5.75152 3.30488 6.12863 3.46101C6.50573 3.61713 6.82807 3.88158 7.05489 4.22091C7.2817 4.56025 7.40281 4.95922 7.40288 5.36738C7.40293 5.63839 7.34959 5.90675 7.24593 6.15715C7.14227 6.40754 6.99032 6.63507 6.79873 6.82674C6.60714 7.0184 6.37966 7.17045 6.12931 7.27421C5.87895 7.37796 5.61062 7.43139 5.33963 7.43144ZM7.11765 20.4496H3.5579V8.99689H7.11765V20.4496ZM22.222 0.00163516H1.77099C1.30681 -0.00360329 0.859518 0.175663 0.52744 0.500042C0.195362 0.824421 0.00566506 1.26737 0 1.73156V22.2681C0.00547117 22.7325 0.195057 23.1758 0.527123 23.5005C0.85919 23.8252 1.30658 24.0048 1.77099 23.9999H22.222C22.6873 24.0057 23.1359 23.8266 23.4693 23.5019C23.8027 23.1772 23.9936 22.7334 24 22.2681V1.73008C23.9934 1.26497 23.8024 0.821515 23.469 0.497144C23.1356 0.172773 22.6871 -0.00598143 22.222 0.000152822" fill="#D8E2F1"/></svg></a></li>
					<li><a href="/contact"><svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg"><title>Contact</title><path d="M2.4 0.5C1.6008 0.5 0.896119 0.888405 0.461719 1.48572C0.168919 1.88709 0.298275 2.45604 0.721875 2.71729L11.2594 9.21606C11.713 9.49631 12.287 9.49631 12.7406 9.21606L23.2336 2.66162C23.674 2.38612 23.7838 1.78736 23.4586 1.38599C23.0206 0.846861 22.3524 0.5 21.6 0.5H2.4ZM23.4188 5.35205C23.3184 5.35315 23.2165 5.38051 23.1211 5.44019L12.7406 11.9181C12.287 12.1972 11.713 12.196 11.2594 11.9158L0.876563 5.5144C0.494962 5.27928 0 5.55151 0 5.99683V17.125C0 18.4372 1.074 19.5 2.4 19.5H21.6C22.926 19.5 24 18.4372 24 17.125V5.92029C24 5.58541 23.7198 5.34877 23.4188 5.35205Z" fill="#D8E2F1"/></svg></a></li>
				</ul>

				<p class="is-text-small"><?php echo sprintf( __('You can be too with this %ssocial button plugin for WordPress%s', 'geoffreycrofte' ), '<br><a href="https://sharebuttons.social/?utm_source=geoffreycrofte&amp;utm_medium=website&amp;utm_campaign=footer">', '</a>' ); ?></p>
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
