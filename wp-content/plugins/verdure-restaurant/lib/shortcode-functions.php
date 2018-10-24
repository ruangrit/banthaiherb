<?php

if(!function_exists('verdure_restaurant_include_shortcodes_file')) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function verdure_restaurant_include_shortcodes_file() {
		if(verdure_restaurant_theme_installed()) {
			foreach (glob(VERDURE_RESTAURANT_SHORTCODES_PATH . '/*/load.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
			do_action('verdure_restaurant_include_shortcode_files');
		}
	}
	
	add_action('init', 'verdure_restaurant_include_shortcodes_file', 6);
}

if(!function_exists('verdure_restaurant_load_shortcodes')) {
	function verdure_restaurant_load_shortcodes() {
		include_once VERDURE_RESTAURANT_ABS_PATH.'/lib/shortcode-loader.php';
		VerdureRestaurant\Lib\ShortcodeLoader::getInstance()->load();
	}
	
	add_action('init', 'verdure_restaurant_load_shortcodes', 7);
}

if ( ! function_exists( 'verdure_restaurant_add_admin_shortcodes_styles' ) ) {
    /**
     * Function that includes shortcodes core styles for admin
     */
    function verdure_restaurant_add_admin_shortcodes_styles() {

        //include shortcode styles for Visual Composer
        wp_enqueue_style( 'verdure-restaurant-vc-shortcodes', VERDURE_RESTAURANT_ASSETS_URL_PATH . '/css/admin/verdure-vc-shortcodes.css' );
    }

    add_action( 'verdure_mikado_admin_scripts_init', 'verdure_restaurant_add_admin_shortcodes_styles' );
}

if ( ! function_exists( 'verdure_restaurant_add_admin_shortcodes_custom_styles' ) ) {
    /**
     * Function that print custom vc shortcodes style
     */
    function verdure_restaurant_add_admin_shortcodes_custom_styles() {
        $style                  = apply_filters( 'verdure_restaurant_filter_add_vc_shortcodes_custom_style', $style = '' );
        $shortcodes_icon_styles = array();
        $shortcode_icon_size    = 32;
        $shortcode_position     = 0;

        $shortcodes_icon_class_array = apply_filters( 'verdure_restaurant_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
        sort( $shortcodes_icon_class_array );

        if ( ! empty( $shortcodes_icon_class_array ) ) {
            foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {
                $mark = $shortcode_position != 0 ? '-' : '';

                $shortcodes_icon_styles[] = '.vc_element-icon.extended-custom-restaurant-icon' . esc_attr( $shortcode_icon_class ) . ' {
					background-position: ' . $mark . esc_attr( $shortcode_position * $shortcode_icon_size ) . 'px 0;
				}';

                $shortcode_position ++;
            }
        }

        if ( ! empty( $shortcodes_icon_styles ) ) {
            $style .= implode( ' ', $shortcodes_icon_styles );
        }

        if ( ! empty( $style ) ) {
            wp_add_inline_style( 'verdure-restaurant-vc-shortcodes', $style );
        }
    }

    add_action( 'verdure_mikado_admin_scripts_init', 'verdure_restaurant_add_admin_shortcodes_custom_styles' );
}