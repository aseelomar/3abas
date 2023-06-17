@extends('layouts.app')

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky+.content {
        padding-top: 99px;
    }
    .dt-buttons{
        float: right;
    }
    /*.print_btn{*/
    /*    display:none !important;*/
    /*}*/
    /*.excel_btn{*/
    /*    display:none !important;*/
    /*}*/


</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;">{{__('admin.cart')}} / {{__('admin.product')}}</p>


        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 ">

            <div class="card" >
                <div class="card-content">
                    <div class="table-responsive" style="margin-top: 25px;">
                        <table id="table_order" class="table  display  table-hover" style="text-align: center">

                            <thead>

                            <tr>
                                <th scope="col-1">#id</th>
                                <th scope="col-3">{{__('admin.number_product')}}</th>
                                <th scope="col-4">{{__('admin.customers_name')}}</th>
                                <th scope="col-3">{{__('admin.action')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach( $products as $product)

                                <tr>
                                    <td class="number" data-value="{{$loop->iteration}}">{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>@include('admin.cart.parts.formSale')</td>
                                    <td>@include('admin.cart.parts.action')</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script>



        $('span[name^="saleProduct_"]').click(function (e) {
            e.preventDefault();

            var id = $(this).attr('idBtn');

            var form =document.getElementById(id);

            var url = form.getAttribute('action');

            var data = new FormData(form)

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

                           form.reset();

                           display_error_messages('success', 'Saved Successfully')

                       },
                       error: function(response) {

                           $.each(response.responseJSON.errors, function(k, v) {
                               display_error_messages('error', v[0])
                           });
                       }
                   });
        });

        function display_error_messages(type, msg) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (type == 'error') {
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }


    </script>

@endsection
