<?php

if ( ! function_exists( 'verdure_mikado_error_404_options_map' ) ) {
	function verdure_mikado_error_404_options_map() {
		
		verdure_mikado_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'verdure' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = verdure_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'Choose a background color for header area', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'verdure' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'verdure' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'verdure' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'verdure' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'verdure' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'verdure' ),
					'light-header' => esc_html__( 'Light', 'verdure' ),
					'dark-header'  => esc_html__( 'Dark', 'verdure' )
				)
			)
		);
		
		$panel_404_options = verdure_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'verdure' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'verdure' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'verdure' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'verdure' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'verdure' )
			)
		);
		
		$first_level_group = verdure_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'verdure' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'verdure' )
			)
		);
		
		$first_level_row1 = verdure_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = verdure_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'verdure' ),
				'options'       => verdure_mikado_get_font_style_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'verdure' ),
				'options'       => verdure_mikado_get_font_weight_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'verdure' ),
				'options'       => verdure_mikado_get_text_transform_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle', 'verdure' ),
				'description'   => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'verdure' )
			)
		);
		
		$second_level_group = verdure_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Subtitle Style', 'verdure' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'verdure' )
			)
		);
		
		$second_level_row1 = verdure_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_subtitle_color',
				'label'  => esc_html__( 'Text Color', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row2 = verdure_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'verdure' ),
				'options'       => verdure_mikado_get_font_style_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'verdure' ),
				'options'       => verdure_mikado_get_font_weight_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'verdure' ),
				'options'       => verdure_mikado_get_text_transform_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'verdure' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'verdure' )
			)
		);
		
		$third_level_group = verdure_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'verdure' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'verdure' )
			)
		);
		
		$third_level_row1 = verdure_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'verdure' ),
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = verdure_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'verdure' ),
				'options'       => verdure_mikado_get_font_style_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'verdure' ),
				'options'       => verdure_mikado_get_font_weight_array()
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'verdure' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'verdure' ),
				'options'       => verdure_mikado_get_text_transform_array()
			)
		);

		verdure_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_search_form_skin',
				'default_value' => '',
				'label'         => esc_html__( 'Search Form Skin', 'verdure' ),
				'description'   => esc_html__( 'Choose a style to make search form in that predefined style', 'verdure' ),
				'options'       => array(
					''            => esc_html__( 'Default', 'verdure' ),
					'light-style' => esc_html__( 'Light', 'verdure' )
				)
			)
		);
	}
	
	add_action( 'verdure_mikado_options_map', 'verdure_mikado_error_404_options_map', 19 );
}