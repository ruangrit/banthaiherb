<?php

if ( ! function_exists( 'verdure_mikado_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function verdure_mikado_reset_options_map() {
		
		verdure_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'verdure' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = verdure_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'verdure' )
			)
		);
		
		verdure_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'verdure' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'verdure' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'verdure_mikado_options_map', 'verdure_mikado_reset_options_map', 100 );
}