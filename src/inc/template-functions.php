<?php
/**
* Additional features to allow styling of the templates
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

/**
* W3c - Remove attr type of javascript links.
*/
function remove_w3c_javascript(){
	ob_start( function( $buffer ){
		$buffer = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $buffer );
		return $buffer;
	});
}
add_action( 'template_redirect', 'remove_w3c_javascript');

/**
* W3c - Remove attr type of css links.
*/
function remove_w3c_css(){
	ob_start( function( $buffer ){
		$buffer = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
		return $buffer;
	});
}
add_action( 'template_redirect', 'remove_w3c_css');

/**
* W3c - Change template for navigation.
*/
function wpg_navigation_template( $template ) {

	$template = '<nav class="navigation %1$s" aria-label="%4$s"><h2 class="screen-reader-text">%2$s</h2><div class="nav-links">%3$s</div></nav>';

	return $template;
}
add_filter( 'navigation_markup_template', 'wpg_navigation_template' );

/**
* The Code below will modify the main WordPress loop, before the queries fired
*/
function wpg_mian_query($query) {

	// Before anything else, make sure this is the right query...
	if ( !is_admin() && $query->is_main_query() && $query->is_home ) {

		$main_cat_id = get_theme_mod('wpg_mainloop_cat', 0);

		if (!empty($main_cat_id) && $main_cat_id != 0) {

			$query->set('tax_query', array(
				'relation' => 'or',
				array(
					'taxonomy' => 'category',
					'field' => 'term_id',
					'terms' => $main_cat_id,
				)
			));
		}
	}
}
add_action( 'pre_get_posts', 'wpg_mian_query', 1 );


/**
* Adds custom classes to the array of body classes.
*
* @see 	Function Reference/body class
* @link https://codex.wordpress.org/Function_Reference/body_class
*
* @param 	array $classes Classes for the body element.
*/
function wpg_body_class($class) {

	$class[] = 'hfeed site';

	if (!is_admin()) {
		if (!is_home() || is_paged()) {

			$featuredcat = get_theme_mod('wpg_featuredcat_active', false);
			$b_bottom = get_theme_mod('wpg_b_bottom_active', false);

			if ($featuredcat === true ||$b_bottom === true) {

				$class[] = 'active-sidebar';

			} elseif (is_active_sidebar( 'wpg-sidebar-right' ) ) {

				$class[] = 'active-sidebar';
			}
		}
		if (is_page()){
			$class[] = 'single';
		}
	}
	return $class;
}
add_filter( 'body_class', 'wpg_body_class' );


/**
* Handles JavaScript detection.
*
* Adds a `js` class to the root `<html>` element when JavaScript is detected.
*/
function wpg_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'wpg_javascript_detection', 0 );


/**
* Filtr mark Posts/Pages as Untiled when no title is used
*
* @param 	string $title
* @return 	string
*/
function wpg_no_title( $title ) {
	return $title == '' ? __('Untitled', 'wpg_theme') : $title;
}
add_filter( 'the_title', 'wpg_no_title' );


/**
* Modifies the menu container and adds class
*
* @see https://developer.wordpress.org/reference/hooks/widget_nav_menu_args/
* @param array $nav_menu_args An array of arguments passed to wp_nav_menu() to retrieve a custom menu.
* @param stdClass $nav_menu Nav menu object for the current menu.
* @param array $args Display arguments for the current widget.
* @return array $args Updated menu args.
*/
function wpg_widget_nav_menu($nav_menu_args, $nav_menu, $args) {

	$nav_menu_args = array(

		'container'       => 'nav',
		'container_class' => 'v-nav dropdown',
		'menu'            => $nav_menu,
		'fallback_cb'     => ''
	);

	return $nav_menu_args;
}
add_filter( 'widget_nav_menu_args', 'wpg_widget_nav_menu', 10, 3 );


/**
* Count active widget in sidebar.
*
* @param string $sidebar_id ID sidebar.
* @return string class with number widgets.
*/
function wpg_the_widgets_count( $sidebar_id ) {

	if (!is_admin()) {

		$sidebars_widgets = wp_get_sidebars_widgets();

		if (!empty($sidebars_widgets[ $sidebar_id ])) {

			switch (count($sidebars_widgets[ $sidebar_id ])) {
				case (2):
				return 'col-6';
				break;
				case (3):
				return 'col-12--3';
				case (4):
				return 'col-12--2-4';
				break;
				default:
				return 'col-12--2-4';
				break;
			}
		} else {
			return 'col-12--2-4';
		}
	}
}



/**
* Filters list of allowed mime types and file extensions.
*
* @param array $mimes_types.
* @return array $mimes_types.
*/
function wpg_modify_upload_mimes ( $mimes_types ) {
	// add your extension to the mimes array as below
	$mimes_types['zip'] = 'application/zip';
	return $mimes_types;
}
add_filter( 'upload_mimes', 'wpg_modify_upload_mimes', 99 );


/**
* Modify upload mimes types - If unable to, the file name extension will be used to determine type.
*
* @param array $mimes_types.
* @return array $mimes_types.
*/
function wpg_add_allow_upload_extension_exception( $types, $file, $filename, $mimes ) {
	// Do basic extension validation and MIME mapping
	$wp_filetype = wp_check_filetype( $filename, $mimes );
	$ext         = $wp_filetype['ext'];
	$type        = $wp_filetype['type'];
	if( in_array( $ext, array( 'zip') ) ) { // it allows zip files
		$types['ext'] = $ext;
		$types['type'] = $type;
	}
	return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'wpg_add_allow_upload_extension_exception', 99, 4 );

/**
* Dodatkowa wtyczka TABELE (link do wtyczki)- Tinymce 4
*
*/
function wpg_custom_plugins_Tinymce( $plugins ) {
	$plugins['table'] = THEME_URL . 'js/assets/table_plugin.min.js';
	return $plugins;
}
add_action( 'mce_external_plugins', 'wpg_custom_plugins_Tinymce' );

/**
* Dodatkowa wtyczka TABELE (Rejestracja przycisku)- Tinymce 4
*
*/
function wpg_add_buttons_Tinymce( $buttons ) {
	array_push( $buttons, 'table' );
	return $buttons;
}
add_filter( 'mce_buttons', 'wpg_add_buttons_Tinymce' );


?>
