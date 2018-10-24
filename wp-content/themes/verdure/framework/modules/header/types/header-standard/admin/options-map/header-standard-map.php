<?php

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_standard_options' ) ) {
	function verdure_mikado_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_header_standard_map' ) ) {
	function verdure_mikado_header_standard_map( $parent ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_standard_options();
		
		verdure_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'verdure' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'verdure' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'verdure' ),
					'left'   => esc_html__( 'Left', 'verdure' ),
					'center' => esc_html__( 'Center', 'verdure' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_additional_header_menu_area_options_map', 'verdure_mikado_header_standard_map' );
}