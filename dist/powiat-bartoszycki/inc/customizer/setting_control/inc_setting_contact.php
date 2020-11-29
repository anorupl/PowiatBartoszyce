<?php
/**
* File with setting and control in 'club' section
*
* @package Powiat Bartoszycki
* @since 0.1.1
*/

// ==============================================
//  = Place title						=
//  =============================================
$wp_customize->add_setting("wpg_contact_place_1", array(
	'default'           => __('Place title', 'wpg_theme'),
	'capability' 		=> 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field'

));

$wp_customize->add_control( "wpg_contact_place_1", array(
	'settings' => "wpg_contact_place_1",
	'label'   => __('Place title', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'    => 'text'
));

// ==============================================
//  = Place Addres=
//  =============================================
$wp_customize->add_setting("wpg_contact_adres_1", array(
	'default' => '',
	'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( "wpg_contact_adres_1", array(
	'settings' => "wpg_contact_adres_1",
	'label'    => __('Address', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'=> 'text'
));

// ==============================================
//  = Place Phone
//  =============================================
$wp_customize->add_setting("wpg_contact_phone_1", array(
	'default'=> '',
	'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( "wpg_contact_phone_1", array(
	'settings'  => "wpg_contact_phone_1",
	'label'     => __('Telephone number', 'wpg_theme'),
	'section'   => $contact_section_id,
	'type'      => 'text'
));

// ==============================================
//  = E-mail (text) =
//  =============================================
$wp_customize->add_setting("wpg_contact_email_office", array(
	'default'=> '',
	'sanitize_callback' => 'sanitize_email'
));

$wp_customize->add_control( "wpg_contact_email_office", array(
	'settings' => "wpg_contact_email_office",
	'label'    => __('E-mail to Office', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'     => 'email'
));

// ==============================================
//  = E-mail (text) =
//  =============================================
$wp_customize->add_setting("wpg_contact_email_editorial", array(
	'default'=> '',
	'sanitize_callback' => 'sanitize_email'
));

$wp_customize->add_control( "wpg_contact_email_editorial", array(
	'settings' => "wpg_contact_email_editorial",
	'label'    => __('E-mail to editorial office', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'     => 'email'
));

// ==============================================
//  = Opening Hours							=
//  =============================================
$wp_customize->add_setting('wpg_hours', array(
	'default'        => '',
	'sanitize_callback' => 'sanitize_text_field'
));

$wp_customize->add_control( 'wpg_hours', array(
	'settings' => 'wpg_hours',
	'label'   => __('Opening Hours', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'    => 'textarea'
));
?>
