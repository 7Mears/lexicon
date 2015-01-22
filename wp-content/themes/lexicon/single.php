<?php
/**
 * The template for displaying all single posts.
 *
 * @package Lexicon
 */

get_header(); ?>
	</div><!-- #site-content -->
</div><!-- #site -->

<?php while ( have_posts() ) : the_post(); ?><!-- Start the loop -->

	<div class="the-post-info">
		<h2><?php the_title(); ?></h2>
		<p>by <?php the_author() ?></p>
	</div>


<?php
	if (has_post_thumbnail( $post->ID ) ):
		echo get_the_post_thumbnail( $post_id, 'full', array( 'class' => 'the-post-image' ) );
	endif;
?>

<div class="site">
	<div <?php post_class('site-content'); ?>>
		<div id="primary" class="content-area single-content">

				<div class="the-content">
						<?php the_content(); ?>
						<?php the_time('F jS, Y') ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>
					<?php endwhile; // end of the loop. ?>
					<?php lexicon_post_nav(); ?>
				</div><!-- #the-content -->
		</div><!-- #primary -->
	</div><!-- #site-content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
