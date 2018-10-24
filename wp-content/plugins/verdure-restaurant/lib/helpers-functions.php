<?php

if(!function_exists('verdure_restaurant_activation')) {
	/**
	 * Triggers when plugin is activated. It calls flush_rewrite_rules
	 * and defines verdure_restaurant_on_activate action
	 */
	function verdure_restaurant_activation() {
		do_action('verdure_restaurant_on_activate');

		// VerdureRestaurant\PostTypesRegister::getInstance()->register();
		flush_rewrite_rules();
	}

	register_activation_hook(__FILE__, 'verdure_restaurant_activation');
}

if(!function_exists('verdure_restaurant_text_domain')) {
	/**
	 * Loads plugin text domain so it can be used in translation
	 */
	function verdure_restaurant_text_domain() {
		load_plugin_textdomain('verdure-restaurant', false, VERDURE_RESTAURANT_REL_PATH.'/languages');
	}

	add_action('plugins_loaded', 'verdure_restaurant_text_domain');
}

if(!function_exists('verdure_restaurant_version_class')) {
    /**
     * Adds plugins version class to body
     * @param $classes
     * @return array
     */
    function verdure_restaurant_version_class($classes) {
        $classes[] = 'mkdf-restaurant-'.VERDURE_RESTAURANT_VERSION;

        return $classes;
    }

    add_filter('body_class', 'verdure_restaurant_version_class');
}

if(!function_exists('verdure_restaurant_theme_installed')) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function verdure_restaurant_theme_installed() {
        return defined('MIKADO_ROOT');
    }
}

if(!function_exists('verdure_restaurant_get_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $post_type name of the post type folder
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @return html
	 */
	function verdure_restaurant_get_shortcode_module_template_part($post_type, $shortcode, $template, $slug = '', $params = array()) {

		//HTML Content from template
		$html = '';
		$template_path = VERDURE_RESTAURANT_CPT_PATH. '/'. $post_type. '/shortcodes/' . $shortcode . '/templates';

		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}
		
		$template = '';

		if($temp !== '') {
			$template = $temp.'.php';

			if($slug !== '') {
				$template = "{$temp}-{$slug}.php";
			}
		}
		if($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}

		return $html;
	}
}

if(!function_exists('verdure_restaurant_get_template_part')) {
	/**
	 * Loads template part with parameters. If file with slug parameter added exists it will load that file, else it will load file without slug added.
	 * Child theme friendly function
	 *
	 * @param string $template name of the template to load without extension
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 * @param bool $return whether to return it as a string
	 *
	 * @return mixed
	 */
	function verdure_restaurant_get_template_part($template, $slug = '', $params = array(), $return = false) {
		//HTML Content from template
		$html = '';
		$template_path = VERDURE_RESTAURANT_ABS_PATH;

		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}

		$template = '';

		if($temp !== '') {
			$template = $temp.'.php';

			if($slug !== '') {
				$template = "{$temp}-{$slug}.php";
			}
		}

		if($template) {
			if($return) {
				ob_start();
			}

			include($template);

			if($return) {
				$html = ob_get_clean();
			}

		}

		if($return) {
			return $html;
		}
	}
}