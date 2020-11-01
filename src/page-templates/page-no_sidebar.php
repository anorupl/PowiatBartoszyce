<?php
/**
* Template Name: Page - no sidebars
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

get_header(); ?>
<div id="content" class="site-content clear-both">
  <div id="breadcrumbs" class="text-center">
      <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
  </div>
  <div class="container">
    <div id="primary" class="content-area">
      <main id="main" class="site-main">
        <article class="content-style col-12">
          <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>
          </header>
          <hr>
          <?php wpg_meta_page(); ?>
          <hr>
          <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(array(
              'before' => '<nav class="page-links pagination-inside" role="navigation"><span class="page-links-title">' . __('Pages:', 'wpg_theme') . '</span>',
              'after' => '</nav>',
              'link_before' => '<span>',
              'link_after' => '</span>',
              'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wpg_theme') . '</span> %',
              'separator' => '<span class="screen-reader-text">, </span>',
            ));
            ?>
          </div><!-- .entry-content -->
        </article>
      </main>
    </div><!-- #primary -->
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
