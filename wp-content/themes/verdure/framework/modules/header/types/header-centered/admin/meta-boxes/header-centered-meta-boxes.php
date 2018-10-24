<?php

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_centered_meta_boxes' ) ) {
	function verdure_mikado_get_hide_dep_for_header_centered_meta_boxes() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_centered_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_header_centered_logo_meta_map' ) ) {
	function verdure_mikado_header_centered_logo_meta_map( $parent ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_centered_meta_boxes();
		
		verdure_mikado_add_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'mkdf_logo_wrapper_padding_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'verdure' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'verdure' ),
				'args'            => array(
					'col_width' => 3
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);

	}
	
	add_action( 'verdure_mikado_header_logo_area_additional_meta_boxes_map', 'verdure_mikado_header_centered_logo_meta_map', 10, 1 );
}

if ( ! function_exists( 'verdure_mikado_header_centered_meta_map' ) ) {
	function verdure_mikado_header_centered_meta_map( $parent ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_centered_meta_boxes();
		
		$header_centered_container = verdure_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'header_centered_container',
				'parent'          => $parent,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $header_centered_container,
				'name'   => 'header_centered_style',
				'title'  => esc_html__( 'Header Centered', 'verdure' )
			)
		);

		verdure_mikado_add_meta_box_field(
			array(
				'parent'          => $header_centered_container,
				'type'            => 'select',
				'name'            => 'mkdf_widgets_position_header_centered_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Widgets Position for Header Centered', 'verdure' ),
				'description'     => esc_html__( 'Choose position for widgets for header centered', 'verdure' ),
				'options' => array(
					'' => esc_html__('Default','verdure'),
					'apart' => esc_html__('Apart from Menu','verdure'),
					'beside' => esc_html__('Beside Menu','verdure'),
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);

		$verdure_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $verdure_custom_sidebars ) > 0 ) {
			verdure_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_header_centered_left_widget_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Header Centered Left Widget Area', 'verdure' ),
					'description' => esc_html__( 'Choose custom widget area to display in header centered on the left side of the menu"', 'verdure' ),
					'parent'      => $header_centered_container,
					'options'     => $verdure_custom_sidebars
				)
			);

			verdure_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_header_centered_right_widget_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area for Header Centered Right Widget Area', 'verdure' ),
					'description' => esc_html__( 'Choose custom widget area to display in header centered on the right side of the menu"', 'verdure' ),
					'parent'      => $header_centered_container,
					'options'     => $verdure_custom_sidebars
				)
			);
		}
	}
	
	add_action( 'verdure_mikado_additional_header_area_meta_boxes_map', 'verdure_mikado_header_centered_meta_map', 10, 1 );
}