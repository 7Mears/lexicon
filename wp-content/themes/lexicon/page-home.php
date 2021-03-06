<?php
/**
* Template Name: Homepage
* Description: The home page.
*
* @package Lexicon
*/

get_header(); ?>

<main id="main" class="site-main" role="main">

<?php if ( is_active_sidebar( 'hometop' ) ) : ?>
<section id="home-top" class="home-top">
  <?php dynamic_sidebar( 'hometop' ); ?>
</section>
<?php endif; ?>
<!-- #home-top -->
</div><!-- #header-image -->

<?php if ( is_active_sidebar( 'homebottom' ) ) : ?>
<section id="home-bottom" class="home-bottom">
  <?php dynamic_sidebar( 'homebottom' ); ?>
</section>
<?php endif; ?>
<!-- #home-bottom -->

</main><!-- #main -->
<?php get_footer(); ?>
