@extends('layouts.app')

<style>
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }


    .dataTables_filter {
        float: right !important;
        padding: 10px;
        margin-top: 17px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky+.content {
        padding-top: 99px;
    }


    .buttons-excel {
        border-radius: 0px !important;

    }

    .datatable_color {
        background-color: #6c62d9c4;
        color: #fff;
    }

    .buttons-excel,
    .print_btn {
        border-radius: 0 !important;
        margin-top: 26px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> <small> @lang('admin.all_categories') / @lang('admin.categories') ({{ $count }}) </small>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">
                    <table id="dataTableClients" class="table display" style="text-align: center">
                        {{-- <div class="row" style=" margin-right: 990px;margin-bottom: -77px;margin-top: 20px;margin-left: 10px;">
                                <button class="btn btn-primary  waves-effect waves-light" id="btnPrint"style="height: 39px;margin-left: 10px;margin-right: 5px"><i class="fa fa-print"></i>print</button>
                                <button class="btn btn-primary  waves-effect waves-light" id="btnExecl" style="height: 39;"><i class="fa fa-file-excel-o"></i>Excel</button>
                            </div> --}}
                        <thead>
                            <tr>
                                <th width="20px"> @lang('admin.id') </th>
                                <th width="20px"> @lang('admin.image') </th>
                                <th width="20px">@lang('admin.parent')</th>
                                <th width="20px"> @lang('admin.arabic_name') </th>
                                <th width="20px"> @lang('admin.english_name') </th>
                                <th width="20px"> @lang('admin.stuatus') </th>
                                {{-- <th width="50px"> Options </th> --}}


                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div>
                    <br>
                    <p style="margin-right: 25px;">@lang('admin.add_a_new_category')..</p>
                    <form id="myFormStore" action="{{ route('category.store') }}"
                        style="direction: rtl;margin-right: 25px;"   enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control" type="text" name="category_name_ar" id="category_name_ar"
                                    placeholder="{{ __('admin.category_name_in_arabic') }}" autocomplete='off' required>
                            </div>
                            <div class="col-3">
                                <input class="form-control" type="text" name="category_name_en" id="category_name_en"
                                    placeholder="{{ __('admin.category_name_in_english') }}" autocomplete='off' required>
                            </div>
                            <div class="col-2">
                                <select name="parent_id" id="store_select" onclick="getParent()" class="form-control">
                                    <option value="0" selected> {{ __('admin.without_main_category') }} </option>

                                </select>
                            </div>

                            <div class="custom-control custom-switch custom-control-inline">
                                <label class="switch">
                                    <input name="status_input" id="status" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>


                            <div class="col-3 row">
                                <div class="col-6">
                                    <input class="form-control" type="file"  style="border-style:none" name="cat_image" id="cat_image"
                                        autocomplete='off' required>
                                </div>
                                <div class="col-6">
                                    <button type="button" id="store_btn" class="btn btn-primary">{{ __('admin.add') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                        <br>
                    </form>
                    <form id="myFormUpdate" action="{{ route('category.store') }}" hidden
                        style="direction: rtl;margin-right: 25px;"   enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="hidden" name="id" id="update_id">
                        <div class="row">
                            <div class="col-2">
                                <input class="form-control" type="text" name="category_name_ar"
                                    id="update_category_name_ar" placeholder="{{ __('admin.category_name_in_arabic') }}"
                                    autocomplete='off' required>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" name="category_name_en"
                                    id="update_category_name_en" placeholder="{{ __('admin.category_name_in_english') }}"
                                    autocomplete='off' required>
                            </div>
                            <div class="col-2">
                                <select name="parent_id" id="update_select" class="form-control">
                                    {{-- @if (isset($parents) && sizeof($parents) > 0)
                                            <option> بدون تصنيف الاب </option>

                                            @foreach ($parents as $parent)
                                                <option value="{{ $parent->id }}">{{ $parent->category_name_ar }}</option>
                                            @endforeach
                                        @else
                                            <option value=""> يرجى اضافه تصنيفات لملاء الخانه </option>
                                        @endif --}}
                                </select>
                            </div>

                            <div class="col-3 row">
                                <div class="col-6">

                                    <label class="switch">
                                    <input name="status_input" id="update_status" type="checkbox">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                                <div class="col-6"><input class="form-control" type="file" style="border-style:none"
                                    name="cat_image" id="cat_image" autocomplete='off' required></div>



                            </div>

                            {{--                                <div class="col-1"> --}}
                            {{--                                    <select name="status" id="update_status" class="form-control"> --}}
                            {{--                                        <option value="active">{{ __('admin.active') }}</option> --}}
                            {{--                                        <option value="inactive">{{ __('admin.in_active') }}</option> --}}
                            {{--                                        <option value="blocked">{{ __('admin.blocked') }}</option> --}}
                            {{--                                    </select> --}}
                            {{--                                </div> --}}

                            <div class="col-3">
                                <div class="row">
                                    <div class="col-xl-6"> <button type="button" id="update_btn"
                                            class="upd_but btn bg-gradient-info"> {{ __('admin.edit') }}
                                        </button></div>
                                    <div class="col-xl-6"> <button type="button" id="delete_btn"
                                            class="upd_but btn bg-gradient-danger"> {{ __('admin.delete') }}
                                        </button></div>
                                </div>

                            </div>
                        </div>
                        <br>
                        <br>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#buttons-excel').on('click', function() {
            alert('gkgk');
            $('.buttons-excel').click();
        });

        let name;
        let object;
        var size = [];
        $(document).ready(function() {
            $('#store_btn').on('click', function(e) {
                var myBookId = $(this).data('id');
                $(".modal-body #bookId").val(myBookId);
            });

            $('#store_btn').on('click', function(e) {
                e.preventDefault();
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormStore")[0]);

                func($('#myFormStore'), formData);
            });
            $('#update_btn').on('click', function(e) {
                e.preventDefault();
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormUpdate")[0]);
                func($('#myFormUpdate'), formData);
            });
            $('#delete_btn').on('click', function(e) {
                e.preventDefault();
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormUpdate")[0]);
                formData.append('is_delete', '1')
                func($('#myFormUpdate'), formData);
            });


            window.addEventListener("click", function(event) {

                if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                    .target.nodeName !== 'BUTTON' && event
                    .target.nodeName !== 'INPUT' && event
                    .target.nodeName !== 'A' && event
                    .target.nodeName !== 'SELECT' && event
                    .target.nodeName !== 'SPAN') {
                    console.log('window');

                    $('#myFormStore').attr('hidden', false)
                    $('#myFormUpdate').attr('hidden', true)
                    var s = document.querySelector('tr.selected');
                    s && s.classList.remove('selected');
                }

            });
            $('#dataTableClients').DataTable();
        });


        function update_category(category, sel) {
            var st = sel.parentNode.parentNode;
            //    .classList.add("selected");
            var s = document.querySelector('tr.selected');
            s && s.classList.remove('selected');
            st.classList.add('selected')
            // object = sel.parentNode;
            // // console.log(sel.parentNode.classList.add('selected'));
            // console.log(sel.parentNode.querySelector('td'));
            $('#myFormStore').attr('hidden', true)
            $('#myFormUpdate').attr('hidden', false)
            $("#update_category_name_ar").val(category.category_name_ar);
            $("#update_category_name_en").val(category.category_name_en);
            $("#update_id").val(category.id);

            if (category.status == 'active') {

                $("#update_status").attr('checked', true)


            } else {
                $("#update_status").removeAttr('checked')
            }
            //
            // $("#update_status").children().each(function(key, value) {
            //
            //     if ( category.status =='active') {
            //
            //         $(this).attr('checked', true)
            //
            //     } else {
            //         $(this).removeAttr('checked')
            //     }
            //
            //
            //
            //
            //
            // });
            $.ajax({
                url: "{{ route('category.parent') }}",
                dataType: 'html',
                method: 'GET',
                success: function(data) {
                    console.log($("#update_select"));
                    $("#update_select").find('option')
                        .remove()
                        .end()
                        .append('<option value ="0"> بدون تصنيف الاب  </option>')
                        .val('0')


                    $.each(JSON.parse(data), function(key, value) {
                        if (category.parent_id == value.id) {

                            $("#update_select").append(
                                `<option selected value="${ value.id }">${ value.name }</option>`
                            )
                        } else {

                            $("#update_select").append(
                                `<option  value="${ value.id }">${ value.name }</option>`
                            )

                        }


                    });


                }
            });

            // $("#update_select").append(`<option selected value="${ category.parent_id }">${ category.parent_id }</option>`);

            // $("#update_id").val(category.id);
            // $("#update_select").each(
            //     function() {
            //         console.log($(this));
            //         if($(this).val == category.parent)
            //         // $(this).removeAttr('selected');
            //         $(this).attr('selected', ture);
            //     }
            // );


            // mark the first option as selected
            // $("#target option:first").attr('selected', 'selected');


        }

        function getParent() {
            var check = Object.keys(size).length;
            console.log(check);
            if (check < 1) {

                $.ajax({
                    url: "{{ route('category.parent') }}",
                    dataType: 'html',
                    method: 'GET',
                    success: function(data) {
                        size = data;
                        console.log($("#store_select"));
                        console.log(data);
                        $("#store_select").find('option')
                            .remove()
                            .end()
                            .append('<option value="0"> بدون تصنيف الاب  </option>')
                            .val(0)


                        $.each(JSON.parse(data), function(key, value) {


                            $("#store_select").append(
                                `<option  value="${ value.id }">${ value.name }</option>`
                            )



                        });


                    }
                });
            }
        }

        // function func(form) {
        //     form
        //     $.ajax({
        //         url: form.attr('action'),
        //         dataType: 'html',
        //         method: 'GET',
        //         data: {
        //             id: id
        //         },
        //         success: function(data) {
        //             $('#editUser').modal('show');
        //             $('#modal-body').html(data);

        //         }
        //     });
        // }
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
                // {
                //     extend: 'print',
                // },
                {
                    extend: 'excel',
                },
            ],
            // paging: true,
            "ajax": {
                "url": "{{ route('category.data') }}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: "{{ csrf_token() }}"
                }
            },

            "columns": [{
                    "data": "id",
                },
                {
                    "data": "image"
                },
                {
                    "data": "parent"
                },
                {
                    "data": "category_name_ar"
                },
                {
                    "data": "category_name_en"
                },
                {
                    "data": "status"
                },
                // {
                //     "data": "options"
                // },



            ],
            "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                // $(nRow).removeClass('odd');
                // $(nRow).removeClass('even');
                console.log(aData['check']);
                if (aData['check'] == 0)
                    $(nRow).addClass('datatable_color');

            },




        });

        function ChangeStatus(id) {
            // Swal.fire({
            //     // text: "Are you sure you want to change user status?",
            //     text: "هل انت متأكد من تغير الحاله ",
            //     icon: "warning",
            //     showCancelButton: true,
            //     buttonsStyling: true,
            //     confirmButtonText: "نعم ,متأكد!",
            //     // confirmButtonText: "Yes, change it!",
            //     cancelButtonText: "لا , تراجع !",
            //     // cancelButtonText: "No, return",
            //     customClass: {
            //         confirmButton: "btn btn-primary",
            //         cancelButton: "btn btn-active-light"
            //     }
            // }).then(function(result) {
            //     if (result.value) {
            $.ajax({
                url: "{{ route('category.status') }}",
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
            // }
            // });
        }



        function func(form, formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: form.attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp);
                    size = [];
                    // if (resp.status == false) {
                    //     $.each(resp.message, function (i, error) {
                    //         // DisplayToastrMessage_General("error", error[0] , 3000);
                    //         // display_error_messages

                    //     });

                    // } else {
                    // if (resp.code == 200) {
                    //     table.row.add(resp.data).draw();

                    // } else {
                    //     // var s = sel.parentNode.parentNode.querySelector('tr.selected');
                    //     location.reload();
                    //     // object.val = "Working";
                    //     // console.log(object.childNodes[0]);
                    //     // console.log(object.childNodes[0].childNodes[0]);
                    //     // console.log(object.childNodes[0].innerHTML = "I have changed!");

                    // }
                    table.ajax.reload();

                    display_error_messages('success', resp.message)
                    // DisplayToastrMessage_General("success",resp.message, 3000);
                    // $('#addNewColor').modal('hide');
                    // get_colors();


                    // }

                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });


                },
                'complete': function() {}
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

        function show_edit_user_modal(id, page_id) {
            // var id = user_id.attr('user_id');

            $.ajax({
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                type: 'GET',
                url: '{{ route('admin.get_emp_permissions') }}',
                data: {
                    id: id,
                    page_id: page_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {

                    $('#edit_form_holder').html(response);
                    $('#kt_modal_edit_customer').modal('show');

                }
            });

        }
    </script>
@endsection
