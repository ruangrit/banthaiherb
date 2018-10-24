<?php

if(!function_exists('verdure_mikado_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function verdure_mikado_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'VerdureMikadoStickySidebar';
		
		return $widgets;
	}
	
	add_filter('verdure_mikado_register_widgets', 'verdure_mikado_register_sticky_sidebar_widget');
}