<?php

if ( ! function_exists( 'verdure_core_map_portfolio_settings_meta' ) ) {
	function verdure_core_map_portfolio_settings_meta() {
		$meta_box = verdure_mikado_add_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'verdure-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		verdure_mikado_add_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'verdure-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'verdure-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'verdure-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'verdure-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'verdure-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'verdure-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'verdure-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'verdure-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'verdure-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'verdure-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'verdure-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'verdure-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'verdure-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'verdure-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'verdure-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'verdure-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'verdure-core' ),
					'two'   => esc_html__( '2 Columns', 'verdure-core' ),
					'three' => esc_html__( '3 Columns', 'verdure-core' ),
					'four'  => esc_html__( '4 Columns', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'verdure-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'verdure-core' ),
				'default_value' => '',
				'options'       => verdure_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_masonry_type_meta_container'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'verdure-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'verdure-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'verdure-core' ),
					'two'   => esc_html__( '2 Columns', 'verdure-core' ),
					'three' => esc_html__( '3 Columns', 'verdure-core' ),
					'four'  => esc_html__( '4 Columns', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'verdure-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'verdure-core' ),
				'default_value' => '',
				'options'       => verdure_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'verdure-core' ),
				'parent'        => $meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'verdure-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'verdure-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'verdure-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'verdure-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'verdure-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'verdure-core' ),
				'parent'      => $meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'verdure-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'verdure-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'verdure-core' ),
					'small'              => esc_html__( 'Small', 'verdure-core' ),
					'large-width'        => esc_html__( 'Large Width', 'verdure-core' ),
					'large-height'       => esc_html__( 'Large Height', 'verdure-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'verdure-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'verdure-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'verdure-core' ),
					'large-width' => esc_html__( 'Large Width', 'verdure-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'verdure-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'verdure-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_core_map_portfolio_settings_meta', 41 );
}