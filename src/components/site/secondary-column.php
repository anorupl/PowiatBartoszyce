<?php
/**
* The template for displaying siedbar column.
*
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

/* ==========================================
* Section - loop with custom category       *
* =====================================+====*/
if (get_theme_mod('wpg_featuredcat_active', false) === true) {
  get_template_part('components/features/section', 'featured_sidebar' );
}
?>
<aside id="primary-baners" class="widget narrow-col">
  <?php
  /* ==========================================
  * Section - widget banner                   *
  * =====================================+====*/
  if (get_theme_mod('wpg_primary_baners_active', false) === true) {
    get_sidebar('primary_baners');
  }
  ?>
</aside>
<?php get_sidebar('right'); ?>
