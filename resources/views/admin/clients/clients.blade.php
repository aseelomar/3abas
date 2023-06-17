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

    .buttons-excel,
    .print_btn {
        border-radius: 0 !important;
    }


    .buttons-excel {
        border-radius: 0px !important;

        @if (\Illuminate\Support\Facades\App::isLocale('en'))margin-top: 20px;
        @endif
    }

    @if (\Illuminate\Support\Facades\App::isLocale('en')).buttons-excel {
        border-radius: 0px !important;

    }

    @endif
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
<style>
    /* .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn-group:not(:last-child) > .btn {

    display: none;
   }

   .btn-group > .btn:not(:first-child), .btn-group > .btn-group:not(:first-child) > .btn {

    display: none;
   } */
</style>
@section('content')
    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> <small> @lang('admin.clients') / @lang('admin.all_clients') ({{ count($clients) }}) </small>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive" id="table">
                    <table id="dataTableClients" class="table table-hover" style="text-align: center">

                        <thead>

                            <div class="row" style="margin-top:20px; float:left;">

                                <button type="submit" style="   border-radius: 0 !important;  "
                                    class="btn btn-primary col-xl-12 waves-effect waves-light">
                                    <a class="white col-xl-12" href="{{ route('client.create') }}">
                                        {{ __('admin.add_new_client') }}</a>
                                </button>

                            </div>
                            <tr>
                                <th width="20px"> {{ __('admin.id') }} </th>
                                <th width="20px">{{ __('admin.name') }} </th>
                                <th width="20px"> {{ __('admin.email') }} </th>
                                {{-- <th width="20px">{{__('admin.type')}} </th> --}}
                                <th width="20px">{{ __('admin.mobile') }} </th>
                                <th width="20px">{{ __('admin.location') }} </th>
                                <th width="20px">{{ __('admin.country_id') }} </th>
                                <th width="20px">{{ __('admin.action') }} </th>


                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($clients as $user)
                                <tr>
                                    <td class="but-click"
                                        onclick="update_client( {{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $loop->iteration }}</td>

                                    <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->name }}</td>

                                    <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->email }}</td>

                                    {{-- <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->type }}</td> --}}

                                    <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->mobile }}</td>

                                    <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        {{ $user->location }}</td>

                                    <td class="but-click"
                                        onclick="update_client({{ $user }} , this.parentNode.querySelector('td')) ;">
                                        @isset($user->country)
                                            {{ $user->country->country_name }}
                                        @endisset
                                    </td>


                                    <td>
                                        <a href="{{ route('client.edit', 'id=' . $user->id) }}">
                                            <i class="fa fa-edit" aria-hidden="true"></i>

                                            {{-- <a  href="{{route('client.delete','id='.$user->id)}}" > --}}
                                            <a>
                                                <i onclick="deletefunc({{ $user->id }})" style="color: red"
                                                    class="fa fa-trash" aria-hidden="true"></i>
                                    </td>





                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var table = $('#dataTableClients').DataTable({
            autoWidth: true,
            responsive: true,

            dom: 'Bfrtip',

            "oLanguage": {
                "sSearch": "{{ __('admin.search') }}",
            },

            destroy: true,
            "bInfo": false,
            buttons: [{
                extend: 'excel',
            }, ],

        });


        function deletefunc(id) {
            // alert(id);
            $.ajax({

                url: "{{ route('client.delete') }}",
                type: 'get',
                data: {
                    id: id

                }, //<-----this should be an object.
                contentType: 'application/json', // <---add this
                dataType: 'text', // <---update this
                success: function(resp) {
                    // alert(resp);
                    console.log(resp);
                    $("#table").load(location.href + " #table");
                    // resp = JSON.stringify(resp);
                    display_error_messages('success', resp);
                    // table.ajax.reload();


                    // display_error_messages('success', resp.message)

                }
            });
        }



        function display_error_messages(type, msg) {
            console.log(msg);

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
                console.log(type);
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
    </script>
@endsection
