<?php

if ( ! function_exists( 'verdure_mikado_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function verdure_mikado_register_social_icons_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_social_icons_widget' );
}