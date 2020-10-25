<?php
/**
* Template part for displaying posts content in multiple loop (archive, category).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clear-both content-style col-12'); ?>>

<?php if (has_post_thumbnail()) : ?>
  <div class="col-5">
  <figure class="post-thumbnail">
    <a href="<?php the_permalink(); ?>" aria-hidden="true">
      <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
    </a>
  </figure>
  </div>
  <div class="col-7">
  <header class="entry-header">
    <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
  </header>
  <div class="entry-meta">
    <div class="meta__item"><?php wpg_time() ?></div>
    <div class="meta__item screen-reader-text">
      <i class="icon-user"></i><?php _e('Author', 'wpg_theme'); ?><?php the_author();?>
    </div>
    <?php if ($post->post_type !== 'page') : ?>
      <div class="meta__item screen-reader-text"><i class="icon-folder-open"></i><?php the_list_terms(); ?></div>
    <?php endif; ?>
  </div><!-- .entry-meta -->
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div><!-- .entry-summary -->
  </div>
<?php else: ?>

  <header class="entry-header">
    <?php the_title(sprintf('<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h3>'); ?>
  </header>
  <div class="entry-meta">
    <div class="meta__item"><?php wpg_time() ?></div>
    <div class="meta__item screen-reader-text">
      <i class="icon-user"></i><?php _e('Author', 'wpg_theme'); ?><?php the_author();?>
    </div>
    <?php if ($post->post_type !== 'page') : ?>
      <div class="meta__item screen-reader-text"><i class="icon-folder-open"></i><?php the_list_terms(); ?></div>
    <?php endif; ?>
  </div><!-- .entry-meta -->
  <div class="entry-content">
    <?php
    /* translators: %s: Name of current post */
    the_content( sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ), get_the_title() ) );
    ?>
  </div><!-- .entry-content -->

<?php endif; ?>
</article>
