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

                <p style="margin-right: 25px;">{{__('admin.orders')}} / <small>{{__('admin.all_order_delivery')}} </small> </p>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">
                    <div class="table-responsive">
                        <table id="dataTableOrder" class="table table-hover" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>

                                <th scope="col">{{__('admin.number_order')}}</th>
                                <th scope="col">{{__('admin.customers_name')}}</th>
                                <th scope="col">{{__('admin.country')}}</th>
                                <th scope="col">{{__('admin.phone')}}</th>
                                <th scope="col">{{__('admin.product_name')}}</th>
                                <th scope="col">{{__('admin.order_status')}}</th>
                                <th scope="col">{{__('admin.payment_method')}}</th>
                                <th scope="col">{{__('admin.shipment')}}</th>
                                <th scope="col">{{__('admin.created_at')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(@$order as $item)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <th>{{@$item->number_order}}</th>
                                    <th>{{@$item->user->name}}</th>
                                    <th>{{@$item->country}}</th>
                                    <th>{{@$item->phone}}</th>
                                    <td>@include('admin.orders.parts.btnProduct',['id'=> $item->id])</td>
                                    <td>@include('admin.orders.parts.btnStatus',['status'=> $item->status_id , 'name'=>$item->status->name])</td>
                                    <th>{{@$item->paymentMethod->name}}</th>
                                    <th>{{@$item->shipment->name}}</th>

                                    <th>{{Carbon\Carbon::parse( @$item->created_at )->toDateTimeString()}}</th>

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

@endsection
