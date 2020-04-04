<?php
/**
 * Custom functions
 *
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */

/******************** Remove div and replace with ul**************************************/
if (! function_exists('mediciti_lite_wp_page_menu')) {
	add_filter('wp_page_menu', 'mediciti_lite_wp_page_menu');
	function mediciti_lite_wp_page_menu($page_markup) {
		preg_match('/^<div class=\"([a-z0-9-_]+)\">/i', $page_markup, $matches);
		$divclass   = $matches[1];
		$replace    = array('<div class="'.esc_html($divclass).'">', '</div>');
		$new_markup = str_replace($replace, '', $page_markup);
		$new_markup = preg_replace('/^<ul>/i', '<ul class="'.esc_html($divclass).'">', $new_markup);
		return $new_markup;
	}
}


/********************* Used wp_page_menu filter hook *********************************************/
if (! function_exists('mediciti_lite_wp_page_menu_filter')) {
	function mediciti_lite_wp_page_menu_filter($text) {
		$replace = array(
			'current_page_item' => 'current-menu-item',
		);
		$text = str_replace(array_keys($replace), $replace, $text);
		return $text;
	}
	add_filter('wp_page_menu', 'mediciti_lite_wp_page_menu_filter');
}

/**************************************************************************************/
if (! function_exists('mediciti_lite_get_featured_posts')) {
	function mediciti_lite_get_featured_posts() {
		return apply_filters( 'mediciti_lite_get_featured_posts', array() );
	}
}
/************ Return bool if there are featured Posts ********************************/
if (! function_exists('mediciti_lite_has_featured_posts')) {
	function mediciti_lite_has_featured_posts() {
		return ! is_paged() && (bool) mediciti_lite_get_featured_posts();
	}
}

/**************************** Display Header Title ***********************************/
if (! function_exists('mediciti_lite_display_header_title')) {

    add_filter('get_the_archive_title', 'mediciti_lite_display_header_title');
    function mediciti_lite_display_header_title($title)
    {
        $format = get_post_format();
        $mediciti_lite_settings = mediciti_lite_get_theme_options();
        if (is_archive()) {
            if (is_category()) :
                $mediciti_lite_header_title = esc_html__('Category: ', 'mediciti-lite') . ucfirst(single_cat_title('', FALSE));
            elseif (is_tag()) :
                if ($mediciti_lite_settings['mediciti_lite_blog_layout'] != 'photography_layout'):
                    $mediciti_lite_header_title = esc_html__('Tag: ', 'mediciti-lite') . ucfirst(single_tag_title('', FALSE));
                endif;

            elseif (is_author()) :
                the_post();
                $mediciti_lite_header_title = esc_html__('Author: ', 'mediciti-lite') . ucfirst(get_the_author());
            elseif (is_day()) :
                $mediciti_lite_header_title = esc_html__('Day: ', 'mediciti-lite') . get_the_date();
            elseif (is_month()) :
                $mediciti_lite_header_title = esc_html__('Month: ', 'mediciti-lite') . get_the_date('F Y');
            elseif (is_year()) :
                $mediciti_lite_header_title = esc_html__('Year: ', 'mediciti-lite') . get_the_date('Y');
            elseif ($format == 'audio') :
                $mediciti_lite_header_title = esc_html__('Audios', 'mediciti-lite');
            elseif ($format == 'aside') :
                $mediciti_lite_header_title = esc_html__('Asides', 'mediciti-lite');
            elseif ($format == 'image') :
                $mediciti_lite_header_title = esc_html__('Images', 'mediciti-lite');
            elseif ($format == 'gallery') :
                $mediciti_lite_header_title = esc_html__('Galleries', 'mediciti-lite');
            elseif ($format == 'video') :
                $mediciti_lite_header_title = esc_html__('Videos', 'mediciti-lite');
            elseif ($format == 'status') :
                $mediciti_lite_header_title = esc_html__('Status', 'mediciti-lite');
            elseif ($format == 'quote') :
                $mediciti_lite_header_title = esc_html__('Quotes', 'mediciti-lite');
            elseif ($format == 'link') :
                $mediciti_lite_header_title = esc_html__('links', 'mediciti-lite');
            elseif ($format == 'chat') :
                $mediciti_lite_header_title = esc_html__('Chats', 'mediciti-lite');
            elseif (class_exists('WooCommerce') && (is_shop() || is_product_category())):
                $mediciti_lite_header_title = woocommerce_page_title(false);
            elseif (class_exists('bbPress') && is_bbpress()) :
                $mediciti_lite_header_title = esc_html(get_the_title());
            else :
                $mediciti_lite_header_title = esc_html__('Archive:', 'mediciti-lite');
            endif;
        } elseif (is_home()) {
            $mediciti_lite_header_title = esc_html(get_the_title(get_option('page_for_posts')));
        } elseif (is_404()) {
            $mediciti_lite_header_title = __('Page NOT Found', 'mediciti-lite');
        } elseif (is_search()) {
            $search_query = get_search_query();
            $mediciti_lite_header_title = sprintf('Search Results for: ' . ucfirst($search_query) . '', 'mediciti-lite');
        } elseif (is_page_template()) {
            $mediciti_lite_header_title = get_the_title();
        } else {
            $mediciti_lite_header_title = get_the_title();
        }
        return $mediciti_lite_header_title;

    }
}
/********************* Custom Header setup ************************************/
if (! function_exists('mediciti_lite_custom_header_setup')) {
	function mediciti_lite_custom_header_setup() {
		$args = array(
			'default-text-color'     => '',
			'default-image'          => '',
			'height'                 => apply_filters( 'mediciti_lite_header_image_height', 400 ),
			'width'                  => apply_filters( 'mediciti_lite_header_image_width', 2500 ),
			'random-default'         => false,
			'max-width'              => 2500,
			'flex-height'            => true,
			'flex-width'             => true,
			'random-default'         => false,
			'header-text'			 => false,
			'uploads'				 => true,
			'wp-head-callback'       => '',
			'default-image'			 => '',
		);
		add_theme_support( 'custom-header', $args );
	}
	add_action( 'after_setup_theme', 'mediciti_lite_custom_header_setup' );
}

