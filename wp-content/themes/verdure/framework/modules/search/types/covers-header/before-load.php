<?php

if ( ! function_exists( 'verdure_mikado_set_search_covers_header_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function verdure_mikado_set_search_covers_header_global_option( $search_type_options ) {
        $search_type_options['covers-header'] = esc_html__( 'Covers Header', 'verdure' );

        return $search_type_options;
    }

    add_filter( 'verdure_mikado_search_type_global_option', 'verdure_mikado_set_search_covers_header_global_option' );
}