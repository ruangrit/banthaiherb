<?php

if ( ! function_exists( 'verdure_mikado_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function verdure_mikado_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'verdure' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'verdure' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'verdure_mikado_additional_title_area_meta_boxes', 'verdure_mikado_breadcrumbs_title_type_options_meta_boxes' );
}