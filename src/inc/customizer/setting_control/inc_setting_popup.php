<?php
 /**
 * File with setting and control to popup
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */

 // ==============================================
 //  = Show/Hidde 							=
 //  =============================================
 $wp_customize->add_setting('wpg_popup_active', array(
   'default'        => false,
   'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control(
           new WPG_Customize_Control_Switch($wp_customize, 'wpg_popup_active', array(

                   'settings' 	=> 'wpg_popup_active',
                   'section'  	=> $popup_id,
                   'label'    	=> __('Show popup', 'wpg_theme'),
                   'type'		=> 'switch'
               )
           )
 );



 // ==============================================
 //  = Pupup - image					                   =
 //  =============================================
 $wp_customize->add_setting( 'wpg_popup_image', array(
 'sanitize_callback' => 'absint'
 ));

 $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'wpg_popup_image', array(
 'mime_type' => 'image',
 'label' => __('Popup Image', 'wpg_theme'),
 'section' => 	$popup_id,
 )));

 // ==============================================
 //   = Pupup - url					=
 //  =============================================
   $wp_customize->add_setting('wpg_popup_url', array(
       'default' => '#',
       'capability' => 'edit_theme_options',
       'sanitize_callback' => 'esc_url_raw',
   ));
   $wp_customize->add_control('wpg_popup_url', array(
       'label' => __('Popup url ', 'wpg_theme'),
       'section' => $popup_id,
       'settings' => 'wpg_popup_url',
       'type' => 'url',
   ));

 // ==============================================
 //  = Pupup - Description				          		=
 //  =============================================
 $wp_customize->add_setting('wpg_popup_desc', array(
 	'default'        => '',
 		'sanitize_callback' => 'sanitize_text_field'
 ));

 $wp_customize->add_control( 'wpg_popup_desc', array(
 	'settings' => 'wpg_popup_desc',
 	'label'   => __('Popup Description', 'wpg_theme'),
  'description' =>  __('Description - Text for the blind)', 'wpg_theme'),
 	'section'  => $popup_id,
 	'type'    => 'textarea'
 ));














 ?>
