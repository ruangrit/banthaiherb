<?php
namespace VerdureCore\CPT\Shortcodes\Banner;

use VerdureCore\Lib;

class Banner implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_banner';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Banner', 'verdure-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by VERDURE', 'verdure-core' ),
					'icon'                      => 'icon-wpb-banner extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'verdure-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'verdure-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'verdure-core' ),
							'description' => esc_html__( 'Select image from media library', 'verdure-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'verdure-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'verdure-core' ),
							'value'       => array_flip( verdure_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'verdure-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_offset',
							'heading'    => esc_html__( 'Title Top Offset (px)', 'verdure-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
                        array(
							'type'        => 'textfield',
							'param_name'  => 'title_padding',
							'heading'     => esc_html__( 'Title Padding', 'verdure-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left', 'verdure-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'verdure-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'verdure-core' ),
							'value'      => array_flip( verdure_mikado_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
                        array(
							'type'       => 'colorpicker',
							'param_name' => 'overlay_color',
							'heading'    => esc_html__( 'Image Overlay Color', 'verdure-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hover_behavior',
							'heading'     => esc_html__( 'Hover Behavior', 'verdure-core' ),
							'value'       => array(
								esc_html__( 'Visible on Hover', 'verdure-core' )   => 'mkdf-visible-on-hover',
								esc_html__( 'Visible on Default', 'verdure-core' ) => 'mkdf-visible-on-default',
								esc_html__( 'Disabled', 'verdure-core' )           => 'mkdf-disabled'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hover_type',
							'heading'     => esc_html__( 'Hover Type', 'verdure-core' ),
							'value'       => array(
								esc_html__( 'Default', 'verdure-core' )   => '',
								esc_html__( 'Shader', 'verdure-core' )   => 'shader',
								esc_html__( 'Zoom', 'verdure-core' )     => 'zoom',
								esc_html__( 'Zoom with Shader', 'verdure-core' ) => 'zoom-shader'
							),
							'dependency'  => array('element' => 'hover_behavior', 'value' => array('mkdf-visible-on-default'))
						)						
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'         => '',
			'image'                => '',
			'overlay_color'        => '',
			'hover_behavior'       => 'mkdf-visible-on-hover',
			'hover_type'		   => 'shader',
			'title'                => '',
			'title_tag'            => 'p',
			'title_color'          => '',
			'title_top_offset'     => '',
			'title_padding'        => '',
			'link'                 => '',
			'target'               => '_self',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']  = $this->getHolderClasses( $params, $args );
		$params['overlay_styles']  = $this->getOverlayStyles( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']    = $this->getTitleStyles( $params );
		
		$html = verdure_core_get_shortcode_module_template_part( 'templates/banner', 'banner', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['hover_behavior'] ) ? $params['hover_behavior'] : $args['hover_behavior'];
		$holderClasses[] = ! empty( $params['hover_type'] ) ? 'mkdf-banner-hover-'.$params['hover_type'] : 'mkdf-banner-hover-'.$args['hover_behavior'];
		
		return implode( ' ', $holderClasses );
	}
	
	private function getOverlayStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['overlay_color'] ) ) {
			$styles[] = 'background-color: ' . $params['overlay_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_top_offset'] ) ) {
			$styles[] = 'top: ' . verdure_mikado_filter_px( $params['title_top_offset'] ) . 'px';
		}
        
        if ( ! empty( $params['title_padding'] ) ) {
            $styles[] = 'padding: ' . $params['title_padding'];
		}
		
		return implode( ';', $styles );
	}

}