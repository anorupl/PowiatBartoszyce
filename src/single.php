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

<div id="content" class="site-content clear-both">
  <div id="breadcrumbs" class="text-center bg-white">
      <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
  </div>
  <div class="container">
    <div id="primary" class="content-area col-primary gutters">
      <div id="content-container">
      <main id="main" class="site-main">
        <?php
          while (have_posts()) : the_post();

            get_template_part( 'components/content_single/content', get_post_format()  );

         endwhile;  // End of the loop.
         ?>
      </main><!-- #main -->
      </div><!-- #content-container-->
    </div><!-- primary -->
    <div id="secondary" class="widget-area col-secondary content-style">

      <?php
      /* ==========================================
      * Section - loop with custom category       *
      * =====================================+====*/
      if (get_theme_mod('wpg_featuredcat_active', false) === true) {
        get_template_part('components/features/section', 'featured_sidebar' );
      }
      /* ==========================================
      * Section - widget banner                   *
      * =====================================+====*/
      if (get_theme_mod('wpg_b_bottom_active', false) === true) {
        get_sidebar('bottom_baners');
      }

      get_sidebar('right');

      ?>
    </div>
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
