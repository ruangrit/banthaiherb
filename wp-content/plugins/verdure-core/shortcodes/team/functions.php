<?php

if ( ! function_exists( 'verdure_core_add_team_shortcodes' ) ) {
	function verdure_core_add_team_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'VerdureCore\CPT\Shortcodes\Team\Team'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcode', 'verdure_core_add_team_shortcodes' );
}

if ( ! function_exists( 'verdure_core_set_team_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for team shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function verdure_core_set_team_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-team';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcodes_custom_icon_class', 'verdure_core_set_team_icon_class_name_for_vc_shortcodes' );
}