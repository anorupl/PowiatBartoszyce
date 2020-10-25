<?php
/**
* The secondary_baners.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>
<section id="secondary-baners" class="clear-both">
	<div class="container">
	<header class="meta-line">
		<h2><?php echo esc_html(get_theme_mod('wpg_secondary_baners_title',__('Title', 'wpg_theme'))); ?></h2>
	</header>
	</div>
	<div class="banner-container">
		<?php
		if ( is_active_sidebar( 'wpg-footerbar-secondary_baners' ) ) {
			dynamic_sidebar( 'wpg-footerbar-secondary_baners' );
		}
		?>
	</div>
</section>
