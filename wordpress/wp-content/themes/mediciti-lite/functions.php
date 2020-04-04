<?php
/**
 * Display all mediciti-lite functions and definitions
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */

/************************************************************************************************/
if (!function_exists('mediciti_lite_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function mediciti_lite_setup()
    {
        /**
         * Set the content width based on the theme's design and stylesheet.
         */
        $GLOBALS['mediciti_lite_content_width'] = apply_filters( 'mediciti_lite_setup', 790 );
        
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 790;
        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on mediciti-lite, use a find and replace
         * to change 'mediciti-lite' to the name of your theme in all the template files
         */
        load_theme_textdomain('mediciti-lite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('post-thumbnails');

        /*
         * Let WordPress manage the document title.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        register_nav_menus(array(
            'primary' => __('Main Menu', 'mediciti-lite'),
        ));

        /*
        * Enable support for custom logo.
        *
        */
        add_theme_support('custom-logo', array(
            'flex-width' => true,
            'flex-height' => true,
        ));
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        //Indicate widget sidebars can use selective refresh in the Customizer.
        add_theme_support('customize-selective-refresh-widgets');

        /*
         * Switch default core markup for comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'comment-form', 'comment-list', 'gallery', 'caption',
        ));

        /**
         * Add support for the Aside Post Formats
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('mediciti_lite_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        add_editor_style(get_template_directory() . '/assets/css/editor-style.css');

        /**
         * Making the theme WooCommerce compatible
         */
        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif; // mediciti_lite_setup
add_action('after_setup_theme', 'mediciti_lite_setup');

add_image_size('mediciti-lite-blog-image', 700, 480, true);
add_image_size('mediciti-lite-callout-image', 800, 600, true);

/***************************************************************************************/
if ( ! function_exists( 'mediciti_lite_content_width' ) ) {
	function mediciti_lite_content_width()
	{
		if (is_page_template('page-templates/gallery-template.php') || is_attachment()) {
			global $mediciti_lite_content_width;
			$mediciti_lite_content_width = 1170;
		}
	}
}

add_action('template_redirect', 'mediciti_lite_content_width');

/***************************************************************************************/
if (!function_exists('mediciti_lite_get_theme_options')):
    function mediciti_lite_get_theme_options()
    {
        return wp_parse_args(get_option('mediciti_lite_theme_options', array()), mediciti_lite_get_option_defaults_values());
    }
endif;

/***************************************************************************************/
require get_template_directory() . '/inc/customizer/mediciti-lite-default-values.php';
require(get_template_directory() . '/inc/settings/mediciti-lite-functions.php');
require(get_template_directory() . '/inc/settings/mediciti-lite-nav-walker.php');
require(get_template_directory() . '/inc/settings/mediciti-lite-common-functions.php');
require(get_template_directory() . '/inc/settings/mediciti-lite-tgmp.php');
require(get_template_directory() . '/inc/template-tags.php');
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/footer-details.php';
require get_template_directory() . '/information/feature-about-page.php';
require get_template_directory() . '/information/mediciti-lite-notifications-utils.php' ;


//TGMPA plugin
require get_template_directory() . '/plugin-activation.php';

/************************ mediciti-lite Widgets  *****************************/
require get_template_directory() . '/inc/widgets/widgets-functions/register-widgets.php';

/************************ mediciti-lite Customizer  *****************************/
require get_template_directory() . '/inc/customizer/functions/sanitize-functions.php';
require get_template_directory() . '/inc/customizer/functions/register-panel.php';

if (!function_exists('mediciti_lite_customize_register')):
	function mediciti_lite_customize_register($wp_customize)
	{
		$wp_customize->get_setting('blogname')->transport = 'postMessage';
		$wp_customize->get_setting('blogdescription')->transport = 'postMessage';

		if (isset($wp_customize->selective_refresh)) {
			$wp_customize->selective_refresh->add_partial('blogname', array(
				'selector' => '#site-title a',
				'container_inclusive' => false,
				'render_callback' => 'mediciti_lite_customize_partial_blogname',
			));
			$wp_customize->selective_refresh->add_partial('blogdescription', array(
				'selector' => '#site-description',
				'container_inclusive' => false,
				'render_callback' => 'mediciti_lite_customize_partial_blogdescription',
			));
		}
		require get_template_directory() . '/inc/customizer/functions/customizer-control.php';
		require get_template_directory() . '/inc/customizer/functions/design-options.php';
		require get_template_directory() . '/inc/customizer/functions/theme-options.php';
		require get_template_directory() . '/inc/customizer/functions/featured-content-customizer.php';

	}
endif;

// require get_template_directory() . '/inc/customizer/functions/class-pro-discount.php';

/**
 * Render the site title for the selective refresh partial.
 * @see mediciti_lite_customize_register()
 * @return void
 */
if (!function_exists('mediciti_lite_customize_partial_blogname')){
	function mediciti_lite_customize_partial_blogname()
	{
		bloginfo('name');
	}
}

/**
 * Render the site tagline for the selective refresh partial.
 * @see mediciti_lite_customize_register()
 * @return void
 */
if (!function_exists('mediciti_lite_customize_partial_blogdescription')):
	function mediciti_lite_customize_partial_blogdescription()
	{
		bloginfo('description');
	}
endif;

add_action('customize_register', 'mediciti_lite_customize_register');
/**
 * Enqueue script for custom customize control.
 */

if (!function_exists('mediciti_lite_custom_customize_enqueue')):
	function mediciti_lite_custom_customize_enqueue()
	{
		wp_enqueue_style('mediciti-lite-customizer-style', trailingslashit(get_template_directory_uri()) . 'inc/customizer/css/customizer-control.css');
	}
endif;

add_action('customize_controls_enqueue_scripts', 'mediciti_lite_custom_customize_enqueue');


/******************* mediciti-lite Header Display *************************/
if (!function_exists('mediciti_lite_the_custom_logo')) {
    function mediciti_lite_header_display()
    {
        ?>
        <div id="site-branding">
            <?php if (has_custom_logo()) {

                the_custom_logo();

                echo '<p id="site-description">';
                bloginfo('description');
                echo '</p>';

            } else { ?>
                <h1 id="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>"
                       rel="home"> <?php bloginfo('name'); ?> </a>

                </h1>  <!-- end .site-title -->
                <p id="site-description"> <?php bloginfo('description'); ?> </p> <!-- end #site-description -->
            <?php } ?>
        </div> <!-- end #site-branding -->
        <?php
    }

    add_action('mediciti_lite_site_branding', 'mediciti_lite_header_display');
}


if (!function_exists('mediciti_lite_the_custom_logo')) :
    /**
     * Displays the optional custom logo.
     * Does nothing if the custom logo is not available.
     */
    function mediciti_lite_the_custom_logo()
    {
        if (function_exists('the_custom_logo')) {
            the_custom_logo();
        }
    }
endif;

/* Header Image */
if (!function_exists('mediciti_lite_woocommerce_header_add_to_cart_fragment')) {

    function mediciti_lite_header_image_display()
    {
        $mediciti_lite_header_image = get_header_image();
        $mediciti_lite_settings = mediciti_lite_get_theme_options();
        if (!empty($mediciti_lite_header_image)) {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>"><img
                        src="<?php echo esc_url($mediciti_lite_header_image); ?>" class="header-image"
                        width="<?php echo esc_attr(get_custom_header()->width); ?>"
                        height="<?php echo esc_attr(get_custom_header()->height); ?>"
                        alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
            </a>
            <?php
        }
    }
    add_action('mediciti_lite_header_image', 'mediciti_lite_header_image_display');
}


// for information landing page
define( 'MEDICITI_LITE_VERSION', '1.0.0' );

    function mediciti_lite_get_wporg_plugin_description( $slug ) {

        $plugin_transient_name = 'mediciti_lite_t_' . $slug;

        $transient = get_transient( $plugin_transient_name );

        if ( ! empty( $transient ) ) {

            return $transient;

        } else {

            $plugin_description = '';

            if ( ! function_exists( 'plugins_api' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
            }

            $call_api = plugins_api(
                'plugin_information', array(
                    'slug'   => $slug,
                    'fields' => array(
                        'short_description' => true,
                    ),
                )
            );

            if ( ! empty( $call_api ) ) {
                if ( ! empty( $call_api->short_description ) ) {
                    $plugin_description = strtok( $call_api->short_description, '.' );
                }
            }

            set_transient( $plugin_transient_name, $plugin_description, 10 * DAY_IN_SECONDS );

            return $plugin_description;

        }
    }

    function mediciti_lite_check_passed_time( $no_seconds ) {
        $activation_time = get_option( 'mediciti_lite_time_activated' );
        if ( ! empty( $activation_time ) ) {
            $current_time    = time();
            $time_difference = (int) $no_seconds;
            if ( $current_time >= $activation_time + $time_difference ) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }


global $pagenow;

/*if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
    wp_redirect(admin_url('themes.php?page=mediciti-lite-welcome'));
}*/

if ( ! function_exists ( 'mediciti_lite_demo_import_files' ) ) {

    function mediciti_lite_demo_import_files()
    {
        return array(
            array(
                'import_file_name' => __('Demo One', 'mediciti-lite'),
                'import_file_url' => esc_url('https://yudleethemes.com/wp-content/uploads/updates/mediciti-lite/demo_content/mediciti-lite-content.xml'),
                'import_widget_file_url' => esc_url('https://yudleethemes.com/wp-content/uploads/updates/mediciti-lite/demo_content/mediciti-lite-widgets.wie'),
                'import_customizer_file_url' => esc_url('https://yudleethemes.com/wp-content/uploads/updates/mediciti-lite/demo_content/mediciti-lite-customizer.dat'),
                'import_preview_image_url' => esc_url('https://yudleethemes.com/wp-content/uploads/updates/mediciti-lite/demo_content/Free-Demo-Mediciti.png'),
                'import_notice' => __( 'After you import this demo, you will have to choose the Home Page separately from customizer.', 'mediciti-lite' ),
                'preview_url' => esc_url('https://demo.yudleethemes.com/mediciti-lite/'),
            )        
           
        );
    }

    add_filter('pt-ocdi/import_files', 'mediciti_lite_demo_import_files');
}

if (!function_exists('mediciti_lite_is_url')):
    function mediciti_lite_is_url($uri)
    {
        if (preg_match('/^(http|https):\\/\\/[a-z0-9_]+([\\-\\.]{1}[a-z_0-9]+)*\\.[_a-z]{2,5}' . '((:[0-9]{1,5})?\\/.*)?$/i', $uri)) {
            return $uri;
        } else {
            return false;
        }
    }
endif;


function mediciti_lite_skip_links() {
    ?>
    <script>
    /(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
    </script>
    <?php
}
add_action( 'wp_print_footer_scripts', 'mediciti_lite_skip_links' );

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}