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
        border-radius: 0px !important;

    }

    .datatable_color {
        background-color: rgb(160, 211, 212) !important;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;"> <small> @lang('admin.all_colors') ({{ $count }})- @lang('admin.colors') </small>
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
                                <th width="20px"> @lang('admin.id') </th>
                                <th width="20px"> @lang('admin.arabic_name') </th>
                                <th width="20px"> @lang('admin.english_name') </th>
                                <th width="20px">@lang('admin.code')</th>

                                <th width="20px"> @lang('admin.rank') </th>
                                {{-- <th width="50px"> Options </th> --}}


                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div>
                    <br>
                    <p style="margin-right: 25px;">@lang('admin.add_a_new_color')..</p>
                    <form id="myFormStore" action="{{ route('color.store.edit') }}"
                        style="direction: rtl;margin-right: 25px;">
                        @csrf
                        <div class="row">
                            <div class="col-2">
                                <input class="form-control" type="text" name="color_name_ar" id="color_name_ar"
                                    placeholder="{{ __('admin.arabic_name') }}" autocomplete='off' required>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" name="color_name_en" id="color_name_en"
                                    placeholder="{{ __('admin.english_name') }}" autocomplete='off' required>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="color_code">  @lang('admin.code')</label>
                                            <div class="col-6">

                                            <input type="color" id="color_code" name="color_code"
                                                class='form-control'>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="color_code"> @lang('admin.rank') </label>
                                            <div class="col-6">
                                                <input type="number" id="rank" name="rank" class='form-control'
                                                    placeholder="{{ __('admin.rank') }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-3">
                                <center>
                                    <button type="button" id="store_btn"
                                        class="ins_but btn bg-gradient-success">{{ __('admin.add') }}
                                    </button>

                                </center>
                            </div>
                        </div>
                        <br>
                    </form>
                    <form id="myFormUpdate" action="{{ route('color.store.edit') }}" hidden
                        style="direction: rtl;margin-right: 25px;">
                        @csrf
                        <div class="row">
                            <input class="form-control" type="hidden" name="id" id="update_id">
                            <div class="col-2">
                                <input class="form-control" type="text" name="color_name_ar" id="update_color_name_ar"
                                    placeholder="{{ __('admin.arabic_name') }}" autocomplete='off' required>
                            </div>
                            <div class="col-2">
                                <input class="form-control" type="text" name="color_name_en" id="update_color_name_en"
                                    placeholder="{{ __('admin.english_name') }}" autocomplete='off' required>
                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="color_code">  @lang('admin.code')</label>
                                            <div class="col-6">

                                            <input type="color" id="update_color_code" name="color_code"
                                                class='form-control'>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <label for="color_code"> @lang('admin.rank') </label>
                                            <div class="col-6">
                                                <input type="number" id="update_rank" name="rank" class='form-control'
                                                    placeholder="{{ __('admin.rank') }}">

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

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
        let name;
        let object;
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

                var formData = new FormData($("#myFormUpdate")[0]);
                formData.append('is_delete', '1')
                func($('#myFormUpdate'), formData);
            });

            window.addEventListener("click", function(event) {

                if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                    .target.nodeName !== 'BUTTON' && event
                    .target.nodeName !== 'INPUT' && event
                    .target.nodeName !== 'A' && event
                    .target.nodeName !== 'SELECT') {
                    console.log('window');

                    $('#myFormStore').attr('hidden', false)
                    $('#myFormUpdate').attr('hidden', true)
                    var s = document.querySelector('tr.selected');
                    s && s.classList.remove('selected');
                }

            });
            $('#dataTableClients').DataTable();
        });


        function update_item(item, sel) {
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
            $("#update_color_name_ar").val(item.color_name_ar);
            $("#update_color_name_en").val(item.color_name_en);
            $("#update_color_code").val(item.color_code);
            $("#update_rank").val(item.rank);
            $("#update_id").val(item.id);




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
            buttons: [{
                    extend: 'print',
                },
                {
                    extend: 'excel',
                },
            ],
            // paging: true,
            "ajax": {
                "url": "{{ route('color.data') }}",
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
                    "data": "color_name_ar"
                },
                {
                    "data": "color_name_en"
                },
                {
                    "data": "color_code"
                },
                {
                    "data": "rank"
                },
            ]





        });

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

                    table.ajax.reload();

                    display_error_messages('success', resp.message)
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
    </script>
@endsection
