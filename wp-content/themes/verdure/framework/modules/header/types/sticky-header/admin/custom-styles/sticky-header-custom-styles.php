<?php

if ( ! function_exists( 'verdure_mikado_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function verdure_mikado_sticky_header_styles() {
		$background_color        = verdure_mikado_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = verdure_mikado_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = verdure_mikado_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = verdure_mikado_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo verdure_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'background-color' => verdure_mikado_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo verdure_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = verdure_mikado_filter_px( $header_height ) . 'px';
			
			echo verdure_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header', array( 'height' => $height ) );
			echo verdure_mikado_dynamic_css( '.mkdf-page-header .mkdf-sticky-header .mkdf-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.mkdf-sticky-header .mkdf-sticky-holder .mkdf-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = verdure_mikado_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( verdure_mikado_string_ends_with( $container_side_padding, 'px' ) || verdure_mikado_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = verdure_mikado_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = verdure_mikado_filter_px( $container_side_padding ) . 'px';
			}
			
			echo verdure_mikado_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = verdure_mikado_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li > a'
		);
		
		echo verdure_mikado_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = verdure_mikado_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li:hover > a',
			'.mkdf-main-menu.mkdf-sticky-nav > ul > li.mkdf-active-item > a'
		);
		
		echo verdure_mikado_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'verdure_mikado_style_dynamic', 'verdure_mikado_sticky_header_styles' );
}