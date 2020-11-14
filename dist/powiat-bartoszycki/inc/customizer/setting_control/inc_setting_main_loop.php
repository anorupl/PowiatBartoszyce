<?php
/**
* File with setting and control to main loop on homepage
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

// ==============================================
//  = Section title								=
//  =============================================
$wp_customize->add_setting('wpg_mainloop_title', array(
  'default'        => __('Last post', 'wpg_theme'),
  'capability' 		=> 'edit_theme_options',
  'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( 'wpg_mainloop_title', array(
  'settings' => 'wpg_mainloop_title',
  'label'   => __('Title section', 'wpg_theme'),
  'section'  => $loop_section_id,
  'type'    => 'text'
));

// ==============================================
//  = Select category					=
//  =============================================
$wp_customize->add_setting('wpg_mainloop_cat', array(
  'default' => '0',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'wpg_intval'
));
$wp_customize->add_control('wpg_mainloop_cat', array(
  'type'	=>	'select',
  'label' => __('Select Category','wpg_theme'),
  'description' => __('Select category to show in Section.','wpg_theme'),
  'section' => $loop_section_id,
  'choices' => wpg_category_lists(),
));
?>
