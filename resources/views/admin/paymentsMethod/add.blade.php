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

            <p style="margin-right: 25px;"> {{__('admin.paymentsMethod')}} / <small>{{__('admin.new_paymentsMethod')}}  </small> </p>


        </div>

    </div>

    <div class="row">


        <div class="col-lg-12 ">

            <div class="card">
                <br>
                <div class="row">
                    <div class="col-md-9  col-sm-1">


                    </div>
                    <div class="col-md-2  col-sm-1">
                        <button  type="button" onclick="window.location='{{ route('paymentsMethod.all')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:170px;margin-left: 165px;">{{__('admin.back')}}</button>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -40px">
                    <form class="form form-horizontal" method="POST" id="payment_method_form" action="{{ route('paymentsMethod.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{__('admin.title_ar')}}</label>
                                    <input type="text" id="first-name-column" value="{{old('title_ar')}}" class="form-control" placeholder="{{__('admin.title_ar')}}" name="title_ar">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">{{__('admin.title_en')}}</label>
                                    <input type="text" value="{{old('title_en')}}" class="form-control" name="title_en" placeholder="{{__('admin.title_en')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">{{__('admin.value-payment')}}</label>
                                    <input type="text" value="{{old('value')}}" class="form-control" name="value" placeholder="{{__('admin.value-payment')}}">
                                </div>
                            </div>
                       <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">{{__('admin.rank')}}</label>
                                    <input type="number" value="{{old('rank')}}" class="form-control" name="rank" placeholder="{{__('admin.rank')}}">
                                </div>
                            </div>


                            <div class="col-md-6 col-12">
                                <label class="form-label" for="country-floating">{{__('admin.status')}}</label>
                                <div class="demo-inline-spacing">
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="visible" id="inlineRadio3" value="1" checked="">
                                        <label class="form-check-label" for="inlineRadio3">{{__('admin.active')}}</label>
                                    </div>
                                    <div class="form-check form-check-inline ">
                                        <input class="form-check-input" type="radio" name="visible" id="inlineRadio4" value="0">
                                        <label class="form-check-label" for="inlineRadio4">{{__('admin.inactive')}}</label>
                                    </div>

                                </div>

                            </div>
                            <div class="col-12" style="margin-top: 25px">
                                <button type="submit" id="add-payment-method" class="btn btn-primary me-1 waves-effect waves-float waves-light save">
                                    {{__('admin.submit')}}</button>
                                <button id="reset-coupon" type="reset" class="btn btn-outline-secondary waves-effect "> {{__('admin.reset')}}</button>
                            </div>
                        </div>
                    </form>
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
