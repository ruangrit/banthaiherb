<?php

if ( ! function_exists( 'verdure_mikado_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function verdure_mikado_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'verdure' );
		
		return $templates;
	}
	
	add_filter( 'verdure_mikado_register_blog_templates', 'verdure_mikado_register_blog_standard_template_file' );
}

if ( ! function_exists( 'verdure_mikado_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function verdure_mikado_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'verdure' );
		
		return $options;
	}
	
	add_filter( 'verdure_mikado_blog_list_type_global_option', 'verdure_mikado_set_blog_standard_type_global_option' );
}