<?php

if ( ! function_exists( 'verdure_mikado_centered_title_type_options_meta_boxes' ) ) {
	function verdure_mikado_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'verdure' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'verdure' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_additional_title_area_meta_boxes', 'verdure_mikado_centered_title_type_options_meta_boxes', 5 );
}