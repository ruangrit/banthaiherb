<?php

if ( ! function_exists( 'verdure_core_enqueue_scripts_for_uncovering_sections_shortcodes' ) ) {
	/**
	 * Function that includes all necessary 3rd party scripts for this shortcode
	 */
	function verdure_core_enqueue_scripts_for_uncovering_sections_shortcodes() {
		wp_enqueue_script( 'curtain', VERDURE_CORE_SHORTCODES_URL_PATH . '/uncovering-sections/assets/js/plugins/curtain.js', array( 'jquery' ), false, true );
	}
	
	add_action( 'verdure_mikado_enqueue_third_party_scripts', 'verdure_core_enqueue_scripts_for_uncovering_sections_shortcodes' );
}

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mkdf_Uncovering_Sections extends WPBakeryShortCodesContainer {}
	class WPBakeryShortCode_Mkdf_Uncovering_Sections_Item extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'verdure_core_add_uncovering_sections_shortcodes' ) ) {
	function verdure_core_add_uncovering_sections_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'VerdureCore\CPT\Shortcodes\UncoveringSections\UncoveringSections',
			'VerdureCore\CPT\Shortcodes\UncoveringSections\UncoveringSectionsItem'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcode', 'verdure_core_add_uncovering_sections_shortcodes' );
}

if ( ! function_exists( 'verdure_core_set_uncovering_sections_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for full screen sections holder shortcode
	 */
	function verdure_core_set_uncovering_sections_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.vc_shortcodes_container.wpb_mkdf_uncovering_sections_item { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcodes_custom_style', 'verdure_core_set_uncovering_sections_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'verdure_core_set_uncovering_sections_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for full screen sections holder shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function verdure_core_set_uncovering_sections_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-uncovering-sections';
		$shortcodes_icon_class_array[] = '.icon-wpb-uncovering-sections-item';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'verdure_core_filter_add_vc_shortcodes_custom_icon_class', 'verdure_core_set_uncovering_sections_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'verdure_core_set_uncovering_sections_header_top_custom_styles' ) ) {
    /**
     * Function that set custom icon class name for full screen sections holder shortcode to set our icon for Visual Composer shortcodes panel
     */
    function verdure_core_set_uncovering_sections_header_top_custom_styles() {
        $top_header_height = verdure_mikado_options()->getOptionValue( 'top_bar_height' );

        if ( ! empty( $top_header_height ) ) {
            echo verdure_mikado_dynamic_css( '.mkdf-uncovering-section-on-page:not(.mkdf-header-bottom).mkdf-header-top-enabled .mkdf-top-bar', array( 'top' => '-' . verdure_mikado_filter_px( $top_header_height ) . 'px' ) );
            echo verdure_mikado_dynamic_css( '.mkdf-uncovering-section-on-page:not(.mkdf-header-bottom).mkdf-header-top-enabled:not(.mkdf-sticky-header-appear) .mkdf-page-header', array( 'top' => verdure_mikado_filter_px( $top_header_height ) . 'px' ) );
        }
    }

    add_action( 'verdure_mikado_style_dynamic', 'verdure_core_set_uncovering_sections_header_top_custom_styles' );
}