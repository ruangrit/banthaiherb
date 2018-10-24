<?php

if ( ! function_exists( 'verdure_mikado_get_title_types_meta_boxes' ) ) {
	function verdure_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'verdure_mikado_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'verdure' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'verdure_mikado_map_title_meta' ) ) {
	function verdure_mikado_map_title_meta() {
		$title_type_meta_boxes = verdure_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'verdure' ),
				'name'  => 'title_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'verdure' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'verdure' ),
				'parent'        => $title_meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = verdure_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'verdure' ),
						'description'   => esc_html__( 'Choose title type', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'verdure' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'verdure' ),
						'options'       => verdure_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'verdure' ),
						'description' => esc_html__( 'Set a height for Title Area', 'verdure' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'verdure' ),
						'description' => esc_html__( 'Choose a background color for title area', 'verdure' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'verdure' ),
						'description' => esc_html__( 'Choose an Image for title area', 'verdure' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'verdure' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'verdure' ),
							'hide'                => esc_html__( 'Hide Image', 'verdure' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'verdure' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'verdure' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'verdure' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'verdure' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'verdure' )
						)
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'verdure' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'verdure' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'verdure' ),
							'window-top'    => esc_html__( 'From Window Top', 'verdure' )
						)
					)
				);

		verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_content_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Content Vertical Alignment', 'verdure' ),
						'description'   => esc_html__( 'Set title content vertical alignment', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							'' => esc_html__( 'Default', 'verdure' ),
							'top' => esc_html__( 'Top', 'verdure' ),
							'middle'    => esc_html__( 'Middle', 'verdure' ),
							'bottom'    => esc_html__( 'Bottom', 'verdure' )
						)
					)
				);
					
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_offset_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Title Vertical Offset', 'verdure' ),
						'description'   => esc_html__( 'Set title vertical offset relative to its current position', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'args' 			=> array(
							'col_width' => '3',
							'suffix' => 'px'
						)
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'verdure' ),
						'options'       => verdure_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'verdure' ),
						'description' => esc_html__( 'Choose a color for title text', 'verdure' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'verdure' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'verdure' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'verdure' ),
						'options'       => verdure_mikado_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'verdure' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'verdure' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'verdure_mikado_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_title_meta', 60 );
}