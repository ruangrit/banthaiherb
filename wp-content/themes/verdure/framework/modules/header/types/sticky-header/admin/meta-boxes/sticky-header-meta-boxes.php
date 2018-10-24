<?php

if ( ! function_exists( 'verdure_mikado_sticky_header_meta_boxes_options_map' ) ) {
	function verdure_mikado_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = verdure_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'dependency' => array(
					'hide' => array(
						'mkdf_header_behaviour_meta'  => array( '', 'no-behavior','fixed-on-scroll','sticky-header-on-scroll-up' )
					)
				)
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll Amount for Sticky Header Appearance', 'verdure' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'verdure' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);

		$verdure_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $verdure_custom_sidebars ) > 0 ) {
			verdure_mikado_add_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sticky_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Sticky Header Menu Area', 'verdure' ),
					'description' => esc_html__( 'Choose custom widget area to display in sticky header menu area"', 'verdure' ),
					'parent'      => $header_meta_box,
					'options'     => $verdure_custom_sidebars,
					'dependency' => array(
						'show' => array(
							'mkdf_header_behaviour_meta' => array( 'sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up' )
						)
					)
				)
			);
		}
	}
	
	add_action( 'verdure_mikado_additional_header_area_meta_boxes_map', 'verdure_mikado_sticky_header_meta_boxes_options_map', 8, 1 );
}