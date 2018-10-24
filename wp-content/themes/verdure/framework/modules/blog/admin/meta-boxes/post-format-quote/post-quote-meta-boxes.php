<?php

if ( ! function_exists( 'verdure_mikado_map_post_quote_meta' ) ) {
	function verdure_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'verdure' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'verdure' ),
				'description' => esc_html__( 'Enter Quote text', 'verdure' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'verdure' ),
				'description' => esc_html__( 'Enter Quote author', 'verdure' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_quote_meta', 25 );
}