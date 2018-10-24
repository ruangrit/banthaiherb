<?php

include_once 'const.php';

//load lib
include_once 'lib/helpers-functions.php';
require_once 'lib/shortcode-interface.php';
require_once 'lib/shortcode-loader.php';
require_once 'lib/shortcode-functions.php';

//load post-post-types
require_once 'lib/post-type-interface.php';
require_once 'post-types/post-types-functions.php';
require_once 'post-types/post-types-register.php'; //this has to be loaded last

//load admin
if(!function_exists('verdure_restaurant_load_admin')) {
    function verdure_restaurant_load_admin() {
        require_once 'admin/options/map.php';
    }
    add_action('verdure_mikado_before_options_map', 'verdure_restaurant_load_admin');
}

//load custom styles
if(!function_exists('verdure_restaurant_load_custom_styles')) {
    function verdure_restaurant_load_custom_styles() {
        require_once 'assets/custom-styles/restaurant.php';
    }
    add_action('after_setup_theme','verdure_restaurant_load_custom_styles');
}