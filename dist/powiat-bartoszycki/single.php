<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

get_header(); ?>
<div id="content" class="clear-both">
  <div id="breadcrumbs" class="text-center">
    <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
  </div>
  <div class="container">
    <div id="primary" class="primary-col gutters">
      <main id="main" class="site-main">
        <?php
        while (have_posts()) : the_post();

        get_template_part( 'components/content_single/content', get_post_format()  );

        endwhile;  // End of the loop.
        ?>
      </main><!-- #main -->
    </div><!-- primary -->
    <div id="secondary" class="secondary-col narrow-col widget-area content-style style__narrow">
      <?php  get_template_part( 'components/site/secondary', 'column'); ?>
    </div><!-- #secondary -->
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
