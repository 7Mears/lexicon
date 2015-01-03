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

<?php wp_footer(); ?>

</body>
</html>
