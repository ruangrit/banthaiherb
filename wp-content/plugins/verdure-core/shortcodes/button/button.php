<?php
namespace VerdureCore\CPT\Shortcodes\Button;

use VerdureCore\Lib;

class Button implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_button';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Button', 'verdure-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by VERDURE', 'verdure-core' ),
					'icon'                      => 'icon-wpb-button extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array_merge(
						array(
							array(
								'type'        => 'textfield',
								'param_name'  => 'custom_class',
								'heading'     => esc_html__( 'Custom CSS Class', 'verdure-core' ),
								'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'verdure-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'type',
								'heading'     => esc_html__( 'Type', 'verdure-core' ),
								'value'       => array(
									esc_html__( 'Solid', 'verdure-core' )   => 'solid',
									esc_html__( 'Outline', 'verdure-core' ) => 'outline',
									esc_html__( 'Simple', 'verdure-core' )  => 'simple'
								),
								'admin_label' => true
							),
							array(
								'type'       => 'dropdown',
								'param_name' => 'size',
								'heading'    => esc_html__( 'Size', 'verdure-core' ),
								'value'      => array(
									esc_html__( 'Default', 'verdure-core' ) => '',
									esc_html__( 'Small', 'verdure-core' )   => 'small',
									esc_html__( 'Medium', 'verdure-core' )  => 'medium',
									esc_html__( 'Large', 'verdure-core' )   => 'large',
									esc_html__( 'Huge', 'verdure-core' )    => 'huge'
								),
								'dependency' => array( 'element' => 'type', 'value' => array( 'solid', 'outline' ) )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'text',
								'heading'     => esc_html__( 'Text', 'verdure-core' ),
								'value'       => esc_html__( 'Button Text', 'verdure-core' ),
								'save_always' => true,
								'admin_label' => true
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'link',
								'heading'    => esc_html__( 'Link', 'verdure-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'target',
								'heading'     => esc_html__( 'Link Target', 'verdure-core' ),
								'value'       => array_flip( verdure_mikado_get_link_target_array() ),
								'save_always' => true
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'enable_icon',
								'heading'     => esc_html__( 'Enable Icon', 'verdure-core' ),
								'value'       => array(
									esc_html__('None','verdure-core') => 'none',
									esc_html__('Icon from Icon Pack','verdure-core') => 'icon_pack'
								)
							)
						),
						verdure_mikado_icon_collections()->getVCParamsArray( array('element' => 'enable_icon', 'value' => 'icon_pack'), '', true ),
						array(
							array(
								'type'        => 'dropdown',
								'param_name'  => 'animate_icon',
								'heading'     => esc_html__( 'Animate Icon', 'verdure-core' ),
								'value'       => array(
									esc_html__('No','verdure-core') => 'no',
									esc_html__('Yes','verdure-core') => 'yes'
								),
								'dependency'  => array('element' => 'enable_icon', 'value' => 'icon_pack')
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'enable_underline',
								'heading'     => esc_html__( 'Enable Underline', 'verdure-core' ),
								'value'       => array(
									esc_html__('Yes','verdure-core') => 'yes',
									esc_html__('No','verdure-core') => 'no',
								),
								'dependency'  => array('element' => 'type', 'value' => 'simple')
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'enable_overlay_hover',
								'heading'     => esc_html__( 'Enable Overlay Hover', 'verdure-core' ),
								'value'       => array(
									esc_html__('Yes','verdure-core') => 'yes',
									esc_html__('No','verdure-core') => 'no',
								),
								'dependency'  => array('element' => 'type', 'value' => array('solid', 'outline')),
								'description' => esc_html('If this option chosen, the hover colors will not be applied', 'verdure-core')
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'color',
								'heading'    => esc_html__( 'Color', 'verdure-core' ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'hover_color',
								'heading'    => esc_html__( 'Hover Color', 'verdure-core' ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'background_color',
								'heading'    => esc_html__( 'Background Color', 'verdure-core' ),
								'dependency' => array( 'element' => 'type', 'value' => array( 'solid' ) ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'hover_background_color',
								'heading'    => esc_html__( 'Hover Background Color', 'verdure-core' ),
								'dependency' => array( 'element' => 'type', 'value' => array( 'solid', 'outline' ) ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'border_color',
								'heading'    => esc_html__( 'Border Color', 'verdure-core' ),
								'dependency' => array( 'element' => 'type', 'value' => array( 'solid', 'outline' ) ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'colorpicker',
								'param_name' => 'hover_border_color',
								'heading'    => esc_html__( 'Hover Border Color', 'verdure-core' ),
								'dependency' => array( 'element' => 'type', 'value' => array( 'solid', 'outline' ) ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'       => 'textfield',
								'param_name' => 'font_size',
								'heading'    => esc_html__( 'Font Size (px)', 'verdure-core' ),
								'group'      => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'font_weight',
								'heading'     => esc_html__( 'Font Weight', 'verdure-core' ),
								'value'       => array_flip( verdure_mikado_get_font_weight_array( true ) ),
								'save_always' => true,
								'group'       => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'        => 'dropdown',
								'param_name'  => 'text_transform',
								'heading'     => esc_html__( 'Text Transform', 'verdure-core' ),
								'value'       => array_flip( verdure_mikado_get_text_transform_array( true ) ),
								'save_always' => true
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'margin',
								'heading'     => esc_html__( 'Margin', 'verdure-core' ),
								'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure-core' ),
								'group'       => esc_html__( 'Design Options', 'verdure-core' )
							),
							array(
								'type'        => 'textfield',
								'param_name'  => 'padding',
								'heading'     => esc_html__( 'Button Padding', 'verdure-core' ),
								'description' => esc_html__( 'Insert padding in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure-core' ),
								'dependency'  => array( 'element' => 'type', 'value' => array( 'solid', 'outline' ) ),
								'group'       => esc_html__( 'Design Options', 'verdure-core' )
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'size'                   => '',
			'type'                   => 'solid',
			'text'                   => '',
			'link'                   => '',
			'target'                 => '_self',
			'enable_icon'            => 'none',
			'animate_icon'			 => 'no',
			'enable_underline'		 => 'yes',
			'enable_overlay_hover'	 => 'yes',
			'color'                  => '',
			'hover_color'            => '',
			'background_color'       => '',
			'hover_background_color' => '',
			'border_color'           => '',
			'hover_border_color'     => '',
			'font_size'              => '',
			'font_weight'            => '',
			'text_transform'         => '',
			'margin'                 => '',
			'padding'                => '',
			'custom_class'           => '',
			'html_type'              => 'anchor',
			'input_name'             => '',
			'custom_attrs'           => array()
		);
		$default_atts = array_merge( $default_atts, verdure_mikado_icon_collections()->getShortcodeParams() );
		$params       = shortcode_atts( $default_atts, $atts );
		
		if ( $params['html_type'] !== 'input' ) {
			$iconPackName   = verdure_mikado_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			$params['icon'] = $iconPackName ? $params[ $iconPackName ] : '';
		}
		
		$params['size'] = ! empty( $params['size'] ) ? $params['size'] : 'medium';
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : 'solid';
		
		$params['link']   = ! empty( $params['link'] ) ? $params['link'] : '#';
		$params['target'] = ! empty( $params['target'] ) ? $params['target'] : $default_atts['target'];
		
		$params['button_classes']      = $this->getButtonClasses( $params );
		$params['button_custom_attrs'] = ! empty( $params['custom_attrs'] ) ? $params['custom_attrs'] : array();
		$params['button_styles']       = $this->getButtonStyles( $params );
		$params['button_data']         = $this->getButtonDataAttr( $params );
		
		return verdure_core_get_shortcode_module_template_part( 'templates/' . $params['html_type'], 'button', '', $params );
	}
	
	private function getButtonStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}
		
		if ( ! empty( $params['background_color'] ) && $params['type'] !== 'outline' ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		if ( ! empty( $params['border_color'] ) ) {
			$styles[] = 'border-color: ' . $params['border_color'];
		}
		
		if ( ! empty( $params['font_size'] ) ) {
			$styles[] = 'font-size: ' . verdure_mikado_filter_px( $params['font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['font_weight'] ) && $params['font_weight'] !== '' ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}
		
		if ( ! empty( $params['text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['text_transform'];
		}
		
		if ( $params['margin'] !== '' ) {
			$styles[] = 'margin: ' . $params['margin'];
		}
		
		if ( $params['padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['padding'];
		}
		
		return $styles;
	}
	
	private function getButtonDataAttr( $params ) {
		$data = array();

		if ( $params['type'] == 'simple' || $params['enable_overlay_hover'] !== 'yes') {
			if (!empty($params['hover_color'])) {
				$data['data-hover-color'] = $params['hover_color'];
			}

			if (!empty($params['hover_background_color'])) {
				$data['data-hover-bg-color'] = $params['hover_background_color'];
			}

			if (!empty($params['hover_border_color'])) {
				$data['data-hover-border-color'] = $params['hover_border_color'];
			}
		}
		
		return $data;
	}
	
	private function getButtonClasses( $params ) {
		$buttonClasses = array(
			'mkdf-btn',
			'mkdf-btn-' . $params['size'],
			'mkdf-btn-' . $params['type']
		);
		
		if ( ! empty( $params['hover_background_color'] ) ) {
			$buttonClasses[] = 'mkdf-btn-custom-hover-bg';
		}
		
		if ( ! empty( $params['hover_border_color'] ) ) {
			$buttonClasses[] = 'mkdf-btn-custom-border-hover';
		}
		
		if ( ! empty( $params['hover_color'] ) ) {
			$buttonClasses[] = 'mkdf-btn-custom-hover-color';
		}
		
		if ( $params['enable_icon'] !== 'none' ) {
			$buttonClasses[] = 'mkdf-btn-icon';
		}

		if ( $params['animate_icon'] == 'yes' ) {
			$buttonClasses[] = 'mkdf-btn-icon-animate';
		}

		if ( $params['enable_underline'] == 'yes') {
			$buttonClasses[] = 'mkdf-btn-underline';
		}

		if ( $params['enable_overlay_hover'] == 'yes' && $params['html_type'] !== 'input') {
			$buttonClasses[] = 'mkdf-btn-overlay';
		}
		
		if ( ! empty( $params['custom_class'] ) ) {
			$buttonClasses[] = esc_attr( $params['custom_class'] );
		}
		
		return $buttonClasses;
	}
}