<?php
 /**
 * File with setting and control to section alert.
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */


 // ==============================================
 //  = Show/Hidde 							=
 //  =============================================
 $wp_customize->add_setting('wpg_alert_active', array(
   'default'        => false,
   'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control(
           new WPG_Customize_Control_Switch($wp_customize, 'wpg_alert_active', array(

                   'settings' 	=> 'wpg_alert_active',
                   'section'  	=> $alert_section_id,
                   'label'    	=> __('Show section', 'wpg_theme'),
                   'type'		=> 'switch'
               )
           )
 );


   // ==============================================
     //  = button title						=
     //  =============================================
     $wp_customize->add_setting('wpg_alert_btn_title', array(
 		'default'            => __('Show more', 'wpg_theme'),
    'capability' 		     => 'edit_theme_options',
    'sanitize_callback'  => 'sanitize_text_field'

 	));

 	$wp_customize->add_control( 'wpg_alert_btn_title', array(
 		'settings' => 'wpg_alert_btn_title',
 		'label'   => __('Button title', 'wpg_theme'),
 		'section'  => $alert_section_id,
 		'type'    => 'text'
     ));


     // ==============================================
     //  = button url					=
     //  =============================================
       $wp_customize->add_setting('wpg_alert_btn_url', array(
           'default' => '#',
           'capability' => 'edit_theme_options',
           'sanitize_callback' => 'esc_url_raw',
       ));
       $wp_customize->add_control('wpg_alert_btn_url', array(
           'label' => __('Button url', 'wpg_theme'),
           'section' => $alert_section_id,
           'settings' => 'wpg_alert_btn_url',
           'type' => 'url',
       ));

      // Test of TinyMCE control
      $wp_customize->add_setting( "wpg_alert_tinymce",
        array(
          'default' => __('Information', 'wpg_theme'),
          'sanitize_callback' => 'wp_kses_post'
        )
      );
      $wp_customize->add_control( new WPG_TinyMCE_Custom_control( $wp_customize, "wpg_alert_tinymce",
        array(
          'label'       => __('Description', 'wpg_theme'),
          'section'     => $alert_section_id,
          'input_attrs' => array(
            'toolbar1' => 'bold italic bullist numlist alignjustify link',
          )
        )
      ) );


?>
