<?php

if ( ! function_exists( 'verdure_mikado_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function verdure_mikado_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'verdure' ),
				'description'   => esc_html__( 'Default Sidebar area. In order to display this area you need to enable it through global theme options or on page meta box options.', 'verdure' ),				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h5 class="mkdf-widget-title">',
				'after_title'   => '</h5></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'verdure_mikado_register_sidebars', 1 );
}

if ( ! function_exists( 'verdure_mikado_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates VerdureMikadoSidebar object
	 */
	function verdure_mikado_add_support_custom_sidebar() {
		add_theme_support( 'VerdureMikadoSidebar' );
		
		if ( get_theme_support( 'VerdureMikadoSidebar' ) ) {
			new VerdureMikadoSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'verdure_mikado_add_support_custom_sidebar' );
}