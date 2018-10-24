<?php

if ( ! function_exists( 'verdure_mikado_page_options_map' ) ) {
	function verdure_mikado_page_options_map() {
		
		verdure_mikado_add_admin_page(
			array(
				'slug'  => '_page_page',
				'title' => esc_html__( 'Page', 'verdure' ),
				'icon'  => 'fa fa-file-text-o'
			)
		);
		
		/***************** Page Layout - begin **********************/
		
		$panel_sidebar = verdure_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_sidebar',
				'title' => esc_html__( 'Page Style', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'page_show_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'verdure' ),
				'default_value' => 'yes',
				'parent'        => $panel_sidebar
			)
		);
		
		/***************** Page Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		$panel_content = verdure_mikado_add_admin_panel(
			array(
				'page'  => '_page_page',
				'name'  => 'panel_content',
				'title' => esc_html__( 'Content Style', 'verdure' )
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Template in Full Width', 'verdure' ),
				'description'   => esc_html__( 'Enter padding for content area for templates in full width. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_in_grid',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Templates in Grid', 'verdure' ),
				'description'   => esc_html__( 'Enter padding for content area for Templates in grid. If you set this value then it\'s important to set also Content padding for mobile header value in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'content_padding_mobile',
				'default_value' => '',
				'label'         => esc_html__( 'Content Padding for Mobile Header', 'verdure' ),
				'description'   => esc_html__( 'Enter padding for content area for Mobile Header in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				),
				'parent'        => $panel_content
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'image',
				'name'          => 'content_background_image',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image', 'verdure' ),
				'description'   => esc_html__( 'Choose image to use as content background image', 'verdure' ),
				'parent'        => $panel_content
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'content_background_image_behavior',
				'default_value' => 'full-image',
				'label'         => esc_html__( 'Content Background Image Behavior', 'verdure' ),
				'description'   => esc_html__( 'Choose background image behavior', 'verdure' ),
				'parent'        => $panel_content,
				'options'		=> array(
					'full-image' => esc_html__('As Full Image','verdure'),
					'pattern' => esc_html__('As Pattern','verdure'),
				)
			)
		);
		/***************** Content Layout - end **********************/
		
		/***************** Additional Page Layout - start *****************/
		
		do_action( 'verdure_mikado_additional_page_options_map' );
		
		/***************** Additional Page Layout - end *****************/
	}
	
	add_action( 'verdure_mikado_options_map', 'verdure_mikado_page_options_map', 8 );
}