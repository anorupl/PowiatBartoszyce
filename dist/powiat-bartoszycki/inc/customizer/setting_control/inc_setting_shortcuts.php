<?php
 /**
 * File with setting and control in 'shortcuts' section
 *
 * @package Powiat Bartoszycki
 * @since 0.1.0
 */
// ==============================================
//  = Section title						=
//  =============================================
$wp_customize->add_setting('wpg_shortcuts_section', array(
 'default'           => __('Section title', 'wpg_theme'),
 'capability' 	     => 'edit_theme_options',
 'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( 'wpg_shortcuts_section', array(
 'settings'=> 'wpg_shortcuts_section',
 'label'   => __('Section title', 'wpg_theme'),
 'section' => $shortcuts_section_id,
 'type'    => 'text'
));


?>
