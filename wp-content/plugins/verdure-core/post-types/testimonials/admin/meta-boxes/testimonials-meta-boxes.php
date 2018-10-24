<?php

if ( ! function_exists( 'verdure_core_map_testimonials_meta' ) ) {
	function verdure_core_map_testimonials_meta() {
		$testimonial_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'verdure-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'verdure-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'verdure-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'verdure-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'verdure-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'verdure-core' ),
				'description' => esc_html__( 'Enter author name', 'verdure-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'verdure-core' ),
				'description' => esc_html__( 'Enter author job position', 'verdure-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_core_map_testimonials_meta', 95 );
}