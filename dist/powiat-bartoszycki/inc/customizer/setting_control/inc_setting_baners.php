<?php
 /**
 * File with setting and control to section banners.
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */

 //  = Section with baners in bottom homepage
 //  =============================================

 // ==============================================
 //  = Show/Hidde 							=
 //  =============================================
 $wp_customize->add_setting('wpg_primary_baners_active', array(
   'default'        => false,
   'capability' => 'edit_theme_options',
 ));

 $wp_customize->add_control(
           new WPG_Customize_Control_Switch($wp_customize, 'wpg_primary_baners_active', array(

                   'settings' 	=> 'wpg_primary_baners_active',
                   'section'  	=> $baners_section_id,
                   'label'    	=> __('Baners - Primary section', 'wpg_theme'),
                   'type'		=> 'switch'
               )
           )
 );


 // ==============================================
   //  = Section title						=
   //  =============================================
   $wp_customize->add_setting('wpg_primary_baners_title', array(
   'default'           => __('Title', 'wpg_theme'),
     'capability' 		=> 'edit_theme_options',
       'sanitize_callback' => 'sanitize_text_field'

 ));

 $wp_customize->add_control( 'wpg_primary_baners_title', array(
   'settings' => 'wpg_primary_baners_title',
   'label'   => __('Section title (only for screen reader)', 'wpg_theme'),
   'section'  => $baners_section_id,
   'type'    => 'text'
   ));




   //  = Section with baners in footer
   //  =============================================



   // ==============================================
   //  = Show/Hidde 							=
   //  =============================================
   $wp_customize->add_setting('wpg_secondary_baners_active', array(
     'default'        => false,
     'capability' => 'edit_theme_options',
   ));

   $wp_customize->add_control(
             new WPG_Customize_Control_Switch($wp_customize, 'wpg_secondary_baners_active', array(

                     'settings' 	=> 'wpg_secondary_baners_active',
                     'section'  	=> $baners_section_id,
                     'label'    	=> __('Baners - Secondary section', 'wpg_theme'),
                     'type'		=> 'switch'
                 )
             )
   );


   // ==============================================
     //  = Section title						=
     //  =============================================
     $wp_customize->add_setting('wpg_secondary_baners_title', array(
     'default'           => __('Title', 'wpg_theme'),
       'capability' 		=> 'edit_theme_options',
         'sanitize_callback' => 'sanitize_text_field'

   ));

   $wp_customize->add_control( 'wpg_secondary_baners_title', array(
     'settings' => 'wpg_secondary_baners_title',
     'label'   => __('Section title', 'wpg_theme'),
     'section'  => $baners_section_id,
     'type'    => 'text'
     ));






?>
