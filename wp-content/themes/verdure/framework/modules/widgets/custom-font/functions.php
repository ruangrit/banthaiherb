<?php

if ( ! function_exists( 'verdure_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function verdure_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_custom_font_widget' );
}