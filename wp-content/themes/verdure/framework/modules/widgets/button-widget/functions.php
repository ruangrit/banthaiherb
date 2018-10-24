<?php

if ( ! function_exists( 'verdure_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function verdure_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_button_widget' );
}