<?php
/**
* Class with new buttons in Tinymce
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/


/*Nowe przyciski w Tinymce 4 - Zmiana języka, Youtube, Załączniki */
new Shortcode_Tinymce();
class Shortcode_Tinymce
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'wpg_language_button'));

    }

    /**
     * Create a shortcode button for tinymce
     *
     * @return [type] [description]
     */
    public function wpg_language_button()
    {
        if( current_user_can('edit_posts') &&  current_user_can('edit_pages') )
        {
            add_filter( 'mce_external_plugins', array($this, 'wpg_add_buttons' ));
            add_filter( 'mce_buttons', array($this, 'wpg_register_buttons' ));
        }
    }

    /**
     * Add new Javascript to the plugin scrippt array
     *
     * @param  Array $plugin_array - Array of scripts
     *
     * @return Array
     */
    public function wpg_add_buttons( $plugin_array )
    {
        $plugin_array['wpg_language'] = get_bloginfo('template_directory')  . '/js/assets/tinymce-buttons.min.js';

        return $plugin_array;
    }

    /**
     * Add new button to tinymce
     *
     * @param  Array $buttons - Array of buttons
     *
     * @return Array
     */
    public function wpg_register_buttons( $buttons )
    {
        array_push( $buttons, 'separator', 'wpg_language','separator', 'wpg_video', 'wpg_zalaczniki' );
        return $buttons;
    }

}

?>
