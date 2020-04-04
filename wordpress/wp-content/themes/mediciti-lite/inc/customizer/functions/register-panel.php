<?php
/**
 * Theme Customizer Functions
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
/******************** mediciti-lite CUSTOMIZE REGISTER *********************************************/
add_action( 'customize_register', 'mediciti_lite_customize_register_options', 20 );
function mediciti_lite_customize_register_options( $wp_customize ) {
	$wp_customize->add_panel( 'layout_pro_options_panel', array(
		'priority' => 2,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options', 'mediciti-lite' ),
		'description' => '',
	) );
}


add_action( 'customize_register', 'mediciti_lite_customize_register_featuredcontent' );
function mediciti_lite_customize_register_featuredcontent( $wp_customize ) {
	$wp_customize->add_panel( 'mediciti_lite_featuredcontent_panel', array(
		'priority' => 31,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Slider Options', 'mediciti-lite' ),
		'description' => '',
	) );
}

add_action( 'customize_register', 'mediciti_lite_customize_register_widgets' );
function mediciti_lite_customize_register_widgets( $wp_customize ) {
	$wp_customize->add_panel( 'widgets_register', array(
		'priority' => 33,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Widgets', 'mediciti-lite' ),
		'description' => '',
	) );
}

?>