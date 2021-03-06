<?php

if ( ! function_exists( 'verdure_mikado_map_post_gallery_meta' ) ) {
	
	function verdure_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'verdure' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		verdure_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'verdure' ),
				'description' => esc_html__( 'Choose your gallery images', 'verdure' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_gallery_meta', 21 );
}
