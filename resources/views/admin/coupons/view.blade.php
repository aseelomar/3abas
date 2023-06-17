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
    margin-top: 25px  !important;
        display: none !important;
}


</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')



        <div class="row">
            <div class="col-8">
                <p style="margin-right: 25px;"> <small> @lang('admin.coupon')  @lang('admin.all_coupon') / ({{ $count }}) </small> </p>
            </div>
        </div>

        <div class="row">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="col-md-2 col-12">
                                                    <div class="form-label-group">
                                                        <select class="form-control m-bootstrap-select" id="status">
                                                                <option value="">{{__('admin.all')}}</option>
                                                                <option value="1">{{__('admin.active')}}</option>
                                                                <option value="0">{{__('admin.inactive')}}</option>
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
                                                       href="{{ url('exportCoupon') }}">Excel </a>
                                                        <button  onclick="window.location='{{ route('coupons.add')}}'" class="btn btn-primary mr-1 mb-1 waves-effect waves-light" style="border-radius: 0px !important;margin: 0px !important;"> @lang('admin.add_coupons')</button>

                                                    </div>

                                            </div>
                                                </div>

                            <div class="table-responsive">
                                <table id="coupon_table" class="table  display nowrap table-hover"  style="text-align: center" >

                            <thead style="margin-top: 30px !important;">
                            <tr>
                                <th width="10px">  {{__('admin.id')}} </th>
                                <th width="20px">  {{__('admin.name_coup')}} </th>
                                <th width="9%">  {{__('admin.start_date')}} </th>
                                <th width="9%">  {{__('admin.end_date')}} </th>
                                <th width="20px">  {{__('admin.number_coup')}} </th>
                                <th width="20px"> {{__('admin.type_value_coup')}} </th>
                                <th width="20px"> {{__('admin.value_coup')}} </th>
                                <th width="20px"> {{__('admin.create_by')}}  </th>
                                <th width="20px"> {{__('admin.create_at')}}  </th>
                                <th width="20px"> {{__('admin.status_coup')}}  </th>
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
    <script src="/admin/coupon.js" type="text/javascript"></script>

    <script>
        $(document).ready(function () {

            Coupon.init();
        });
    </script>

@endsection
