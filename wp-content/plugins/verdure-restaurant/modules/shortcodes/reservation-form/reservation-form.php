<?php
namespace VerdureRestaurant\Shortcodes\ReservationForm;

use VerdureRestaurant\Lib\ShortcodeInterface;

class ReservationForm implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_reservation_form';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Reservation Form', 'verdure-restaurant'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by VERDURE RESTAURANT', 'verdure-restaurant'),
			'icon'                      => 'icon-wpb-reservation-form extended-custom-restaurant-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('OpenTable ID', 'verdure-restaurant'),
					'param_name'  => 'open_table_id',
					'admin_label' => true
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'open_table_id' => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		return verdure_restaurant_get_template_part('modules/shortcodes/reservation-form/templates/reservation-form', '', $params, true);
	}

}