@section('js')
    <script src="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.js')}}"></script>

    <script>
        function getval(sel) {


            var product = $('#product_id').val();

            $.ajax({
                       url: '{{ route('site.getAllDetail') }}',
                       dataType: 'html',
                       method: 'GET',
                       data: {

                           color_id: sel.value,
                           product_id: product

                       },
                       success: function(resp) {

                           console.log(1)
                           // $("#code").append('<option value=' + value.code + '>' +value.language_name+' : '+value.code + '</option>');
                           $('#sub_category')
                               .find('option')
                               .remove()
                               .end()
                               .append('<option value=""> {{ __('admin.sub_category') }}</option>')
                               .val('');
                           $("#sub_category").attr('readonly', false);
                           console.log(resp);
                           $.each(JSON.parse(resp), function(key, value) {

                               console.log(value);
                               $("#sub_category").append('<option value="' + value['size'] + '">' + value[
                                   'size'] + '</option>');
                               $("#sub_category").attr('disabled', false);
                           });
                       }
                   });
        }

        $('.add-to-cart').click(function (e) {
            e.preventDefault();
            var form = $(this).closest("form");
            //console.log(form[0])
            var url = "{{route('site.cart.add')}}";
            var data = new FormData(form[0])
            //var data = $(this).data('value');

            console.log(data)
            $.ajax({
                       url: url,
                       method: 'POST',
                       data: data,
                       dataType: 'JSON',
                       contentType: false,
                       cache: false,
                       processData: false,
                       success:function(response)
                       {

                           display_error_messages('success', 'تم الاضافة بنجاح')
                       },

                       error: function(response) {

                           if(response.status === 422)
                           {
                               if (response.responseJSON.message)
                               {
                                   display_error_messages('error', response.responseJSON.message)
                                   $('.')
                               } else
                               {
                                   $.each(response.responseJSON.errors, function (k, v) {
                                       display_error_messages('error', msg)
                                   });
                               }
                           }
                       }



                   });
        });
        function display_error_messages(type, msg)
        {
            const Toast = Swal.mixin({
                                         toast            : true,
                                         position         : 'bottom-left',
                                         showConfirmButton: false,
                                         timer            : 3000,
                                         timerProgressBar : true,

                                         didOpen: (toast) => {
                                             toast.addEventListener('mouseenter', Swal.stopTimer)
                                             toast.addEventListener('mouseleave', Swal.resumeTimer)
                                         }
                                     });

            Toast.options = {
                "closeButton"      : false,
                "debug"            : false,
                "newestOnTop"      : false,
                "progressBar"      : false,
                "positionClass"    : "toast-bottom-left",
                "preventDuplicates": false,
                "onclick"          : null,
                "showDuration"     : "300",
                "hideDuration"     : "1000",
                "timeOut"          : "5000",
                "extendedTimeOut"  : "1000",
                "showEasing"       : "swing",
                "hideEasing"       : "linear",
                "showMethod"       : "fadeIn",
                "hideMethod"       : "fadeOut"
            };
            if (type == 'error')
            {
                Toast.fire({
                               icon : 'error',
                               title: msg
                           })

                Toast.error(msg);
            } else
            {
                Toast.fire({
                               icon : 'success',
                               title: msg
                           });
            }

        }
    </script>
@endsection
