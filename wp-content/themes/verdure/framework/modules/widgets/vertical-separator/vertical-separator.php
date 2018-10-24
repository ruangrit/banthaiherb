<?php

class VerdureMikadoVerticalSeparatorWidget extends VerdureMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_vertical_separator_widget',
			esc_html__( 'Mikado Vertical Separator Widget', 'verdure' ),
			array( 'description' => esc_html__( 'Add a vertical separator element to your widget areas', 'verdure' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Holder Height', 'verdure' ),
				'options' => array(
					'full-height'   => esc_html__( 'Full Height', 'verdure' ),
					'custom-height' => esc_html__( 'Custom Height', 'verdure' ),
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'align',
				'title'   => esc_html__( 'Vertical Align', 'verdure' ),
				'options' => array(
					'middle' => esc_html__( 'Middle', 'verdure' ),
					'top'   => esc_html__( 'Top', 'verdure' ),
					'bottom'  => esc_html__( 'Bottom', 'verdure' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'height',
				'title' => esc_html__( 'Height (px or %)', 'verdure' ),
				'description' => esc_html__('The percentage applies only if the \'Full Holder Height\' is selected','verdure')
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'verdure' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'verdure' ),
					'dashed' => esc_html__( 'Dashed', 'verdure' ),
					'dotted' => esc_html__( 'Dotted', 'verdure' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'verdure' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'verdure' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'left_margin',
				'title' => esc_html__( 'Left Margin (px)', 'verdure' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'right_margin',
				'title' => esc_html__( 'Right Margin (px)', 'verdure' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}

		$holder_class = '';

		if ($instance['type'] == 'full-height') {
			$holder_class = 'mkdf-vertical-separator-full-height';
		}

		$style = array();

		if ($instance['align'] !== '') {
			$style[] = 'vertical-align:'.$instance['align'];
		}

		if ($instance['height'] !== '') {
			if (verdure_mikado_string_ends_with($instance['height'],'%')){
				$height = $instance['height'];
			} else {
				$height = verdure_mikado_filter_px($instance['height']).'px';
			}
			$style[] = 'height:'.$height;
		}

		if ($instance['border_style'] !== '') {
			$style[] = 'border-left-style:'.$instance['border_style'];
		}

		if ($instance['color'] !== '') {
			$style[] = 'border-color:'.$instance['color'];
		}

		if ($instance['thickness'] !== '') {
			$style[] = 'border-width:'.verdure_mikado_filter_px($instance['thickness']).'px';
		}

		if ($instance['left_margin'] !== '') {
			$style[] = 'margin-left:'.verdure_mikado_filter_px($instance['left_margin']).'px';
		}

		if ($instance['right_margin'] !== '') {
			$style[] = 'margin-right:'.verdure_mikado_filter_px($instance['right_margin']).'px';
		}

		$html = '';
		
		$html .= '<div class="widget mkdf-vertical-separator-widget '.esc_attr($holder_class).'">';
		$html .= '<span class="mkdf-vsw-height-holder"></span>';
		$html .= '<span class="mkdf-vsw" '.verdure_mikado_get_inline_style($style).'></span>';
		$html .= '</div>';

		echo wp_kses_post($html);
	}
}