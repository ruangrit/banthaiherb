<?php

if ( ! function_exists( 'verdure_mikado_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function verdure_mikado_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'verdure' );

        return $search_type_options;
    }

    add_filter( 'verdure_mikado_search_type_global_option', 'verdure_mikado_set_search_slide_from_hb_global_option' );
}