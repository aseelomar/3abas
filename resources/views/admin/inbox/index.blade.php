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



    .buttons-excel {
        border-radius: 0px !important;

    }
</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
@section('content')

        <div class="row">
            <div class="col-8">

                <p style="margin-right: 25px;">{{__('admin.orders')}} / <small>{{__('admin.all_orders')}} (2)</small> </p>


            </div>

        </div>

        <div class="row">

            <div class="col-lg-12 ">
                <div class="card">
                    <div class="table-responsive">
                        <table id="dataTableClients" class="table table-hover" style="text-align: center">
                            {{-- <div class="row" style=" margin-right: 960px;margin-bottom: -77px;margin-top: 20px;margin-left: 10px;">
                                <button class="btn btn-primary  waves-effect waves-light" id="btnPrint"style="height: 39px;margin-left: 10px;margin-right: 5px"><i class="fa fa-print"></i>print</button>
                                <button class="btn btn-primary  waves-effect waves-light" id="btnExecl" style="height: 39;"><i class="fa fa-file-excel-o"></i>Excel</button>
                            </div> --}}
                            <thead>
                                <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col">{{__('admin.phone')}}</th>
                                    <th scope="col">{{__('admin.email')}}</th>
                                    <th scope="col">{{__('admin.massage_content')}}</th>
                                    <th scope="col">{{__('admin.order_status')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>000000</td>
                                    <td>guest@guest.com</td>
                                    <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet cum, blanditiis velit maxime omnis animi odio dolore laboriosam quis exercitationem quam, fugit pariatur ducimus, quos fugiat! Cupiditate veritatis delectus praesentium inventore autem odio! Est accusamus itaque, tempore praesentium nulla similique. </td>
                                    <td style="color: #0066ff"> {{ __('admin.order_accept') }}</td>

                                </tr>



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>








@endsection

@section('js')




@endsection
