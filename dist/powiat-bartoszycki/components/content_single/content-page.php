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
  <?php if (has_post_thumbnail()) : ?>
    <figure class="post-thumbnail">
        <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
        <?php wpg_meta_page('over-thumbnail text-center'); ?>
    </figure>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
  <?php else: ?>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <hr>
    <?php wpg_meta_page(); ?>
    <hr>
  <?php endif; ?>

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
