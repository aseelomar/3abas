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

                <p style="margin-right: 25px;"> {{__('admin.coupons')}} / <small>{{__('admin.new_coupons')}}  </small> </p>


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
                            <button  type="button" onclick="window.location='{{ route('coupons.all')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:135px;margin-left: 130px;">{{__('admin.back')}}</button>
                        </div>
                    </div>
                    <div class="card-body" style="margin-top: -40px">
                        <form class="form form-horizontal" method="POST" id="add-new-coupon" action="{{ route('coupons.store') }}">
                            @csrf

                            <div class="row">
                                   <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">{{__('admin.name_coupons')}}</label>
                                        <input type="text" id="first-name-column" value="{{old('code')}}" class="form-control" placeholder="{{__('admin.name_coupons')}}" name="code">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.number_coupons')}}</label>
                                        <input type="number" value="{{old('number')}}" class="form-control" name="number" placeholder="{{__('admin.number')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">{{__('admin.start_date')}}</label>
                                        <input type="date" value="{{old('start_date')}}" class="form-control" placeholder="{{__('admin.start_date')}}" name="start_date">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.end_date')}}</label>
                                        <input type="date" value="{{old('end_date')}}" class="form-control" name="end_date" placeholder="{{__('admin.end_date')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-multiple">{{__('admin.coupon_type')}}</label>
                                    <div class="position-relative">
                                        <select class="select2 form-select select2-hidden-accessible" name="type[]"  id="select2-multiple" multiple=""  data-select2-id="select2-multiple" tabindex="-1" aria-hidden="true">
                                            <optgroup label="All order">
                                                <option value="0" >All order</option>
                                            </optgroup>
                                            <optgroup label="Product">

                                                @foreach ($products as $product)
                                                        <option  value="{{ $product->id }}">{{ $product->serial_number }}</option>
                                                    @endforeach

                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.type_value_coupons')}}</label>
                                        <div class="demo-inline-spacing" @if(\Illuminate\Support\Facades\App::isLocale('ar')) style="" @endif>
                                            <div class="form-check form-check-inline col-4">
                                                <input type="number" value="{{old('value')}}" class="form-control" name="value" placeholder="{{__('admin.value_coupons')}}">

                                            </div>
                                            <div class="form-check form-check-inline col-3 ">
                                                <input class="form-check-input" type="radio" name="type_value_coupons" id="inlineRadio1" value="0" checked="">
                                                <label class="form-check-label" for="inlineRadio1">{{__('admin.coupon_percentage')}}</label>
                                            </div>
                                            <div class="form-check form-check-inline  col-3">
                                                <input class="form-check-input" type="radio" name="type_value_coupons" id="inlineRadio2" value="1">
                                                <label class="form-check-label" for="inlineRadio2">{{__('admin.coupon_amount')}}</label>
                                            </div>

                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                        <label class="form-label" for="country-floating">{{__('admin.status_coupons')}}</label>
                                        <div class="demo-inline-spacing">
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="1" checked="">
                                                <label class="form-check-label" for="inlineRadio3">{{__('admin.active')}}</label>
                                            </div>
                                            <div class="form-check form-check-inline ">
                                                <input class="form-check-input" type="radio" name="status" id="inlineRadio4" value="0">
                                                <label class="form-check-label" for="inlineRadio4">{{__('admin.inactive')}}</label>
                                            </div>

                                        </div>

                                </div>
                                <div class="col-12" style="margin-top: 25px">
                                    <button type="submit" id="add-coupon" class="btn btn-primary me-1 waves-effect waves-float waves-light save">
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


    <script src="/admin/coupon.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Coupon.init();
        });

    </script>
@endsection
