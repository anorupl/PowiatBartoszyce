<?php
/**
* File with setting and control in header when slider is off.
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

// ==============================================
//  = Header section with article - title						=
//  =============================================
$wp_customize->add_setting('wpg_noslider_section', array(
  'default'            => __('Section title', 'wpg_theme'),
  'capability' 		     => 'edit_theme_options',
  'sanitize_callback'  => 'sanitize_text_field'

));

$wp_customize->add_control( 'wpg_noslider_section', array(
  'settings' => 'wpg_noslider_section',
  'label'   => __('Section article - title (Text for the blind)', 'wpg_theme'),
  'description' =>  __('Text only for the blind)', 'wpg_theme'),
  'section'  => $header_section_id,
  'type'    => 'text'
));

// ==============================================
//   = Header section with article - Article title
//  =============================================
$wp_customize->add_setting('wpg_noslider_title', array(
  'default'           => __('Title information', 'wpg_theme'),
  'capability' 		=> 'edit_theme_options',
  'sanitize_callback' => 'sanitize_text_field'

));

$wp_customize->add_control( 'wpg_noslider_title', array(
  'settings' => 'wpg_noslider_title',
  'label'   => __('Section article - Article Title', 'wpg_theme'),
  'section'  => $header_section_id,
  'type'    => 'text'
));


// ==============================================
//   = Header section with article - button title						=
//  =============================================
$wp_customize->add_setting('wpg_noslider_btn_title', array(
  'default'            => __('Show more', 'wpg_theme'),
  'capability' 		     => 'edit_theme_options',
  'sanitize_callback'  => 'sanitize_text_field'

));

$wp_customize->add_control( 'wpg_noslider_btn_title', array(
  'settings' => 'wpg_noslider_btn_title',
  'label'   => __('Section article - Button title', 'wpg_theme'),
  'section'  => $header_section_id,
  'type'    => 'text'
));


// ==============================================
//   = Header section with article - button url					=
//  =============================================
$wp_customize->add_setting('wpg_noslider_btn_url', array(
  'default' => '#',
  'capability' => 'edit_theme_options',
  'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control('wpg_noslider_btn_url', array(
  'label' => __('Section article - Button url ', 'wpg_theme'),
  'section' => $header_section_id,
  'settings' => 'wpg_noslider_btn_url',
  'type' => 'url',
));


// ==============================================
//  = Header section with article - Description -
//  =============================================
$wp_customize->add_setting( "wpg_noslider_tinymce",
array(
  'default' => '',
  'sanitize_callback' => 'wp_kses_post'
)
);
$wp_customize->add_control( new WPG_TinyMCE_Custom_control( $wp_customize, "wpg_noslider_tinymce", array(
  'label'       => __('Section article - Article content', 'wpg_theme'),
  'section'     => $header_section_id,
  'input_attrs' => array(
    'toolbar1' => 'bold italic bullist numlist alignjustify link',
  )
)));

// ==============================================
//  = Shortcuts Section title						=
//  =============================================
$wp_customize->add_setting('wpg_shortcuts_section', array(
  'default'           => __('Shortcuts', 'wpg_theme'),
  'capability' 	     => 'edit_theme_options',
  'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( 'wpg_shortcuts_section', array(
  'settings'=> 'wpg_shortcuts_section',
  'label'   => __('Section Shortcuts - Section title (Text for the blind)', 'wpg_theme'),
  'description' => sprintf(__("Items for the section are added on the <a href='%1s'>widget page</a>",'wpg_theme'), admin_url( 'widgets.php')),
  'section' => $header_section_id,
  'type'    => 'text'
));

// ==============================================
//  = Image background in header				=
//  =============================================
$wp_customize->add_setting( 'wpg_header_image', array(
  'sanitize_callback' => 'absint'
));

$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'wpg_header_image', array(
  'label' => __('Header - Image background ', 'wpg_theme'),
  'section' => 	$header_section_id,
  'height' => 600,
  'width' => 1920,
  'flex_width ' => true,
  'flex_height ' => true,
)));
?>
