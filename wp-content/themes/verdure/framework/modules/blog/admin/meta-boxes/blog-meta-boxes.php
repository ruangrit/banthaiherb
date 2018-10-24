<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'verdure_mikado_map_blog_meta' ) ) {
	function verdure_mikado_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'verdure' ),
				'name'  => 'blog_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'verdure' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'verdure' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'verdure' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'verdure' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'verdure' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'verdure' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'verdure' ),
					'in-grid'    => esc_html__( 'In Grid', 'verdure' ),
					'full-width' => esc_html__( 'Full Width', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'verdure' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'verdure' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'verdure' ),
					'two'   => esc_html__( '2 Columns', 'verdure' ),
					'three' => esc_html__( '3 Columns', 'verdure' ),
					'four'  => esc_html__( '4 Columns', 'verdure' ),
					'five'  => esc_html__( '5 Columns', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'verdure' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'verdure' ),
				'options'     => verdure_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'verdure' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'verdure' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'verdure' ),
					'fixed'    => esc_html__( 'Fixed', 'verdure' ),
					'original' => esc_html__( 'Original', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'verdure' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'verdure' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'verdure' ),
					'standard'        => esc_html__( 'Standard', 'verdure' ),
					'load-more'       => esc_html__( 'Load More', 'verdure' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'verdure' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'verdure' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'verdure' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_blog_meta', 30 );
}