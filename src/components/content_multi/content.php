<?php
/**
* Template part for displaying posts content in multiple loop (archive, category).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clear-both content-style style__wide col-12'); ?>>
  <header class="entry-header clear-both">
    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
  </header>
  <div class="col-5">
  <figure class="post-thumbnail">
    <a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
      <?php if (has_post_thumbnail()) :
        the_post_thumbnail('full', array('alt' => get_the_title()));
       else: ?>
         <img width="1200" height="800" src="<?php echo THEME_URL . 'img/default/no_image_powiat_1200.jpg" class="attachment-full size-full wp-post-image" alt="Grafika z herbem powiatu bartoszyckiego.'; ?>" loading="lazy">
      <?php endif; ?>
    </a>
  </figure>
  </div>
  <div class="col-7 gutters">
  <div class="entry-meta">
    <div class="meta__item"><?php wpg_time() ?></div>
    <div class="meta__item screen-reader-text">
      <i class="icon-user"></i><?php _e('Author', 'wpg_theme'); ?><?php the_author();?>
    </div>
    <?php if ($post->post_type !== 'page') : ?>
      <div class="meta__item"><i class="icon-folder-open"></i><?php the_list_terms(); ?></div>
    <?php endif; ?>
  </div><!-- .entry-meta -->
  <div class="entry-summary">
    <?php the_excerpt(); ?>
    <a class="more-link" href="<?php the_permalink() ?>"><?php _e('Continue reading', 'wpg_theme'); ?> <span class="screen-reader-text"><?php the_title(); ?></span></a>

  </div><!-- .entry-summary -->
  </div>
</article>
