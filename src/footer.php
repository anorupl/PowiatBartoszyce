<?php
/**
* The template for displaying the footer.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/

?>
<div class="footer-background col-12">
  <img src="<?php echo THEME_URL . 'img/footer-bg.png'?>" alt=""  />
</div>
<?
  /* ==========================================
  * Section - menu with links banner          *
  * =====================================+====*/
  if (get_theme_mod('wpg_secondary_baners_active', false) === true) {
    get_sidebar('secondary_baners');
  }


?>
<footer class="clear-both">
  <div id="contact-footer">
    <div class="container">
      <div id="contact-info" class="col-5 pad-all">
        <h3 class="widget-title"><?php echo esc_html(get_theme_mod("wpg_contact_place_1",__('Place name', 'wpg_theme'))); ?></h3>
        <!-- Address -->
        <div class="contact-item address">
          <div class="contact-item__icon">
            <i class="icon-map-marker"></i><span class="h-font"><?php _e('Address', 'wpg_theme');?></span>
          </div>
          <div class="contact-item__text">
            <?php echo esc_html(get_theme_mod("wpg_contact_adres_1",'')); ?>
          </div>
        </div>
        <!-- Hours -->
        <div class="contact-item address">
          <div class="contact-item__icon">
            <i class="icon-clock"></i><span class="h-font"><?php _e('Opening Hours', 'wpg_theme');?></span>
          </div>
          <div class="contact-item__text">
            <?php echo esc_html(get_theme_mod("wpg_hours",'')); ?>
          </div>
        </div>
        <!-- Phone -->
        <div class="contact-item phone">
          <div class="contact-item__icon">
            <i class="icon-phone_android"></i><span class="h-font"><?php _e('Telephone number', 'wpg_theme');?></span>
          </div>
          <div class="contact-item__text">
            <?php
            $phone = get_theme_mod("wpg_contact_phone_1");
            printf('<a href="tel:%1s">%2$s</a>', str_replace(' ','', $phone), antispambot($phone));
            ?>
          </div>
        </div>
        <!-- Email -->
        <div class="contact-item email">
          <div class="contact-item__icon">
            <i class="icon-envelope"></i><span class="h-font"><?php _e('E-mail', 'wpg_theme');?></span>
          </div>
          <div class="contact-item__text">
            <?php printf('<a href="mailto:%1s">%1$s</a>', antispambot(get_theme_mod("wpg_contact_email_1"))); ?>
          </div>
        </div>

    </div>
      <div id="footer-widget" class="col-4 pad-all">
        <?php
        /* ==========================================
        * Section - Footer sidebar                  *
        * =====================================+====*/
        get_sidebar('footer_column');
        ?>
      </div>
      <div id="map_svg" class="col-3 pad-all">
      </div>
    </div>
  </div>
  <div id="copyright">
    <div class="container">
      <div class="col-8 pad-all">
        <!-- menu footer (deklaracje rodo) -->
        <?php if (has_nav_menu('menu_footer')) {

    			wp_nav_menu(array(
    				'container'      => false,
    				'theme_location' => 'menu_footer',
    				'menu_id'        => 'menu_footer',
            'depth'          => 1,
    				'items_wrap'     => '<nav id="%1$s" class="h-nav wp-nav" data-class="h-nav wp-nav"><ul class="%2$s">%3$s</ul></nav>',
    			));
        }
        ?>



      </div>
      <div class="col-4 text-center-right pad-all">
        <!-- logo -->
        &copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.<br> <?php _e('All Rights Reserved', 'wpg_theme'); ?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer();  ?>
</body>
</html>
