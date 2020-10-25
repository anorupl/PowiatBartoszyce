<?php
class Widget_Banner extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
      // widget actual processes

  $widget_id    = 'wpg-baner';
  $widget_name  =  __('Baner with description', 'wpg_theme');
  $widget_opt   = array(
    'classname' => 'banner-slide',
    'description'=> __('Image widget with description', 'wpg_theme')
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

    //Our variables from the widget settings.
		$title = $instance['title'];
		$url = $instance['url'];
		$new_window = $instance['new_window'];
		$uri = $instance['image_uri'];

    echo $before_widget;
    ?>
      <a href="<?php echo (!empty($url) ? $url : "#"); ?>" target="<?php echo (!empty($new_window) ? "_blank" : "_self"); ?>"  ><img src="<?php echo $uri; ?>" /><?php echo $before_title .' ' . $title . ' ' . $after_title;?></a>
<?php
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
    'title' => 'tytul',
    'url'=>'',
    'new_window'=>'',
    'image_uri'=>''



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
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'gmina_theme') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
    </p>
    <!-- url link baner  -->
    <p>
        <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php _e('url:', 'gmina_theme') ?></label>
        <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" value="<?php echo $instance['url']; ?>" />
    </p>
    <!-- checkbox new window -->
    <p>
      <label for="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>">
        <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'new_window' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'new_window' ) ); ?>" <?php checked( $instance['new_window'] ); ?>>
        <?php _e( 'Open in new window?', 'wpg_theme' ); ?>
      </label>
    </p>
  </div>
    <?php $image_uri = (!empty($instance['image_uri'])) ? $instance['image_uri'] : ''; ?>


     <div id="test_<?php echo $this->id ?>" class="widget-banners <?php echo (!empty($instance['image_uri']) ? "hidden-wpg" : ""); ?>">



         <label for="<?php echo esc_attr($this->get_field_id( 'image_uri' )); ?>"><?php _e( 'Image', 'wpg_theme' ); ?></label>

         <img <id="<?php echo $this->id; ?>_src" class="<?php echo $this->id ?>_img" src="<?php echo $image_uri; ?>" style="margin:0;padding:0;max-width:100%;display:block"/>

         <input type="hidden" class="baner_uri <?php echo $this->id ?>_url" name="<?php echo esc_attr($this->get_field_name( 'image_uri' )); ?>" value="<?php echo $image_uri; ?>" style="margin-top:5px;" />

         <input type="button" id="<?php echo $this->id . '_up' ?>" data-id="<?php echo $this->id ?>" class="button pokaz button-primary js_custom_upload_media" value="Upload Image" style="margin-top:5px;" />

         <input type="button" id="<?php echo $this->id . '_del'?>" data-id="<?php echo $this->id ?>" class="button button-primary js_custom_remove_media" value="Remove Image" style="margin-top:5px;" />



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

    		//Strip tags from title and name to remove HTML
    		$instance['title'] = $new_instance['title'];
    		$instance['url'] = $new_instance['url'];
        $instance['image_uri'] = $new_instance['image_uri'];



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
