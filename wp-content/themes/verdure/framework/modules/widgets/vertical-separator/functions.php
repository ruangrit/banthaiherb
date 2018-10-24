<?php

if ( ! function_exists( 'verdure_mikado_register_vertical_separator_widget' ) ) {
	/**
	 * Function that register vertical separator widget
	 */
	function verdure_mikado_register_vertical_separator_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoVerticalSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_vertical_separator_widget' );
}