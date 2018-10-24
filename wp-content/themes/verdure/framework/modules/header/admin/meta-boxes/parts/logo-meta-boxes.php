<?php

if ( ! function_exists( 'verdure_mikado_logo_meta_box_map' ) ) {
	function verdure_mikado_logo_meta_box_map() {
		
		$logo_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'verdure' ),
				'name'  => 'logo_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'verdure' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'verdure' ),
				'parent'      => $logo_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'verdure' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'verdure' ),
				'parent'      => $logo_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'verdure' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'verdure' ),
				'parent'      => $logo_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'verdure' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'verdure' ),
				'parent'      => $logo_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'verdure' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'verdure' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_logo_meta_box_map', 47 );
}