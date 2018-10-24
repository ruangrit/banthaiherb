<?php

if ( ! function_exists( 'verdure_mikado_set_title_standard_with_breadcrumbs_type_for_options' ) ) {
	/**
	 * This function set standard with breadcrumbs title type value for title options map and meta boxes
	 */
	function verdure_mikado_set_title_standard_with_breadcrumbs_type_for_options( $type ) {
		$type['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrumbs', 'verdure' );
		
		return $type;
	}
	
	add_filter( 'verdure_mikado_title_type_global_option', 'verdure_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
	add_filter( 'verdure_mikado_title_type_meta_boxes', 'verdure_mikado_set_title_standard_with_breadcrumbs_type_for_options' );
}