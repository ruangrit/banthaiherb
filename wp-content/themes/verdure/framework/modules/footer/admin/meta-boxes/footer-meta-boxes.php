<?php

if ( ! function_exists( 'verdure_mikado_map_footer_meta' ) ) {
	function verdure_mikado_map_footer_meta() {
		
		$footer_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'verdure' ),
				'name'  => 'footer_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'verdure' ),
				'options'       => verdure_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = verdure_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			verdure_mikado_add_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'verdure' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'verdure' ),
					'options'       => verdure_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			verdure_mikado_add_meta_box_field(
				array(
					'name'          => 'mkdf_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'verdure' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'verdure' ),
					'options'       => verdure_mikado_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);

		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_footer_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Footer in Grid', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'verdure' ),
				'options'       => verdure_mikado_get_yes_no_select_array(),
				'dependency' => array(
					'hide' => array(
						'mkdf_show_footer_top_meta' => array('', 'no'),
						'mkdf_show_footer_bottom_meta' => array('', 'no')
					)
				),
				'parent'        => $show_footer_meta_container
			)
		);

		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_uncovering_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Uncovering Footer', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'verdure' ),
				'options'       => verdure_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container,
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_footer_meta', 70 );
}