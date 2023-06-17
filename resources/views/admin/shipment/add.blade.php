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

            <p style="margin-right: 25px;"> {{__('admin.shipment')}} / <small>{{__('admin.new_shipment')}}  </small> </p>


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
                        <button  type="button" onclick="window.location='{{ route('shipment.all')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:178px;margin-left: 171px;">{{__('admin.back')}}</button>
                    </div>
                </div>
                <div class="card-body" style="margin-top: -40px">
                    <form class="form form-horizontal" method="POST" id="add-new-shipment" action="{{ route('shipment.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{__('admin.name_shipment')}}</label>
                                    <input type="text" id="first-name-column" value="{{old('name')}}" class="form-control" placeholder="{{__('admin.name_shipment')}}" name="name">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">{{__('admin.country')}}</label>
                                    <select class="select2" name="country_id" tabindex="-1" aria-hidden="true">
                                        <optgroup label="جرب البحث">
                                            @foreach ($country as $c)
                                                <option value="{{$c->id}}">{{ $c->country_name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city-column">{{__('admin.email')}}</label>
                                    <input type="email" value="{{old('email')}}" class="form-control" placeholder="{{__('admin.email')}}" name="email">
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city-column">{{__('admin.password')}}</label>
                                    <input type="password" value="{{old('password')}}"  class="form-control" placeholder="{{__('admin.password')}}" name="password">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city-column">{{__('admin.mobile')}}</label>
                                    <input type="text" value="{{old('mobile')}}" class="form-control" placeholder="{{__('admin.mobile')}}" name="mobile">
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


    <script src="/admin/shipment.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {
            Shipment.init();
        });

    </script>
@endsection
