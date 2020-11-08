<?php
 /**
 * File with setting and control in header when slider is off.
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */

   // ==============================================
   //  = Section title						=
   //  =============================================
     $wp_customize->add_setting('wpg_noslider_section', array(
    'default'            => __('Section title', 'wpg_theme'),
    'capability' 		     => 'edit_theme_options',
    'sanitize_callback'  => 'sanitize_text_field'

  ));

  $wp_customize->add_control( 'wpg_noslider_section', array(
    'settings' => 'wpg_noslider_section',
    'label'   => __('Section title (Text for the blind)', 'wpg_theme'),
    'section'  => $header_section_id,
    'type'    => 'text'
     ));

 // ==============================================
   //  = Article title						=
   //  =============================================
   $wp_customize->add_setting('wpg_noslider_title', array(
   'default'           => __('Title information', 'wpg_theme'),
     'capability' 		=> 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'

 ));

 $wp_customize->add_control( 'wpg_noslider_title', array(
   'settings' => 'wpg_noslider_title',
   'label'   => __('Title information', 'wpg_theme'),
   'section'  => $header_section_id,
   'type'    => 'text'
   ));


   // ==============================================
     //  = button title						=
     //  =============================================
     $wp_customize->add_setting('wpg_noslider_btn_title', array(
 		'default'            => __('Show more', 'wpg_theme'),
    'capability' 		     => 'edit_theme_options',
    'sanitize_callback'  => 'sanitize_text_field'

 	));

 	$wp_customize->add_control( 'wpg_noslider_btn_title', array(
 		'settings' => 'wpg_noslider_btn_title',
 		'label'   => __('Information - Button title', 'wpg_theme'),
 		'section'  => $header_section_id,
 		'type'    => 'text'
     ));


     // ==============================================
     //  = button url					=
     //  =============================================
       $wp_customize->add_setting('wpg_noslider_btn_url', array(
           'default' => '#',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'esc_url_raw',
       ));
       $wp_customize->add_control('wpg_header_btn_url', array(
           'label' => __('Information - Button url ', 'wpg_theme'),
           'section' => $header_section_id,
           'settings' => 'wpg_noslider_btn_url',
           'type' => 'url',
       ));

      // Test of TinyMCE control
      $wp_customize->add_setting( "wpg_noslider_tinymce",
        array(
          'default' => '',
          'sanitize_callback' => 'wp_kses_post'
        )
      );
      $wp_customize->add_control( new WPG_TinyMCE_Custom_control( $wp_customize, "wpg_noslider_tinymce",
        array(
          'label'       => __('Description information', 'wpg_theme'),
          'section'     => $header_section_id,
          'input_attrs' => array(
            'toolbar1' => 'bold italic bullist numlist alignjustify link',
          )
        )
      ) );


?>
