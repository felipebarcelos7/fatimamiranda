/*
Theme Name: Vex JS Dashboard
Theme URI: https://vex.lucian.host/
Description: Agency Theme
Version: 1.0
Author: Sweet Themes

*/


( function ( $ ) {
    'use strict';
    $( document ).ready( function () {



        $('textarea[data-editor]').each(function() {
            var textarea = $(this);
            var mode = textarea.data('editor');
            var editDiv = $('<div>', {
              position: 'absolute',
              width: textarea.width(),
              height: textarea.height(),
              'class': textarea.attr('class')
            }).insertBefore(textarea);
            textarea.css('display', 'none');
            var editor = ace.edit(editDiv[0]);
            editor.renderer.setShowGutter(textarea.data('gutter'));
            editor.getSession().setValue(textarea.val());
            editor.getSession().setMode("ace/mode/" + mode);
            editor.setTheme("ace/theme/idle_fingers");

            textarea.closest('form').submit(function() {
              textarea.val(editor.getSession().getValue());
            })
          });


		$('.table-responsive form #options').on("click", function(){
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true;
                    jQuery('#options1').prop('checked', true);
                });
            }else {
                $('.checkboxes').each(function(){
                    this.checked = false;
                    jQuery('#options1').prop('checked', false);
                });
            }
        });
        $('.table-responsive form #options1').on("click", function(){
            if(this.checked){
                $('.checkboxes').each(function(){
                    this.checked = true;
                    jQuery('#options').prop('checked', true);
                });
            }else {
                $('.checkboxes').each(function(){
                    this.checked = false;
                    jQuery('#options').prop('checked', false);
                });
            }
        });

        if ( jQuery( ".dropzone" ).length ) {
            Dropzone.autoDiscover = false;
          
            var myDropzone = new Dropzone(".dropzone", { 
               maxFilesize: 10,
               acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp"
            });
        }

        if ( jQuery( ".form-menu" ).length ) {
            $(".form-menu input[type='radio']").on("click", function(){
                var radioValue = $(this).val();
                if(radioValue == 1){
                    $(".form-menu .submeniu-code").removeClass("hide");
                }
                if(radioValue == 0){
                    $(".form-menu .submeniu-code").addClass("hide");
                }
            });
        }


    })
} ( jQuery ) )