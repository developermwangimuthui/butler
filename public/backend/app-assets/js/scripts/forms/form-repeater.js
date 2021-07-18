/*=========================================================================================
        File Name: form-repeater.js
        Description: Repeat forms or form fields
        ----------------------------------------------------------------------------------------
        Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
        Author: PIXINVENT
        Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

(function (window, document, $) {
    'use strict';
    let i =0;
    // Default
    $('.repeater-default').repeater({
        show: function () {
            $(this).slideDown();
            $('.select2-container').remove();
            $('.select2').select2({
              placeholder: "Placeholder text",
              allowClear: true
            });
            $('.select2-container').css('width','100%');
          }
    });

    // Custom Show / Hide Configurations
    $('.file-repeater, .contact-repeater').repeater({
        show: function () {
            $(this).slideDown();
        },
        hide: function (remove) {
            if (confirm('Are you sure you want to remove this item?')) {
                $(this).slideUp(remove);
            }
        }
    });


})(window, document, jQuery);
