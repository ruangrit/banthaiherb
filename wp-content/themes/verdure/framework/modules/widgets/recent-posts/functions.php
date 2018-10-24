<?php

if ( ! function_exists( 'verdure_mikado_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function verdure_mikado_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_recent_posts_widget' );
}