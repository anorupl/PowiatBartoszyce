<?php
/**
* Template part for displaying page content in page.php
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>
<article <?php post_class('content-style'); ?>>
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
