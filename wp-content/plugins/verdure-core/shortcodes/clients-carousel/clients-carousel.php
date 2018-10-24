<?php
namespace VerdureCore\CPT\Shortcodes\ClientsCarousel;

use VerdureCore\Lib;

class ClientsCarousel implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_clients_carousel';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'            => esc_html__( 'Mikado Clients Carousel', 'verdure-core' ),
					'base'            => $this->getBase(),
					'category'        => esc_html__( 'by VERDURE', 'verdure-core' ),
					'icon'            => 'icon-wpb-clients-carousel extended-custom-icon',
					'as_parent'       => array( 'only' => 'mkdf_clients_carousel_item' ),
					'content_element' => true,
					'js_view'         => 'VcColumnView',
					'params'          => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'verdure-core' ),
							'value'       => array(
								esc_html__( 'One', 'verdure-core' )   => '1',
								esc_html__( 'Two', 'verdure-core' )   => '2',
								esc_html__( 'Three', 'verdure-core' ) => '3',
								esc_html__( 'Four', 'verdure-core' )  => '4',
								esc_html__( 'Five', 'verdure-core' )  => '5',
								esc_html__( 'Six', 'verdure-core' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_rows',
							'heading'     => esc_html__( 'Number Of Rows', 'verdure-core' ),
							'value'       => array(
								esc_html__( 'One', 'verdure-core' )   => '1',
								esc_html__( 'Two', 'verdure-core' )   => '2',
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'verdure-core' ),
							'value'       => array_flip( verdure_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'verdure-core' ),
							'value'       => array_flip( verdure_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'verdure-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'verdure-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'verdure-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'verdure-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'verdure-core' ),
							'value'       => array_flip( verdure_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'verdure-core' ),
							'value'       => array_flip( verdure_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'items_hover_animation',
							'heading'     => esc_html__( 'Items Hover Animation', 'verdure-core' ),
							'value'       => array(
								esc_html__( 'Switch Images', 'verdure-core' ) => 'switch-images',
								esc_html__( 'Roll Over', 'verdure-core' )     => 'roll-over'
							),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'number_of_visible_items' => '4',
			'number_of_rows'          => '1',
			'slider_loop'             => 'yes',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'slider_navigation'       => 'no',
			'slider_pagination'       => 'no',
			'items_hover_animation'   => 'switch-images'
		);
		
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['carousel_data']  = $this->getSliderData( $params );
		$params['content']        = $content;
		
		$html = verdure_core_get_shortcode_module_template_part( 'templates/clients-carousel', 'clients-carousel', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['items_hover_animation'] ) ? 'mkdf-cc-hover-' . $params['items_hover_animation'] : 'mkdf-cc-hover-switch-images';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '4';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		$slider_data['data-number-of-rows']         = ! empty( $params['number_of_rows'] ) ? $params['number_of_rows'] : '';
		
		return $slider_data;
	}
}