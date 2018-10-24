<?php

class VerdureMikadoSearchOpener extends VerdureMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_search_opener',
			esc_html__( 'Mikado Search Opener', 'verdure' ),
			array( 'description' => esc_html__( 'Display a "search" icon that opens the search form', 'verdure' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {

		$search_icon_params = array(
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_color',
				'title'       => esc_html__( 'Icon Color', 'verdure' ),
				'description' => esc_html__( 'Define color for search icon', 'verdure' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'search_icon_hover_color',
				'title'       => esc_html__( 'Icon Hover Color', 'verdure' ),
				'description' => esc_html__( 'Define hover color for search icon', 'verdure' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_margin',
				'title'       => esc_html__( 'Icon Margin', 'verdure' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'verdure' )
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'show_label',
				'title'       => esc_html__( 'Enable Search Icon Text', 'verdure' ),
				'description' => esc_html__( 'Enable this option to show search text next to search icon in header', 'verdure' ),
				'options'     => verdure_mikado_get_yes_no_select_array()
			)
		);

		$search_icon_pack_params = array(
			array(
				'type'        => 'textfield',
				'name'        => 'search_icon_size',
				'title'       => esc_html__( 'Icon Size (px)', 'verdure' ),
				'description' => esc_html__( 'Define size for search icon', 'verdure' )
			)
		);

		if ( verdure_mikado_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
			$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
		} else {
			$this->params = $search_icon_params;
		}

	}
	
	public function widget( $args, $instance ) {
		global $verdure_mikado_IconCollections;

		$search_icon_source 		= verdure_mikado_options()->getOptionValue( 'search_icon_source' );
		$search_icon_pack 			= verdure_mikado_options()->getOptionValue( 'search_icon_pack' );
		$search_icon_svg_path 		= verdure_mikado_options()->getOptionValue( 'search_icon_svg_path' );
		$enable_search_icon_text	= verdure_mikado_options()->getOptionValue( 'enable_search_icon_text' );

		$search_icon_class_array = array(
			'mkdf-search-opener',
			'mkdf-icon-has-hover'
		);
	
		$search_icon_class_array[]  = $search_icon_source == 'icon_pack' ? 'mkdf-search-opener-icon-pack' : 'mkdf-search-opener-svg-path';

		$styles            = array();
		$show_search_text  = $instance['show_label'] == 'yes' || $enable_search_icon_text == 'yes' ? true : false;
		
		if ( ! empty( $instance['search_icon_size'] ) ) {
			$styles[] = 'font-size: ' . intval( $instance['search_icon_size'] ) . 'px';
		}
		
		if ( ! empty( $instance['search_icon_color'] ) ) {
			$styles[] = 'color: ' . $instance['search_icon_color'] . ';';
		}
		
		if ( ! empty( $instance['search_icon_margin'] ) ) {
			$styles[] = 'margin: ' . $instance['search_icon_margin'] . ';';
		}
		?>
		
		<a <?php verdure_mikado_inline_attr( $instance['search_icon_hover_color'], 'data-hover-color' ); ?> <?php verdure_mikado_inline_style( $styles ); ?> <?php verdure_mikado_class_attribute( $search_icon_class_array ); ?> href="javascript:void(0)">
            <span class="mkdf-search-opener-wrapper">
                <?php if ( ( $search_icon_source == 'icon_pack' ) && isset( $search_icon_pack ) ) {
	                $verdure_mikado_IconCollections->getSearchIcon( $search_icon_pack, false );
                } else if ( ( $search_icon_source == 'svg_path' ) && isset( $search_icon_svg_path ) ) {
                	print $search_icon_svg_path; 
                }?>
	            <?php if ( $show_search_text ) { ?>
		            <span class="mkdf-search-icon-text"><?php esc_html_e( 'Search', 'verdure' ); ?></span>
	            <?php } ?>
            </span>
		</a>
	<?php }
}