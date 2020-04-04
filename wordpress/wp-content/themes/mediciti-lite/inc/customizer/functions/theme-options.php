<?php
$mediciti_lite_settings = mediciti_lite_get_theme_options();
/******************** mediciti-lite THEME OPTIONS ******************************************/
//Support section
    $wp_customize->register_section_type( Mediciti_lite_pro::class );

     $wp_customize->add_section(new Mediciti_lite_pro($wp_customize,'support_links',array(
            'priority' => 1,
            'title'       => __( 'Mediciti-Pro', 'mediciti-lite' ),
            'button_text' => __( 'Go Pro',        'mediciti-lite' ),
            'button_url'  => 'http://yudleethemes.com/mediciti-pro/'
            
            )
        )
    );


if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    /*        Product Cat   */
    $mediciti_lite_product_categories = get_terms('product_cat');
    if (is_wp_error($mediciti_lite_product_categories))
        $mediciti_lite_product_categories = array();
    $mediciti_lite_count = count($mediciti_lite_product_categories);
    if ($mediciti_lite_count > 0 && !is_wp_error($mediciti_lite_product_categories)) {
        $mediciti_lite_select_categories = array();
        $mediciti_lite_select_categories[''] = __('Select', 'mediciti-lite');
        foreach ($mediciti_lite_product_categories as $mediciti_lite_product_category) {
            $mediciti_lite_select_categories[$mediciti_lite_product_category->term_id] = $mediciti_lite_product_category->name;
        }
    } else {
        $mediciti_lite_select_categories = array('' => __('Select', 'mediciti-lite'));
    }

    $wp_customize->add_section('mediciti_lite_product_categories', array(
        'title' => __('Product Categories', 'mediciti-lite'),
        'priority' => 11,
        'panel' => 'layout_pro_options_panel'
    ));
    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_cat_title]', array(
        'capability' => 'edit_theme_options',
        'default' => $mediciti_lite_settings['mediciti_lite_product_cat_title'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_product_cat_title]', array(
        'label' => __('Section Title', 'mediciti-lite'),
        'priority' => 1,
        'section' => 'mediciti_lite_product_categories',
        'type' => 'text',
    ));

    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_cat_lists]', array(
        'capability' => 'edit_theme_options',
        'default' => '',
        'sanitize_callback' => 'mediciti_lite_sanitize_checkbox',
        'type' => 'option',
    ));
    $wp_customize->add_control(
        new Mediciti_Lite_Customize_Control_Multiple_Select(
            $wp_customize,
            'mediciti_lite_theme_options[mediciti_lite_product_cat_lists]',
            array(
                'label' => __('Select Category', 'mediciti-lite'),
                'section' => 'mediciti_lite_product_categories',
                'type' => 'multiple-select',
                'choices' => $mediciti_lite_select_categories,
            )
        ));

}


	$wp_customize->add_section('mediciti_lite_custom_header', array(
		'title' => __('General Options', 'mediciti-lite'),
		'priority' => 1,
		'panel' => 'layout_pro_options_panel'
	));
	$wp_customize->add_setting( 'mediciti_lite_theme_options[mediciti_lite_reset_all]', array(
		'default' => 0,
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'mediciti_lite_reset_alls',
		'transport' => 'postMessage',
	));
	$wp_customize->add_control( 'mediciti_lite_theme_options[mediciti_lite_reset_all]', array(
		'priority'=>50,
		'label' => __('Reset all default settings. (Refresh it to view the effect)', 'mediciti-lite'),
		'section' => 'mediciti_lite_custom_header',
		'type' => 'checkbox',
	));

