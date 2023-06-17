@extends('layouts.app')

<style>
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

    .datatable_color {
        background-color: rgb(160, 211, 212) !important;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;"> <small> @lang('admin.pages')/ @lang('admin.pages')  ({{ $count }}) </small>
            </p>


        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">


                    <table id="dataTableClients" class="table table-hover display" style="text-align: center">
                        <thead>
                        <tr>
                            {{-- <button type="submit" style=" float:left; margin-top:42px;  border-radius: 0 !important;  @if(\Illuminate\Support\Facades\App::isLocale('en')) @endif "
                                    class="btn btn-primary  waves-effect waves-light"> --}}
                                {{-- <a class="white" href="{{route('pages_link.edit')}}">  {{__('admin.add_a_new_pages_link')}}</a> --}}
                            </button>
                            <th width="20px"> # </th>
                            <th width="20px">@lang('admin.parent')</th>
                            <th width="20px"> @lang('admin.url') </th>
                            <th width="20px"> @lang('admin.title_ar') </th>
                            <th width="20px"> @lang('admin.title_en') </th>
                            <th width="20px"> @lang('admin.icon') </th>
                            <th width="20px"> @lang('admin.rank') </th>
                            <th width="20px"> @lang('admin.type') </th>
                            <th width="20px"> @lang('admin.status') </th>


                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div>
{{--                    <br>--}}
{{--                    <p style="margin-right: 25px;">@lang('admin.add_a_new_pages_link')..</p>--}}
{{--                    <form id="myFormStore" action="{{ route('pages_link.store') }}"--}}
{{--                          style="direction: rtl;margin-right: 25px;">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-3 mb-2">--}}
{{--                                <input class="form-control" type="text" name="url" id="url"--}}
{{--                                       placeholder="{{ __('admin.url') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="title" id="title"--}}
{{--                                       placeholder="{{ __('admin.arabic_name') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="title" id="title_en"--}}
{{--                                       placeholder="{{ __('admin.english_name') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="type" id="type"--}}
{{--                                       placeholder="{{ __('admin.type') }}" autocomplete='off' required>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md  mb-2 pl-5 pr-5 ">--}}
{{--                                <input class="form-control" type="number" name="rank" id="rank"--}}
{{--                                       placeholder="{{ __('admin.rank') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-md mb-2 pl-5 pr-5">--}}
{{--                                <select name="parent_id" id="store_select" onclick="getParent()" class="form-control">--}}
{{--                                    <option value="0" selected> بدون تصنيف الاب  </option>--}}

{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md mb-2 pl-5 pr-5">--}}
{{--                                <select name="visible" id="store_status" class="form-control">--}}
{{--                                    <option value="active">{{ __('admin.active') }} </option>--}}
{{--                                    <option value="inactive">{{ __('admin.in_active') }}</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-3">--}}
{{--                                <center>--}}
{{--                                    <button type="button" id="store_btn" class="btn btn-primary">{{ __('admin.add') }}--}}
{{--                                    </button>--}}

{{--                                </center>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <br>--}}
{{--                    </form>--}}
{{--                    <form id="myFormUpdate" action="{{ route('pages_link.store') }}" hidden--}}
{{--                          style="direction: rtl;margin-right: 25px;">--}}
{{--                        @csrf--}}
{{--                        <input class="form-control" type="hidden" name="id" id="update_id">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-3 mb-2">--}}
{{--                                <input class="form-control" type="text" name="url" id="update_url"--}}
{{--                                       placeholder="{{ __('admin.url') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="title" id="update_title"--}}
{{--                                       placeholder="{{ __('admin.arabic_name') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="title" id="update_title_en"--}}
{{--                                       placeholder="{{ __('admin.english_name') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-3  mb-2">--}}
{{--                                <input class="form-control" type="text" name="type" id="update_type"--}}
{{--                                       placeholder="{{ __('admin.type') }}" autocomplete='off' required>--}}
{{--                            </div>--}}


{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-md  mb-2 pl-5 pr-5 ">--}}
{{--                                <input class="form-control" type="number" name="rank" id="update_rank"--}}
{{--                                       placeholder="{{ __('admin.rank') }}" autocomplete='off' required>--}}
{{--                            </div>--}}
{{--                            <div class="col-md mb-2 pl-5 pr-5">--}}
{{--                                <select name="parent_id" id="update_select" onclick="getParent()" class="form-control">--}}
{{--                                    <option value="0" selected> بدون تصنيف الاب  </option>--}}

{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md mb-2 pl-5 pr-5">--}}
{{--                                <select name="visible" id="update_status" class="form-control">--}}
{{--                                    <option value="1">{{ __('admin.active') }} </option>--}}
{{--                                    <option value="0">{{ __('admin.in_active') }}</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-xl-6"> <button type="button" id="update_btn"--}}
{{--                                                                   class="upd_but btn bg-gradient-info"> {{ __('admin.edit') }}--}}
{{--                                        </button></div>--}}
{{--                                    <div class="col-xl-6"> <button type="button" id="delete_btn"--}}
{{--                                                                   class="upd_but btn bg-gradient-danger"> {{ __('admin.delete') }}--}}
{{--                                        </button></div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <br>--}}

{{--                </div>--}}
{{--                <br>--}}
{{--                <br>--}}
{{--                </form>--}}

            </div>
        </div>
    </div>
    </div>

@endsection

@section('js')
    <script>
        let name;
        let object;
        var size = [];
        $(document).ready(function() {

            window.addEventListener("click", function(event) {

                if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                    .target.nodeName !== 'BUTTON' && event
                    .target.nodeName !== 'INPUT' && event
                    .target.nodeName !== 'A' && event
                    .target.nodeName !== 'SELECT') {
                    console.log('window');

                    // $('#myFormStore').attr('hidden', false)
                    // $('#myFormUpdate').attr('hidden', true)
                    var s = document.querySelector('tr.selected');
                    s && s.classList.remove('selected');
                }

            });
            $('#dataTableClients').DataTable();
        });


        function update_sel(page, sel) {
            var st = sel.parentNode.parentNode;
            //    .classList.add("selected");
            var s = document.querySelector('tr.selected');
            s && s.classList.remove('selected');
            st.classList.add('selected')
            // object = sel.parentNode;
        }
        // console.log(sel.parentNode.classList.add('selected'));
        // console.log(sel.parentNode.querySelector('td'));
        // $('#myFormStore').attr('hidden', true)
        // $('#myFormUpdate').attr('hidden', false)
        // $("#update_rank").val(page.rank);
        // $("#update_type").val(page.type);
        // $("#update_title_en").val(page.title_en);
        // $("#update_title").val(page.title);
        // $("#update_url").val(page.url);
        // $("#update_id").val(page.id);
        // $("#update_status").children().each(function(key, value) {

        //     if ($(this).val() == page.visible) {

        //         $(this).attr('selected', 'selected')

        //     } else {
        //         $(this).removeAttr('selected')
        //     }





        // });
        // $.ajax({
        //     url: "{{ route('pages_link.edit') }}",
        //     dataType: 'html',
        //     method: 'GET',
        //     success: function(data) {
        //         console.log($("#update_select"));
        //         $("#update_select").find('option')
        //             .remove()
        //             .end()
        //             .append('<option value ="0"> بدون تصنيف الاب  </option>')
        //             .val('0')


        //         $.each(JSON.parse(data), function(key, value) {
        //             if (page.parent_id == value.id) {

        //                 $("#update_select").append(
        //                     `<option selected value="${ value.id }">${ value.name }</option>`
        //                 )
        //             } else {

        //                 $("#update_select").append(
        //                     `<option  value="${ value.id }">${ value.name }</option>`
        //                 )

        //             }


        //         });


        //     }
        // });
        function dbClick(id){
            window.open('/admincp/public_links/edit?id=' +id+'');
        }

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


        // }

        // function getParent() {
        //     var check = Object.keys(size).length;
        //     console.log(check);
        //     if (check < 1) {

        //         $.ajax({
        //             url: "{{ route('pages_link.edit') }}",
        //             dataType: 'html',
        //             method: 'GET',
        //             success: function(data) {
        //                 size = data;
        //                 console.log($("#store_select"));
        //                 console.log(data);
        //                 $("#store_select").find('option')
        //                     .remove()
        //                     .end()
        //                     .append('<option value="0"> بدون تصنيف الاب  </option>')
        //                     .val(0)


        //                 $.each(JSON.parse(data), function(key, value) {


        //                     $("#store_select").append(
        //                         `<option  value="${ value.id }">${ value.name }</option>`
        //                     )



        //                 });


        //             }
        //         });
        //     }
        // }

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

            // destroy: true,
            "bInfo": false,
            buttons: [

            ],
            // paging: true,
            "ajax": {
                "url": "{{ route('setting.pages_data') }}",
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
                    "data": "parent"
                },
                {
                    "data": "url"
                },
                {
                    "data": "title"
                },
                {
                    "data": "title_en"
                },
                {
                    "data": "icon"
                },
                {
                    "data": "rank"
                },
                {
                    "data": "type"
                },
                {
                    "data": "visible"
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

        // function func(form, formData) {
        //     $.ajax({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: form.attr('action'),
        //         dataType: 'json',
        //         type: 'POST',
        //         data: formData,
        //         contentType: false,
        //         processData: false,
        //         success: function(resp) {
        //             console.log(resp);
        //             size = [];
        //             // if (resp.status == false) {
        //             //     $.each(resp.message, function (i, error) {
        //             //         // DisplayToastrMessage_General("error", error[0] , 3000);
        //             //         // display_error_messages

        //             //     });

        //             // } else {
        //             // if (resp.code == 200) {
        //             //     table.row.add(resp.data).draw();

        //             // } else {
        //             //     // var s = sel.parentNode.parentNode.querySelector('tr.selected');
        //             //     location.reload();
        //             //     // object.val = "Working";
        //             //     // console.log(object.childNodes[0]);
        //             //     // console.log(object.childNodes[0].childNodes[0]);
        //             //     // console.log(object.childNodes[0].innerHTML = "I have changed!");

        //             // }
        //             table.ajax.reload();

        //             display_error_messages('success', resp.message)
        //             // DisplayToastrMessage_General("success",resp.message, 3000);
        //             // $('#addNewColor').modal('hide');
        //             // get_colors();


        //             // }

        //         },
        //         error: function(resp) {

        //             $.each(resp.responseJSON.errors, function(i, error) {
        //                 display_error_messages("error", error[0]);

        //             });


        //         },
        //         'complete': function() {}
        //     });

        // }

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

        // function show_edit_user_modal(id, page_id) {
        //     // var id = user_id.attr('user_id');

        //     $.ajax({
        //         headers: {
        //             'X-Requested-With': 'XMLHttpRequest'
        //         },
        //         type: 'GET',
        //         url: '{{ route('admin.get_emp_permissions') }}',
        //         data: {
        //             id: id,
        //             page_id: page_id,
        //             _token: "{{ csrf_token() }}"
        //         },
        //         success: function(response) {

        //             $('#edit_form_holder').html(response);
        //             $('#kt_modal_edit_customer').modal('show');

        //         }
        //     });

        // }
    </script>
@endsection
