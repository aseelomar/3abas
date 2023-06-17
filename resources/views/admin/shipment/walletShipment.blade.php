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
    /*
        .buttons-excel {
            border-radius: 0px !important;
        } */
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
            <p style="margin-right: 25px;"> <small> @lang('admin.wallet') / {{__('admin.total_final')}} : {{$total}}</small><i class="fa-solid fa-d"></i></p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">
                    <table id="dataTableWallet" class="table table-hover" style="text-align: center">
                        <div class="row" style="margin-top:20px; float:left;">

{{--                            <button type="submit" style="   border-radius: 0 !important;  @if(\Illuminate\Support\Facades\App::isLocale('en')) @endif "--}}
{{--                                    class="btn btn-primary  waves-effect waves-light">--}}
{{--                                <a class="white" href="{{route('client.create')}}">  {{__('admin.add_new_client')}}</a>--}}
{{--                            </button>--}}


                            {{-- <button class="btn btn-primary  waves-effect waves-light" id="btnPrint"style="height: 39px;margin-left: 10px;margin-right: 5px"><i class="fa fa-print"></i>print</button> --}}
                            {{-- <button class="btn btn-primary  waves-effect waves-light" id="btnExecl" style="height: 39;"><i class="fa fa-file-excel-o"></i>Excel</button> --}}
                        </div>

                        <thead>
                        <tr>
                            <th width="20px"> {{__('admin.id')}} </th>
                            <th width="20px">{{__('admin.number_order')}} </th>
                            <th width="20px"> {{__('admin.product_name')}} </th>
                            <th width="20px">{{__('admin.total')}}  </th>



                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($wallet as $item)

                            <tr>
{{--                                <td style="display:none;">{{ $item->id }}</td>--}}
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->number_order}}</td>
                                <td>@include('admin.shipment.parts.btnProduct',['id'=> $item->id])</td>
                                <td>{{$item->total}}</td>

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
        var table = $('#dataTableWallet').DataTable({
                                                         autoWidth: true,
                                                         responsive: true,
                                                         // "processing": true,
                                                         // "serverSide": true,
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
