<?php

if ( ! function_exists( 'verdure_core_add_highlight_shortcodes' ) ) {
	function verdure_core_add_highlight_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'VerdureCore\CPT\Shortcodes\Highlight\Highlight'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcode', 'verdure_core_add_highlight_shortcodes' );
}