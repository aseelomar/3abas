/* global jQuery, $ */
var order = function (){
    function wizardForm(){
        $(function () {
            var $sections = $('.form-section');

            function navigateTo(index) {
                $sections
                    .removeClass('current')
                    .eq(index)
                    .addClass('current');
            }

            function curIndex() {
                return $sections.index($sections.filter('.current'));
            }
            $('.form-wizard-container .next-button').click(function() {
                $('.form-wizard-container form').parsley().whenValidate({
                    group: 'block-' + curIndex()
                }).done(function() {
                    navigateTo(curIndex() + 1);
                    $(`#tab-${curIndex()}`).addClass('active');
                });
            });

            $('.form-wizard-container .prev-button').click(function() {
                $(`#tab-${curIndex()}`).removeClass('active');
                navigateTo(curIndex() - 1);
            });

            $sections.each(function(index, section) {
                $(section).find(':input').attr('data-parsley-group', 'block-' + index);
            });

            navigateTo(0);
        });
        $('.form-wizard-container form').parsley().on('field:success', function() {
            this.$element.closest('.form-group-profile').removeClass('error-input')
        });
        $('.form-wizard-container form').parsley().on('field:error', function() {
            this.$element.closest('.form-group-profile').addClass('error-input')
        });
    }
    return {
        init:function(){
            if($('.form-wizard-container').length){
                wizardForm()
            }
        }
    }
}();
$(document).ready(function () {
    order.init();
});
