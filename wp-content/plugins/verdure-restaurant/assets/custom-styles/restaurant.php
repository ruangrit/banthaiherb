<?php

if (!function_exists('verdure_restaurant_style') && verdure_restaurant_theme_installed()) {
    function verdure_restaurant_style()
    {

        if (verdure_mikado_options()->getOptionValue('first_color') !== '') {
            echo verdure_mikado_dynamic_css('.mkdf-working-hours-holder .mkdf-wh-title .mkdf-wh-title-accent-word,
                                    #ui-datepicker-div .ui-datepicker-current-day:not(.ui-datepicker-today) a', array(
                'color' => verdure_mikado_options()->getOptionValue('first_color')
            ));
            echo verdure_mikado_dynamic_css('#ui-datepicker-div .ui-datepicker-today', array(
                'background-color' => verdure_mikado_options()->getOptionValue('first_color')
            ));
        }

    }

    add_action('verdure_mikado_style_dynamic', 'verdure_restaurant_style');
}