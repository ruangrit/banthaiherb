<?php

if ( ! function_exists( 'verdure_mikado_include_woocommerce_shortcodes' ) ) {
	function verdure_mikado_include_woocommerce_shortcodes() {
		foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/woocommerce/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( verdure_mikado_core_plugin_installed() ) {
		add_action( 'verdure_core_action_include_shortcodes_file', 'verdure_mikado_include_woocommerce_shortcodes' );
	}
}

if ( ! function_exists( 'verdure_mikado_set_product_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product shortcodes to set our icon for Visual Composer shortcodes panel
	 */
	function verdure_mikado_set_product_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-info';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list-carousel';
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list-simple';
		
		return $shortcodes_icon_class_array;
	}
	
	if ( verdure_mikado_core_plugin_installed() ) {
		add_filter( 'verdure_core_filter_add_vc_shortcodes_custom_icon_class', 'verdure_mikado_set_product_list_icon_class_name_for_vc_shortcodes' );
	}
}