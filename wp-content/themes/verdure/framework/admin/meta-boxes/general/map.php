<?php

if ( ! function_exists( 'verdure_mikado_map_general_meta' ) ) {
	function verdure_mikado_map_general_meta() {
		
		$general_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => apply_filters( 'verdure_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'verdure' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'verdure' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'verdure' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'verdure' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = verdure_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'verdure' ),
				'description' => esc_html__( 'Define styles for Content area', 'verdure' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = verdure_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);

				verdure_mikado_add_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'verdure' ),
						'parent' => $mkdf_content_padding_row,
					)
				);

				verdure_mikado_add_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'verdure' ),
						'parent'  => $mkdf_content_padding_row,
					)
				);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'verdure' ),
				'description' => esc_html__( 'Choose background color for page content', 'verdure' ),
				'parent'      => $general_meta_box
			)
		);

		verdure_mikado_add_meta_box_field(
			array(
				'type'          => 'yesno',
				'name'          => 'mkdf_disable_content_background_image_meta',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Content Background Image', 'verdure' ),
				'description'   => esc_html__( 'Disable content background image', 'verdure' ),
				'parent'        => $general_meta_box
			)
		);

		verdure_mikado_add_meta_box_field(
			array(
				'type'          => 'image',
				'name'          => 'mkdf_content_background_image_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image', 'verdure' ),
				'description'   => esc_html__( 'Choose image to use as content background image', 'verdure' ),
				'parent'        => $general_meta_box,
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);

		verdure_mikado_add_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_background_image_behavior_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image Behavior', 'verdure' ),
				'description'   => esc_html__( 'Choose background image behavior', 'verdure' ),
				'parent'        => $general_meta_box,
				'options'		=> array(
					'' => esc_html__('Default','verdure'),
					'full-image' => esc_html__('As Full Image','verdure'),
					'pattern' => esc_html__('As Pattern','verdure'),
				),
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'verdure' ),
				'parent'  => $general_meta_box,
				'options' => verdure_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = verdure_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'verdure' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'verdure' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'verdure' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'verdure' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'verdure' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'verdure' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'verdure' ),
						'description'   => esc_html__( 'Choose background image attachment', 'verdure' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'verdure' ),
							'fixed'  => esc_html__( 'Fixed', 'verdure' ),
							'scroll' => esc_html__( 'Scroll', 'verdure' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'verdure' ),
				'parent'        => $general_meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = verdure_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'verdure' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'verdure' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'verdure' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'verdure' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'verdure' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'verdure' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				verdure_mikado_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'verdure' ),
						'options'       => verdure_mikado_get_yes_no_select_array(),
					)
				);
		
				verdure_mikado_add_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'verdure' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'verdure' ),
						'options'       => verdure_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'verdure' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'verdure' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'verdure' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'verdure' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'verdure' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'verdure' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'verdure' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'verdure' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'verdure' ),
				'parent'        => $general_meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = verdure_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				verdure_mikado_add_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'verdure' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'verdure' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => verdure_mikado_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = verdure_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					verdure_mikado_add_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'verdure' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = verdure_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'verdure' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'verdure' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = verdure_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					verdure_mikado_add_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'verdure' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'verdure' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'verdure' ),
								'rotate_image'          => esc_html__( 'Rotate Image', 'verdure' ),
								'pulse'                 => esc_html__( 'Pulse', 'verdure' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'verdure' ),
								'cube'                  => esc_html__( 'Cube', 'verdure' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'verdure' ),
								'stripes'               => esc_html__( 'Stripes', 'verdure' ),
								'wave'                  => esc_html__( 'Wave', 'verdure' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'verdure' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'verdure' ),
								'atom'                  => esc_html__( 'Atom', 'verdure' ),
								'clock'                 => esc_html__( 'Clock', 'verdure' ),
								'mitosis'               => esc_html__( 'Mitosis', 'verdure' ),
								'lines'                 => esc_html__( 'Lines', 'verdure' ),
								'fussion'               => esc_html__( 'Fussion', 'verdure' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'verdure' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'verdure' )
							)
						)
					);
					
					verdure_mikado_add_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'verdure' ),
							'parent' => $row_pt_spinner_animation_meta,
							'dependency'	=> array(
								'hide' => array(
									'mkdf_smooth_pt_spinner_type_meta' => array('rotate_image')
								)
							)
						)
					);

					verdure_mikado_add_meta_box_field(
						array(
							'type'          => 'imagesimple',
							'name'          => 'mkdf_smooth_pt_spinner_image_meta',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Image', 'verdure' ),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency'	=> array(
								'show' => array(
									'mkdf_smooth_pt_spinner_type_meta' => array('rotate_image')
								)
							)
						)
					);
					
					verdure_mikado_add_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'verdure' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'verdure' ),
							'options'     => verdure_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'verdure' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'verdure' ),
				'parent'      => $general_meta_box,
				'options'     => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_general_meta', 10 );
}