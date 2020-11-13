<?php
/**
* The header for our theme
* and
* This is the template that displays all of the <head> <header>
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<?php wp_head();?>
</head>
<body <?php body_class(); ?> >
	<div id="cookie-notice" role="banner" class="cookie-wpg" aria-label="Informacja o ciasteczkach">
	  <div class="notice-continer col-12 gutters">
		  <div id="cn-notice-text" class="text-center pad-all">
				Ta strona korzysta z ciasteczek, aby świadczyć usługi na najwyższym poziomie. Dalsze korzystanie ze strony oznacza, że zgadzasz się na ich użycie.
				<button id="cn-accept-cookie" class="btn">Akceptuj</button>
				<a href="#" target="_blank" id="cn-more-info" class="btn">Polityka prywatności</a>
		  </div>
		</div>
	</div>
	<div id="skip-links">
		<span class="clear"></span>
		<a role="button" id="first-skip-link" class="skip-main" href="#main"> <?php _e('Skip to content','wpg_theme'); ?></a>
		<a role="button" class="skip-main" href="#menu_header"><?php _e('Go to the main page navigation','wpg_theme'); ?></a>
		<span class="clear"></span>
	</div>
	<?php
	/* ====================
	 * Popup - content   *
	 * ===================*/
	if (get_theme_mod('wpg_popup_active', false) === true):
	/* =================================
	*  Customizer - image background   *
	* =================================*/
	$popup_image_id = absint(get_theme_mod('wpg_popup_image',''));

	if (!empty($popup_image_id)) {
		$popup_image_id = wp_get_attachment_image_url( $popup_image_id, 'full');
	} else {
		$popup_image_id = get_template_directory_uri() . '/img/default/no_image.jpg';
	}
	?>
	<div id="site-popup" class="mfp-hide">
		<a href="<?php echo get_theme_mod('wpg_popup_url', '#');?>">
			<img alt="<?php echo get_theme_mod('wpg_popup_desc', '');?>" src="<?php echo esc_url($popup_image_id); ?>"/>
		</a>
	</div>
	<?php endif; ?>
<div id="top-bar" class="header-top clear-both">
	<div class="wrapper">
		<div id="top-bar__address" class="inline-left hide-on-small">
			<?php wpg_the_adress();?>
		</div>
		<div class="inline-right">
			<div id="form-wcga" class="form-wcga inline-left">
				<?php form_wcga(); ?>
			</div>
			<div id="top-bar__social" class="l-icon inline-left hide-on-small">
				<?php wpg_social_net_link('<span class="screen-reader-text">%1$s</span>%2$s');?>
			</div>
		</div>
	</div>
</div>
<header class="header-wrapper clear-both" >
	<div id="site-header" class="wrapper">
		<div class="title-area col-7">
			<h1 class="site-title">
				<?php if (!has_custom_logo()): ?>
					<a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a>
				<?php else: ?>
					<?php the_custom_logo();?>
				<?php endif;?>
			</h1>
		</div>
		<div id="site-search" class="col-5 hide-on-small">
			<?php get_search_form(); ?>
		</div>
	</div><!-- end #site-header-bar -->
<div id="site-nav-bar" class="clear-both">
	<div class="container">
		<?php if (has_nav_menu('menu_header')): ?>
			<button class="icon-button-small-menu hide-desktop center-button">
				<?php _e('Menu', 'wpg_theme');?>
			</button>
			<?
			wp_nav_menu(array(
				'container'      => false,
				'theme_location' => 'menu_header',
				'menu_id'        => 'menu_header',
				'items_wrap'     => '<nav id="%1$s" class="h-nav bar-color hide-on-small wp-nav" data-class="h-nav bar-color hide-on-small wp-nav"><ul class="%2$s">%3$s</ul></nav>',
			));
		else:
			// only if administrator
			if (current_user_can( 'administrator' )) :
				?>
				<!-- Menu poziome -->
				<button class="icon-button-small-menu hide-desktop center-button" aria-expanded="false" aria-controls="header-menu"><?php _e('Menu', 'wpg_theme'); ?></button>
				<nav id="menu_header" class="h-nav bar-color hide-on-small wp-nav" data-class="h-nav bar-color hide-on-small wp-nav" role="navigation">
					<ul class="menu">
						<li class="menu-item"><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php _e('Add menu', 'wpg_theme'); ?></a></li>
					</ul>
				</nav>
				<?php
			endif;
		endif;
		?>
	</div><!-- end .wrapper -->
</div><!-- end #site-nav-bar -->
</header>
<?php
/* ====================
* Section - alert   *
* ===================*/
if (get_theme_mod('wpg_alert_active', false) === true) {
	get_template_part('components/site/section', 'alert' );
}

/* =================================
*  Customizer - image background   *
* =================================*/
$image_id = absint(get_theme_mod('wpg_header_image',''));

if (!empty($image_id)) {
	$image_header = wp_get_attachment_image_url( $image_id, 'full');
} else {
	$image_header = get_template_directory_uri() . '/img/default/no_image.jpg';
}

?>
<div id="header-background" class="col-12" style="background-image:url('<?php echo esc_url($image_header); ?>');">
	<div class="container">
			<div id="header-content">
				<div id="slider-container" class="col-7 gutters">
			<?php
			/* ====================
			 * Section - Slider   *
			 * ===================*/
			if (get_theme_mod('wpg_slider_active', false) === true) {
				get_template_part('components/features/slider/loop', 'category' );
			} else {
			 	get_template_part('components/features/slider/custom', 'text' );
			}
			?>
		</div>
		<?php
		if ( is_active_sidebar( 'wpg-headerbar-shortcuts' ) ) {
			?>
			<section id="bar_shortcuts" class="col-5">
				<header class="screen-reader-text">
					<h2><?php echo get_theme_mod('wpg_shortcuts_section',__('Section title', 'wpg_theme'));?></h2>
				</header>
				<ul class="shortcuts-links">
					<?php dynamic_sidebar( 'wpg-headerbar-shortcuts' ); ?>
				</ul>
			</section>
			<?php
		}
		?>
			</div>
	</div>
</div>
