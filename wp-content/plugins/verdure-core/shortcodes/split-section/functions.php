<?php

if ( ! function_exists( 'verdure_core_add_split_section_shortcodes' ) ) {
	function verdure_core_add_split_section_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'VerdureCore\CPT\Shortcodes\SplitSection\SplitSection'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcode', 'verdure_core_add_split_section_shortcodes' );
}

if ( ! function_exists( 'verdure_core_set_split_section_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for split section shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function verdure_core_set_split_section_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-split-section';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcodes_custom_icon_class', 'verdure_core_set_split_section_icon_class_name_for_vc_shortcodes' );
}