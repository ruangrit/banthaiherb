<?php
if(verdure_restaurant_theme_installed()) {
	if(!function_exists('verdure_restaurant_meta_box_map')) {
		function verdure_restaurant_meta_box_map()
		{

			$restaurant_menu_meta_box = verdure_mikado_add_meta_box(
				array(
					'scope' => array('restaurant-menu'),
					'title' => esc_html__('Restaurant Menu Item Settings', 'verdure-restaurant'),
					'name' => 'cafe_menu_item_meta'
				)
			);


			verdure_mikado_add_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_price',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Price', 'verdure-restaurant'),
					'description'   => esc_html__('Enter price for this restaurant menu item', 'verdure-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
					'args'          => array(
						'col_width' => '3'
					)
				)
			);

            verdure_mikado_add_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_description',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Description', 'verdure-restaurant'),
					'description'   => esc_html__('Enter description for this restaurant menu item', 'verdure-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
				)
			);

            verdure_mikado_add_meta_box_field(
				array(
					'name'          => 'restaurant_menu_item_label',
					'type'          => 'text',
					'default_value' => '',
					'label'         => esc_html__('Restaurant Menu Item Label', 'verdure-restaurant'),
					'description'   => esc_html__('Enter label for this restaurant menu item', 'verdure-restaurant'),
					'parent'        => $restaurant_menu_meta_box,
					'args'          => array(
						'col_width' => '3'
					)
				)
			);

		}
		add_action('verdure_mikado_meta_boxes_map', 'verdure_restaurant_meta_box_map');
	}
}