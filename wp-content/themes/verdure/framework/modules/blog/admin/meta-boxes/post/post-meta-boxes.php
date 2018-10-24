<?php

/*** Post Settings ***/

if ( ! function_exists( 'verdure_mikado_map_post_meta' ) ) {
	function verdure_mikado_map_post_meta() {
		
		$post_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'verdure' ),
				'name'  => 'post-meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'verdure' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'verdure' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => verdure_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$verdure_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $verdure_custom_sidebars ) > 0 ) {
			verdure_mikado_add_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'verdure' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'verdure' ),
				'parent'      => $post_meta_box,
				'options'     => verdure_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'verdure' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'verdure' ),
				'parent'      => $post_meta_box
			)
		);
        
        verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_post_content_alignment_meta',
				'type'          => 'select',
                'label'         => esc_html__( 'Post Content Alignment', 'verdure' ),
				'description'   => esc_html__( 'Choose how to align the post content', 'verdure' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(                    
					'default'      => esc_html__( 'Default', 'verdure' ),
					'left'         => esc_html__( 'Left', 'verdure' ),
					'center'       => esc_html__( 'Center', 'verdure' ),
					'right'        => esc_html__( 'Right', 'verdure' ),
					'justified'    => esc_html__( 'Justified', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'verdure' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'verdure' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'verdure' ),
					'large-width'        => esc_html__( 'Large Width', 'verdure' ),
					'large-height'       => esc_html__( 'Large Height', 'verdure' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'verdure' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'verdure' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'verdure' ),
					'large-width' => esc_html__( 'Large Width', 'verdure' )
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'verdure' ),
				'parent'        => $post_meta_box,
				'options'       => verdure_mikado_get_yes_no_select_array()
			)
		);

		do_action('verdure_mikado_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_post_meta', 20 );
}
