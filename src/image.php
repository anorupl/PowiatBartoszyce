<?php
/**
* The template for displaying attachment image.
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
get_header();
?>
<div id="content" class="site-content clear-both">
  <div id="breadcrumbs" class="text-center">
      <span><?php _e('You are here: &nbsp;', 'wpg_theme'); ?></span><?php if (function_exists('wpg_breadcrumbs')) wpg_breadcrumbs(); ?>
  </div>
  <div class="container">
    <div id="primary" class="content-area margin">
      <main id="main" class="site-main">
            <?php while (have_posts()) : the_post(); ?>
                <div <?php post_class('content-style'); ?>>
                  <header class="entry-header">
                      <h1 class="entry-title text-center"><?php the_title(); ?></h1>
                  </header>
                  <hr>


                  <div class="entry-meta col-10  pad-v text-center-left">
                      <?php

                      $metadata = wp_get_attachment_metadata();

                      printf(__('Photo published in size <a href="%1$s" title="Link to original file">%2$s pixels <span class="screen-reader-text">(Image Width)</span> to %3$s pixels <span class="screen-reader-text">(Image Height)</span></a> in the article <a href="%4$s" title="Back to %5$s" rel="gallery">%6$s</a>', 'wpg_theme'),
                      esc_url(wp_get_attachment_url()),
                      $metadata['width'],
                      $metadata['height'],
                      esc_url(get_permalink($post->post_parent)),
                      esc_attr(strip_tags(get_the_title($post->post_parent))),
                      get_the_title($post->post_parent)
                  );
                  ?>
                </div>
                <div class="entry-share col-2 pad-v text-center-right">
                    <?php wpg_share(); ?>
                </div>

                <div class="entry-content entry-image clear-both text-center">
                  <?php echo wp_get_attachment_image($post->ID, 'full'); ?>
                </div><!-- .entry-content -->
            </div>
        <?php endwhile; // End of the loop.	  ?>
    </main><!-- #main -->
  </main><!-- #main -->
</div><!-- primary -->
</div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
