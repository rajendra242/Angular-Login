<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
/*********** mediciti-lite ADD THEME SUPPORT FOR INFINITE SCROLL **************************/
if (! function_exists('mediciti_lite_jetpack_setup')) {
	function mediciti_lite_jetpack_setup() {
		add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'footer'    => 'page',
		) );
	}
	add_action( 'after_setup_theme', 'mediciti_lite_jetpack_setup' );
}