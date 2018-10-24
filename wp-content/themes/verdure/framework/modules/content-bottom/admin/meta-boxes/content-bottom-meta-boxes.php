<?php

if ( ! function_exists( 'verdure_mikado_map_content_bottom_meta' ) ) {
	function verdure_mikado_map_content_bottom_meta() {
		
		$content_bottom_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'verdure' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'verdure' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'verdure' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'mkdf_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'verdure' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'verdure' ),
				'options'       => verdure_mikado_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'verdure' ),
				'options'       => verdure_mikado_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'mkdf_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'verdure' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_content_bottom_meta', 71 );
}