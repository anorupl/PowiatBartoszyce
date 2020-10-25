<?php
 /**
 * File with setting and control to main loop on homepage
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */


 // ==============================================
 //  = Show/Hidde 							=
 //  =============================================
 $wp_customize->add_setting('wpg_links_active', array(
   'default'        => false,
   'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control(
           new WPG_Customize_Control_Switch($wp_customize, 'wpg_links_active', array(

                   'settings' 	=> 'wpg_links_active',
                   'section'  	=> $links_section_id,
                   'label'    	=> __('Show section', 'wpg_theme'),
                   'type'		=> 'switch'
               )
           )
 );

 // ==============================================
   //  = Section title								=
   //  =============================================
 $wp_customize->add_setting('wpg_links_title', array(
   'default'        => __('Links to pages', 'wpg_theme'),
     'capability' 		=> 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'

 ));

 $wp_customize->add_control( 'wpg_links_title', array(
   'settings' => 'wpg_links_title',
   'label'   => __('Title section', 'wpg_theme'),
   'section'  => $links_section_id,
   'type'    => 'text'
 ));

 ?>
