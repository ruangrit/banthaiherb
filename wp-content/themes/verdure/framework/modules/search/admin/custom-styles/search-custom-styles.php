<?php

if ( ! function_exists( 'verdure_mikado_search_opener_icon_size' ) ) {
	function verdure_mikado_search_opener_icon_size() {
		$icon_size = verdure_mikado_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-search-opener', array(
				'font-size' => verdure_mikado_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_search_opener_icon_size' );
}

if ( ! function_exists( 'verdure_mikado_search_opener_icon_colors' ) ) {
	function verdure_mikado_search_opener_icon_colors() {
		$icon_color       = verdure_mikado_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = verdure_mikado_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_search_opener_icon_colors' );
}

if ( ! function_exists( 'verdure_mikado_search_opener_text_styles' ) ) {
	function verdure_mikado_search_opener_text_styles() {
		$item_styles = verdure_mikado_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo verdure_mikado_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = verdure_mikado_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_search_opener_text_styles' );
}

if ( ! function_exists( 'verdure_mikado_search_fullscreen_styles' ) ) {
	function verdure_mikado_search_fullscreen_styles() {
		$item_selector = array(
			'.mkdf-fullscreen-search-holder .mkdf-fullscreen-search-table'
		);

		$item_style = array();

		$background_image = verdure_mikado_options()->getOptionValue( 'search_fullscreen_background_image' );

		if ($background_image !== '') {
			$item_style['background-image'] = 'url('.esc_url($background_image).')';
			$item_style['background-position'] = 'center';
			$item_style['background-size'] = 'cover';
		}

		if ( is_array($item_style) && count($item_style) ) {
			echo verdure_mikado_dynamic_css( $item_selector, $item_style);
		}
	}

	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_search_fullscreen_styles' );
}