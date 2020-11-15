<?php
/**
* Template part for displaying slider (customizer).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/
?>
<div class="radius">
  <span class="screen-reader-text" tabindex="0">
    <?php echo get_theme_mod('wpg_slider_section',__('Section title', 'wpg_theme'));?>
  </span>

  <button id="play-header" class="btn-slide hide"><?php _e('Start animation slideshow','wpg_theme');?></button>
  <button id="stop-header" class="btn-slide"><?php _e('Pause animation slideshow','wpg_theme');?></button>

  <div id="slider" class="slides radius">
    <?php
    $slider_number = absint( get_theme_mod('wpg_slider_number', 1 ) );
    $slider_category = absint( get_theme_mod('wpg_slider_category', 0 ) );

    $args = array('post_type' => 'post', 'posts_per_page' => $slider_number, 'no_found_rows' => true,);

    if (!empty($slider_category) && $slider_category != 0) {
      $args['cat'] = $slider_category;
    }

    $query_slajd = new WP_Query($args);

    if (isset($query_slajd) && $query_slajd->have_posts()) :
      while ($query_slajd->have_posts()) :
        $query_slajd->the_post();
        ?>
        <div id="slide-post-<?php the_ID(); ?>" class="slick-slide">
          <div class="meta-line">
            <span class="meta-line--content" aria-hidden="false"><?php wpg_time('left-icon') ?></span>
          </div>
          <?php the_title(sprintf('<div class="entry-title class-h2"><a tabindex="-1" href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></div>'); ?>
          <a href="<?php the_permalink();?>" class="btn alignleft"><? printf(__( 'Continue reading <span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ), get_the_title()); ?> <i class="icon-angle-right"></i></a>
        </div>
        <?php
      endwhile;
      wp_reset_postdata();// Restore original Post Data
    else:
      ?>
      <div id="slide-nopost" class="pad-all">
        <div class="meta-line">
          <span class="pad-all"><?php _e('Nothing Found', 'wpg_theme'); ?></span>
        </div>
        <span class="slide-content text-center-left">
          <div class="class-h2"><?php _e('Nothing Found', 'wpg_theme'); ?></div>
          <span class="btn alignleft"><?php _e('It looks like nothing was found at this location.', 'wpg_theme'); ?></span>
        </span>
      </div>
    <?php endif; ?>
  </div><!-- #slider -->
</div>
