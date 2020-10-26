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
<header class="header-wrapper" >
	<div id="site-header" class="wrapper clear-both">
		<div class="title-area col-7">
			<h1 class="site-title">
				<span class="screen-reader-text"><?php bloginfo('name');?></span>
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
<div id="header-content" class="col-12" style="background-image:url('<?php echo esc_url($image_header); ?>');">
	<div class="container">
			<div id="header-slider">
				<div  class="col-7">
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
			<?php if (has_nav_menu('menu_shortcuts')):
					wp_nav_menu(array(
						'container'      => false,
						'theme_location' => 'menu_shortcuts',
						'menu_id'        => 'menu_shortcuts',
						'items_wrap'     => '<section id="%1$s" class="col-5"><ul class="shortcuts-links">%3$s</ul></section>',
					));
				endif; ?>
			</div>
	</div>
</div>
<div class="header-bootom-bar clear-both"></div>
