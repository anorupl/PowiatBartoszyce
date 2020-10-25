<?php
/**
* File with setting and control in 'Privacy message"
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

// ==============================================
//  = Show/Hidde =
//  =============================================
$wp_customize->add_setting('wpg_privacy_active', [
  'default'    => false,
  'capability' => 'edit_theme_options',
]);

$wp_customize->add_control(
  new WPG_Customize_Control_Switch($wp_customize, 'wpg_privacy_active', [
    'settings' => 'wpg_privacy_active',
    'section'  => $privacy_section_id,
    'label'    => __('Show in footer', 'wpg_theme'),
    'description'	=> sprintf( __( 'Go to the page with privacy policy settings: <a href="%1$s">Policy settings</a>', 'wpg_theme' ), admin_url('privacy.php') ),
    'type' => 'switch'
  ])
);
?>
