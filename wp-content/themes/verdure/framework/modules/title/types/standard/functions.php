<?php

if ( ! function_exists( 'verdure_mikado_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function verdure_mikado_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'verdure' );
		
		return $type;
	}
	
	add_filter( 'verdure_mikado_title_type_global_option', 'verdure_mikado_set_title_standard_type_for_options' );
	add_filter( 'verdure_mikado_title_type_meta_boxes', 'verdure_mikado_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'verdure_mikado_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function verdure_mikado_set_title_standard_type_as_default_options( $type ) {
		$type = 'centered';
		
		return $type;
	}
	
	add_filter( 'verdure_mikado_default_title_type_global_option', 'verdure_mikado_set_title_standard_type_as_default_options' );
}