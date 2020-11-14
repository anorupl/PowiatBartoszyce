<?php
/**
* The template for displaying attachment.
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
    <div id="primary" class="content-area margin">
      <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
          <div <?php post_class('content-style attachment-file'); ?>>
            <?php $attachment_data = wp_prepare_attachment_for_js($post->ID); ?>
            <div class="entry-header text-center">
              <h1 class="entry-title"><?php the_title(); ?></h1>
              <hr>
            </div>
            <div class="attachment-content text-center">
              <div class="text-center">
                <?php echo wp_get_attachment_link($post->ID, 'thumbnail', false, true, false); //icon button ?>
              </div>
              <div tabindex="0">
                <div class="clera-both">
                  <span class="class-h4"><a class="btn" href="<?php echo $attachment_data['url']; ?>"><?php _e('Click to download', 'wpg_theme') ?> <span class="screen-reader"><?php the_title(); ?></span></a></span>
                </div>
                <div class="clear-both attachment-size">
                  <?php
                  _e('File size: ', 'wpg_theme');
                  echo $attachment_data['filesizeHumanReadable'];
                  ?>
                </div>
              </div>
            </div>
          </div>
        <?php endwhile; // End of the loop.	  ?>
      </main><!-- #main -->
    </main><!-- #main -->
  </div><!-- primary -->
</div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
