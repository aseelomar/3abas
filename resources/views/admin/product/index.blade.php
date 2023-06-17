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
    .buttons-excel {
        display: none !important;
        border-radius: 0px !important;

    }
</style>
<style>
    #toast-container>.toast-error {
        background-color: #BD362F;
    }
</style>
<style>
    #toast-container>.toast-success {
        background-color: #2dc45a;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;"> {{ __('admin.product') }} / <small> {{ __('admin.all_product') }}
                    ({{ $parents->count() }})</small> </p>


        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">


                    <table id="dataTableClients" class="table table-hover" style="text-align: center">

                        <thead>

                            <tr>

                                <div class="row" style=" margin-bottom: -45px; margin-top:20px; float:left;">

                                    <a class="dt-buttons btn-group btn btn-secondary"
                                    style="float: left !important; border-radius: 0px !important; margin-top: 0px;
                                    margin-bottom: 14px;"
                                     href="{{ url('exportProducts') }}">Excel </a>


                                <p  id="store_btn">
                                    <button type="submit" style="  border-radius: 0px !important;  @if(\Illuminate\Support\Facades\App::isLocale('en'))
                                        @endif
                                        " class="btn btn-primary   waves-effect waves-light">
                                        <a class="white" href="{{ url('admincp/products/new') }}">
                                           {{__('admin.add_product')}}</a></button>
                                </p>
                                <p style="margin-left: -45px;" id="update_btn" hidden="">
                                    <button type="submit" id="edit_btn" style=" border-radius: 0px !important;" class="btn btn-info  mr-5 waves-effect waves-light">
                                        <a class="white">
                                                   {{__('admin.update_product')}}</a></button>
                                </p>
                            </div>


                            <th width="20px"> {{ __('admin.id') }} </th>
                            <th width="20px"> {{ __('admin.product_name_ar') }} </th>
                            <th width="20px"> {{ __('admin.product_name_en') }} </th>
                            <th width="20px"> {{ __('admin.product_description_ar') }} </th>
                            <th width="20px"> {{ __('admin.product_description_en') }} </th>
                            <th width="20px"> {{ __('admin.inventory') }} </th>
                            <th width="20px"> {{ __('admin.price') }} </th>
                            <th width="20px"> {{ __('admin.sale_price') }} </th>
                            <th width="20px"> {{ __('admin.main_category') }} </th>
                            <th width="20px"> {{ __('admin.sub_category') }} </th>
                            {{-- <th width="20px">  {{__('admin.description_product')}} </th> --}}
                            <th width="20px"> {{ __('admin.main_photo') }} </th>
                            <th width="20px"> {{ __('admin.status') }} </th>
                            <th width="20px"> {{ __('admin.rate') }} </th>
                            {{-- <th width="50px"> Options </th> --}}


                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let name;
        let object;
        var element;
        $(document).ready(function() {
            $('#edit_btn').click(function() {
                window.open('/admincp/products/update?id=' + element.id);
                console.log(element.id);

            })


            window.addEventListener("click", function(event) {

                if (event.target.nodeName !== 'TD' && $('#store_btn').attr('hidden') == 'hidden' && event
                    .target.nodeName !== 'BUTTON' && event
                    .target.nodeName !== 'INPUT' && event
                    .target.nodeName !== 'A' && event
                    .target.nodeName !== 'SELECT') {
                    console.log('window');
                    $('#store_btn').attr('hidden', false);
                    $('#update_btn').attr('hidden', true);
                    element = null;
                    // $('#myFormStore').attr('hidden', false)
                    // $('#myFormUpdate').attr('hidden', true)
                    var s = document.querySelector('tr.selected');
                    s && s.classList.remove('selected');
                }

            });
            $('#dataTableClients').DataTable();
        });


        function dblCilick() {
            window.open('/admincp/products/update?id=' + element.id);

        }

        function update_product(product, sel) {
            var st = sel.parentNode.parentNode;
            var s = document.querySelector('tr.selected');
            s && s.classList.remove('selected');
            st.classList.add('selected')

            $('#store_btn').attr('hidden', true);
            $('#update_btn').attr('hidden', false);
            element = product;



        }
    </script>
    <script>
        let lang = $('html').attr('lang');

        var table = $('#dataTableClients').DataTable({
            autoWidth: true,
            responsive: true,
            "processing": true,
            "serverSide": true,
            dom: 'Bfrtip',

            "oLanguage": {
                "sSearch": "{{ __('admin.search') }}",
            },

            destroy: true,
            "bInfo": false,
            buttons: [
                {
                    extend: 'excel',
                },
            ],
            // paging: true,
            "ajax": {
                "url": "{{ route('product.data') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },
            "columns": [{
                    "data": "id"
                },
                {
                    "data": "product_name"
                },
                {
                    "data": "product_name_en"
                },
                {
                    "data": "product_description_ar"
                },
                {
                    "data": "product_description_en"
                },
                {
                    "data": "inventory"
                },
                {
                    "data": "product_price"
                },
                {
                    "data": "product_sale_price"
                },
                {
                    "data": "category_id"
                },
                {
                    "data": "sub_category_id"
                },


                // {
                //     "data": "product_name_en"
                // },
                // {
                //     "data": "product_name_ar"
                // },
                // {
                //     "data": "product_description_en"
                // },
                // {
                //     "data": "product_description_ar"
                // },
                {
                    "data": "product_image"
                },
                {
                    "data": "status"
                },
                {
                    "data": "rate"
                },
                // {
                //     "data": "options"
                // },

                ////

            ],



        });

        function ChangeStatus(id) {
            Swal.fire({
                // text: "Are you sure you want to change user status?",
                text: "هل انت متأكد من تغير الحاله ",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: true,
                confirmButtonText: "نعم ,متأكد!",
                // confirmButtonText: "Yes, change it!",
                cancelButtonText: "لا , تراجع !",
                // cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: "{{ route('product.status') }}",
                        type: "GET",
                        data: {
                            id: id
                        },
                        dataType: "html",
                        success: function() {
                            display_error_messages("success", "Updated Successfully");
                            //swal("Success Updating!", "Updated Successfully", "success");
                            table.ajax.reload();
                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Error Updating!", "Please try again", "error");
                        }
                    });
                } else if (result.dismiss === "cancel") {
                    Swal.fire({
                        // text: "Event was not completed!.",
                        text: "تم التراجع",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "تم , فهمت ذلك",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        }

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
