<?php

if ( ! function_exists( 'verdure_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function verdure_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_sidearea_opener_widget' );
}