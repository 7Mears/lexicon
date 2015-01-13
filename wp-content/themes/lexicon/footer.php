<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Lexicon
 */
?>

	</div><!-- #site-content -->


	<footer id="colophon" class="site-footer site-color-alt" role="contentinfo">
		<div class="site-info">
		<?php if ( is_active_sidebar( 'footer' ) ) : ?>
			<div class="footer-widget widget-area">
				<?php dynamic_sidebar( 'footer' ); ?>
			</div><!-- #footer-widget -->
		<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

	</div><!-- #nav wrapper -->
<nav id="site-navigation" class="main-navigation">
	<h5 class="nav-title">Navigation</h5>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>


	<?php if ( is_active_sidebar( 'navigation' ) ) : ?>
		<div class="navigation-widget widget-area">
			<?php dynamic_sidebar( 'navigation' ); ?>
		</div><!-- #footer-widget -->
	<?php endif; ?>

</nav><!-- #site-navigation -->

<?php wp_footer(); ?>

</body>
</html>
