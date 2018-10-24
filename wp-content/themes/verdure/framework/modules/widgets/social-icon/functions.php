<?php

if ( ! function_exists( 'verdure_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function verdure_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_social_icon_widget' );
}