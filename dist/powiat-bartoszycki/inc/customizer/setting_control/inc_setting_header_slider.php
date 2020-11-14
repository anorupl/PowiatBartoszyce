<?php
/**
* File with setting and control in 'Slider' section
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

// ==============================================
//  = Show/Hidde 							=
//  =============================================
$wp_customize->add_setting('wpg_slider_active', array(
  'default'        => false,
  'capability' => 'edit_theme_options',
));

$wp_customize->add_control( new WPG_Customize_Control_Switch($wp_customize, 'wpg_slider_active', array(
  'settings' 	=> 'wpg_slider_active',
  'section'  	=> $header_slider_section_id,
  'label'    	=> __('Show section', 'wpg_theme'),
  'type'		=> 'switch'
)));
// ==============================================
//  = Section title						=
//  =============================================
$wp_customize->add_setting('wpg_slider_section', array(
  'default'            => __('Section title', 'wpg_theme'),
  'capability' 		     => 'edit_theme_options',
  'sanitize_callback'  => 'sanitize_text_field'
));

$wp_customize->add_control( 'wpg_slider_section', array(
  'settings' => 'wpg_slider_section',
  'label'   => __('Section title', 'wpg_theme'),
  'section'  => $header_slider_section_id,
  'type'    => 'text'
));

// ==============================================
//  = Number Slides							=
//  =============================================
$wp_customize->add_setting( 'wpg_slider_number', array(
  'default'           => 1,
  'capability'        => 'edit_theme_options',
  'sanitize_callback' => 'wpg_sanitize_number_range',
));
$wp_customize->add_control( 'wpg_slider_number', array(
  'label'           	=> __( 'No of items', 'wpg_theme' ),
  'description'     	=> sprintf(__('Enter number between %1s and %2s .Save and refresh the page if No of Blocks is changed.','wpg_theme'),'1','10' ),
  'section'         	=> $header_slider_section_id,
  'type'            	=> 'number',
  'priority'        	=> 100,
  'input_attrs'     	=> array( 'min' => 1, 'max' => 10, 'step' => 1, 'style' => 'width: 55px;' )
));

// ==============================================
//  = Select category					=
//  =============================================
$wp_customize->add_setting('wpg_slider_category', array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wpg_intval'
));
$wp_customize->add_control('wpg_slider_category', array(
  'type'	=>	'select',
  'label' => __('Select Category','wpg_theme'),
  'description' => __('Select category to show slider.','wpg_theme'),
  'section' => $header_slider_section_id,
  'choices' => wpg_category_lists(),
));
?>
