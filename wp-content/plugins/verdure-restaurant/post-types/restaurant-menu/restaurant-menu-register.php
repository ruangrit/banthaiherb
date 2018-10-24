<?php
namespace VerdureRestaurant\CPT\RestaurantMenu;

use VerdureRestaurant\Lib;

/**
 * Class RestaurantMenuRegister
 * @package VerdureRestaurant\CPT\RestaurantMenu
 */

class RestaurantMenuRegister implements Lib\PostTypeInterface {
	/**
	 * @var string
	 */
	private $base;
	/**
	 * @var string
	 */
	private $taxBase;

	public function __construct() {
		$this->base    = 'restaurant-menu';
		$this->taxBase = 'restaurant-menu-category';
	}

	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}

	/**
	 * Regsiters custom post type with WordPress
	 */
	private function registerPostType() {

		$menuPosition = 5;
		$menuIcon     = 'dashicons-list-view';

		register_post_type($this->base,
			array(
				'labels'        => array(
					'name'          => __('Restaurant Menu', 'verdure-restaurant'),
					'menu_name'     => __('Restaurant Menu', 'verdure-restaurant'),
					'all_items'     => __('Restaurant Menu Items', 'verdure-restaurant'),
					'add_new'       => __('Add New Restaurant Menu Item', 'verdure-restaurant'),
					'singular_name' => __('Restaurant Menu Item', 'verdure-restaurant'),
					'add_item'      => __('New Restaurant Menu Item', 'verdure-restaurant'),
					'add_new_item'  => __('Add New Restaurant Menu Item', 'verdure-restaurant'),
					'edit_item'     => __('Edit Restaurant Menu Item', 'verdure-restaurant')
				),
				'public'        => false,
				'show_in_menu'  => true,
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array('title', 'thumbnail'),
				'menu_icon'     => $menuIcon
			)
		);
	}

	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => __('Restaurant Menu Category', 'verdure-restaurant'),
			'singular_name'     => __('Restaurant Menu Category', 'verdure-restaurant'),
			'search_items'      => __('Search Restaurant Menu Categories', 'verdure-restaurant'),
			'all_items'         => __('All Restaurant Menu Categories', 'verdure-restaurant'),
			'parent_item'       => __('Parent Restaurant Menu Category', 'verdure-restaurant'),
			'parent_item_colon' => __('Parent Restaurant Menu Category:', 'verdure-restaurant'),
			'edit_item'         => __('Edit Restaurant Menu Category', 'verdure-restaurant'),
			'update_item'       => __('Update Restaurant Menu Category', 'verdure-restaurant'),
			'add_new_item'      => __('Add New Restaurant Menu Category', 'verdure-restaurant'),
			'new_item_name'     => __('New Restaurant Menu Category Name', 'verdure-restaurant'),
			'menu_name'         => __('Restaurant Menu Categories', 'verdure-restaurant'),
		);

		register_taxonomy($this->taxBase, array($this->base), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
		));
	}

}