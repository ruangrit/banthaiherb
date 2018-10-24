<?php

if ( ! function_exists( 'verdure_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function verdure_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_separator_widget' );
}