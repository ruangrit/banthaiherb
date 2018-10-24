<?php

if(!function_exists('verdure_restaurant_include_custom_post_types_files')) {
	/**
	 * Loads all custom post types by going through all folders that are placed directly in post types folder
	 */
	function verdure_restaurant_include_custom_post_types_files() {
		if(verdure_restaurant_theme_installed()) {
			foreach (glob(VERDURE_RESTAURANT_CPT_PATH . '/*/load.php') as $cpt_load) {
				include_once $cpt_load;
			}
		}
	}
	
	add_action('after_setup_theme', 'verdure_restaurant_include_custom_post_types_files', 1);
}

if(!function_exists('verdure_restaurant_include_custom_post_types_meta_boxes')) {
	/**
	 * Loads all meta boxes functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function verdure_restaurant_include_custom_post_types_meta_boxes() {
		if(verdure_restaurant_theme_installed()) {
			foreach(glob(VERDURE_RESTAURANT_CPT_PATH . '/*/admin/meta-boxes/*.php') as $meta_boxes_map) {
				include_once $meta_boxes_map;
			}
		}
	}

	add_action('verdure_mikado_before_meta_boxes_map', 'verdure_restaurant_include_custom_post_types_meta_boxes');
}