<?php

if ( ! function_exists( 'verdure_mikado_footer_options_map' ) ) {
	function verdure_mikado_footer_options_map() {

		verdure_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'verdure' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = verdure_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'verdure' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'verdure' ),
				'parent'        => $footer_panel
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__( 'Uncovering Footer', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'verdure' ),
				'parent'        => $footer_panel,
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'verdure' ),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = verdure_mikado_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'verdure' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'verdure' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
					'3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'verdure' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'verdure' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'verdure' ),
					'left'   => esc_html__( 'Left', 'verdure' ),
					'center' => esc_html__( 'Center', 'verdure' ),
					'right'  => esc_html__( 'Right', 'verdure' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Set background color for top footer area', 'verdure' ),
				'parent'      => $show_footer_top_container
			)
		);
        

		verdure_mikado_add_admin_field(
			array(
				'name'        => 'footer_top_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'verdure' ),
				'description' => esc_html__( 'Set background image for top footer area', 'verdure' ),
				'parent'      => $show_footer_top_container
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'verdure' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = verdure_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'verdure' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'verdure' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'verdure' ),
				'parent'      => $show_footer_bottom_container
			)
		);
        
		verdure_mikado_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Background Image', 'verdure' ),
				'description' => esc_html__( 'Set background image for bottom footer area', 'verdure' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'verdure_mikado_options_map', 'verdure_mikado_footer_options_map', 11 );
}