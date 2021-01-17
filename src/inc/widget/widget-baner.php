<?php
/**
* Custom widget
*
* @package Powiat Bartoszycki
* @since 0.1.1
*/


class Widget_Banner extends WP_Widget {

  /**
  * Sets up the widgets name etc
  */
  public function __construct() {

    // widget actual processes
    $widget_id    = 'wpg-baner';
    $widget_name  =  __('Baner with description', 'wpg_theme');
    $widget_opt   = array(
      'classname'   => 'banner-slide',
      'description' => __('Image widget with description', 'wpg_theme')
    );

    parent::__construct($widget_id, $widget_name, $widget_opt);

  }

  /**
  * Outputs the content of the widget
  *
  * @param array $args
  * @param array $instance
  */
  public function widget( $args, $instance ) {
    // outputs the content of the widget
    extract( $args );
    //Our variables from the widget settings.
    $title      = isset($instance['title']) ? $instance['title'] : '';
    $url        = isset($instance['url']) ? $instance['url'] : '';
    $new_window = isset($instance['new_window']) ? $instance['new_window'] : '';
    $uri        = isset($instance['image_uri']) ? $instance['image_uri'] : '';
    $alt_img    = isset($instance['alt_img']) ? $instance['alt_img'] : '';
    $bw_img     = isset($instance['bw_img']) ? $instance['bw_img'] : '';

    echo $before_widget;

    printf('<a href="%1$s" target="%2$s"><img src="%3$s" alt="%4$s" class="%5$s" />%6$s %7$s %8$s</a>',
    (!empty($url) ? $url : "#"),
    (!empty($new_window) ? "_blank" : "_self"),
    $uri,
    (!empty($alt_img) ? $alt_img : ''),
    (!empty($bw_img) ? "bw-image" : "color-image"),
    $before_title,
    $title,
    $after_title
  );

  echo $after_widget;
}


/**
* Outputs the options form on admin
*
* @param array $instance The widget options
*/
public function form( $instance ) {

  /* Default Widget Settings */
  $defaults = array(
    'title'       => 'tytul',
    'url'         => '',
    'new_window'  => '',
    'image_uri'   => '',
    'alt_img'     => '',
    'bw_img'      => ''
  );
  $instance = wp_parse_args( (array) $instance, $defaults );
  ?>

  <style>
  .widget-field input[type=text],
  .widget-field input[type=url] {
    width: 100%;
    display: block;
  }

  .widget-banners > .js_custom_upload_media,
  .widget-banners.hidden-wpg > .js_custom_remove_media {
    display: block;
  }
  .widget-banners > .js_custom_remove_media,
  .widget-banners.hidden-wpg > .js_custom_upload_media {
    display: none;
  }
</style>
<div class="widget-field">
  <!-- text title -->
  <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'wpg_theme') ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
  </p>
  <!-- url link baner  -->
  <p>
    <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('Url:', 'wpg_theme') ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" />
  </p>
  <!-- checkbox new window -->
  <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>">
      <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'new_window' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>" <?php checked( $instance['new_window'] ); ?>>
      <?php _e( 'Open in new window?', 'wpg_theme' ); ?>
    </label>
  </p>
  <!-- checkbox Black and white imag -->
  <p>
    <label for="<?php echo esc_attr( $this->get_field_id( 'bw_img' ) ); ?>">
      <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'bw_img' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'bw_img' ) ); ?>" <?php checked( $instance['bw_img'] ); ?>>
      <?php _e( 'Image Black and white image ?', 'wpg_theme' ); ?>
    </label>
  </p>
</div>
<?php $image_uri = (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>
<div id="img_<?php echo $this->id ?>" class="widget-banners <?php echo (!empty($instance['image_uri']) ? "hidden-wpg" : ""); ?>">
  <label for="<?php echo esc_attr($this->get_field_id( 'image_uri' )); ?>"><?php _e( 'Image', 'wpg_theme' ); ?></label>
  <img <id="<?php echo $this->id; ?>_src" class="<?php echo $this->id ?>_img" src="<?php echo $image_uri; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>
  <input type="hidden" class="baner_uri <?php echo $this->id ?>_url" name="<?php echo esc_attr($this->get_field_name( 'image_uri' )); ?>" value="<?php echo $image_uri; ?>" style="margin-top:5px;" />
  <input type="button" id="<?php echo $this->id . '_up' ?>" data-id="<?php echo $this->id ?>" class="button pokaz button-primary js_custom_upload_media" value="<?php _e('Upload Image', 'wpg_theme') ?>" style="margin-top:5px;" />
  <input type="button" id="<?php echo $this->id . '_del'?>" data-id="<?php echo $this->id ?>" class="button button-primary js_custom_remove_media" value="<?php _e('Remove Image', 'wpg_theme') ?>" style="margin-top:5px;" />
</div>
<div class="widget-field">
  <!-- alt img  -->
  <p>
    <label for="<?php echo $this->get_field_id( 'alt_img' ); ?>"><?php _e('Image description:', 'wpg_theme') ?></label>
    <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'alt_img' ); ?>" name="<?php echo $this->get_field_name( 'alt_img' ); ?>" value="<?php echo $instance['alt_img']; ?>" />
  </p>
</div>
<?php
}


/**
* Processing widget options on save
*
* @param array $new_instance The new options
* @param array $old_instance The previous options
*/
public function update( $new_instance, $old_instance ) {

  $instance = wp_parse_args( $new_instance, $old_instance );
  $instance['new_window'] = isset( $new_instance['new_window'] );
  $instance['bw_img']     = isset( $new_instance['bw_img'] );

  //Strip tags from title and name to remove HTML
  $instance['title']     = $new_instance['title'];
  $instance['url']       = $new_instance['url'];
  $instance['image_uri'] = $new_instance['image_uri'];
  $instance['alt_img']   = $new_instance['alt_img'];

  return $instance;
}
} // end class


function wpg_widget_baner_init() {
  register_widget( 'Widget_Banner' );
}
add_action( 'widgets_init', 'wpg_widget_baner_init' );

/**
* Enqueue additional admin scripts
*/
function wpg_widget_baner() {
  wp_enqueue_media();
  wp_enqueue_script('upload-widget_baner', THEME_URL . 'js/upload-widget_baner.min.js', THEME_VERSION, '1.0.0', true);
}
add_action('admin_enqueue_scripts', 'wpg_widget_baner');
?>
