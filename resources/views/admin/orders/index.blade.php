@extends('layouts.app')
@section('css')




@endsection

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky + .content {
        padding-top: 99px;
    }

    .dt-buttons {
        float: right;
    }

    .print_btn{
       display:none !important;
    }
    .excel_btn{
        display:none !important;
    }


</style>
<style> #toast-container > .toast-error {
        background-color: #BD362F;
    } </style>
<style> #toast-container > .toast-success {
        background-color: #2dc45a;
    } </style>
@section('content')


    <div class="row">

        <div class="col-lg-12 ">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="form-label-group">
                                    <select class="form-control m-bootstrap-select" id="status">
                                        <option value=""> {{__('admin.all')}}</option>

                                        @foreach ($status as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach

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
                                                   href="{{ url('exportOrder') }}">Excel </a>

                                            </div>

                                    </div>
                            </div>
                          <div class="table-responsive">
                        <table id="table_order" class="table  display  table-hover" style="text-align: center">


                            <thead style="margin-top: 30px !important;">
                               <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">{{__('admin.number_order')}}</th>
                                    <th scope="col">{{__('admin.customers_name')}}</th>
                                    <th scope="col">{{__('admin.phone')}}</th>
                                    <th scope="col">{{__('admin.country')}}</th>
                                    <th scope="col">{{__('admin.product_name')}}</th>
                                    <th scope="col">{{__('admin.payment_method')}}</th>
                                    <th scope="col">{{__('admin.transfer_at')}}</th>
                                    <th scope="col">{{__('admin.created_at')}}</th>
                                    <th scope="col">{{__('admin.name_shipment')}}</th>
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
    @include('admin.orders.parts.modelRejectMassage')
    @include('admin.orders.parts.modalChooseShipping')


@endsection

@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('admin/order.js') }}" type="text/javascript"></script>
    <script>


        $(document).ready(function () {
            Order.init();

        });

    </script>




@endsection
