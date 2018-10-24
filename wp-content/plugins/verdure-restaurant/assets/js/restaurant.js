(function($) {
    'use strict';

    $(document).ready(function() {
        mkdfRestaurantDatePicker();
    });

    $(document).on( "mkdAjaxPageLoad",function(){
        mkdfRestaurantDatePicker();
    });

    function mkdfRestaurantDatePicker() {
        var datepicker = $('.mkdf-ot-date');

        if(datepicker.length) {
            datepicker.each(function() {
                $(this).datepicker({
                    prevText: '<span class="arrow_carrot-left"></span>',
                    nextText: '<span class="arrow_carrot-right"></span>'
                });
            });
        }
    };
})(jQuery)