<?php

if ( ! function_exists( 'verdure_core_map_portfolio_meta' ) ) {
	function verdure_core_map_portfolio_meta() {
		global $verdure_mikado_Framework;
		
		$mkd_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$mkd_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$mkdPortfolioImages = new VerdureMikadoMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'verdure-core' ), '', '', 'portfolio_images' );
		$verdure_mikado_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $mkdPortfolioImages );
		
		$mkdf_portfolio_image_gallery = new VerdureMikadoMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'verdure-core' ), esc_html__( 'Choose your portfolio images', 'verdure-core' ) );
		$mkdPortfolioImages->addChild( 'mkdf-portfolio-image-gallery', $mkdf_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$mkdf_portfolio_images_videos = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'verdure-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		verdure_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $mkdf_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'verdure-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'verdure-core' ),
						'options' => array(
							'image' => esc_html__('Image','verdure-core'),
							'video' => esc_html__('Video','verdure-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'verdure-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'verdure-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'verdure-core'),
							'vimeo' => esc_html__('Vimeo', 'verdure-core'),
							'self' => esc_html__('Self Hosted', 'verdure-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'verdure-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'verdure-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'verdure-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$mkdAdditionalSidebarItems = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'verdure-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		verdure_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $mkdAdditionalSidebarItems,
				'button_text' => esc_html__( 'Add New Item', 'verdure-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'verdure-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'verdure-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'verdure-core' )
					)
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_core_map_portfolio_meta', 40 );
}