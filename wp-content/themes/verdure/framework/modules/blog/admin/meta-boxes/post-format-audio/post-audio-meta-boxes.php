<?php

if ( ! function_exists( 'verdure_mikado_map_post_audio_meta' ) ) {
	function verdure_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'verdure' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'verdure' ),
				'description'   => esc_html__( 'Choose audio type', 'verdure' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'verdure' ),
					'self'            => esc_html__( 'Self Hosted', 'verdure' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = verdure_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'verdure' ),
				'description' => esc_html__( 'Enter audio URL', 'verdure' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'verdure' ),
				'description' => esc_html__( 'Enter audio link', 'verdure' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_audio_meta', 23 );
}