<?php
/**
* Template Name: Page with attachments
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
    <div id="primary" class="primary-col content-area gutters">
      <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('content-style style__narrow'); ?>>
            <div class="top-thumbnail">
              <figure class="post-thumbnail">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('medium', array('alt' => get_the_title())); else: ?>
                  <img width="1200" height="800" src="<?php echo THEME_URL . 'img/default/no_image_powiat_1200.jpg" class="attachment-full size-full wp-post-image" alt="Grafika z herbem powiatu bartoszyckiego.'; ?>" loading="lazy">
                <?php endif; ?>
              </figure>
              <?php wpg_meta_page('over-thumbnail text-center'); ?>
            </div>
            <header class="entry-header">
              <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
              <?php
              the_content();
              
              wpg_attachments();

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
        <?php endwhile; ?>
      </main><!-- #main -->
    </div><!-- primary -->
    <div id="secondary" class="secondary-col narrow-col widget-area content-style style__narrow">
      <?php  get_template_part( 'components/site/secondary', 'column'); ?>
    </div><!-- #secondary -->
  </div><!-- .container -->
</div><!-- #content -->
<?php get_footer(); ?>
