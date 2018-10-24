<?php

if ( ! function_exists( 'verdure_mikado_map_post_link_meta' ) ) {
	function verdure_mikado_map_post_link_meta() {
		$link_post_format_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'verdure' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'verdure' ),
				'description' => esc_html__( 'Enter link', 'verdure' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_link_meta', 24 );
}