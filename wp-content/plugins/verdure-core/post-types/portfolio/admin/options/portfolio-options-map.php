<?php

if ( ! function_exists( 'verdure_mikado_portfolio_options_map' ) ) {
	function verdure_mikado_portfolio_options_map() {
		
		verdure_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'verdure-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = verdure_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'verdure-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'verdure-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'verdure-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'verdure-core' ),
				'default_value' => '4',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'verdure-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'2' => esc_html__( '2 Columns', 'verdure-core' ),
					'3' => esc_html__( '3 Columns', 'verdure-core' ),
					'4' => esc_html__( '4 Columns', 'verdure-core' ),
					'5' => esc_html__( '5 Columns', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'verdure-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'verdure-core' ),
				'default_value' => 'normal',
				'options'       => verdure_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'verdure-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'verdure-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'verdure-core' ),
					'landscape' => esc_html__( 'Landscape', 'verdure-core' ),
					'portrait'  => esc_html__( 'Portrait', 'verdure-core' ),
					'square'    => esc_html__( 'Square', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'verdure-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'verdure-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'verdure-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'verdure-core' )
				)
			)
		);
		
		$panel = verdure_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'verdure-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'verdure-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'verdure-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'verdure-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'verdure-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'verdure-core' ),
					'three' => esc_html__( '3 Columns', 'verdure-core' ),
					'four'  => esc_html__( '4 Columns', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'verdure-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'verdure-core' ),
				'default_value' => 'normal',
				'options'       => verdure_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'verdure-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'verdure-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'verdure-core' ),
					'three' => esc_html__( '3 Columns', 'verdure-core' ),
					'four'  => esc_html__( '4 Columns', 'verdure-core' )
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'verdure-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'verdure-core' ),
				'default_value' => 'normal',
				'options'       => verdure_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'verdure-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'verdure-core' ),
					'yes' => esc_html__( 'Yes', 'verdure-core' ),
					'no'  => esc_html__( 'No', 'verdure-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'verdure-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = verdure_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'verdure-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'verdure-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'verdure-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'verdure-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_options_map', 'verdure_mikado_portfolio_options_map', 14 );
}