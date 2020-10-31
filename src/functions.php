<?php
/**
* Powiat Bartoszycki functions and definitions.
*
* @package Powiat Bartoszycki
* @since 0.1.0
*
* @link https://developer.wordpress.org/themes/basics/theme-functions/
*/

/* ==================================================
Global constants
================================================== */
define( 'THEME_NAME',wp_get_theme()->get( 'Name' ) );
define( 'THEME_VERSION', wp_get_theme()->get( 'Version' ) );
define( 'THEME_INC', get_template_directory() . '/inc/' );
define( 'THEME_URL', get_stylesheet_directory_uri() . '/' );
define( 'THEME_PATH',get_stylesheet_directory() . '/' );

define( 'THEME_DEBUG',   true );



if ( ! function_exists( 'wpg_setup' ) ) :
	/**
	* Sets up theme defaults and registers support for various WordPress features.
	*
	* Note that this function is hooked into the after_setup_theme hook, which
	* runs before the init hook. The init hook is too late for some features, such
	* as indicating support for post thumbnails.
	*
	*/
	function wpg_setup() {

		if ( ! isset( $content_width ) ) {
			$content_width = 1366;
		}

		load_theme_textdomain( 'wpg_theme', THEME_PATH . 'languages' );

		/**
		* Add default posts and comments RSS feed links to head.
		*/
		add_theme_support( 'automatic-feed-links' );

		/**
		* Let WordPress manage the document title.
		*/
		add_theme_support( 'title-tag' );

		/**
		*  Add theme support for Custom Logo.
		*/
		add_theme_support( 'custom-logo', array(
			'height'  => 287,
			'width'   => 768,
			'flex-height' => true,
			'flex-width'  => true
		));

		/**
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
		add_theme_support( 'post-thumbnails' );

		/**
		* Switch core markup to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/**
		* This theme uses wp_nav_menu().
		*/
		register_nav_menus( array(
			'menu_header'				=> esc_html__( 'Header Menu', 'wpg_theme' ),
			'menu_page_links'		=> esc_html__( 'Section - Links to other pages', 'wpg_theme' ),
			'menu_footer'		=> esc_html__( 'Footer Menu', 'wpg_theme' )
		));

		/**
		* Update image size;
		*/
		update_option( 'thumbnail_size_w', 320 );
		update_option( 'thumbnail_size_h', 480 );
		update_option( 'thumbnail_crop', false );
		update_option( 'medium_size_w', 768);
		update_option( 'medium_size_h', 512 );
		update_option( 'large_size_w', 1366);
		update_option( 'large_size_h', 911 );

	}
	add_action( 'after_setup_theme', 'wpg_setup' );
endif;

/**
* Enqueue scripts and styles.
*/
function wpg_enqueue() {

	//deregister
	wp_deregister_script( 'jquery' );

	//css
	wp_enqueue_style( 'wpg-style', get_stylesheet_uri(),array(),THEME_VERSION, 'screen' );
	wp_enqueue_style(	'wpg-print-style', THEME_URL . 'css/print.css', array(), THEME_VERSION, 'print');

	wp_enqueue_style( 'slick', THEME_URL . "css/slick.css");

	// fallback css
	wp_enqueue_style( 'wpg-ie', THEME_URL . 'css/ie.css');
	wp_style_add_data( 'wpg-ie', 'conditional', 'lt IE 9' );

	//Enqueue scripts
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	wp_enqueue_script( 'cookie', THEME_URL . 'js/assets/jquery.cookie.js','', THEME_VERSION);
	wp_enqueue_script( 'wpg-image', THEME_URL . 'js/assets/wpg-image.min.js',array('jquery'), THEME_VERSION, true );
	wp_enqueue_script( 'slick-js', THEME_URL . 'js/assets/slick.min.js',array('jquery'), THEME_VERSION, true );

	// fallback scripts
	wp_enqueue_script( 'wpg-modernizr-flexbox', THEME_URL . 'js/assets/modernizr-flexbox.min.js','', THEME_VERSION);
	wp_enqueue_script( 'html5', THEME_URL . 'js/assets/html5shiv.min.js',array(), THEME_VERSION, false );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	// theme main js
	wp_enqueue_script( 'wpg-main',THEME_URL . 'js/main.min.js',array('jquery'), THEME_VERSION, true );

	wp_localize_script('wpg-main', 'datalanuge', array(
		'offcontrast' => __('Wyłącz kontrast', 'wpg_theme'),
		'oncontrast' => __('Włącz kontrast', 'wpg_theme'),
		'url' => get_bloginfo('template_directory'),
		'next' => __('Previous Image (left arrow key)', 'wpg_theme'),
		'prev' => __('Next Image (right arrow key)', 'wpg_theme'),
		'of' => __('of', 'wpg_theme'),
		'close' => __('Close (Escape key)', 'wpg_theme'),
		'load'=> __('Loading ...', 'wpg_theme'),
		'image' => __('Image', 'wpg_theme'),
		'error_image' => __('it cannot be loaded.', 'wpg_theme')
	));
}
add_action( 'wp_enqueue_scripts', 'wpg_enqueue' );


/**
* Register widget area.
*
* @link 	https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
function wpg_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Header Shortcuts', 'wpg_theme' ),
		'id'            => 'wpg-headerbar-shortcuts',
		'description'   => '',
		'before_widget' => '<li id="%1$s" class="widget radius %2$s">',
		'after_widget'  => '</li>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Baners - Primary section', 'wpg_theme' ),
		'id'            => 'wpg-footerbar-primary_baners',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget-item ' . wpg_the_widgets_count('wpg-footerbar-primary_baners') . ' %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="screen-reader">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'wpg_theme' ),
		'id'            => 'wpg-sidebar-right',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Baners - Secondary section', 'wpg_theme' ),
		'id'            => 'wpg-footerbar-secondary_baners',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget ' . wpg_the_widgets_count('wpg-footerbar-secondary_baners') . ' %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="screen-reader">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer - middle column', 'wpg_theme' ),
		'id'            => 'wpg-footer_column',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wpg_widgets_init' );



/**
* Include file with customizer.
*/
require THEME_PATH . 'inc/customizer/customizer.php';

/**
* Include file with base setting:
*/
require THEME_PATH . 'inc/fn_disabled.php';
require THEME_PATH . 'inc/template-functions.php';
require THEME_PATH . 'inc/template-tags.php';
require THEME_PATH . 'inc/wcga_form.php';


require THEME_PATH . 'inc/widget/widget-baner.php';
