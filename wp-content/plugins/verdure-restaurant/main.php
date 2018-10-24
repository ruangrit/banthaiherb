<?php
/*
Plugin Name: Verdure Restaurant
Description: Plugin that adds features to our theme
Author: Mikado Themes
Version: 1.0
*/

include_once 'load.php';

add_action( 'after_setup_theme', array( VerdureRestaurant\CPT\PostTypesRegister::getInstance(), 'register' ) );

if ( ! function_exists( 'verdure_restaurant_load_assets' ) ) {
	function verdure_restaurant_load_assets() {
		wp_enqueue_style( 'verdure-restaurant-style', plugins_url( '/assets/css/restaurant.min.css', __FILE__ ), array(), '' );
		
		if ( function_exists( 'verdure_mikado_is_responsive_on' ) && verdure_mikado_is_responsive_on() ) {
			wp_enqueue_style( 'verdure-restaurant-responsive-style', plugins_url( '/assets/css/restaurant-responsive.min.css', __FILE__ ), array(), '' );
		}
		
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'verdure-restaurant-script', plugins_url( '/assets/js/restaurant.min.js', __FILE__ ), array( 'jquery' ), '', true );
	}
	
	add_action( 'wp_enqueue_scripts', 'verdure_restaurant_load_assets' );
}

if ( ! function_exists( 'verdure_restaurant_style_dynamics_deps' ) ) {
	function verdure_restaurant_style_dynamics_deps( $deps ) {
		$style_dynamic_deps_array = array();
		$style_dynamic_deps_array[] = 'verdure-restaurant-style';
		
		if ( function_exists( 'verdure_mikado_is_responsive_on' ) && verdure_mikado_is_responsive_on() ) {
			$style_dynamic_deps_array[] = 'verdure-restaurant-responsive-style';
		}
		
		return array_merge( $deps, $style_dynamic_deps_array );
	}
	
	add_filter( 'verdure_mikado_style_dynamic_deps', 'verdure_restaurant_style_dynamics_deps' );
}