<?php
/**
* The footer sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>
	<?php
	if ( is_active_sidebar( 'wpg-footer_column' ) ) {
		dynamic_sidebar( 'wpg-footer_column' );
	}
	?>
