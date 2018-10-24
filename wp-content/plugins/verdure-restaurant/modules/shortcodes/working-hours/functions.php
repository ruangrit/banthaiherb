<?php

if(!function_exists('verdure_restaurant_add_working_hours_shortcodes')) {
	function verdure_restaurant_add_working_hours_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'VerdureRestaurant\Shortcodes\WorkingHours\WorkingHours'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('verdure_restaurant_add_vc_shortcode', 'verdure_restaurant_add_working_hours_shortcodes');
}

if( !function_exists('verdure_restaurant_set_working_hours_icon_class_name_for_vc_shortcodes') ) {
    /**
     * Function that set custom icon class name for property list shortcode to set our icon for Visual Composer shortcodes panel
     */
    function verdure_restaurant_set_working_hours_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-working-hours';

        return $shortcodes_icon_class_array;
    }

    add_filter('verdure_restaurant_filter_add_vc_shortcodes_custom_icon_class', 'verdure_restaurant_set_working_hours_icon_class_name_for_vc_shortcodes');
}
