<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Lexicon
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>

<?php if(is_front_page() ) { ?>
	<style>
		.home-header--image {
			background: url('<?php header_image() ?>');
		}
	</style>
<?php } ?><!-- #header image -->

</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div><!-- .site-branding -->

		<a id="menu-trigger" href="#0"><span class="menu-icon"></span></a>
	</header><!-- #masthead -->

	<div class="nav-wrap">
		<div id="page" class="hfeed site">
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'lexicon' ); ?></a>

			<?php if(is_front_page() ) { ?>
				<div class="home-header--image">
			<?php } else { ?>
				<div id="content" class="site-content">
			<?php } ?>
