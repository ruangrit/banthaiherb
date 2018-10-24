<?php

if ( ! function_exists( 'verdure_mikado_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function verdure_mikado_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'mkdf-container';
		$params_list['inner']  = 'mkdf-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'verdure_mikado_blog_holder_params', 'verdure_mikado_get_blog_holder_params' );
}

if ( ! function_exists( 'verdure_mikado_blog_part_params' ) ) {
	function verdure_mikado_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h3';
		$part_params['link_tag']  = 'h6';
		$part_params['quote_tag'] = 'h6';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'verdure_mikado_blog_part_params', 'verdure_mikado_blog_part_params' );
}