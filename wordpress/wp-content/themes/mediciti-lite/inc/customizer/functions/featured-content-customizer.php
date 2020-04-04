<?php
/**
 * Theme Customizer Functions
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
/******************** mediciti-lite SLIDER SETTINGS ******************************************/
$mediciti_lite_settings = mediciti_lite_get_theme_options();

$wp_customize->add_section( 'mediciti_lite_page_post_options', array(
	'title' => __('Slider Option','mediciti-lite'),
	'priority' => 1,
	'panel' =>'layout_pro_options_panel'
));
for ( $mediciti_lite_var=1; $mediciti_lite_var <= $mediciti_lite_settings['mediciti_lite_slider_no'] ; $mediciti_lite_var++ ) {
	$wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_featured_page_slider_'. $mediciti_lite_var .']', array(
		'default' =>'',
		'sanitize_callback' =>'mediciti_lite_sanitize_page',
		'type' => 'option',
		'capability' => 'edit_theme_options'
	));
	$wp_customize->add_control( 'mediciti_lite_theme_options[mediciti_lite_featured_page_slider_'. $mediciti_lite_var .']', array(
		'priority' => 220 . $mediciti_lite_var,
		'label' => __('Page Slider', 'mediciti-lite') . ' ' . $mediciti_lite_var ,
		'section' => 'mediciti_lite_page_post_options',
		'type' => 'dropdown-pages',
	));
}



     /******************************/
        /***** For mediciti-lite call to action *****/
        /******************************/

        $wp_customize->add_section('mediciti_lite_callout_section', array(
            'title' => __('Call Out Options', 'mediciti-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 3,
        ));

        // $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_callout_section_pages_title]', array(
        //     'capability' => 'edit_theme_options',
        //     'sanitize_callback' => 'esc_html',
        //     'default' => $mediciti_lite_settings['mediciti_lite_callout_section_pages_title'],
        //      'type' => 'option',

        // ));

        // $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_callout_section_pages_title]', array(
        //     'label' => __('Callout Title', 'mediciti-lite'),
        //     'section' => 'mediciti_lite_callout_section',
        //     'type' => 'text',
        //     'priority' => 2,
        // ));
        // $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_callout_section_pages_description]', array(
        //     'capability' => 'edit_theme_options',
        //     'sanitize_callback' => 'esc_html',
        //     'default' => $mediciti_lite_settings['mediciti_lite_callout_section_pages_description'],
        //      'type' => 'option',

        // ));

        // $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_callout_section_pages_description]', array(
        //     'label' => __('Callout Description', 'mediciti-lite'),
        //     'section' => 'mediciti_lite_callout_section',
        //     'type' => 'text',
        //     'priority' => 3,
        // ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_callout_section_pages_selection]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_callout_section_pages_selection'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control(new mediciti_lite_Page_Dropdown_control($wp_customize, 'mediciti_lite_theme_options[mediciti_lite_callout_section_pages_selection]', array(
            'label' => __('Select 3 Pages To Show Below Slider', 'mediciti-lite'),
            'description' => __('Select a category to display post below the slider', 'mediciti-lite'),
            'section' => 'mediciti_lite_callout_section',
            'priority' => 4,

        )));


 /******************************/
        /***** For mediciti-lite about us option *****/
        /******************************/

        $wp_customize->add_section('mediciti_lite_aboutus_section', array(
            'title' => __('About Us Options', 'mediciti-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 2,
        ));

       
          $wp_customize->add_setting(
            'mediciti_lite_theme_options[mediciti_lite_aboutus_page]',
            array(
                'default' => $mediciti_lite_settings['mediciti_lite_aboutus_page'],
                'type' => 'option',
                'sanitize_callback' => 'absint',
                'capability' => 'edit_theme_options'
            )
                );
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_aboutus_page]', array(
            'label' => esc_html__('Choose About Us Page :', 'mediciti-lite'),
            'type' => 'dropdown-pages',
            'section' => 'mediciti_lite_aboutus_section',
            
        ));
       
// department section
$wp_customize->add_section('mediciti_lite_department_section', array(
            'title' => __('Department', 'mediciti-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 3,
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_department_section_pages_title]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $mediciti_lite_settings['mediciti_lite_department_section_pages_title'],
             'type' => 'option',

        ));

        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_department_section_pages_title]', array(
            'label' => __('Department Title', 'mediciti-lite'),
            'section' => 'mediciti_lite_department_section',
            'type' => 'text',
            'priority' => 2,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_department_section_pages_description]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $mediciti_lite_settings['mediciti_lite_department_section_pages_description'],
             'type' => 'option',

        ));

        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_department_section_pages_description]', array(
            'label' => __('Department Subtitle', 'mediciti-lite'),
            'section' => 'mediciti_lite_department_section',
            'type' => 'text',
            'priority' => 3,
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_department_section_pages_selection]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_department_section_pages_selection'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control(new mediciti_lite_Page_Dropdown_control($wp_customize, 'mediciti_lite_theme_options[mediciti_lite_department_section_pages_selection]', array(
            'label' => __('Select 3 Pages To Show Below Slider', 'mediciti-lite'),
            'description' => __('Select a category to display post below the slider', 'mediciti-lite'),
            'section' => 'mediciti_lite_department_section',
            'priority' => 4,

        )));
/**
  For top header options
*/
  $wp_customize->add_section('mediciti_lite_topheader_section', array(
            'title' => __('Top Header Options', 'mediciti-lite'),
            'panel' => 'layout_pro_options_panel',
            'priority' => 2,
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_section_checkbox]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $mediciti_lite_settings['mediciti_lite_top_header_section_checkbox'],
             'type' => 'option',

        ));

        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_section_checkbox]', array(
            'label' => __('Check To Enable Top Header', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'checkbox',
            'priority' => 2,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_location]', array(
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_html',
            'default' => $mediciti_lite_settings['mediciti_lite_top_header_location'],
             'type' => 'option',

        ));

        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_location]', array(
            'label' => __('Location', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'text',
            'priority' => 3,
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_phoneno]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_phoneno'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_phoneno]', array(
            'label' => __('Phone Number', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'number',
            'priority' => 4,
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_facebok]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_facebok'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_facebok]', array(
            'label' => __('Facebook URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 5,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_googleplus]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_googleplus'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_googleplus]', array(
            'label' => __('Google Plus URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 6,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_linkedin]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_linkedin'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_linkedin]', array(
            'label' => __('Linked In URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 7,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_twitter]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_twitter'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_twitter]', array(
            'label' => __('Twitter URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 8,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_instagram]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_instagram'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_instagram]', array(
            'label' => __('Instagram URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 9,
        ));
        $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_tublr]', array(
           'default' => $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_tublr'],
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'mediciti_lite_text_sanitize',
             'type' => 'option',
        ));
        $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_top_header_socialmedia_tublr]', array(
            'label' => __('Tumblr URL', 'mediciti-lite'),
            'section' => 'mediciti_lite_topheader_section',
            'type' => 'url',
            'priority' => 10,
        ));