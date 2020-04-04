<?php
/**
 * Displays the searchform
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
?>
<?php $mediciti_lite_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>
<form class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
	<?php
		$mediciti_lite_settings = mediciti_lite_get_theme_options();
		$mediciti_lite_search_form = $mediciti_lite_settings['mediciti_lite_search_text'];
		if($mediciti_lite_search_form !='Search &hellip;'): ?>
	<label for="<?php echo $mediciti_lite_unique_id; ?>">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'mediciti-lite' ); ?></span>
	</label>
	<label>	
	<input type="search" name="s" id="<?php echo $mediciti_lite_unique_id; ?>" class="search-field" placeholder="<?php echo esc_attr($mediciti_lite_search_form); ?>" autocomplete="off" value="<?php echo get_search_query(); ?>"></label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php else: ?>
	<label>
	<input type="search" name="s" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'mediciti-lite' ); ?>" autocomplete="off"></label>
	<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
	<?php endif; ?>
</form> <!-- end .search-form -->