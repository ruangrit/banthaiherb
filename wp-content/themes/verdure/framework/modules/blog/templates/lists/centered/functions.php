<?php

if ( ! function_exists( 'verdure_mikado_register_blog_centered_template_file' ) ) {
	/**
	 * Function that register blog centered template
	 */
	function verdure_mikado_register_blog_centered_template_file( $templates ) {
		$templates['blog-centered'] = esc_html__( 'Blog: Centered', 'verdure' );
		
		return $templates;
	}
	
	add_filter( 'verdure_mikado_register_blog_templates', 'verdure_mikado_register_blog_centered_template_file' );
}

if ( ! function_exists( 'verdure_mikado_set_blog_centered_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function verdure_mikado_set_blog_centered_type_global_option( $options ) {
		$options['centered'] = esc_html__( 'Blog: Centered', 'verdure' );
		
		return $options;
	}
	
	add_filter( 'verdure_mikado_blog_list_type_global_option', 'verdure_mikado_set_blog_centered_type_global_option' );
}