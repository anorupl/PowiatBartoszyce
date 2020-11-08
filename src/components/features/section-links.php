<?php
/**
* The template for displaying the custom category with post on home page.
*
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

?>
  <section id="page_links" class="page-section content-style col-4_5">
    <header class="header-section meta-line" tabindex="0">
          <h2><?php echo esc_html(get_theme_mod('wpg_links_title',__('Links to pages', 'wpg_theme'))); ?></h2>
    </header>
    <?php if (has_nav_menu('menu_page_links')):
					wp_nav_menu(array(
						'container'      => false,
						'theme_location' => 'menu_page_links',
						'menu_id'        => 'menu_page_links',
            'depth'          => 1,
						'items_wrap'     => '<div id="%1$s"><ul class="page_links">%3$s</ul></div>',
					));
			endif; ?>
</section>
