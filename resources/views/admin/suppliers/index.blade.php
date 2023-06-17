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
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;">{{__('admin.supplier')}} / <small>{{__('admin.supplier_count')}} ({{count($suppliers)}})</small> </p>


        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 ">
            <div class="card">
                <div class="table-responsive">
                    <table id="dataTableClients" class="table table-hover" style="text-align: center">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{__('admin.supplier_name')}}</th>
                            <th scope="col">{{__('admin.trade_name')}}</th>
                            <th scope="col">{{__('admin.representative_name')}}</th>
                            <th scope="col">{{__('admin.representative_phone')}}</th>
                            <th scope="col">{{__('admin.company_phone')}}</th>
                            <th scope="col">{{__('admin.pay_method')}}</th>
                            <th scope="col">{{__('admin.action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suppliers as $key=>$supplier)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$supplier->supplier_name}}</td>
                            <td>{{$supplier->trade_name}}</td>
                            <td>{{$supplier->representative_name}}</td>
                            <td>{{$supplier->representative_phone}}</td>
                            <td>{{$supplier->company_phone}}</td>
                            <td>{{$supplier->Methods->title_ar ?? '--'}}</td>
                            <td>

                                <a href="{{url('admincp/supplier/delete?id='. $supplier->id)}}" class="del_but">
                                    <i class="feather icon-trash-2" style="color: red" ></i>
                                </a>
                                <a href="{{url('admincp/supplier/edit?id='. $supplier->id)}}" class="upd_but">
                                    <i class="feather icon-settings" ></i>
                                </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card-content">
                    <br>
                    <div class="col-6">
                        <p style="margin-right: 25px;" id="store_btn">
                            <button type="submit" style="margin-right: 25px;" class="btn btn-primary  mr-5">
                                <a class="white" href="{{ route('product.supplier.create') }}">
                                    @lang('admin.add_supplier')</a></button>
                        </p>

                    </div>


                </div>

            </div>
        </div>
    </div>



@endsection

@section('js')

@endsection
