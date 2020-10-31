<?php
/**
* The right sidebar containing the main widget area.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package MBP Bartoszyce
* @since 0.1.0
*/
if ( ! is_active_sidebar( 'wpg-sidebar-right' ) ) {
	return;
}
dynamic_sidebar( 'wpg-sidebar-right' );
?>
