<?php

if ( ! function_exists( 'verdure_mikado_map_sidebar_meta' ) ) {
	function verdure_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'verdure' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'verdure' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'verdure' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => verdure_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			verdure_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'verdure' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'verdure' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_sidebar_meta', 31 );
}