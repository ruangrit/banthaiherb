<?php

if ( ! function_exists( 'verdure_mikado_footer_top_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer top area
	 */
	function verdure_mikado_footer_top_general_styles() {
		$item_styles      = array();
		$background_color = verdure_mikado_options()->getOptionValue( 'footer_top_background_color' );
        $background_image = verdure_mikado_options()->getOptionValue( 'footer_top_background_image' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
        
        if ( ! empty( $background_image ) ) {
			$item_styles['background-image'] = 'url(' .$background_image. ')';
			$item_styles['background-repeat'] = 'no-repeat';
            $item_styles['background-size'] = 'cover';
            $item_styles['background-position'] = 'center';
		}
		
		echo verdure_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-top-holder', $item_styles );
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_footer_top_general_styles' );
}

if ( ! function_exists( 'verdure_mikado_footer_bottom_general_styles' ) ) {
	/**
	 * Generates general custom styles for footer bottom area
	 */
	function verdure_mikado_footer_bottom_general_styles() {
		$item_styles      = array();
		$background_color = verdure_mikado_options()->getOptionValue( 'footer_bottom_background_color' );
        $background_image = verdure_mikado_options()->getOptionValue( 'footer_bottom_background_image' );
		
		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
        
        if ( ! empty( $background_image ) ) {
			$item_styles['background-image'] = 'url(' .$background_image. ')';
			$item_styles['background-repeat'] = 'no-repeat';
            $item_styles['background-size'] = 'cover';
            $item_styles['background-position'] = 'center';
		}
		
		echo verdure_mikado_dynamic_css( '.mkdf-page-footer .mkdf-footer-bottom-holder', $item_styles );
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_footer_bottom_general_styles' );
}