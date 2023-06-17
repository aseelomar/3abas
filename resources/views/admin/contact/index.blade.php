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



    .buttons-excel {
        border-radius: 0px !important;
        display: none;

    }
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

        <div class="row">
            <div class="col-8">
                <p style="margin-right: 25px;">{{__('admin.message')}} / <small>{{__('admin.all_message')}} ( {{($count)}} )</small> </p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-content">
                        <table id="dataTableInbox" class="table table-hover" style="text-align: center">

                            <div class="row" style=" margin-bottom: -45px; margin-top:20px; float:left;">

                                <a class="dt-buttons btn-group btn btn-secondary"
                                   style="float: left !important; border-radius: 0px !important; margin-top: 22px; margin-left:14px;
                                    margin-bottom: 14px;"
                                   href="{{ url('exportInbox') }}">Excel </a>
                            </div>
                            {{-- <div class="row" style=" margin-right: 960px;margin-bottom: -77px;margin-top: 20px;margin-left: 10px;">
                                <button class="btn btn-primary  waves-effect waves-light" id="btnPrint"style="height: 39px;margin-left: 10px;margin-right: 5px"><i class="fa fa-print"></i>print</button>
                                <button class="btn btn-primary  waves-effect waves-light" id="btnExecl" style="height: 39;"><i class="fa fa-file-excel-o"></i>Excel</button>
                            </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">{{__('admin.address')}}</th>
                                    <th scope="col">{{__('admin.phone')}}</th>
                                    <th scope="col">{{__('admin.email')}}</th>
                                    <th scope="col">{{__('admin.massage_content')}}</th>
                                    <th scope="col">{{__('admin.options')}}</th>

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
      var table = $('#dataTableInbox').DataTable({
            autoWidth: true,
            responsive: true,
            "processing": true,
            "serverSide": true,
            dom: 'Bfrtip',

            "oLanguage": {
                "sSearch": "{{__('admin.search')}}",
            },

            destroy: true,
            "bInfo": false,
            buttons: [
                // {
                //     extend: 'print',
                // },
                // {
                //     extend: 'excel',
                // },
            ],
            "ajax": {
                "url": "{{ route('inbox.data') }}",
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
                    "data": "address"
                },
                {
                    "data": "phone"
                },
                {
                    "data": "email"
                },
                {
                    "data": "message"
                },
                {
                    "data": "action"
                },


            ],


        });

        {{--function reply_user_message(id) {--}}
        {{--    // var id = user_id.attr('user_id');--}}

        {{--    $.ajax({--}}
        {{--        headers: {--}}
        {{--            'X-Requested-With': 'XMLHttpRequest'--}}
        {{--        },--}}
        {{--        type: 'GET',--}}
        {{--        url: '{{ route('contact.us.reply') }}',--}}
        {{--        data: {--}}
        {{--            id: id,--}}

        {{--            _token: "{{ csrf_token() }}"--}}
        {{--        },--}}
        {{--        success: function(response) {--}}

        {{--            $('#edit_form_holder').html(response);--}}
        {{--            $('#kt_modal_edit_customer').modal('show');--}}

        {{--        }--}}
        {{--    });--}}

        {{--}--}}

</script>
@endsection
