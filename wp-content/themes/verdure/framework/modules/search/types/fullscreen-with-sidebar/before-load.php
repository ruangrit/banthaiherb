<?php

if ( ! function_exists( 'verdure_mikado_set_search_fullscreen_with_sidebar_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function verdure_mikado_set_search_fullscreen_with_sidebar_global_option( $search_type_options ) {
        $search_type_options['fullscreen-with-sidebar'] = esc_html__( 'Fullscreen With Sidebar', 'verdure' );

        return $search_type_options;
    }

    add_filter( 'verdure_mikado_search_type_global_option', 'verdure_mikado_set_search_fullscreen_with_sidebar_global_option' );
}


if ( ! function_exists( 'verdure_mikado_register_search_sidebar' ) ) {
    function verdure_mikado_register_search_sidebar(){

        register_sidebar(
            array(
                'id' => 'fullscreen_search_column_1',
                'name' => esc_html__('FullScreen Search Column 1', 'verdure'),
                'description' => esc_html__('Widgets added here will appear in the first column of fullscreen search', 'verdure'),
                'before_widget' => '<div id="%1$s" class="widget mkdf-fullscreen-search-column-1 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="mkdf-widget-title-holder"><h6 class="mkdf-widget-title">',
                'after_title' => '</h6></div>'
            )
        );

        register_sidebar(
            array(
                'id' => 'fullscreen_search_column_2',
                'name' => esc_html__('FullScreen Search Column 2', 'verdure'),
                'description' => esc_html__('Widgets added here will appear in the second column of fullscreen search', 'verdure'),
                'before_widget' => '<div id="%1$s" class="widget mkdf-fullscreen-search-column-2 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="mkdf-widget-title-holder"><h6 class="mkdf-widget-title">',
                'after_title' => '</h6></div>'
            )
        );

        register_sidebar(
            array(
                'id' => 'fullscreen_search_column_3',
                'name' => esc_html__('FullScreen Search Column 3', 'verdure'),
                'description' => esc_html__('Widgets added here will appear in the third column of fullscreen search', 'verdure'),
                'before_widget' => '<div id="%1$s" class="widget mkdf-fullscreen-search-column-3 %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<div class="mkdf-widget-title-holder"><h6 class="mkdf-widget-title">',
                'after_title' => '</h6></div>'
            )
        );
    }

    add_action( 'widgets_init', 'verdure_mikado_register_search_sidebar' );
}