<?php

if ( ! function_exists( 'verdure_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function verdure_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_blog_list_widget' );
}