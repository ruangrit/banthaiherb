<?php

if ( ! function_exists( 'verdure_mikado_register_widgets' ) ) {
	function verdure_mikado_register_widgets() {
		$widgets = apply_filters( 'verdure_mikado_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'verdure_mikado_register_widgets' );
}