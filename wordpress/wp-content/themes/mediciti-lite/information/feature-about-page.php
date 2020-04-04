<?php
/**
 * Lite Manager
 *
 * @package mediciti-lite
 * @since 1.0.12
 */


/**
 * About page class
 */
require_once get_template_directory() . '/information/mediciti-lite-about-page/class-mediciti-lite-about-page.php';

/*
* About page instance
*/
$config = array(
	// Menu name under Appearance.
	'menu_name'           => apply_filters( 'mediciti_lite_about_page_filter', __( 'About Mediciti-lite', 'mediciti-lite' ), 'menu_name' ),
	// Page title.
	'page_name'           => apply_filters( 'mediciti_lite_about_page_filter', __( 'About Mediciti-lite', 'mediciti-lite' ), 'page_name' ),
	// Main welcome title
	/* translators: s - theme name */
	'welcome_title'       => apply_filters( 'mediciti_lite_about_page_filter', sprintf( __( 'Welcome to %s! - Version ', 'mediciti-lite' ), 'Mediciti-lite' ), 'welcome_title' ),
	// Main welcome content
	'welcome_content'     => apply_filters( 'mediciti_lite_about_page_filter', esc_html__( 'mediciti-lite is a responsive multipurpose WordPress theme created keeping multipurpose functionality in mind which caters the website building needs. It is simple yet powerful and versatile multi purpose theme which is not only focused on corporate or business. It is also one of the ideal platforms for initiating any type of projects like agency, events, portfolio, eCommerce, blogs, and so on. Built in with the painstaking attention, mediciti-lite provides an aesthetic design and quality performance to enrich the visitors\' experience, hence, helps to take your business to the next level. If you are against of seeking help from the developer, then you may. It also consists dozens of pre-made custom elements. The complete outside the box Elementer Pro Page Builder Plugin is there to efficiently customize the most of the elements of the theme. Wow, the theme has both Elementor elements and pre-made Custom Elements, which means endless possibilities and extensions. With the help of these elements, you can effortlessly create niche focused or any kind of website.', 'mediciti-lite' ), 'welcome_content' ),
	/**
	 * Tabs array.
	 *
	 * The key needs to be ONLY consisted from letters and underscores. If we want to define outside the class a function to render the tab,
	 * the will be the name of the function which will be used to render the tab content.
	 */
	'tabs'                => array(
		'getting_started'     => __( 'Getting Started', 'mediciti-lite' ),
		'recommended_actions' => __( 'Required Actions', 'mediciti-lite' ),
		'demo_import'         => __( 'Demo Import', 'mediciti-lite' ),
		
		'support'             => __( 'Support', 'mediciti-lite' ),
		'changelog'           => __( 'Request Customization Support', 'mediciti-lite' ),
		
	),
	// Support content tab.
	'support_content'     => array(
		'first'  => array(
			'title'        => esc_html__( 'Contact Support', 'mediciti-lite' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'We want to make sure you have the best experience using mediciti-lite, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using mediciti-lite as much as we enjoy creating great products.', 'mediciti-lite' ),
			'button_label' => esc_html__( 'Contact Support', 'mediciti-lite' ),
			'button_link'  => esc_url( 'https://yudleethemes.com/support/' ),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Documentation', 'mediciti-lite' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use mediciti-lite.', 'mediciti-lite' ),
			'button_label' => esc_html__( 'Read full documentation', 'mediciti-lite' ),
			'button_link'  => esc_url('https://docs.yudleethemes.com/?docs=mediciti-lite/'),
			'is_button'    => false,
			'is_new_tab'   => true,
		),
		'third'  => array(
			'title'        => esc_html__( 'Request Customization Support', 'mediciti-lite' ),
			'icon'         => 'dashicons dashicons-portfolio',
			'text'         => esc_html__( 'Want to get the gist on the latest theme changes? Just consult our changelog below to get a taste of the recent fixes and features implemented.', 'mediciti-lite' ),
			'button_label' => esc_html__( 'Request Customization Support', 'mediciti-lite' ),
			'button_link'  => esc_url( 'https://yudleethemes.com/support/' ),
			'is_button'    => false,
			'is_new_tab'   => false,
		),
	),

	// for democontent tab 
	'demo_import'     => array(
	),
	// Getting started tab
	'getting_started'     => array(
		'first'  => array(
			'title'               => esc_html__( 'Required actions', 'mediciti-lite' ),
			'text'                => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'mediciti-lite' ),
			'button_label'        => esc_html__( 'Required actions', 'mediciti-lite' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=mediciti-lite-welcome&tab=recommended_actions' ) ),
			'is_button'           => false,
			'recommended_actions' => true,
			'is_new_tab'          => false,
		),
		'second' => array(
			'title'               => esc_html__( 'Read full documentation', 'mediciti-lite' ),
			'text'                => esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use mediciti-lite.', 'mediciti-lite' ),
			'button_label'        => esc_html__( 'Documentation', 'mediciti-lite' ),
			'button_link'         => esc_url('https://docs.yudleethemes.com/?docs=mediciti-lite/'),
			'is_button'           => false,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		'third'  => array(
			'title'               => esc_html__( 'Go to the Customizer', 'mediciti-lite' ),
			'text'                => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'mediciti-lite' ),
			'button_label'        => esc_html__( 'Go to the Customizer', 'mediciti-lite' ),
			'button_link'         => esc_url( admin_url( 'customize.php' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
	),
	// Free vs PRO array.
	
	// Plugins array.
	// Required actions array.
	'recommended_actions' => array(
		'install_label'    => esc_html__( 'Install and Activate', 'mediciti-lite' ),
		'activate_label'   => esc_html__( 'Activate', 'mediciti-lite' ),
		'deactivate_label' => esc_html__( 'Deactivate', 'mediciti-lite' ),
		'content'          => array(

            'one-click-demo-import'           => array(
                'title'       => 'One Click Demo Import',
                'description' => mediciti_lite_get_wporg_plugin_description( 'one-click-demo-import' ),
                'check'       => ( defined( 'OCDM_VERSION' ) || ! mediciti_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'one-click-demo-import',
                'id'          => 'one-click-demo-import',
                'network'     => 'live',
            ),
            'weForms'           => array(
                'title'       => 'weForms',
                'description' => mediciti_lite_get_wporg_plugin_description( 'contact-form-7' ),
                'check'       => ( defined( 'CONTACT_VERSION' ) || ! mediciti_lite_check_passed_time( '259200' ) ),
                'plugin_slug' => 'weforms',
                'id'          => 'weforms',
                'network'     => 'live',
            ),

			'elementor'           => array(
				'title'       => 'Elementor',
				'description' => mediciti_lite_get_wporg_plugin_description( 'elementor' ),
				'check'       => ( defined( 'ELEMENTOR_LITE_VERSION' ) || ! mediciti_lite_check_passed_time( '259200' ) ),
				'plugin_slug' => 'elementor',
				'id'          => 'elementor',
                'network'     => 'live',
            ),
            
            
		),
	),
);
Mediciti_Lite_About_Page::init( apply_filters( 'mediciti_lite_about_page_array', $config ) );

/*
 * Notifications in customize
 */
require get_template_directory() . '/information/class-mediciti-lite-customizer-notify.php';

$config_customizer = array(
	'recommended_plugins'       => array(
		'mediciti-lite-companion' => array(
			'recommended' => true,
			/* translators: s - Orbit Fox Companion */
			'description' => sprintf( esc_html__( 'If you want to take full advantage of the options this theme has to offer, please install and activate %s.', 'mediciti-lite' ), sprintf( '<strong>%s</strong>', 'Orbit Fox Companion' ) ),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'mediciti-lite' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugins', 'mediciti-lite' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'mediciti-lite' ),
	'activate_button_label'     => esc_html__( 'Activate', 'mediciti-lite' ),
	'deactivate_button_label'   => esc_html__( 'Deactivate', 'mediciti-lite' ),
);
Mediciti_Lite_Customizer_Notify::init( apply_filters( 'mediciti_lite_customizer_notify_array', $config_customizer ) );