if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $wp_customize->add_section('mediciti_lite_feature_section', array(
        'title' => __('Featured Section', 'mediciti-lite'),
        'priority' => 6,
        'panel' => 'layout_pro_options_panel'
    ));

    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_recent_feat_title]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $mediciti_lite_settings['mediciti_lite_product_recent_feat_title'],
        )
    );
    $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_product_recent_feat_title]',
        array(
            'type' => 'text',
            'section' => 'mediciti_lite_feature_section',
            'label' => esc_html__('Section Title', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[mediciti_lite_product_recent_feat_title]'
        )
    );
    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_recent_feat_shortcode]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $mediciti_lite_settings['mediciti_lite_product_recent_feat_shortcode'],
        )
    );
    $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_product_recent_feat_shortcode]',
        array(
            'type' => 'text',
            'section' => 'mediciti_lite_feature_section',
            'label' => esc_html__('WooCommerce Product Shortcode', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[mediciti_lite_product_recent_feat_shortcode]'
        )
    );
}
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    $wp_customize->add_section('mediciti_lite_recent_section', array(
        'title' => __('Recent Section', 'mediciti-lite'),
        'priority' => 4,
        'panel' => 'layout_pro_options_panel'
    ));

    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_recent_prod_title]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $mediciti_lite_settings['mediciti_lite_product_recent_prod_title'],
        )
    );
    $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_product_recent_prod_title]',
        array(
            'type' => 'text',
            'section' => 'mediciti_lite_recent_section',
            'label' => esc_html__('Section Title', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[mediciti_lite_product_recent_prod_title]'
        )
    );
    $wp_customize->add_setting('mediciti_lite_theme_options[mediciti_lite_product_recent_prod_shortcode]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => $mediciti_lite_settings['mediciti_lite_product_recent_prod_shortcode'],
        )
    );
    $wp_customize->add_control('mediciti_lite_theme_options[mediciti_lite_product_recent_prod_shortcode]',
        array(
            'type' => 'text',
            'section' => 'mediciti_lite_recent_section',
            'label' => esc_html__('WooCommerce Product Shortcode', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[mediciti_lite_product_recent_prod_shortcode]'
        )
    );
}

    $wp_customize->add_section('mediciti_lite_cta_section', array(
        'title' => __('CTA Section', 'mediciti-lite'),
        'priority' => 5,
        'panel' => 'layout_pro_options_panel'
    ));
    $wp_customize->add_setting('mediciti_lite_theme_options[cta_title]', array(
        'capability' => 'edit_theme_options',
        'default' => $mediciti_lite_settings['cta_title'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('mediciti_lite_theme_options[cta_title]', array(
        'label' => __('Section Title', 'mediciti-lite'),
        'priority' => 1,
        'section' => 'mediciti_lite_cta_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('mediciti_lite_theme_options[cta_description]', array(
        'capability' => 'edit_theme_options',
        'default' => $mediciti_lite_settings['cta_description'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('mediciti_lite_theme_options[cta_description]', array(
        'label' => __('Section Description', 'mediciti-lite'),
        'priority' => 1,
        'section' => 'mediciti_lite_cta_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('mediciti_lite_theme_options[cta_button]', array(
        'capability' => 'edit_theme_options',
        'default' => $mediciti_lite_settings['cta_button'],
        'sanitize_callback' => 'esc_html',
        'type' => 'option',
    ));
    $wp_customize->add_control('mediciti_lite_theme_options[cta_button]', array(
        'label' => __('Button Title', 'mediciti-lite'),
        'priority' => 1,
        'section' => 'mediciti_lite_cta_section',
        'type' => 'text',
    ));
    $wp_customize->add_setting('mediciti_lite_theme_options[cta_link]', array(
        'capability' => 'edit_theme_options',
        'default' => $mediciti_lite_settings['cta_button'],
        'sanitize_callback' => 'esc_url_raw',
        'type' => 'option',
    ));
    $wp_customize->add_control('mediciti_lite_theme_options[cta_link]', array(
        'label' => __('Button Link', 'mediciti-lite'),
        'priority' => 1,
        'section' => 'mediciti_lite_cta_section',
        'type' => 'text',
    ));

$wp_customize->add_setting('mediciti_lite_theme_options[cta_Backgroundimage]',
    array(
        'type' => 'option',
        'default' => $mediciti_lite_settings['cta_Backgroundimage'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,'mediciti_lite_theme_options[cta_Backgroundimage]',
        array(

            'section' => 'mediciti_lite_cta_section',
            'label' => esc_html__('Upload Background Image', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[cta_Backgroundimage]'
        ) )
);


	/*Blog Section*/

    $wp_customize->add_section('mediciti_lite_blogoption', array(
            'title' => __('Blog Options', 'mediciti-lite'),
            'priority' => 7,
            'panel' => 'layout_pro_options_panel'
        ));

        $wp_customize->add_setting('mediciti_lite_theme_options[blog_description]',
        array(
            'type' => 'option',
            'sanitize_callback' => 'mediciti_lite_sanitize_page',
            'default' => $mediciti_lite_settings['blog_description'],
        )
    );
    $wp_customize->add_control('mediciti_lite_theme_options[blog_description]',
        array(
            'type' => 'dropdown-pages',
            'section' => 'mediciti_lite_blogoption',
            'label' => esc_html__('Select Page For Blog Title & Description', 'mediciti-lite'),
            'settings' => 'mediciti_lite_theme_options[blog_description]'
        )
    );


