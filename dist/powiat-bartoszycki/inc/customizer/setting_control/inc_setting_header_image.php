<?php
 /**
 * File with setting and control to Image background in header.
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */


// ==============================================
//  = Image background in header				=
//  =============================================
$wp_customize->add_setting( 'wpg_header_image', array(
'sanitize_callback' => 'absint'
));

$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'wpg_header_image', array(
'label' => __('Image background ', 'wpg_theme'),
'section' => 	$header_img_id,
'height' => 600,
'width' => 1920,
'flex_width ' => true,
'flex_height ' => true,
)));
?>
