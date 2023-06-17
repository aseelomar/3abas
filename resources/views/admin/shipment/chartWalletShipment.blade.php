@extends('layouts.app')

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
        margin-top: 17px;
    }
    .form-control-sm {
        margin-right: 10px;
    }
    .sticky+.content {
        padding-top: 99px;
    }
    .buttons-excel ,.print_btn{
        border-radius: 0 !important;
    }
    /*
        .buttons-excel {
            border-radius: 0px !important;
        } */
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
<style>
    /* .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn-group:not(:last-child) > .btn {
    display: none;
   }
   .btn-group > .btn:not(:first-child), .btn-group > .btn-group:not(:first-child) > .btn {
    display: none;
   } */

</style>
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/colors/palette-gradient.css')}}">
@section('content')

    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> <small> @lang('admin.wallet') / {{__('admin.total_final')}}:{{@$total}} </small><i class="fa-solid fa-d"></i></p>
        </div>
    </div>
    <section id="chartjs-charts">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

        <div class="card-header">
            <h4 class="card-title">اختر تاريخ لعرض الايرادات</h4>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form-horizontal error" id="filterChart"  method="POST" action="{{route('shipment.chartFilterShipmentOrder')}}">
                    @csrf
                    <div class="row">
                    <div class="col-4">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <span>{{__('admin.date_from')}}</span>
                            </div>
                            <div class="col-md-8">
                                <input type="date" value="{{isset($dateFrom) ? $dateFrom: '' }}" class="form-control" placeholder="{{__('admin.date_from')}}" name="dateFrom">

                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <span>{{__('admin.date_to')}}</span>
                            </div>
                            <div class="col-md-8">
                                <input  name="id" value="{{@$id}}" hidden>
                                <input type="date" value="{{isset($dateTo) ? $dateTo : '' }}" class="form-control" placeholder="{{__('admin.date_to')}}" name="dateTo">

                            </div>
                        </div>
                    </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-primary waves-effect filterChart waves-light">Submit</button>

                        </div>
                    </div>



                </form>

            </div>
        </div>
<hr style="color: black;">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" >{{__('admin.monthly_revenue')}}</h4>
            </div>
            <div class="card-content">
                <div class="card-body pl-0">
                    <div class="height-400 shopping-basket" style="    text-align: -webkit-center;">
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
        </div>
    </div>
    </div>
</section>

@endsection

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{--<script src="{{asset('app-assets/vendors/js/charts/chart.min.js')}}"></script>--}}

{{--<script src="{{asset('app-assets/js/scripts/charts/chart-chartjs.js')}}"></script>--}}
    <script>

        var labels =  {{ Js::from($labels) }};
        var users =  {{ Js::from($data) }};

        var grid_line_color = '#7367F0';


        // Chart Data
        const data = {
            labels: labels,
            datasets: [{
                label: "{{__('admin.monthly_revenue')}}",
                data: users,
                backgroundColor: grid_line_color,
                borderColor: "transparent"
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };


        const myChart = new Chart(
            document.getElementById('bar-chart'),
            config
        );


        $('.filterChart').click(function (e) {

                    e.preventDefault();
                    var form = document.getElementById('filterChart');
                    var url = form.getAttribute('action');
                    var data = new FormData(form)

                    $.ajax({
                               url: url,
                               method:'POST',
                               data: data,
                               dataType: 'JSON',
                               contentType: false,
                               cache: false,
                               processData: false,
                               success:function(response)
                               {
                                   console.log(myChart)
                                   myChart.config.data.datasets[0].data = response.data;
                                   myChart.config.data.labels = response.labels;
                                   myChart.update();


                               },
                               error: function(response) {

                                   $.each(response.responseJSON.errors, function(k, v) {
                                       display_error_messages('error', v[0])
                                   });
                               }
                           });
                });


        function display_error_messages(type, msg) {

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (type == 'error') {
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
    </script>
        <script>
            function goBack() {
            window.history.back();
        }
    </script>


@endsection
