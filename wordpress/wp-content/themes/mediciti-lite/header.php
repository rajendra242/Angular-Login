<?php
/**
 * Displays the header content
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
?>
    <!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if ( is_singular() && pings_open() ) {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
       } ?>
        <?php wp_head(); ?>
    </head>
<?php
$mediciti_lite_settings = mediciti_lite_get_theme_options();
if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
$breadcrumb_metabox = get_post_meta(get_the_ID(),'_my_custom_field', true); }
?>

<body <?php body_class('woocommerce'); ?>>
<?php wp_body_open(); ?>
<div id="page">
 <a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'mediciti-lite' ); ?></a>
    <?php
    if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) && in_array('ecommerce-addons-for-elementor/ecommerce-addons-for-elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) { ?>
<div id="mySidenav" class="sidenav">
    <a class="closebtn"><i class="fa fa-times"
                           aria-hidden="true"><span><?php echo esc_html__('close', 'mediciti-lite') ?></span></i></a>
        <div class="widget_shopping_cart_content"><?php woocommerce_mini_cart(); ?></div>
</div>
    <?php }
   $checkbox = $mediciti_lite_settings['mediciti_lite_top_header_section_checkbox'];
   $location = $mediciti_lite_settings['mediciti_lite_top_header_location'];
   $phone = $mediciti_lite_settings['mediciti_lite_top_header_phoneno'];
   $facebook = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_facebok'];
   $googleplus = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_googleplus'];
   $linkedin = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_linkedin'];
   $twitter = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_twitter'];
   $instagram = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_instagram'];
   $tublr = $mediciti_lite_settings['mediciti_lite_top_header_socialmedia_tublr'];
   
    ?>

<header id="top" class="header hero">    
    <?php if($checkbox == 1){?>
<div class="top-header">
            <div class="container">

                <ul class="header-top-left">
                    <?php if(!empty($location)): ?>
                    <li class="header-address">
                        <p><i class="fa fa-map-marker" aria-hidden="true"></i><span><?php echo esc_html($location);?></span></p>
                    </li>
                <?php endif; if(!empty($phone)):?>
                    <li class="header-phone">
                        <p><i class="fa fa-phone-square" aria-hidden="true"></i><span><?php echo esc_html($phone); ?></span></p>
                    </li>
                <?php endif; ?>
                </ul>

                <ul class="social-nav header-top-right">
                    <?php if(!empty($facebook)):?>
                    <li><a href="<?php echo esc_html($facebook); ?>" title="<?php echo esc_html__('Follow us on Facebook', 'mediciti-lite'); ?>" class="fb-link"><span class="fa fa-facebook"></span></a></li>
                <?php endif; if(!empty($googleplus)):?>
                    <li><a href="<?php echo esc_html($googleplus); ?>" title="<?php echo esc_html__('Follow us on Google Plus', 'mediciti-lite'); ?>" class="gp-link"><span class="fa fa-google-plus"></span></a></li>
                <?php endif; if(!empty($linkedin)): ?>
                    <li><a href="<?php echo esc_html($linkedin); ?>" title="<?php echo esc_html__('Follow us on Linkedin', 'mediciti-lite'); ?>" class="ln-link"><span class="fa fa-linkedin"></span></a></li>
                <?php endif; if(!empty($twitter)):?>
                    <li><a href="<?php echo esc_html($twitter); ?>" title="<?php echo esc_html__('Follow us on Twitter', 'mediciti-lite'); ?>" class="tw-link"><span class="fa fa-twitter"></span></a></li>
                <?php endif; if(!empty($instagram)): ?>
                    <li><a href="<?php echo esc_html($instagram); ?>" title="<?php echo esc_html__('Follow us on Instagram', 'mediciti-lite'); ?>" class="in-link"><span class="fa fa-instagram"></span></a></li>
                <?php endif; if(!empty($tublr)): ?>
                    <li><a href="<?php echo esc_html($tublr); ?>" title="<?php echo esc_html__('Follow us on Tumblr', 'mediciti-lite'); ?>" class="ln-link"><span class="fa fa-tumblr"></span></a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php }
    if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
        $layout_pro_customizer = layout_pro_customizer_get_theme_options();
        $header_menu = $layout_pro_customizer['header_option'];
        if ($header_menu != 'menu-below-banner') {
            echo do_shortcode('[layout_pro_multiple_header]');
        }
    } else {
        ?>
        <div class="nav-wrapper header-default header-mobile-hide" style="background-image: url('<?php echo get_header_image(); ?>');">
            <div class="container">
                <div class="row">
                    <nav id="primary-nav" class="navbar navbar-default" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'mediciti-lite' ); ?>">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar-collapse" aria-expanded="false">
                                <span class="sr-only"><?php echo esc_html__('Toggle navigation', 'mediciti-lite'); ?></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            ?>
                            <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                      rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            $description = get_bloginfo('description', 'display');
                            if ($description || is_customize_preview()) : ?>
                                <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                <?php
                            endif; ?>
                        </div><!-- .site-branding -->
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">

                            <?php
                            $args = array(
                                'theme_location' => 'primary',
                                'container' => '',
                                'items_wrap' => '<ul class=" nav-menu nav navbar-nav navbar-right">%3$s</ul>',
                                'walker' => new mediciti_lite_Nav_Walker(),
                                'fallback_cb' => 'mediciti_lite_Nav_Walker::fallback'
                            );
                            wp_nav_menu($args);//extract the content from apperance-> nav menu
                            ?>

                        </div><!-- End navbar-collapse -->
                    </nav>
                </div>
            </div>
        </div>


        <?php
    }
    if (is_page_template('page-templates/home-template.php')) {
        mediciti_lite_page_sliders();
    }

    ?>
</header>
<div id="content">
<?php
if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    $layout_pro_customizer = layout_pro_customizer_get_theme_options();
    $header_menu = $layout_pro_customizer['header_option'];
    if ($header_menu == 'menu-below-banner') {
        echo do_shortcode('[layout_pro_multiple_header]');
    }
}
if (!is_page_template('page-templates/home-template.php')) {
    if (in_array('layout-pro/layout-pro.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    if($breadcrumb_metabox=='unchecked'|| is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()){
    wp_kses_post(mediciti_lite_breadcrumb());
  }
 }
}
?>
