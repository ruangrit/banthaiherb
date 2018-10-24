<?php

if ( ! function_exists( 'verdure_mikado_map_post_video_meta' ) ) {
	function verdure_mikado_map_post_video_meta() {
		$video_post_format_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'verdure' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'verdure' ),
				'description'   => esc_html__( 'Choose video type', 'verdure' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'verdure' ),
					'self'            => esc_html__( 'Self Hosted', 'verdure' )
				)
			)
		);
		
		$mkdf_video_embedded_container = verdure_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'verdure' ),
				'description' => esc_html__( 'Enter Video URL', 'verdure' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'verdure' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'verdure' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'verdure' ),
				'description' => esc_html__( 'Enter video image', 'verdure' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_video_meta', 22 );
}