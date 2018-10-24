<?php

if ( ! function_exists( 'verdure_mikado_portfolio_category_additional_fields' ) ) {
	function verdure_mikado_portfolio_category_additional_fields() {
		
		$fields = verdure_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		verdure_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'verdure-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'verdure_mikado_custom_taxonomy_fields', 'verdure_mikado_portfolio_category_additional_fields' );
}