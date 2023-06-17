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

    .buttons-excel ,.print_btn{
    border-radius: 0 !important;
    margin-top: 15px  !important;
}



/*
    .print_btn{
        display:none !important;
    }*/
    .excel_btn{
        display:none !important;
    }

</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')



    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;">  {{__('admin.paymentsMethod')}} / <small> {{__('admin.all_paymentsMethod')}} ({{count($payment)}}) </small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                    <div class="row">

                        <div class="col-md-3 col-12">
                            <div class="form-label-group">
                                <input name="title" type="search" class="form-control m-input"  placeholder="{{ trans('admin.search') }}..." id="generalSearch">
                                <label for="last-name-column">{{ trans('admin.search') }}</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-0"></div>

                        <div class="col-md-3 col-12">
                            @if(\Illuminate\Support\Facades\App::isLocale('ar'))
                                <div class="row" style="float:left;  ">
                                    @else
                                        <div class="row" style="float:right; ">
                                            @endif
                                            <a class=" btn mr-1 mb-1 btn-secondary"
                                               style="border-radius: 0px !important; margin: 0px !important;"
                                               href="{{ url('exportPaymentMethod') }}">Excel </a>
                                            <button  onclick="window.location='{{route('paymentsMethod.add')}}'" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" style="border-radius: 0px !important;margin: 0px !important;"> {{__('admin.add_payment')}}</button>

                                        </div>

                                </div>
                        </div>
                    <div class="table-responsive">
                        <table id="payment_table" class="table  display nowrap table-hover"  style="text-align: center">


                            <thead style="margin-top: 30px !important;">
                            <tr>

                                <th width="10px">  {{__('admin.id')}} </th>
                                <th width="20px">  {{__('admin.title_ar')}} </th>
                                <th width="9%">  {{__('admin.title_en')}} </th>
                                <th width="9%">  {{__('admin.value-payment')}} </th>
                                <th width="9%">  {{__('admin.rank')}} </th>
                                <th width="20px"> {{__('admin.created_at')}} </th>
                                <th width="20px"> {{__('admin.status')}} </th>
                                <th width="20px">  {{__('admin.action')}} </th>

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






@endsection

@section('js')


    <script src="{{'/admin/paymentMethod.js?v='. strtotime(now()) }}" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            PaymentMethod.init();
        });

    </script>

@endsection
