<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Geoffrey_Crofte
 */
?><!doctype html>
<html <?php language_attributes(); ?> class="is-light">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<link rel="preload" as="font" href="<?php echo GC_ASSETS; ?>fonts/FiraSans-Bold.woff2" type="font/woff2" crossorigin>
	<link rel="preload" as="font" href="<?php echo GC_ASSETS; ?>fonts/FiraSans-Regular.woff2" type="font/woff2" crossorigin>	

	<link rel="apple-touch-icon" sizes="180x180" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/favicon-16x16.png">
	<link rel="manifest" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/site.webmanifest">
	<link rel="mask-icon" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/safari-pinned-tab.svg" color="#a40162">
	<link rel="shortcut icon" href="/wp-content/themes/geoffreycrofte/assets/img/favicons/favicon.ico">
	<meta name="apple-mobile-web-app-title" content="Geoffrey Crofte">
	<meta name="application-name" content="Geoffrey Crofte">
	<meta name="msapplication-TileColor" content="#a40162">
	<meta name="msapplication-config" content="/wp-content/themes/geoffreycrofte/assets/img/favicons/browserconfig.xml">
	<meta name="theme-color" content="#a40162">

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'geoffreycrofte' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<div class="site-branding">
				<?php $el = is_front_page() && is_home() ? 'h1' : 'p'; ?>
					<<?php echo $el; ?> class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<img src="<?php echo GC_ASSETS; ?>img/geoffreycrofte-logo.svg" width="284" height="67" alt="<?php bloginfo( 'name' ); ?>">
						</a>
					</<?php echo $el; ?>>
			</div><!-- .site-branding -->

			<nav role="navigation" id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'geoffreycrofte' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
