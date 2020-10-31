<?php
/**
* Disabled/Remove default wordpress function
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

/**
* Remove Emoji (emotniki :) )
* @credits https://wordpress.org/plugins/disable-emojis/
*/
function wpg_disable_emoji_coments() {

  remove_action('wp_head', 'print_emoji_detection_script', 7); // Front-end browser support detection script
  remove_action('admin_print_scripts', 'print_emoji_detection_script'); // Admin browser support detection script
  remove_action('wp_print_styles', 'print_emoji_styles'); // Emoji styles
  remove_action('admin_print_styles', 'print_emoji_styles'); // Admin emoji styles
  remove_filter('the_content_feed', 'wp_staticize_emoji'); // Remove from feed, this is bad behaviour!
  remove_filter('comment_text_rss', 'wp_staticize_emoji'); // Remove from feed, this is bad behaviour!
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email'); // Remove from mail
  if (get_site_option('initial_db_version') >= 32453) {
    remove_action('init', 'smilies_init', 5); // This removes the ascii to smiley convertion
  }
  //* Remove DNS prefetch s.w.org (used for emojis, since WP 4.7)
  add_filter('emoji_svg_url', '__return_false');
  //* Remove DNS prefetch s.w.org (used for emojis, since WP 4.7)
  add_filter('emoji_svg_url', '__return_false');

  // Remove comments links from admin bar
  if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'wpg_disable_emoji_coments', 4);

/**
* Disable 'medium_large' Image size
*/
function wpg_filter_image_sizes($sizes) {

  unset( $sizes['medium_large']);
  return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'wpg_filter_image_sizes');

/**
* Functions to disable comments
*************************/

// Funcja usuwająca rss z komentarzami
function remove_comments_rss( $for_comments ) { return;}
add_filter('post_comments_feed_link','remove_comments_rss');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {

  // Redirect any user trying to access comments page
  global $pagenow;
  if ($pagenow === 'edit-comments.php') {
    wp_redirect(admin_url()); exit;
  }
  // Disable support for comments and trackbacks in post types

  $post_types = get_post_types();
  foreach ($post_types as $post_type) {
    if(post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
      remove_post_type_support($post_type, 'trackbacks');
    }
  }

  // Remove comments metabox from dashboard
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');


/**
* Function to remove version numbers
*/
function wpg_remove_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' ) )
  $src = remove_query_arg( 'ver', $src );
  return $src;
}

?>
