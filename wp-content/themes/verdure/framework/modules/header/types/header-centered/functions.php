<?php

if ( ! function_exists( 'verdure_mikado_register_header_centered_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function verdure_mikado_register_header_centered_type( $header_types ) {
		$header_type = array(
			'header-centered' => 'VerdureMikado\Modules\Header\Types\HeaderCentered'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'verdure_mikado_init_register_header_centered_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function verdure_mikado_init_register_header_centered_type() {
		add_filter( 'verdure_mikado_register_header_type_class', 'verdure_mikado_register_header_centered_type' );
	}
	
	add_action( 'verdure_mikado_before_header_function_init', 'verdure_mikado_init_register_header_centered_type' );
}

if ( ! function_exists( 'verdure_mikado_header_centered_per_page_custom_styles' ) ) {
	/**
	 * Return header per page styles
	 */
	function verdure_mikado_header_centered_per_page_custom_styles( $style, $class_prefix, $page_id ) {
		$header_area_style    = array();
		$header_area_selector = array( $class_prefix . '.mkdf-header-centered .mkdf-logo-area .mkdf-logo-wrapper' );
		
		$logo_area_logo_padding = get_post_meta( $page_id, 'mkdf_logo_wrapper_padding_header_centered_meta', true );
		
		if ( $logo_area_logo_padding !== '' ) {
			$header_area_style['padding'] = $logo_area_logo_padding;
		}
		
		$current_style = '';
		
		if ( ! empty( $header_area_style ) ) {
			$current_style .= verdure_mikado_dynamic_css( $header_area_selector, $header_area_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'verdure_mikado_add_header_page_custom_style', 'verdure_mikado_header_centered_per_page_custom_styles', 10, 3 );
}

if ( ! function_exists( 'verdure_mikado_register_header_centered_widget_areas' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function verdure_mikado_register_header_centered_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-header-centered-left',
				'name'          => esc_html__( 'Header Centered Left Widget Area', 'verdure' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left of header centered', 'verdure' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-centered-left-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'mkdf-header-centered-right',
				'name'          => esc_html__( 'Header Centered Right Widget Area', 'verdure' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right of header centered', 'verdure' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-centered-right-widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="mkdf-widget-title">',
				'after_title'   => '</h5>'
			)
		);
	}
	
	if ( verdure_mikado_check_is_header_type_enabled( 'header-centered' ) ) {
		add_action( 'widgets_init', 'verdure_mikado_register_header_centered_widget_areas' );
	}
}

if ( ! function_exists( 'verdure_mikado_get_header_centered_left_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function verdure_mikado_get_header_centered_left_widget_areas() {
		$page_id                            = verdure_mikado_get_page_id();
		$custom_header_centered_left_widget_area = get_post_meta( $page_id, 'mkdf_custom_header_centered_left_widget_meta', true );
		
		if ( is_active_sidebar( 'mkdf-header-centered-left' ) && empty( $custom_header_centered_left_widget_area ) ) {
			dynamic_sidebar( 'mkdf-header-centered-left' );
		} else if ( ! empty( $custom_header_centered_left_widget_area ) && is_active_sidebar( $custom_header_centered_left_widget_area ) ) {
			dynamic_sidebar( $custom_header_centered_left_widget_area );
		}
	}
}

if ( ! function_exists( 'verdure_mikado_get_header_centered_right_widget_areas' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function verdure_mikado_get_header_centered_right_widget_areas() {
		$page_id                            = verdure_mikado_get_page_id();
		$custom_header_centered_right_widget_area = get_post_meta( $page_id, 'mkdf_custom_header_centered_right_widget_meta', true );
		
		if ( is_active_sidebar( 'mkdf-header-centered-right' ) && empty( $custom_header_centered_right_widget_area ) ) {
			dynamic_sidebar( 'mkdf-header-centered-right' );
		} else if ( ! empty( $custom_header_centered_right_widget_area ) && is_active_sidebar( $custom_header_centered_right_widget_area ) ) {
			dynamic_sidebar( $custom_header_centered_right_widget_area );
		}
	}
}