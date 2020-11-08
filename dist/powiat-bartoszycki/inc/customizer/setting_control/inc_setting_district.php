<?php
 /**
 * File with setting and control in district list in footer.
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */

// Gminy Miejskie
 $wp_customize->add_setting('wpg_dis1_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis1_url', array(
     'label' => __('Gmina Miejska Bartoszyce', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis1_url',
     'type' => 'url',
 ));

 $wp_customize->add_setting('wpg_dis2_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis2_url', array(
     'label' => __('Gmina Miejska Górowo Iławeckie', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis2_url',
     'type' => 'url',
 ));



// Gminy Wiejskie
 $wp_customize->add_setting('wpg_dis3_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis3_url', array(
     'label' => __('Gmina Wiejska Bartoszyce', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis3_url',
     'type' => 'url',
 ));

 $wp_customize->add_setting('wpg_dis4_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis4_url', array(
     'label' => __('Gmina Wiejska Bartoszyce', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis4_url',
     'type' => 'url',
 ));



// Gminy miejsko wiejskie
 $wp_customize->add_setting('wpg_dis5_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis5_url', array(
     'label' => __('Gmina Miejska-Wiejska Bisztynek', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis5_url',
     'type' => 'url',
 ));

 $wp_customize->add_setting('wpg_dis6_url', array(
     'default' => '#',
     'capability' => 'edit_theme_options',
     'sanitize_callback' => 'esc_url_raw',
 ));
 $wp_customize->add_control('wpg_dis6_url', array(
     'label' => __('Gmina Miejska-Wiejska Sępopol', 'wpg_theme'),
     'description' => __('Url to official page', 'wpg_theme'),
     'section' => $district_section_id,
     'settings' => 'wpg_dis6_url',
     'type' => 'url',
 ));

 ?>
