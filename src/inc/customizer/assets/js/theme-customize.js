 /**
  * Theme functions file
  */

 (function ($) {

     var wpApi = wp.customize;

     /**
      * Document ready (jQuery)
      */
     $(function () {


         /* === Init Font Family And Style Control === */
         fontChosen.init();
         /* === Checkbox Multiple Control === */
         multiCheckboxes.init();

         /* === Fn. Checkbox Multiple Sort Control === */
         $('.customize-control-checkbox-multiple-sort').multiCheckboxesSort();


         /**
       	 * TinyMCE Custom Control
       	 *
       	 * @author Anthony Hortin <http://maddisondesigns.com>
       	 * @license http://www.gnu.org/licenses/gpl-2.0.html
       	 * @link https://github.com/maddisondesigns
       	 */

         $('.customize-control-tinymce-editor').each(function(){
           // Get the toolbar strings that were passed from the PHP Class
           var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('id')].wpgtinymcetoolbar1;
           var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('id')].wpgtinymcetoolbar2;

           wp.editor.initialize( $(this).attr('id'), {
             tinymce: {
               wpautop: true,
               toolbar1: tinyMCEToolbar1String,
               toolbar2: tinyMCEToolbar2String
             },
             quicktags: true
           });
         });
         $(document).on( 'tinymce-editor-init', function( event, editor ) {
           editor.on('change', function(e) {
             tinyMCE.triggerSave();
             $('#'+editor.id).trigger('change');
           });
         });


     });

     /* === Font Family And Style Control === */
     fontChosen = {

         init: function () {
             fontChosen.showFonts();
         },

         showFonts: function () {
             $(".google-font-select").each(function () {

                 var $el = $(this),
                     key = $el.attr('data-customize-setting-link');

                 wpApi(key, function (setting) {

                     $el.on('change', function () {
                         var $select = $(this),
                             font_famile = $select.val(),
                             font_variant = $select.closest('li').next().find('select');

                         if (font_variant.length > 0 && wpgCustomizerFontsL10n[font_famile] !== undefined) {

                             font_variant.html(fontChosen.showVariants(wpgCustomizerFontsL10n[font_famile]['variants']))
                                 .children('option[value="regular"]').attr('selected', 'selected')
                                 .trigger('change');
                         }
                     });
                 });
             });
         },

         showVariants: function (variants) {

             var options = '';

             $.each(variants, function (ind, vale) {
                 var name = vale.replace('italic', ' Italic').replace(/\w\S*/g, function (txt) {

                     return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();

                 });
                 options += '<option value="' + vale + '">' + name + '</option>';
             });

             return options;
         }

     };



     /* === All Checkbox Multiple Control === */
     var multiCheckboxes = {

         init: function () {

             $('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function () {

                 var checkbox_values = $(this).parents('.customize-control').find('input[type="checkbox"]:checked').map(function () {
                     return this.value;
                 }).get().join(',');

                 $(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');
             });
         }
     };


     /* === Function multi Checkboxes Sort === */
     $.fn.multiCheckboxesSort = function () {
         return this.each(function () {

             var $el = $(this),
                 $hidden_input = $el.find('input[type="hidden"]');

             if ($hidden_input.length !== 0) {

                 if ($hidden_input.val().length !== 0) {

                     var $checkbox_sort_array = $hidden_input.val().split(",");

                 } else {

                     var $checkbox_sort_array = [];

                 }
             }



             $el.find('input[type="checkbox"]').on('change', function () {

                 var input = $(this);

                 if (input.is(':checked')) {
                     $checkbox_sort_array.push(input.val());

                 } else {
                     $checkbox_sort_array.splice($.inArray(input.val(), $checkbox_sort_array), 1);

                 }
                 $hidden_input.val($checkbox_sort_array.join(',')).trigger('change');

             });
         });
     };



     /* === Show terms with icon last post === */
     var last_in_terms = {

         init: function () {
             hidden_input = $('#category-chosen');

             if (hidden_input.val().length !== 0) {
                 checkbox_array = $('#category-chosen').val().split(",");
             } else {
                 checkbox_array = [];
             }

             last_in_terms.select_tax();
             last_in_terms.select_term();
         },

         select_tax: function () {


             $('#customize-control-wpg_featured_term_tax select').on('change', function () {

                 var tax_select = $(this),
                     val_tax_select = tax_select.val(),
                     termlist = tax_select.closest('li').next().find('ul');

                 termlist.removeClass('show-list');

                 $('ul.' + tax_select.val()).addClass('show-list');

                 termlist.find('input:checkbox').each(function () {
                     $(this).prop("checked", false);
                 });


                 $('ul.' + val_tax_select + 'input').first().prop("checked", true);

                 checkbox_array = [];

                 $('ul.' + val_tax_select).find('input:checkbox:first').each(function () {
                     $(this).prop("checked", true);
                     checkbox_array.push($(this).val());
                 });

                 hidden_input.val(checkbox_array.join(',')).trigger('change');

             });
         },


         select_term: function () {
             $('#customize-control-wpg_featured_term_terms input[type="checkbox"]').on('change', function () {

                 var input = $(this);

                 if (input.is(':checked')) {
                     checkbox_array.push(input.val());
                 } else {
                     checkbox_array.splice($.inArray(input.val(), checkbox_array), 1);
                 }

                 input.parents('.customize-control').find('input[type="hidden"]').val(checkbox_array.join(',')).trigger('change');

             });
         }

     };


 })(jQuery);
