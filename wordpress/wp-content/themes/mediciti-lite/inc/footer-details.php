<?php
/**
 * @package mediciti-lite
 * @since mediciti-lite 1.0
 */
?>
<?php
/************************* mediciti-lite FOOTER DETAILS **************************************/
if (! function_exists('mediciti_lite_site_footer')) {
	function mediciti_lite_site_footer() {
		$mediciti_lite_settings = mediciti_lite_get_theme_options();
		if ( is_active_sidebar( 'mediciti_lite_footer_options' ) ) :
			dynamic_sidebar( 'mediciti_lite_footer_options' );
		else:
			echo '<div class="copyright">';
			echo esc_html__('Theme by ', 'mediciti-lite');
		 	echo '<a href="'.esc_url('https://yudleethemes.com/').'" target="_blank">'. ' ' .esc_html__('Yudlee Themes', 'mediciti-lite').'</a>';
		 	 ?>
		</div>
		<?php endif;
	}
	add_action( 'mediciti_lite_sitegenerator_footer', 'mediciti_lite_site_footer');
}