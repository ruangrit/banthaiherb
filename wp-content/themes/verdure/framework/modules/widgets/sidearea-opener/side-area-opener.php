<?php

class VerdureMikadoSideAreaOpener extends VerdureMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_side_area_opener',
			esc_html__( 'Mikado Side Area Opener', 'verdure' ),
			array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'verdure' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_color',
				'title'       => esc_html__( 'Side Area Opener Color', 'verdure' ),
				'description' => esc_html__( 'Define color for side area opener', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'icon_hover_color',
				'title'       => esc_html__( 'Side Area Opener Hover Color', 'verdure' ),
				'description' => esc_html__( 'Define hover color for side area opener', 'verdure' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'widget_margin',
				'title'       => esc_html__( 'Side Area Opener Margin', 'verdure' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'widget_title',
				'title' => esc_html__( 'Side Area Opener Title', 'verdure' )
			)
		);
	}
	
	public function widget( $args, $instance ) {

		$side_area_icon_source 	 	= verdure_mikado_options()->getOptionValue( 'side_area_icon_source' );
		$side_area_icon_pack 		= verdure_mikado_options()->getOptionValue( 'side_area_icon_pack' );
		$side_area_icon_svg_path 	= verdure_mikado_options()->getOptionValue( 'side_area_icon_svg_path' );

		$side_area_icon_class_array = array(
			'mkdf-side-menu-button-opener',
			'mkdf-icon-has-hover'
		);
	
		$side_area_icon_class_array[]  = $side_area_icon_source == 'icon_pack' ? 'mkdf-side-menu-button-opener-icon-pack' : 'mkdf-side-menu-button-opener-svg-path';

		$holder_styles = array();
		
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'] . ';';
		}
		if ( ! empty( $instance['widget_margin'] ) ) {
			$holder_styles[] = 'margin: ' . $instance['widget_margin'];
		}

		?>
		
		<a <?php verdure_mikado_class_attribute( $side_area_icon_class_array ); ?> <?php echo verdure_mikado_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php verdure_mikado_inline_style( $holder_styles ); ?>>
			<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
				<h5 class="mkdf-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
			<?php } ?>
			<span class="mkdf-side-menu-icon">
				<?php if ( ( $side_area_icon_source == 'icon_pack' ) && isset( $side_area_icon_pack ) ) {
	        		echo verdure_mikado_icon_collections()->getMenuIcon( $side_area_icon_pack ); 
	        	} else if ( isset( $side_area_icon_svg_path ) ) {
	            	print $side_area_icon_svg_path; 
	            }?>
            </span>
		</a>
	<?php }
}