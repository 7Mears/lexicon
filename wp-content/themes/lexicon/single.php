<?php
/**
 * The template for displaying all single posts.
 *
 * @package Lexicon
 */

get_header(); ?>
	</div><!-- #site-content -->
</div><!-- #site -->
<!-- Start the loop -->
<?php while ( have_posts() ) : the_post(); ?>

<!-- Grab the featured image and set it as a class -->
<?php if (has_post_thumbnail( $post->ID ) ): ?>
	<?php
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
		$image = $image[0];
	?>

<div class="single-post-header-wrap">
	<div class ="single-post-header site-color-alt" style="background-image: url('<?php echo $image; ?>')">
		<h2><span class="text-bg"><?php the_title(); ?></span></h2>
		<p><span class="text-bg">By <?php the_author() ?>, on <?php the_time('F jS, Y') ?> </span></p>
	</div>
</div>

<?php else : ?>

<div class="single-post-header-wrap">
	<div class ="single-post-header site-color-alt">
		<h2><span class="text-bg"><?php the_title(); ?></span></h2>
		<p><span class="text-bg">By <?php the_author() ?>, on <?php the_time('F jS, Y') ?> </span></p>
	</div>
</div>

<?php endif; ?>

<div class="site">
	<div class="site-content">

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div id="primary" class="content-area single-content">
				<main id="main" class="site-main" role="main">
					<?php the_content(); ?>
				</div>
			</div>

			<div class="site-content">

				<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

				<?php lexicon_post_nav(); ?>

				<?php endwhile; // end of the loop. ?>
				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
