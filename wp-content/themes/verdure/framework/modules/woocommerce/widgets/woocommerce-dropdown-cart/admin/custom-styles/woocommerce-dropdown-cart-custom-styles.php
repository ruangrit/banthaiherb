<?php

if ( ! function_exists( 'verdure_mikado_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function verdure_mikado_dropdown_cart_icon_styles() {
		$icon_color       = verdure_mikado_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = verdure_mikado_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-shopping-cart-holder .mkdf-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-shopping-cart-holder .mkdf-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_dropdown_cart_icon_styles' );
}