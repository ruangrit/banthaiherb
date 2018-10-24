<?php

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_logo_area_options' ) ) {
	function verdure_mikado_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_header_logo_area_options_map' ) ) {
	function verdure_mikado_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = verdure_mikado_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'verdure' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'verdure' )
			)
		);
		
		$logo_area_in_grid_container = verdure_mikado_add_admin_container(
			array(
				'parent'     => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid' => 'no'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'verdure' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'verdure' ),
				'description'   => esc_html__( 'Set grid background transparency', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'verdure' ),
				'description'   => esc_html__( 'Set border on grid area', 'verdure' )
			)
		);
		
		$logo_area_in_grid_border_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_in_grid_border_container,
				'type'        => 'color',
				'name'        => 'logo_area_in_grid_border_color',
				'label'       => esc_html__( 'Border Color', 'verdure' ),
				'description' => esc_html__( 'Set border color for grid area', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_container,
				'type'        => 'color',
				'name'        => 'logo_area_background_color',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Set background color for logo area', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'verdure' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'verdure' ),
				'description'   => esc_html__( 'Set border on logo area', 'verdure' )
			)
		);
		
		$logo_area_border_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_border'  => 'no'
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'label'         => esc_html__( 'Border Color', 'verdure' ),
				'description'   => esc_html__( 'Set border color for logo area', 'verdure' ),
				'parent'        => $logo_area_border_container
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'label'         => esc_html__( 'Height', 'verdure' ),
				'description'   => esc_html__( 'Enter logo area height (default is 90px)', 'verdure' ),
				'parent'        => $logo_area_container,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'verdure_mikado_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'verdure_mikado_header_logo_area_options_map', 'verdure_mikado_header_logo_area_options_map', 10, 1 );
}