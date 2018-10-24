<?php

if ( ! function_exists( 'verdure_mikado_set_header_centered_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function verdure_mikado_set_header_centered_type_global_option( $header_types ) {
		$header_types['header-centered'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-centered/assets/img/header-centered.png',
			'label' => esc_html__( 'Centered', 'verdure' )
		);
		
		return $header_types;
	}
	
	add_filter( 'verdure_mikado_header_type_global_option', 'verdure_mikado_set_header_centered_type_global_option' );
}


if ( ! function_exists( 'verdure_mikado_set_header_centered_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function verdure_mikado_set_header_centered_type_as_global_option( $header_type ) {
		$header_type = 'header-centered';

		return $header_type;
	}

	add_filter( 'verdure_mikado_default_header_type_global_option', 'verdure_mikado_set_header_centered_type_as_global_option' );
}

if ( ! function_exists( 'verdure_mikado_set_header_centered_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function verdure_mikado_set_header_centered_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-centered'] = esc_html__( 'Centered', 'verdure' );
		
		return $header_type_options;
	}
	
	add_filter( 'verdure_mikado_header_type_meta_boxes', 'verdure_mikado_set_header_centered_type_meta_boxes_option' );
}

if ( ! function_exists( 'verdure_mikado_set_hide_dep_options_header_centered' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function verdure_mikado_set_hide_dep_options_header_centered( $hide_dep_options ) {
		$hide_dep_options[] = 'header-centered';
		
		return $hide_dep_options;
	}
	
	// header types panel options
	add_filter( 'verdure_mikado_full_screen_menu_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_standard_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_vertical_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_vertical_menu_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_vertical_closed_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_vertical_sliding_hide_global_option', 'verdure_mikado_set_hide_dep_options_header_centered' );
	
	// header types panel meta boxes
	add_filter( 'verdure_mikado_header_standard_hide_meta_boxes', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_vertical_hide_meta_boxes', 'verdure_mikado_set_hide_dep_options_header_centered' );
	
	// header types panel - widgets area meta boxes
	add_filter( 'verdure_mikado_header_menu_area_widgets_hide_meta_boxes', 'verdure_mikado_set_hide_dep_options_header_centered' );
	add_filter( 'verdure_mikado_header_logo_area_widgets_hide_meta_boxes', 'verdure_mikado_set_hide_dep_options_header_centered' );
}