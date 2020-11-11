<?php
/**
* Template for displaying search forms
*
* @package Powiat Bartoszycki
* @since 0.1.0
*/
?>

<?php $unique_id = esc_attr( uniqid( 'search' ) ); ?>

<form role="search" method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="form<?php echo $unique_id; ?>" class="screen-reader-text"><?php _e('Search form on the site','wpg_theme'); ?></label>
	<input type="text" id="form<?php echo $unique_id; ?>" class="field" name="s" placeholder="<?php _e('Enter a search word','wpg_theme'); ?>">
	<button type="submit" class="submit" name="submit" id="submit<?php echo $unique_id; ?>" value="<?php _e('Search','wpg_theme'); ?>"><span class="screen-reader"><?php _e('Search','wpg_theme'); ?></span><i class="icon-search"></i></button>
</form>
