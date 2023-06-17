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

                <p style="margin-right: 25px;"> {{__('admin.show_coupons')}}   </small> </p>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">
                    <br>
                                      <div class="row">
                                          <div class="col-9">


                                          </div>
                                          <div class="col-md-2 col-sm-1">
                                              <button  type="button" onclick="window.location='{{ route('coupons.all')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:135px;margin-left: 130px;">{{__('admin.back')}}</button>
                                          </div>
                                      </div>
                    <div class="card-body" style="margin-top: -40px">


                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="first-name-column">{{__('admin.name_coupons')}}</label>
                                        <input type="text" id="first-name-column" value="{{$coupon->code}}" disabled class="form-control" placeholder="{{__('admin.name_coupons')}}" name="code">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.number_coupons')}}</label>
                                        <input type="number" value="{{$coupon->number}}" class="form-control" disabled name="number" placeholder="{{__('admin.number')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="city-column">{{__('admin.start_date')}}</label>
                                        <input type="date" value="{{$coupon->start_date->format('Y-m-d')  }}" disabled class="form-control" placeholder="{{__('admin.start_date')}}" name="start_date">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.end_date')}}</label>

                                        <input type="date" value="{{ $coupon->end_date->format('Y-m-d')}}" disabled class="form-control" name="end_date" placeholder="{{__('admin.end_date')}}">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label class="form-label" for="select2-multiple">{{__('admin.coupon_type')}}</label>
                                    <div class="position-relative">
                                        <select class="select2 form-select select2-hidden-accessible" name="type[]" disabled id="select2-multiple" multiple=""  data-select2-id="select2-multiple" tabindex="-1" aria-hidden="true">

                                            <optgroup label="All order">
                                                <option value="0" {{ in_array("0",$couponProducts)?'selected':''}}>All order</option>
                                            </optgroup>
                                            <optgroup label="Product">

                                                @foreach ($products as $product)
                                                    <option  value="{{ $product->id }}" {{ in_array($product->id , $couponProducts) ?'selected':''}}>{{ $product->serial_number }}</option>
                                                @endforeach

                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="country-floating">{{__('admin.type_value_coupons')}}</label>
                                        <div class="demo-inline-spacing" @if(\Illuminate\Support\Facades\App::isLocale('ar')) style="margin-top: -13;" @endif>
                                            <div class="form-check form-check-inline col-4">
                                                <input type="number" value="{{$coupon->value}}" class="form-control"  disabled name="value" placeholder="{{__('admin.value_coupons')}}">

                                            </div>
                                            <div class="form-check form-check-inline col-3 ">
                                                <input class="form-check-input" type="radio" name="type_value_coupons" disabled id="inlineRadio1" value="0"{{  ($coupon->type_value == 0 ? ' checked' : '') }}>
                                                <label class="form-check-label" for="inlineRadio1">{{__('admin.coupon_percentage')}}</label>
                                            </div>
                                            <div class="form-check form-check-inline  col-3">
                                                <input class="form-check-input" type="radio" name="type_value_coupons"  disabled id="inlineRadio2" value="1"{{ ($coupon->type_value == 1 ? ' checked' : '') }}>
                                                <label class="form-check-label" for="inlineRadio2">{{__('admin.coupon_amount')}}</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <label class="form-label" for="country-floating">{{__('admin.status_coupons')}}</label>
                                    <div class="demo-inline-spacing">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio3"  disabled value="{{1}}" {{ ($coupon->status == 1 ? ' checked' : '') }}>
                                            <label class="form-check-label" for="inlineRadio3">{{__('admin.active')}}</label>
                                        </div>
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="status" id="inlineRadio4" disabled value="{{0}}" {{($coupon->status == 0 ? ' checked' : '') }}>
                                            <label class="form-check-label" for="inlineRadio4">{{__('admin.inactive')}}</label>
                                        </div>

                                    </div>

                                </div>

                            </div>

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
