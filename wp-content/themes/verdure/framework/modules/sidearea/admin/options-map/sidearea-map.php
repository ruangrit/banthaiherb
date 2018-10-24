<?php

if (!function_exists('verdure_mikado_sidearea_options_map')) {
    function verdure_mikado_sidearea_options_map() {

        verdure_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'verdure'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = verdure_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'verdure'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'verdure'),
                'description'   => esc_html__('Choose a type of Side Area', 'verdure'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'verdure'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'verdure'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'verdure'),
                ),
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'verdure'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'verdure'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = verdure_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'verdure'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'verdure'),
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'verdure'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'verdure'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'verdure'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'verdure'),
                'options'       => verdure_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = verdure_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'verdure'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'verdure'),
                'options'       => verdure_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = verdure_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'verdure'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'verdure'),
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'verdure'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'verdure'),
            )
        );

        $side_area_icon_style_group = verdure_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'verdure'),
                'description' => esc_html__('Define styles for Side Area icon', 'verdure')
            )
        );

        $side_area_icon_style_row1 = verdure_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'verdure')
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'verdure')
            )
        );

        $side_area_icon_style_row2 = verdure_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'verdure')
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'verdure')
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'verdure'),
                'description' => esc_html__('Choose a background color for Side Area', 'verdure')
            )
        );

		verdure_mikado_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__('Background Image', 'verdure'),
				'description' => esc_html__('Choose a background image for Side Area', 'verdure')
			)
		);

        verdure_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'verdure'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'verdure'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        verdure_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'verdure'),
                'description'   => esc_html__('Choose text alignment for side area', 'verdure'),
                'options'       => array(
                    ''       => esc_html__('Default', 'verdure'),
                    'left'   => esc_html__('Left', 'verdure'),
                    'center' => esc_html__('Center', 'verdure'),
                    'right'  => esc_html__('Right', 'verdure')
                )
            )
        );
    }

    add_action('verdure_mikado_options_map', 'verdure_mikado_sidearea_options_map', 5);
}