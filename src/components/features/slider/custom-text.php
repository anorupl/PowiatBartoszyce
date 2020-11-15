<?php
/**
* Template part for displaying image background when slider is disabled (customizer).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/

$slide_title = esc_html(get_theme_mod('wpg_noslider_title',__('Information', 'wpg_theme')));
?>

<div class="radius">
  <span class="screen-reader-text" tabindex="0">
    <?php echo get_theme_mod('wpg_noslider_section',__('Section title', 'wpg_theme'));?>
  </span>
  <div id="slider-no" class="slides">
    <div id="header-post-noslide" class="pad-all">
      <div class="header-post-meta meta-line">
        <span class="pad-all">
          <?php _e('Information', 'wpg_theme'); ?>
        </span>
      </div>
      <div class="text-center-left pad-all">
        <div class="entry-title class-h2"><a href="<?php echo get_theme_mod('wpg_noslider_btn_url', '#');?>"><?php echo $slide_title;?></a></div>
        <div class="entry-summary">
          <?php echo get_theme_mod('wpg_noslider_tinymce', '');?>
        </div>
        <a href="<?php echo get_theme_mod('wpg_noslider_btn_url', '#');?>" class="btn alignleft">
          <?php $btn_text = sprintf(__( 'Continue reading <span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ),$slide_title); ?>
          <?php echo get_theme_mod('wpg_noslider_btn_title', $btn_text);?>
          <i class="icon-angle-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>
