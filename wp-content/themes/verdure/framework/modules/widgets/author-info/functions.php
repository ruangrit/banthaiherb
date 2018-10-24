<?php

if ( ! function_exists( 'verdure_mikado_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function verdure_mikado_register_author_info_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_author_info_widget' );
}