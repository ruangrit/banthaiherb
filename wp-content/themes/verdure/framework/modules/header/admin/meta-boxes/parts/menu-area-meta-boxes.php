<?php

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function verdure_mikado_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function verdure_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'verdure_mikado_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'verdure_mikado_header_menu_area_meta_options_map' ) ) {
	function verdure_mikado_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = verdure_mikado_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = verdure_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = verdure_mikado_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		verdure_mikado_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'verdure' )
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'verdure' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$verdure_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $verdure_custom_sidebars ) > 0 ) {
			verdure_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'verdure' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'verdure' ),
					'parent'      => $menu_area_container,
					'options'     => $verdure_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'mkdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'verdure' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'verdure' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = verdure_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'verdure' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'verdure' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'verdure' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'verdure' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'verdure' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'verdure' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'verdure' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'verdure' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = verdure_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'verdure' ),
				'description' => esc_html__( 'Set border color for grid area', 'verdure' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'verdure' ),
				'parent'      => $menu_area_container
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'verdure' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'verdure' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'verdure' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'verdure' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'verdure' ),
				'description'   => esc_html__( 'Set border on menu area', 'verdure' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = verdure_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'verdure' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'verdure' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'verdure' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'verdure' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'mkdf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'verdure' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'verdure' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'verdure_mikado_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'verdure_mikado_header_menu_area_meta_boxes_map', 'verdure_mikado_header_menu_area_meta_options_map', 10, 1 );
}