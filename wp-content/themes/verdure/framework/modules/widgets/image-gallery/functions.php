<?php

if ( ! function_exists( 'verdure_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function verdure_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'VerdureMikadoImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'verdure_mikado_register_widgets', 'verdure_mikado_register_image_gallery_widget' );
}