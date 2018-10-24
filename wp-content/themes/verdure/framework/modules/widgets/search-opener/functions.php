<?php

if ( ! function_exists( 'verdure_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function verdure_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_search_opener_widget' );
}