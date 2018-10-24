<?php
/*
Plugin Name: Verdure Twitter Feed
Description: Plugin that adds Twitter feed functionality to our theme
Author: Mikado Themes
Version: 1.0
*/

define( 'VERDURE_TWITTER_FEED_VERSION', '1.0' );
define( 'VERDURE_TWITTER_ABS_PATH', dirname( __FILE__ ) );
define( 'VERDURE_TWITTER_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );
define( 'VERDURE_TWITTER_URL_PATH', plugin_dir_url( __FILE__ ) );
define( 'VERDURE_TWITTER_ASSETS_PATH', VERDURE_TWITTER_ABS_PATH . '/assets' );
define( 'VERDURE_TWITTER_ASSETS_URL_PATH', VERDURE_TWITTER_URL_PATH . 'assets' );
define( 'VERDURE_TWITTER_SHORTCODES_PATH', VERDURE_TWITTER_ABS_PATH . '/shortcodes' );
define( 'VERDURE_TWITTER_SHORTCODES_URL_PATH', VERDURE_TWITTER_URL_PATH . 'shortcodes' );

include_once 'load.php';

if ( ! function_exists( 'verdure_twitter_theme_installed' ) ) {
	/**
	 * Checks whether theme is installed or not
	 * @return bool
	 */
	function verdure_twitter_theme_installed() {
		return defined( 'MIKADO_ROOT' );
	}
}

if ( ! function_exists( 'verdure_twitter_feed_text_domain' ) ) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function verdure_twitter_feed_text_domain() {
		load_plugin_textdomain( 'verdure-twitter-feed', false, VERDURE_TWITTER_REL_PATH . '/languages' );
	}
	
	add_action( 'plugins_loaded', 'verdure_twitter_feed_text_domain' );
}