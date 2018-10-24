<?php

namespace VerdureRestaurant\CPT\RestaurantMenu\Shortcodes\RestaurantMenuList;

use VerdureRestaurant\Lib;

/**
 * Class RestaurantMenuList
 * @package VerdureRestaurant\CPT\RestaurantMenu\Shortcodes
 */
class RestaurantMenuList implements Lib\ShortcodeInterface {
	/**
     * @var string
     */
	private $base;

	public function __construct() {
		$this->base = 'verdure_restaurant_menu_list';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map
     */
	public function vcMap() {
		if(function_exists('vc_map')) {

			vc_map(array(
				'name'                      => esc_html__('Restaurant Menu List', 'verdure-restaurant'),
				'base'                      => $this->getBase(),
				'category'                  => esc_html__('by VERDURE RESTAURANT', 'verdure-restaurant'),
				'icon'                      => 'icon-wpb-restaurant-menu-list extended-custom-restaurant-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Show Featured Image?', 'verdure-restaurant'),
						'param_name'  => 'show_featured_image',
						'value'       => array(
							''    => '',
							esc_html__('Yes', 'verdure-restaurant') => 'yes',
							esc_html__('No', 'verdure-restaurant')  => 'no'
						),
						'admin_label' => true,
						'description' => esc_html__('Use this option to show featured image of menu items', 'verdure-restaurant'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Skin', 'verdure-restaurant'),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__('Dark', 'verdure-restaurant') 	 => 'dark',
							esc_html__('Light', 'verdure-restaurant')  => 'light'
						)
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Order By', 'verdure-restaurant'),
						'param_name'  => 'orderby',
						'value'       => array(
							esc_html__('Menu Order', 'verdure-restaurant') => 'menu_order',
							esc_html__('Title', 'verdure-restaurant')      => 'title',
							esc_html__('Date', 'verdure-restaurant')       => 'date'
						),
						'save_always' => true,
						'group'       => esc_html__('Query and Layout Options', 'verdure-restaurant')
					),
					array(
						'type'        => 'dropdown',
						'param_name'  => 'order',
						'heading'     => esc_html__('Order', 'verdure-restaurant'),
						'value'       => array(
							'ASC'  => 'ASC',
							'DESC' => 'DESC',
						),
						'save_always' => true,
						'group'       => esc_html__('Query and Layout Options', 'verdure-restaurant')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'restaurant_menu_category',
						'heading'     => esc_html__('Restaurant Menu Category', 'verdure-restaurant'),
						'description' => esc_html__('Enter one cafe menu category slug (leave empty for showing all cafe menu categories)', 'verdure-restaurant'),
						'group'       => esc_html__('Query and Layout Options', 'verdure-restaurant')
					),
					array(
						'type'        => 'textfield',
						'param_name'  => 'number',
						'heading'     => esc_html__('Number of Restaurant Menu Items', 'verdure-restaurant'),
						'value'       => '-1',
						'admin_label' => true,
						'save_always' => true,
						'description' => esc_html__('(enter -1 to show all)', 'verdure-restaurant'),
						'group'       => esc_html__('Query and Layout Options', 'verdure-restaurant')
					)
				)
			));
		}
	}

	/**
     * Renders shortcodes HTML
     *
     * @param $atts array of shortcode params
     * @param $content string shortcode content
     * @return string
     */
	public function render($atts, $content = null) {
		$args = array(
			'show_featured_image' 	=> '',
			'orderby'     			=> 'date',
			'order'        			=> 'ASC',
			'restaurant_menu_category'	=> '',
			'number'      			=> '-1',
			'skin'					=> 'dark'
		);

		$params = shortcode_atts($args, $atts);
		extract($params);
		
		$query_array = $this->getQueryArray($params);
		$query_results = new \WP_Query($query_array);

		$listItemParams = array(
			'show_featured_image' => $params['show_featured_image']
		);

		$holderClasses = $this->getHolderClasses($params);

		$html = '<div '.verdure_mikado_get_class_attribute($holderClasses).'>';

		if($query_results->have_posts()) {
			$html .= '<ul class="mkdf-rml-holder">';

			while($query_results->have_posts()) {
				$query_results->the_post();
				$html .= verdure_restaurant_get_shortcode_module_template_part('restaurant-menu', 'restaurant-menu-list', 'restaurant-menu-list-item', '', $listItemParams);
			}

			$html .= '</ul>';

			wp_reset_postdata();
		} else {
			$html .= '<p>'.esc_html__('Sorry, no menu items matched your criteria.', 'verdure-restaurant').'</p>';
		}

		$html .= '</div>';

		return $html;
	}

	/**
    * Generates menu list query attribute array
    *
    * @param $params
    *
    * @return array
    */
	public function getQueryArray($params){
		
		$query_array = array(
			'post_type' => 'restaurant-menu',
			'orderby' =>$params['orderby'],
			'order' => $params['order'],
			'posts_per_page' => $params['number']
		);
		
		if(!empty($params['restaurant_menu_category'])){
			$query_array['restaurant-menu-category'] = $params['restaurant_menu_category'];
		}
		
		return $query_array;
	}

	private function getHolderClasses($params) {
		$classes = array('mkdf-restaurant-menu-list');

		if($params['show_featured_image'] === 'yes') {
			$classes[] = 'mkdf-rml-with-featured-image';
		}

		if($params['skin'] === 'light') {
			$classes[] = 'mkdf-rml-light';
		}

		return $classes;
	}

}