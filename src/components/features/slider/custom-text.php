<?php
/**
* Template part for displaying image background when slider is disabled (customizer).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/
?>
<?php

$slide_title = esc_html(get_theme_mod('wpg_noslider_title',__('Information', 'wpg_theme')));

?>
<section class="radius">
  <header class="screen-reader-text">
    <h2><?php echo get_theme_mod('wpg_noslider_section',__('Section title', 'wpg_theme'));?></h2>
  </header>
      <div id="slider-no" class="slider-bg pad-all">
              <article id="header-post-noslide" class="pad-all">
                  <div class="header-post-meta meta-line">
                    <span class="pad-all">
                      <?php _e('Information', 'wpg_theme'); ?>
                    </span>
                  </div>
                  <div class="text-center-left pad-all">
                    <header class="">
                      <h2 class="entry-title"><a href="<?php echo get_theme_mod('wpg_noslider_btn_url', '#');?>"><?php echo $slide_title;?></a></h2>
                    </header>
                    <div class="entry-summary">
                      <?php echo get_theme_mod('wpg_noslider_tinymce', '');?>
                    </div>
                    <a href="<?php echo get_theme_mod('wpg_noslider_btn_url', '#');?>" class="btn alignleft">
                      <?php $btn_text = sprintf(__( 'Continue reading <span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ),$slide_title); ?>
                      <?php echo get_theme_mod('wpg_noslider_btn_title', $btn_text);?>
                      <i class="icon-angle-right"></i>
                    </a>
                  </div>
              </article>
            </div>
</section>
