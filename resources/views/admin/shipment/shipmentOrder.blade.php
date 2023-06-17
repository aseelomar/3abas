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

    .print_btn{
        display:none !important;
    }
    .excel_btn{
        display:none !important;
    }


</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;">{{__('admin.orders')}} / <small>{{__('admin.all_orders')}} </small> </p>


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
                                    <select class="form-control m-bootstrap-select" id="statusOrder">
                                        <option value="" > {{__('admin.all')}}</option>

                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-label-group">
                                    <input name="title" type="search" class="form-control m-input" placeholder="{{ trans('admin.search') }}..." id="generalSearchOrder">
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
                                                   href="{{ route('shipment.exportShipmentOrder')}}">Excel </a>
                                            </div>
                                            </div>

                                    </div>




                    <div class="table-responsive">
                        <table id="table_shipment_order" class="table  display nowrap table-hover" style="text-align: center">
                            <input hidden value="{{ $shipment->id }}" id="shipmentId" name="shipmentId">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">{{__('admin.number_order')}}</th>
                                <th scope="col">{{__('admin.customers_name')}}</th>
                                <th scope="col">{{__('admin.phone')}}</th>
                                <th scope="col">{{__('admin.country')}}</th>
                                <th scope="col">{{__('admin.product_name')}}</th>
                                <th scope="col">{{__('admin.payment_method')}}</th>
                                <th scope="col">{{__('admin.created_at')}}</th>
                                <th scope="col">{{__('admin.order_status')}}</th>
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
        </div>
    </div>
    @include('admin.shipment.parts.modalForDelivery')


    <div>

</div>




@endsection

@section('js')



    <script src="/admin/shipment.js" type="text/javascript"></script>

    <script>


        $(document).ready(function () {
            Shipment.init();



        });

    </script>

    <script>

        $('#btnPrint').on('click', function() {
            document.getElementsByClassName('print_btn')[0].click();

        });
        $('#btnExecl').on('click', function() {
            document.getElementsByClassName('excel_btn')[0].click();

        });
    </script>

@endsection
