<?php

if ( ! function_exists( 'verdure_mikado_sidebar_options_map' ) ) {
	function verdure_mikado_sidebar_options_map() {

		$sidebar_panel = verdure_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'verdure' ),
				'name'  => 'sidebar',
				'page'  => '_page_page'
			)
		);
		
		verdure_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'verdure' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'verdure' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => verdure_mikado_get_custom_sidebars_options()
		) );
		
		$verdure_custom_sidebars = verdure_mikado_get_custom_sidebars();
		if ( count( $verdure_custom_sidebars ) > 0 ) {
			verdure_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'verdure' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'verdure' ),
				'parent'      => $sidebar_panel,
				'options'     => $verdure_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'verdure_mikado_additional_page_options_map', 'verdure_mikado_sidebar_options_map', 9 );
}