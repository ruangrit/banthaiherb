<?php

if(!function_exists('verdure_restaurant_add_res_form_shortcodes')) {
	function verdure_restaurant_add_res_form_shortcodes($shortcodes_class_name) {
		$shortcodes = array(
			'VerdureRestaurant\Shortcodes\ReservationForm\ReservationForm'
		);
		
		$shortcodes_class_name = array_merge($shortcodes_class_name, $shortcodes);
		
		return $shortcodes_class_name;
	}
	
	add_filter('verdure_restaurant_add_vc_shortcode', 'verdure_restaurant_add_res_form_shortcodes');
}

if( !function_exists('verdure_restaurant_set_res_form_icon_class_name_for_vc_shortcodes') ) {
    /**
     * Function that set custom icon class name for property list shortcode to set our icon for Visual Composer shortcodes panel
     */
    function verdure_restaurant_set_res_form_icon_class_name_for_vc_shortcodes($shortcodes_icon_class_array) {
        $shortcodes_icon_class_array[] = '.icon-wpb-reservation-form';

        return $shortcodes_icon_class_array;
    }

    add_filter('verdure_restaurant_filter_add_vc_shortcodes_custom_icon_class', 'verdure_restaurant_set_res_form_icon_class_name_for_vc_shortcodes');
}
