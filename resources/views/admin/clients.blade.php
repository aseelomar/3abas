@extends('layouts.app')

<style>
    .dataTables_filter{
        float: right !important;
        padding: 10px;
    }

    .form-control-sm{
        margin-right: 10px;
    }

    .sticky + .content {
        padding-top: 99px;
    }

    .buttons-excel{
        border-radius: 0px!important;

    }

</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

        <div class="row" >
            <div class="col-8">

                <p style="margin-right: 25px;">{{__('admin.customers')}} / <small>{{__('admin.customers_all')}} ({{count($clients)}})</small> </p>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    {{--                <div class="card-header d-flex justify-content-between align-items-end">--}}
                    {{--                </div>--}}
                    <div class="table-responsive">
                        <table id="dataTableClients" class="table table-hover" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('admin.customers_name')}}</th>
                                <th scope="col">{{__('admin.phone')}}</th>
                                <th scope="col">{{__('admin.email')}}</th>
                                <th scope="col">{{__('admin.city')}}</th>
                                <th scope="col">{{__('admin.address')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>أحمد عبد الله</td>
                                <td>000000</td>
                                <td>ahmed@abdallah.com</td>
                                <td>المملكة العربية السعودية</td>
                                <td>الرياض - الشارع السابع بجوار برج العين
                                    <a href=""><i class="feather icon-map-pin"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>خليل صالح</td>
                                <td>000000</td>
                                <td>ahmed@abdallah.com</td>
                                <td>المملكة العربية السعودية</td>
                                <td>جدة - الشارع السابع بجوار برج العين
                                    <a href=""><i class="feather icon-map-pin"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>محمود سليم</td>
                                <td>000000</td>
                                <td>ahmed@abdallah.com</td>
                                <td>المملكة العربية السعودية</td>
                                <td>الدمام - الشارع السابع بجوار برج العين
                                    <a href=""><i class="feather icon-map-pin"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $('#dataTableClients').DataTable();
        });
    </script>
    <script>
        var table = $('#dataTableClients').DataTable({
            autoWidth : true,
            responsive: true,
            dom: 'Bfrtip',

            "oLanguage": {
                "sSearch": "بحث",
            },

            destroy: true,
            "bInfo" : false,
            buttons: [
                {extend: 'print',},
                {extend: 'excel',},
            ],
        });
    </script>
@endsection
