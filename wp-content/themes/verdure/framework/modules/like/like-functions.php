<?php

if ( ! function_exists( 'verdure_mikado_like' ) ) {
	/**
	 * Returns VerdureMikadoLike instance
	 *
	 * @return VerdureMikadoLike
	 */
	function verdure_mikado_like() {
		return VerdureMikadoLike::get_instance();
	}
}

function verdure_mikado_get_like() {
	
	echo wp_kses( verdure_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}