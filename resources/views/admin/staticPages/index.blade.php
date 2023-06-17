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
        @if(\Illuminate\Support\Facades\App::isLocale('en'))

margin-top: 20px;


    @endif
}

    .print_btn {
        display: none !important;
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
            <p style="margin-right: 25px;"> {{ __('admin.pages') }} / <small> {{ __('admin.pages') }} ({{$count}})</small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">
                    <table id="dataTablePages" class="table table-hover" style="text-align: center">
                        <div class="row" style="margin-top:20px; float:left;">
                            <button type="submit" style="  @if (\Illuminate\Support\Facades\App::isLocale('en'))  @endif "
                                class="btn btn-primary  waves-effect waves-light">
                                <a class="white" href="{{ route('page.create') }}"> @lang('admin.add_page')</a>
                            </button>
                        </div>
                        <thead>
                            <tr>
                                <th width="20px"> {{ __('admin.id') }} </th>
                                <th width="20px"> {{ __('admin.title_ar') }} </th>
                                <th width="20px"> {{ __('admin.title_en') }} </th>
                                <th width="20px"> {{ __('admin.body_ar') }} </th>
                                <th width="20px"> {{ __('admin.body_en') }} </th>
                                <th width="20px"> {{ __('admin.page_image') }} </th>
                                <th width="20px"> {{ __('admin.action') }} </th>
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

    </script>
    <script>
        var table = $('#dataTablePages').DataTable({
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
            "ajax": {
                "url": "{{ route('page.data') }}",
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
                    "data": "page_title_ar"
                },
                {
                    "data": "page_title_en"
                },
                {
                    "data": "page_body_ar"
                },
                {
                    "data": "page_body_en"
                },
                {
                    "data": "page_image"
                },

                {
                    "data": "action"
                },


            ],

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
                    size = [];

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

        function deletefunc(id) {
            $.ajax({

                url: "{{ route('page.delete') }}",
                type: 'get',
                data: {
                    id:id

                }, //<-----this should be an object.
                contentType: 'application/json', // <---add this
                dataType: 'text', // <---update this
                success: function(resp) {
                    // alert(resp);
                    table.ajax.reload();
                    display_error_messages('success',resp)
                    // display_error_messages('success', resp.message)

                },
                error: function(resp) {
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
