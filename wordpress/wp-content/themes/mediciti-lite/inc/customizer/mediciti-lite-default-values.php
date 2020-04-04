<?php
if(!function_exists('mediciti_lite_get_option_defaults_values')):
	/******************** mediciti-lite DEFAULT OPTION VALUES ******************************************/
	function mediciti_lite_get_option_defaults_values() {
		global $mediciti_lite_default_values;
		$mediciti_lite_default_values = array(
			'mediciti_lite_total_features'			=> '3',
			'mediciti_lite_disable_features'		=> 0,
			'mediciti_lite_sidebar_display'			=> 0,
			'mediciti_lite_design_layout' 			=> 'wide-layout',
			'mediciti_lite_sidebar_layout_options' 	=> 'right',
			'mediciti_lite_header_display'			=> 'header_text',
			'mediciti_lite_categories'				=> array(),
			'mediciti_lite_excerpt_length'			=> '55',
			'mediciti_lite_reset_all' 				=> 0,
			'mediciti_lite_search_text' 			=> __('Search &hellip;', 'mediciti-lite'),
			'mediciti_lite_blog_content_layout'		=> '',
			'mediciti_lite_sidebar_status'			=> 'show-sidebar',

			/* Slider Settings */
			'mediciti_lite_transition_effect' 		=> 'fade',
			'mediciti_lite_transition_delay' 		=> '4',
			'mediciti_lite_transition_duration' 	=> '1',
			'mediciti_lite_slider_no' 				=> '3',
			'mediciti_lite_featured_page_slider_1' 	=> '',
			'mediciti_lite_featured_page_slider_2' 	=> '',
			'mediciti_lite_featured_page_slider_3' 	=> '',
			'mediciti_lite_featured_page_slider_4' 	=> '',
			'mediciti_lite_footer_column_section' 	=>'4',
			
			/* Front page feature */
			'mediciti_lite_entry_format_blog' 		=> 'show',
			'mediciti_lite_entry_meta_blog' 		=> 'show-meta',
			
			/*Top Bar */
			'mediciti_lite_top_bar' 				=>0,	
			
			/*Social Icons */
			'mediciti_lite_top_social_icons' 		=>0,
			'mediciti_lite_buttom_social_icons'		=>0,
			'mediciti_lite_social_facebook'			=> '',
			'mediciti_lite_social_twitter'			=> '',
			'mediciti_lite_social_pinterest'		=> '',
			'mediciti_lite_social_dribbble'			=> '',
			'mediciti_lite_social_instagram'		=> '',
			'mediciti_lite_social_flickr'			=> '',
			'mediciti_lite_social_googleplus'		=> '',
			'mediciti_lite_social_linkedin'			=>'',
			'mediciti_lite_featured_block_title' 	=> '',
			

			/*Product Cat Title*/
			'mediciti_lite_product_cat_title' 				=> __('Featured Categories','mediciti-lite'),
			'mediciti_lite_product_recent_prod_title' 		=> __('Recent Products','mediciti-lite'),
			'mediciti_lite_product_recent_feat_title' 		=> __('Featured Products','mediciti-lite'),
			'mediciti_lite_product_recent_prod_shortcode' 	=> '[recent_products per_page="4" columns="4"]',
			'mediciti_lite_product_recent_feat_shortcode' 	=> '[featured_products per_page="8" columns="4"]',
			'mediciti_lite_product_cat_lists' 		   		=> '',
			
			/*CTA Options*/
			'cta_title'                                   	=> '',
			'cta_description'                              	=> '',
			'cta_button'                              		=> '',
			'cta_link'                              		=> '',
			'cta_Backgroundimage'                   		=> '',
			
			/* Blog Options*/
			'blog_description'                        			=> '',
			'mediciti_lite_callout_section_pages_title'      	=> '',
			'mediciti_lite_callout_section_pages_description'	=> '',
			'mediciti_lite_callout_section_pages_selection'  	=> '',
			
				/*CTA Options*/
			'mediciti_lite_aboutus_page'                    	=> '',
			
			/*department options Options*/
			'mediciti_lite_department_section_pages_selection' 		=> '',
			'mediciti_lite_department_section_pages_description' 	=> '',
			'mediciti_lite_department_section_pages_title'     		=> '',
			
			/* top header options*/
			'mediciti_lite_top_header_socialmedia_tublr'       	=> '',
			'mediciti_lite_top_header_socialmedia_instagram'	=>'',
			'mediciti_lite_top_header_socialmedia_twitter'		=> '',
			'mediciti_lite_top_header_socialmedia_linkedin'  	=> '',
			'mediciti_lite_top_header_socialmedia_googleplus'	=> '',
			'mediciti_lite_top_header_socialmedia_facebok'		=> '',
			'mediciti_lite_top_header_phoneno'					=> '',
			'mediciti_lite_top_header_location'					=> '',
			'mediciti_lite_top_header_section_checkbox'			=> ''
			);
		return apply_filters( 'mediciti_lite_get_option_defaults_values', $mediciti_lite_default_values );
	}
endif;
?>