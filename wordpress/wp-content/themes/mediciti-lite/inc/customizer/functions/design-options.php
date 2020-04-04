<?php
/**
 * Theme Customizer Functions
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
$mediciti_lite_settings = mediciti_lite_get_theme_options();
/******************** mediciti-lite LAYOUT OPTIONS ******************************************/

    $wp_customize->add_setting( 'mediciti_lite_theme_options[mediciti_lite_sidebar_status]', array(
        'default' => $mediciti_lite_settings['mediciti_lite_sidebar_status'],
        'sanitize_callback' => 'mediciti_lite_sanitize_select',
        'type' => 'option',
    ));
    $wp_customize->add_control( 'mediciti_lite_theme_options[mediciti_lite_sidebar_status]', array(
        'priority'=>45,
        'label' => __('Show / Hide Sidebar', 'mediciti-lite'),
        'section' => 'mediciti_lite_custom_header',
        'type'	=> 'select',
        'choices' => array(
            'show-sidebar' => __('Show Sidebar','mediciti-lite'),
            'hide-sidebar' => __('Hide Sidebar','mediciti-lite'),
        ),
    ));

	$wp_customize->add_setting( 'mediciti_lite_theme_options[mediciti_lite_entry_meta_blog]', array(
		'default' => $mediciti_lite_settings['mediciti_lite_entry_meta_blog'],
		'sanitize_callback' => 'mediciti_lite_sanitize_select',
		'type' => 'option',
	));
	$wp_customize->add_control( 'mediciti_lite_theme_options[mediciti_lite_entry_meta_blog]', array(
		'priority'=>45,
		'label' => __('Meta for blog page', 'mediciti-lite'),
		'section' => 'mediciti_lite_custom_header',
		'type'	=> 'select',
		'choices' => array(
		'show-meta' => __('Show Meta','mediciti-lite'),
		'hide-meta' => __('Hide Meta','mediciti-lite'),
	),
	));
	$wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_design_layout]', array(
		'default'        => $mediciti_lite_settings['mediciti_lite_design_layout'],
		'sanitize_callback' => 'mediciti_lite_sanitize_select',
		'type'                  => 'option',
	));
	$wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_design_layout]', array(
	'priority'  =>50,
	'label'      => __('Design Layout', 'mediciti-lite'),
	'section'    => 'mediciti_lite_custom_header',
	'type'       => 'select',
	'checked'   => 'checked',
	'choices'    => array(
		'wide-layout' => __('Full Width Layout','mediciti-lite'),
		'boxed-layout' => __('Boxed Layout','mediciti-lite'),
	),
));
?>