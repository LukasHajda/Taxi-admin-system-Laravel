/*
 Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Form Advanced Components Init
 */

!function($) {
    "use strict";

    var AdvancedForm = function() {};

    $.fn.datepicker.dates['sk'] = {
        days: ["Nedeľa", "Pondelok", "Utorok", "Streda", "Štvrtok", "Piatok", "Sobota", "Nedeľa"],
        daysShort: ["Ne", "Po", "Ut", "St", "Št", "Pia", "So", "Ne"],
        daysMin: ["Ne", "Po", "Ut", "St", "Št", "Pia", "So", "Ne"],
        months: ["Január", "Február", "Marec", "Apríl", "Máj", "Jún", "Júl", "August", "September", "Október", "November", "December"],
        monthsShort: ["Jan", "Feb", "Mar", "Apr", "Máj", "Jún", "Júl", "Aug", "Sep", "Okt", "Nov", "Dec"],
        today: "Dnes"
    };

    AdvancedForm.prototype.init = function() {
        // Date Picker
        jQuery('.datepicker-autoclose').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            weekStart: 1,
            language: "sk",
            todayHighlight: true
        });

        // Select 2
        $(".select2").select2({
            maximumSelectionLength: 2
        });

        // Colorpicker start
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
        $('.colorpicker-rgba').colorpicker();

        $('#colorpicker-horizontal').colorpicker({
            color: "#88cc33",
            horizontal: true
        });
        $('#colorpicker-color-pattern').colorpicker({
            colorSelectors: {
                'black': '#000000',
                'white': '#ffffff',
                'red': '#FF0000',
                'default': '#777777',
                'primary': '#337ab7',
                'success': '#5cb85c',
                'info': '#5bc0de',
                'warning': '#f0ad4e',
                'danger': '#d9534f'
            }
        });

        $('.colorpicker-large').colorpicker({
            customClass: 'colorpicker-2x',
            sliders: {
                saturation: {
                    maxLeft: 200,
                    maxTop: 200
                },
                hue: {
                    maxTop: 200
                },
                alpha: {
                    maxTop: 200
                }
            }
        });

        //Bootstrap-MaxLength
        $('.maxlength').maxlength({
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        $('.maxlength-threshold').maxlength({
            threshold: 20,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        $('.maxlength-textarea').maxlength({
            alwaysShow: true,
            warningClass: "badge badge-info",
            limitReachedClass: "badge badge-warning"
        });

        //Bootstrap-TouchSpin
        $(".touchspin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ion-plus-round',
            verticaldownclass: 'ion-minus-round',
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });

        $(".touchspin-decimal").TouchSpin({
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });

    },
    //init
    $.AdvancedForm = new AdvancedForm, $.AdvancedForm.Constructor = AdvancedForm
}(window.jQuery),

//initializing
function ($) {
    "use strict";
    $.AdvancedForm.init();
}(window.jQuery);
