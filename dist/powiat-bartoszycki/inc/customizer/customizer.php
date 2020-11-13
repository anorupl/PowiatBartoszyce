<?php
/**
* Theme Customizer
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
* @global object $wp_customize WP_Customize instance.
*/


global $wp_customize;

/* Load necessary files with additional elements
************************************************/
require get_template_directory() . '/inc/customizer/helpers/inc_front_css.php';
require get_template_directory() . '/inc/customizer/helpers/inc_helpers.php';
require get_template_directory() . '/inc/customizer/helpers/inc_scripts_and_style.php';


if(isset($wp_customize)) {


	/* Load necessary files with additional elements only if custumizer on
	************************************************/
	require get_template_directory() . '/inc/customizer/helpers/inc_context.php';
	require get_template_directory() . '/inc/customizer/helpers/inc_sanitization.php';


	/* Load extends class WP_Customize_Control
	************************************************/

	// Class "WPG_Customize_Control_Switch".
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_switch.php';

	// Class "Fonts_Dropdown_Google" - Custom control fonts field.
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_field_fonts.php';
	// Class "WPG_Customize_Control_Checkbox_Multiple" - Custom control with mutli checbox.
	// niezbędne dla pola
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multi_checbox.php';
	// Class "WPG_Customize_Control_Checkbox_Multiple_Sort"
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_multisort_checbox.php';
	// Class "WPG_Customize_Control_leafletjs_MAP".
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_leafletjs_map.php';
	// Class "WPG_Custom_OpeningHours".
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_field_open_hours.php';
	// Class "WPG_TinyMCE_Custom_control".
	require get_template_directory() . '/inc/customizer/custom_control_field/inc_tinymce.php';
}

/**
* Add customizations for this theme
*
* @since 0.1.0
*
* @param object $wp_customize WP_Customize instance
* @return void
*/
function wpg_customizer_general($wp_customize) {

	$existes_club       = post_type_exists( 'clubnews' );
	$existes_collection = post_type_exists( 'post_collection' );


	// Modify existing controls and settings
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

	// Add panel - Theme Settings
	$theme_panel_id = 'wpg_general';

	$wp_customize->add_panel( $theme_panel_id, array(
		'priority' 			=> '10',
		'capability' 		=> 'edit_theme_options',
		'theme_supports' 	=> '',
		'title' 			=> __( 'Theme Settings', 'wpg_theme' )
	) );

	/* Add Section - to panel [Theme Settings]
	* 1.Typography
	************************************************/

	// 1. Typography
	$font_section_id = 'wpg_typography_stc';

	$wp_customize->add_section( $font_section_id, array(
		'priority'   		=> '1',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Typography', 'wpg_theme' ),
		'panel' 			=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_fonts.php';


	// 2. Section with alert.
	 $alert_section_id = 'wpg_alert_stc';

	$wp_customize->add_section($alert_section_id, array(
		'priority'   		=> '2',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Section Alert', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_alert.php';

	// 3. Setting in header without a slider
	$header_section_id = 'wpg_header_stc';

	$wp_customize->add_section($header_section_id, array(
		'priority'   		=> '3',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Header', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_header.php';

	// 4. Slider setting in header
	$header_slider_section_id = 'wpg_h_slider_stc';

	$wp_customize->add_section( $header_slider_section_id, array(
		'priority'   		=> '4',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Header slider', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_header_slider.php';


	// 5. The site Popup
	$popup_id = 'wpg_popup_stc';

	$wp_customize->add_section($popup_id, array(
		'priority'   		=> '5',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Site - Popup', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_popup.php';


	// 7. Main loop setting in homepage
	$loop_section_id = 'wpg_loop_stc';

	$wp_customize->add_section( $loop_section_id, array(
		'priority'   		=> '7',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Section - News category', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_main_loop.php';

	// 8. Featured category in custom section on homepage.
	$featuredcat_id = 'wpg_featuredcat_stc';

	$wp_customize->add_section($featuredcat_id, array(
		'priority'   		=> '8',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Section - Featured category', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_featuredcat.php';

	// 9. Section with menu links to other pages.
	 $links_section_id = 'wpg_links_stc';

	$wp_customize->add_section($links_section_id, array(
		'priority'   		=> '9',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Section links', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_links.php';

	// 10. Section with widget banners.
	 $baners_section_id = 'wpg_baners_stc';

	$wp_customize->add_section($baners_section_id, array(
		'priority'   		=> '10',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Section Baners', 'wpg_theme' ),
		'panel' 				=> $theme_panel_id,
	));

	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_baners.php';


	// 11. Section contact.
	$contact_section_id = 'wpg_contact_stc';

	$wp_customize->add_section( $contact_section_id, array(
		'priority'   		=> '11',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Contact', 'wpg_theme' ),
		'panel' 			=> $theme_panel_id,
	));
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_contact.php';

	// 12. Social
	$social_section_id = 'wpg_social_stc';

	$wp_customize->add_section(  $social_section_id, array(
		'priority'   		=> '12',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'Social networks', 'wpg_theme' ),
		'panel' 			=> $theme_panel_id
	));
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_social.php';

	// 13. District
	$district_section_id = 'wpg_district_stc';

	$wp_customize->add_section(  $district_section_id, array(
		'priority'   		=> '13',
		'capability' 		=> 'edit_theme_options',
		'title'      		=> __( 'District', 'wpg_theme' ),
		'panel' 			=> $theme_panel_id
	));
	require get_template_directory() . '/inc/customizer/setting_control/inc_setting_district.php';

}
add_action( 'customize_register', 'wpg_customizer_general' );





/**
* Simple function to delete transient if custumizer save query in transient.
*/
function customizer_delete_transient() {
    delete_transient('name_transient');
}
//add_action('publish_post', 'customizer_delete_transient');
//add_action( 'transition_post_status', 'customizer_delete_transient', 10, 3 );
//add_action( 'customize_save_after','customizer_delete_transient');
?>
