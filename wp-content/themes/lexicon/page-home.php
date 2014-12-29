<?php
/**
* Template Name: Homepage
* Description: The home page.
*
* @package Lexicon
*/

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

      <section id="home-site-description" class="home-site-description">
          <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
      </section>
    <!-- #site-description -->

    <?php if ( is_active_sidebar( 'hometop' ) ) : ?>
      <section id="home-top">
        <?php dynamic_sidebar( 'hometop' ); ?>
      </section>
    <?php endif; ?>
    <!-- #home-top -->

    <?php $posts = get_posts( "numberposts=3" ); ?>
    <?php if( $posts ) : ?>
      <section id="home-middle">
        <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
          <div class="home-middle home-post">
            <div class="home-post--title">
              <h4><a href="<?php echo get_permalink($post->ID); ?>" ><?php echo $post->post_title; ?></a></h4>
            </div>

            <div class="home-post--info">
              <p>Date<br /><span><?php the_date(); ?></span></p>
              <p>Category<br /><span><?php the_category( ', ' ); ?></span></p>
            </div>

            <div class="home-post--content">
              <?php the_excerpt(); ?>
            </div>
          </div><!-- #home-post -->

        <?php endforeach; ?>
      </section>
    <?php endif; ?>
    <!-- #home-middle -->

    <?php if ( is_active_sidebar( 'homebottom' ) ) : ?>
      <section id="home-bottom">
        <?php dynamic_sidebar( 'homebottom' ); ?>
      </section>
    <?php endif; ?>
    <!-- #home-bottom -->

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
