<?php

if ( ! function_exists( 'verdure_mikado_map_woocommerce_meta' ) ) {
	function verdure_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = verdure_mikado_add_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'verdure' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'verdure' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'verdure' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'verdure' ),
					'small'              => esc_html__( 'Small', 'verdure' ),
					'large-width'        => esc_html__( 'Large Width', 'verdure' ),
					'large-height'       => esc_html__( 'Large Height', 'verdure' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'verdure' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'verdure' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'verdure' ),
				'options'       => verdure_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		verdure_mikado_add_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'verdure' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'verdure' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'verdure_mikado_meta_boxes_map', 'verdure_mikado_map_woocommerce_meta', 99 );
}