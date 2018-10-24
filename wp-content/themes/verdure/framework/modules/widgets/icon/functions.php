<?php

if ( ! function_exists( 'verdure_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function verdure_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_icon_widget' );
}