<?php
namespace VerdureRestaurant\Shortcodes\WorkingHours;

use VerdureRestaurant\Lib\ShortcodeInterface;

class WorkingHours implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'mkdf_working_hours';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Working Hours', 'verdure-restaurant'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by VERDURE RESTAURANT', 'verdure-restaurant'),
			'icon'                      => 'icon-wpb-working-hours extended-custom-restaurant-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title', 'verdure-restaurant'),
					'param_name'  => 'title',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title Accent Word', 'verdure-restaurant'),
					'param_name'  => 'title_accent_word',
					'admin_label' => true,
					'value'       => '',
					'save_always' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Enable Frame', 'verdure-restaurant'),
					'param_name'  => 'enable_frame',
					'description' => esc_html__('Enabling this option will display dark frame around working hours', 'verdure-restaurant'),
					'admin_label' => true,
					'value'       => array(
						''    => '',
						'Yes' => 'yes',
						'No'  => 'no'
					),
					'save_always' => true
				),
				array(
					'type'        => 'attach_image',
					'heading'     => esc_html__('Background Image', 'verdure-restaurant'),
					'param_name'  => 'bg_image',
					'admin_label' => true,
					'value'       => array(
						''    => '',
						'Yes' => 'yes',
						'No'  => 'no'
					),
					'save_always' => true,
					'dependency'  => array('element' => 'enable_frame', 'value' => 'yes')
				)
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'title'             => '',
			'title_accent_word' => '',
			'enable_frame'      => '',
			'bg_image'          => ''
		);

		$params = shortcode_atts($default_atts, $atts);

		$params['working_hours']  = $this->getWorkingHours();
		$params['holder_classes'] = $this->getHolderClasses($params);
		$params['holder_styles']  = $this->getHolderStyles($params);

		return verdure_restaurant_get_template_part('modules/shortcodes/working-hours/templates/working-hours-template', '', $params, true);
	}

	private function getWorkingHours() {
		$workingHours = array();

		if(verdure_restaurant_theme_installed()) {
			//monday
			if(verdure_mikado_options()->getOptionValue('wh_monday_from') !== '') {
				$workingHours['monday']['label'] = __('Monday', 'verdure-restaurant');
				$workingHours['monday']['from']  = verdure_mikado_options()->getOptionValue('wh_monday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_monday_to') !== '') {
				$workingHours['monday']['to'] = verdure_mikado_options()->getOptionValue('wh_monday_to');
			}

			//tuesday
			if(verdure_mikado_options()->getOptionValue('wh_tuesday_from') !== '') {
				$workingHours['tuesday']['label'] = __('Tuesday', 'verdure-restaurant');
				$workingHours['tuesday']['from']  = verdure_mikado_options()->getOptionValue('wh_tuesday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_tuesday_to') !== '') {
				$workingHours['tuesday']['to'] = verdure_mikado_options()->getOptionValue('wh_tuesday_to');
			}

			//wednesday
			if(verdure_mikado_options()->getOptionValue('wh_wednesday_from') !== '') {
				$workingHours['wednesday']['label'] = __('Wednesday', 'verdure-restaurant');
				$workingHours['wednesday']['from']  = verdure_mikado_options()->getOptionValue('wh_wednesday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_wednesday_to') !== '') {
				$workingHours['wednesday']['to'] = verdure_mikado_options()->getOptionValue('wh_wednesday_to');
			}

			//thursday
			if(verdure_mikado_options()->getOptionValue('wh_thursday_from') !== '') {
				$workingHours['thursday']['label'] = __('Thursday', 'verdure-restaurant');
				$workingHours['thursday']['from']  = verdure_mikado_options()->getOptionValue('wh_thursday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_thursday_to') !== '') {
				$workingHours['thursday']['to'] = verdure_mikado_options()->getOptionValue('wh_thursday_to');
			}

			//friday
			if(verdure_mikado_options()->getOptionValue('wh_friday_from') !== '') {
				$workingHours['friday']['label'] = __('Friday', 'verdure-restaurant');
				$workingHours['friday']['from']  = verdure_mikado_options()->getOptionValue('wh_friday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_friday_to') !== '') {
				$workingHours['friday']['to'] = verdure_mikado_options()->getOptionValue('wh_friday_to');
			}

			//saturday
			if(verdure_mikado_options()->getOptionValue('wh_saturday_from') !== '') {
				$workingHours['saturday']['label'] = __('Saturday', 'verdure-restaurant');
				$workingHours['saturday']['from']  = verdure_mikado_options()->getOptionValue('wh_saturday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_saturday_to') !== '') {
				$workingHours['saturday']['to'] = verdure_mikado_options()->getOptionValue('wh_saturday_to');
			}

			//sunday
			if(verdure_mikado_options()->getOptionValue('wh_sunday_from') !== '') {
				$workingHours['sunday']['label'] = __('Sunday', 'verdure-restaurant');
				$workingHours['sunday']['from']  = verdure_mikado_options()->getOptionValue('wh_sunday_from');
			}

			if(verdure_mikado_options()->getOptionValue('wh_sunday_to') !== '') {
				$workingHours['sunday']['to'] = verdure_mikado_options()->getOptionValue('wh_sunday_to');
			}
		}

		return $workingHours;
	}

	private function getHolderClasses($params) {
		$classes = array('mkdf-working-hours-holder');

		if(isset($params['enable_frame']) && $params['enable_frame'] === 'yes') {
			$classes[] = 'mkdf-wh-with-frame';
		}

		if(isset($params['bg_image']) && $params['bg_image'] !== '') {
			$classes[] = 'mkdf-wh-with-bg-image';
		}

		return $classes;
	}

	private function getHolderStyles($params) {
		$styles = array();

		if($params['bg_image'] !== '') {
			$bg_url = wp_get_attachment_url($params['bg_image']);

			if(!empty($bg_url)) {
				$styles[] = 'background-image: url('.$bg_url.')';
			}
		}

		return $styles;
	}

}
