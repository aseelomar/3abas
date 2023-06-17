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

    .buttons-excel,.buttons-print{
        border-radius: 0px !important;
        display:none;
    }
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

        <div class="row">
            <div class="col-8">

                <p style="margin-right: 25px;">{{__('admin.supervisors')}} / <small>{{__('admin.all_supervisors')}} ({{$count}})</small> </p>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">
                    <div class="table-responsive">
                        <table id="dataTableClients" class="table  table-bordered data-table table-hover" style="text-align: center">
                            {{-- <div class="row" style=" margin-right: 960px;margin-bottom: -77px;margin-top: 20px;margin-left: 10px;">
                                <button class="btn btn-primary  waves-effect waves-light" id="btnPrint"style="height: 39px;margin-left: 10px;margin-right: 5px"><i class="fa fa-print"></i>print</button>
                                <button class="btn btn-primary  waves-effect waves-light" id="btnExecl" style="height: 39;"><i class="fa fa-file-excel-o"></i>Excel</button>
                            </div> --}}
                            <thead>
                            <tr>
                                <th width="20px">{{__('admin.user_name')}}</th>
                                <th width="20px"> {{__('admin.email')}}  </th>
                                @foreach ($pages as $page)
                                    <th scope="col"> {{ $page->name }}</th>
                                @endforeach

                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td class="but-click"
                                        onclick="update_user( {{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->name }}</td>
                                    <td class="but-click"
                                        onclick="update_user({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->email }}</td>
                                    @foreach ($pages as $page)
                                        {{-- @can($page->title)
                                            <td class="but-click">
                                                <a href="#" page="/users" class="toggle_but">
                                                    <i class="feather icon-check "></i>
                                                </a>
                                            </td>
                                        @endcan
                                        @cannot($page->title) --}}
                                        <td class="but-click">
                                            <a
                                                onclick="show_edit_user_modal({{ $user->id }} , {{ $page->id }})">
                                                <i class="feather icon-edit "></i>

                                            </a>
                                        </td>

                                    @endforeach


                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>
                        <br>
                        <p style="margin-right: 25px;">{{__('admin.add_a_new_supervisor')}}</p>
                        <form id="myFormStore" action="{{ route('user.store') }}"
                              style="direction: rtl;margin-right: 25px;">
                            @csrf
                            <div class="row">
                                <div class="col-md-3  col-sm-12">
                                    <input class="form-control" type="text" name="name" id="name"
                                           placeholder="{{__('admin.user_name')}}" autocomplete='off' required>
                                </div>
                                <div class="col-md-3  col-sm-12">
                                    <input class="form-control" type="email" name="email" id="email"
                                           placeholder="{{__('admin.email')}}" autocomplete='off' required>
                                </div>
                                <div class="col-md-3  col-sm-12">
                                    <input class="form-control" type="password" name="password" id="password"
                                           autocomplete='off' placeholder="{{__('admin.password')}}" required>
                                </div>
                                <div class="col-md-3  col-sm-12">
                                    <center>
                                        <button type="button" id="store_btn" class="btn btn-primary">{{__('admin.add')}}
                                        </button>

                                    </center>
                                </div>
                            </div>
                            <br>
                        </form>
                        <form id="myFormUpdate" action="{{ route('user.update') }}" hidden
                              style="direction: rtl;margin-right: 25px;">
                            @csrf
                            <input class="form-control" type="hidden" name="id" id="update_id"
                                   placeholder="{{__('admin.user_name')}}" required>
                            <div class="row">
                                <div class="col-3">
                                    <input class="form-control" type="text" name="name" id="update_name"
                                           placeholder="{{__('admin.user_name')}}" required>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="email" name="email" id="update_email"
                                           placeholder="{{__('admin.email')}}" required>
                                </div>
                                <div class="col-3">
                                    <input class="form-control" type="password" name="password" id="update_password"
                                           placeholder="{{__('admin.password')}}" required>
                                </div>
                                <div class="col-3">
                                    <div class="row">
                                        <div class="col-xl-6">   <button type="button" id="update_btn" class="upd_but btn bg-gradient-info"> {{__('admin.edit')}}
                                        </button></div>
                                        <div class="col-xl-6">   <button type="button" id="delete_btn" class="upd_but btn bg-gradient-danger"> {{__('admin.delete')}}
                                        </button></div>
                                    </div>

                                </div>
                            </div>
                            <br>
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="kt_modal_edit_customer" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div id="edit_form_holder">
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
                console.log($('#myFormStore'));
                // alert($('#myFormStore'));
                var formData = new FormData($("#myFormUpdate")[0]);
                formData.append('is_deleted','1')
                func($('#myFormUpdate'), formData);
            });

            window.addEventListener("click", function(event) {

                if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                    .target.nodeName !== 'BUTTON' && event
                    .target.nodeName !== 'INPUT') {
                    console.log('window');

                    $('#myFormStore').attr('hidden', false)
                    $('#myFormUpdate').attr('hidden', true)
                    var s = document.querySelector('tr.selected');
                    s && s.classList.remove('selected');
                }

            });
            $('#dataTableClients').DataTable();
        });


        function update_user(user, sel) {
            console.log(sel);
            var s = sel.parentNode.parentNode.querySelector('tr.selected');
            s && s.classList.remove('selected');
            sel.parentNode.classList.add('selected')
            object = sel.parentNode;
            // console.log(sel.parentNode.classList.add('selected'));
            console.log(user);
            $('#myFormStore').attr('hidden', true)
            $('#myFormUpdate').attr('hidden', false)
            $("#update_name").val(user.name);
            $("#update_email").val(user.email);
            $("#update_id").val(user.id);


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
        var table = $('#dataTableClients').DataTable({
            autoWidth: true,
            responsive: true,
            dom: 'Bfrtip',

            "oLanguage": {
                "sSearch": '{{__('admin.search')}}',
            },

            destroy: true,
            "bInfo": false,
            buttons: [
            //    {
            //    extend: 'print',
            //},
            //    {
            //        extend: 'excel',
            //    },
            ],
            paging: false,
            // "ajax": {
            //         "url": "{{ url('cms/admin/get') }}",
            //         "dataType": "json",
            //         "type": "POST",
            //         "data": {
            //             _token: "{{ csrf_token() }}"
            //         }
            //     },
            //     "columns": [{
            //             "data": "id"
            //         },
            //


            //     ],



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
                    // if (resp.status == false) {
                    //     $.each(resp.message, function (i, error) {
                    //         // DisplayToastrMessage_General("error", error[0] , 3000);
                    //         // display_error_messages

                    //     });

                    // } else {
                    if (resp.code == 200) {
                        table.row.add(resp.data).draw();

                    } else {
                        // var s = sel.parentNode.parentNode.querySelector('tr.selected');
                        // location.reload();
                        $("#dataTableClients").load(location.href + " #dataTableClients")
                        // object.val = "Working";
                        // console.log(object.childNodes[0]);
                        // console.log(object.childNodes[0].childNodes[0]);
                        // console.log(object.childNodes[0].innerHTML = "I have changed!");

                    }

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
