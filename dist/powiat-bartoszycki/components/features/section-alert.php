<?php
/**
* Template part for displaying alert (customizer).
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
*/


$alert_title = esc_html(get_theme_mod('wpg_alert_title',__('Information', 'wpg_theme')));
?>
<section id="site-alert" class="pad-all col-5">
  <header class="header-section meta-line">
        <h2><?php echo $alert_title; ?></h2>
  </header>
<div class="alert-summary">
  <?php echo get_theme_mod('wpg_alert_tinymce', '');?>
</div>
<a href="<?php echo get_theme_mod('wpg_alert_btn_url', '#');?>" class="btn alignleft">
  <?php $alert_btn = printf(__( 'Continue reading <span class="screen-reader-text"> "%s"</span>', 'wpg_theme' ),$alert_title); ?>
  <?php echo get_theme_mod('wpg_alert_btn_title', $alert_btn);?>
  <i class="icon-angle-right"></i>
</a>
</section>
