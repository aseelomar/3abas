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

    .buttons-excel ,.print_btn{
        border-radius: 0 !important;
    }


    .buttons-excel {
        border-radius: 0px !important;

        @if(\Illuminate\Support\Facades\App::isLocale('en'))

margin-top: 20px;


    @endif

}

    @if(\Illuminate\Support\Facades\App::isLocale('en'))
          .buttons-excel {[]
        border-radius: 0px !important;

    }
    @endif
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
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
            <p style="margin-right: 25px;"> <small> @lang('admin.rate') /  {{ @$count}} </small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive" id="table">
                    <table id="dataTableRates" class="table table-hover" style="text-align: center">

                        <thead>


                        <tr>
                            <th width="20px"> {{__('admin.id')}} </th>
                            <th width="20px">{{__('admin.user_name')}} </th>
                            {{-- <th width="20px">{{__('admin.type')}} </th> --}}
                            <th width="20px">{{__('admin.rate')}}  </th>
                            <th width="20px">{{__('admin.review')}}  </th>
                            <th width="20px">{{__('admin.status')}} </th>


                        </tr>
                        </thead>
                        <tbody>


                        @foreach (@$rates as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{@$item->user->name}}</td>
                                <td>{{@$item->rate_value}}</td>
                                <td>{{@$item->comment}}</td>

                                <td>{{@$item->status}}</td>

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

        var table = $('#dataTableRates').DataTable({
                                                         autoWidth: true,
                                                         responsive: true,

                                                         dom: 'Bfrtip',

                                                         "oLanguage": {
                                                             "sSearch": "{{__('admin.search')}}",
                                                         },

                                                         destroy: true,
                                                         "bInfo": false,
                                                         buttons: [
                                                             {
                                                                 extend: 'excel',
                                                             },
                                                         ],

                                                     });






    </script>
@endsection
