<?php
/**
* The primary_baners sidebar.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>

<header class="screen-reader-focus" tabindex="0">
	<h2><?php echo esc_html(get_theme_mod('wpg_primary_baners_title',__('Title', 'wpg_theme'))); ?></h2>
</header>
<?php
if ( is_active_sidebar( 'wpg-footerbar-primary_baners' ) ) {
	dynamic_sidebar( 'wpg-footerbar-primary_baners' );
}
?>
