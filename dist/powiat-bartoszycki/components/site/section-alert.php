<?php
/**
* The template for displaying the post on home page in header.
*
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>

<?php
$alert_url = get_theme_mod('wpg_alert_btn_url', '#');
?>
<div id="section-alert">
  <div class="container">
    <div class="clear-both pad-all">
      <div class="alert-summary class-h2" aria-hidden="true">
        <div class="class-h2"><?php echo get_theme_mod('wpg_alert_textarea',__('Information', 'wpg_theme'));?></div>
      </div>
      <a href="<?php echo $alert_url; ?>" class="btn btn--alert alignright">
        <span class="screen-reader"><?php echo get_theme_mod('wpg_alert_textarea',__('Information', 'wpg_theme'));?>, </span>
        <?php echo get_theme_mod('wpg_alert_btn_title', __('Show more', 'wpg_theme'));?>
        <i class="icon-angle-right"></i>
      </a>
    </div>
  </div>
</div>
