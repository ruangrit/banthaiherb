<?php

if(!function_exists('verdure_restaurant_menu_meta_box_functions')) {
	function verdure_restaurant_menu_meta_box_functions($post_types) {
		$post_types[] = 'restaurant-menu';

		return $post_types;
	}

	add_filter('verdure_mikado_meta_box_post_types_save', 'verdure_restaurant_menu_meta_box_functions');
	add_filter('verdure_mikado_meta_box_post_types_remove', 'verdure_restaurant_menu_meta_box_functions');
}

if(!function_exists('verdure_restaurant_register_restaurant_menu_cpt')) {
	function verdure_restaurant_register_restaurant_menu_cpt($cpt_class_name) {
		$cpt_class = array(
			'VerdureRestaurant\CPT\RestaurantMenu\RestaurantMenuRegister'
		);
		
		$cpt_class_name = array_merge($cpt_class_name, $cpt_class);
		
		return $cpt_class_name;
	}
	
	add_filter('verdure_restaurant_filter_register_custom_post_types', 'verdure_restaurant_register_restaurant_menu_cpt');
}

// Load restaurant menu shortcodes
if(!function_exists('verdure_restaurant_include_restaurant_menu_shortcodes_file')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function verdure_restaurant_include_restaurant_menu_shortcodes_file() {
        foreach(glob(VERDURE_RESTAURANT_CPT_PATH.'/restaurant-menu/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('verdure_restaurant_include_shortcode_files', 'verdure_restaurant_include_restaurant_menu_shortcodes_file');
}