if ( ! function_exists( 'mediciti_lite_the_featured_video' ) ) {
    function mediciti_lite_the_featured_video( $content ) {

        $ori_url = explode( "\n", esc_html( $content ) );
        $url = esc_url( $ori_url[0] );

        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) ) {
            $embed_url = wp_oembed_get( esc_url( $url ) );
            print_r($embed_url);
            $content = trim( str_replace( $url, '', esc_html( $content ) ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo esc_url( $url );
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo esc_url( $url );
            }

            $content = trim( str_replace( $url, '', $content ) );
        }
    }
}

if (! function_exists('mediciti_lite_single_content')) {
    function mediciti_lite_single_content($post) {
        $content = trim(  get_post_field('post_content', $post->ID) );
        /*$new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
        if ( has_post_format('gallery')) {
            echo wp_kses_post($post->post_content);
        }
        else {*/
            the_content();
        /*}*/
    }
}
 /* for excerpt*/
if (!function_exists('mediciti_lite_get_excerpt')) :
    function mediciti_lite_get_excerpt($post_id, $count)
    {
        $title = get_the_title($post_id);
        $content_post = get_post($post_id);
        $excerpt = $content_post->post_content;

        $excerpt = strip_shortcodes($excerpt);
        $excerpt = strip_tags($excerpt);


        $excerpt = preg_replace('/\s\s+/', ' ', $excerpt);
        $excerpt = preg_replace('#\[[^\]]+\]#', ' ', $excerpt);
        $strip = explode(' ', $excerpt);
        foreach ($strip as $key => $single) {
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        $excerpt = implode(' ', $strip);

        $excerpt = substr($excerpt, 0, $count);
        if (strlen($excerpt) >= $count) {
            $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
            $excerpt = $excerpt . '...';
        }
        if($title)
            return $excerpt;
        else
            return '<a href="'.esc_url(get_the_permalink($post_id)).'">'.$excerpt.'</a>';

    }
endif;


