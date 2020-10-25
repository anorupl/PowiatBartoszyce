<?php
/**
* The template for displaying 404 page.
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
get_header(); ?>

<div id="content" class="site-content clear-both">
  <div id="breadcrumbs" class="text-center bg-white">
      <?php _e('Page not found', 'wpg_theme'); ?>
  </div>
  <div class="container">
    <div id="primary" class="content-area col-12 gutters">
      <main id="main" class="site-main">
        <div class="error-404 not-found">
          <header class="entry-header">
              <h1 class="entry-title"><?php _e('Oops! That page can&rsquo;t be found.', 'wpg_theme'); ?></h1>
          </header>
          <hr>
          <div class="entry-content class-h2 text-center">
            <?php _e('It looks like nothing was found at this location.', 'wpg_theme'); ?>

            <?php get_search_form(); ?>
          </div><!-- .entry-content -->
        </div><!-- .not-found -->
      </main><!-- #main -->
    </div><!-- primary -->
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
