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

 .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn-group:not(:last-child) > .btn {

display: inline;
}

.btn-group > .btn:not(:first-child), .btn-group > .btn-group:not(:first-child) > .btn {

display: inline;
}

.excel_btn {
    border-radius: 0 !important;
    margin: 0px !important;
    display: none !important;

}



</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;">{{__('admin.shipment')}} / <small>{{__('admin.all_shipment')}}({{$count}} )</small> </p>


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="form-label-group">
                                    <select class="form-control m-bootstrap-select" id="status">
                                        <option value="">{{__('admin.all')}}</option>
                                        <option value="1">{{__('admin.active')}}</option>
                                        <option value="0">{{__('admin.inactive')}}</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-label-group">
                                    <input name="title" type="search" class="form-control m-input"  placeholder="{{ trans('admin.search') }}..." id="generalSearch">
                                    <label for="last-name-column">{{ trans('admin.search') }}</label>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-0"></div>

                            <div class="col-md-3 col-12">
                                @if(\Illuminate\Support\Facades\App::isLocale('ar'))
                                    <div class="row" style="float:left;  ">
                                        @else
                                            <div class="row" style="float:right; ">
                                                @endif
                                                <a class=" btn mr-1 mb-1 btn-secondary"
                                                   style="border-radius: 0px !important; margin: 0px !important;"
                                                   href="{{ url('exportShipment') }}">Excel </a>
                                                <button  onclick="window.location='{{route('shipment.add')}}'" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" style="border-radius: 0px !important;margin: 0px !important;">  {{__('admin.add_shipment')}}</button>

                                            </div>

                                    </div>
                            </div>


                    <div class="table-responsive">
                        <table id="table_shipment" class="table  display nowrap table-hover" style="text-align: center">


                            <thead style="margin-top: 30px !important;">
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">{{__('admin.name')}}</th>
                                <th scope="col">{{__('admin.country')}}</th>
                                <th scope="col">{{__('admin.mobile')}}</th>
                                <th scope="col">{{__('admin.wallet')}}</th>
                                <th scope="col">{{__('admin.created_at')}}</th>
                                <th scope="col">{{__('admin.status')}}</th>
                                <th scope="col">{{__('admin.action')}}</th>

                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')

    <script src="/admin/shipment.js" type="text/javascript"></script>


    <script>
        $(document).ready(function () {
            Shipment.init();
        });

    </script>




@endsection
