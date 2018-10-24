<?php

class VerdureMikadoButtonWidget extends VerdureMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__( 'Mikado Button Widget', 'verdure' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'verdure' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'verdure' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'verdure' ),
					'outline' => esc_html__( 'Outline', 'verdure' ),
					'simple'  => esc_html__( 'Simple', 'verdure' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'verdure' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'verdure' ),
					'medium' => esc_html__( 'Medium', 'verdure' ),
					'large'  => esc_html__( 'Large', 'verdure' ),
					'huge'   => esc_html__( 'Huge', 'verdure' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'verdure' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'verdure' ),
				'default' => esc_html__( 'Button Text', 'verdure' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'verdure' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'verdure' ),
				'options' => verdure_mikado_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'verdure' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'verdure' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'verdure' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'verdure' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'verdure' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'verdure' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'verdure' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}