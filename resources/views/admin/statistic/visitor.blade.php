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
    .buttons-print ,.buttons-excel{
        border-radius: 0 !important;
        margin-top: 25px  !important;
        display: none !important;
    }



</style>
@section('content')


        <div class="row">
            <div class="col-8">

                <p style="margin-right: 25px;"> <small> @lang('admin.all_reports') ({{ $count }})- @lang('admin.visitor') </small>
                </p>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">
                    <div class="table-responsive">
                        <table id="dataTableClients" class="table table-hover display" style="text-align: center">

                            <div>
                                <a class="dt-buttons btn-group btn btn-secondary"
                                   style="border-radius: 0px !important; float: left;"
                                   href="{{ url('exportVisitor') }}">Excel </a>
                            </div>
                            <thead>
                                <tr>
                                    <th width="20px"> @lang('admin.id') </th>
                                    <th width="20px">@lang('admin.ip')</th>
                                    <th width="20px"> @lang('admin.status') </th>
                                    <th width="20px"> @lang('admin.date') </th>
                                    <th width="20px"> @lang('admin.blocked') </th>
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

        $(document).ready(function() {
            $('#dataTableClients').DataTable();
        });
    </script>
    <script>



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
            "url": "{{ route('visitors.data') }}",
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
                "data": "visitor_ip"
            },
            {
                "data": "status"
            },
            {
                "data": "date"
            },
            {
                "data": "option"
            },
            // {
            //     "data": "options"
            // },



        ]
        });
        function active_block(id)
        {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'visitors/status?id='+id,
                dataType: 'json',
                type: 'GET',
                data: id,
                contentType: false,
                processData: false,
                success: function(resp) {
                    table.ajax.reload();
                    display_error_messages('success', resp.message)

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
