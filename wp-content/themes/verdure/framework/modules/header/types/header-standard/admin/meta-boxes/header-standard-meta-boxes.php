<?php

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function verdure_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_header_standard_meta_map' ) ) {
	function verdure_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		verdure_mikado_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'verdure' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'verdure' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'verdure' ),
					'left'   => esc_html__( 'Left', 'verdure' ),
					'right'  => esc_html__( 'Right', 'verdure' ),
					'center' => esc_html__( 'Center', 'verdure' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_additional_header_area_meta_boxes_map', 'verdure_mikado_header_standard_meta_map' );
}