<?php
/**
* File with setting and control in 'club' section
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

// ==============================================
//  = Show map=
//  =============================================
$wp_customize->add_setting('wpg_contact_maps', array(
	'default'=> false,
	'capability' => 'edit_theme_options',
));

$wp_customize->add_control( 'wpg_contact_maps', array(
	'settings' => 'wpg_contact_maps',
	'label'   => __('Show map in contact', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'=> 'checkbox'
));


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
$wp_customize->add_setting("wpg_contact_email_1", array(
	'default'=> '',
	'sanitize_callback' => 'sanitize_email'
));

$wp_customize->add_control( "wpg_contact_email_1", array(
	'settings' => "wpg_contact_email_1",
	'label'    => __('E-mail', 'wpg_theme'),
	'section'  => $contact_section_id,
	'type'     => 'email'
));

// ==============================================
//  = E-mail (text) =
//  =============================================
$wp_customize->add_setting("wpg_contact_email_web", array(
	'default'=> '',
	'sanitize_callback' => 'sanitize_email'
));

$wp_customize->add_control( "wpg_contact_email_web", array(
	'settings' => "wpg_contact_email_web",
	'label'    => __('E-mail administrator', 'wpg_theme'),
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

// ==============================================
//  = Drag/drop marker Google map=
//  =============================================
$wp_customize->add_setting( "wpg_contact_map_latlong_1", array(
	'default'   => '54.248997, 20.804780',
));

$wp_customize->add_control(
	new WPG_Customize_Control_leafletjs_MAP($wp_customize, "wpg_contact_map_latlong_1", array(
		'settings' => "wpg_contact_map_latlong_1",
		'section'  => $contact_section_id,
		'label'    => __( 'Select a location on map', 'wpg_theme' )
	))
);

?>
