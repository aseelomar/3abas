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
                    <form class="form form-horizontal" method="POST" id="edit-shipment" action="{{ route('shipment.update') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="first-name-column">{{__('admin.name_shipment')}}</label>
                                    <input type="text" id="first-name-column" value="{{$shipment->name}}" class="form-control" placeholder="{{__('admin.name_shipment')}}" name="name">
                                    <input hidden value="{{$shipment->id}}" name="id">
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="country-floating">{{__('admin.country')}}</label>
                                    <select class="select2 form-select select2-hidden-accessible" name="country_id"   tabindex="-1" aria-hidden="true">


                                        <optgroup label="All country">
                                            {{-- <option value="0" {{ $country ?'selected':''}}></option> --}}
                                        </optgroup>

                                        @foreach ($country as $c)
                                            <option  value="{{ $c->id }}" {{ $c->id == $shipment->country_id ?'selected':''}}>{{ $c->country_name }}</option>
                                        @endforeach

                                    </select>                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-1">
                                    <label class="form-label" for="city-column">{{__('admin.mobile')}}</label>
                                    <input type="text" value="{{$shipment->mobile}}" class="form-control" placeholder="{{__('admin.mobile')}}" name="mobile">
                                </div>
                            </div>

                            <div class="col-12" style="margin-top: 25px">
                                <button type="submit" id="edit" class="btn btn-primary me-1 waves-effect waves-float waves-light save">
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
