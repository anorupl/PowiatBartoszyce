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
<section id="section-alert">
  <div class="container">
    <div class="clear-both pad-all">
      <header class="alert-summary class-h2">
        <h2><?php echo get_theme_mod('wpg_alert_tinymce',__('Information', 'wpg_theme'));?></h2>
      </header>
      <a href="<?php echo $alert_url; ?>" class="btn btn--alert alignright">
        <?php echo get_theme_mod('wpg_alert_btn_title', __('Show more', 'wpg_theme'));?>
        <i class="icon-angle-right"></i>
      </a>
    </div>
  </div>
</section>
