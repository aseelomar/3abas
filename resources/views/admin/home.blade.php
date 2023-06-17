@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-gradient-info">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-shopping-cart"></i>
                                {{__('admin.orders')}}
                                <small>{{$count}}</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-success">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-users"></i>
                                {{__('admin.customers')}}

                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-danger">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-shopping-bag"></i>
                                {{__('admin.products')}}

                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-warning">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-mail"></i>
                                {{__('admin.messages')}}

                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong>  {{__('admin.latest_orders')}}..</strong></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{__('admin.number_order')}}</th>
                                <th scope="col">{{__('admin.customers_name')}}</th>
                                <th scope="col">{{__('admin.product_name')}}</th>
                                <th scope="col">{{__('admin.order_status')}}</th>
                                <th scope="col">{{__('admin.payment_method')}}</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($order as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{@$item->number_order}}</td>
                                    <td>{{@$item->user->name}}</td>
                                    <td>@include('admin.orders.parts.btnProduct',['id'=> @$item->id])</td>
                                    <td>@include('admin.orders.parts.btnStatus',['status'=> @$item->status_id , 'name'=>@$item->status->name])</td>
                                    <td>{{@$item->paymentMethod->name}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong>{{__('admin.revenues')}}</strong></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body px-0 pb-0" style="position: relative;">
                            <div class="row text-center mx-0">
                                <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                    <p class="mb-50">{{__('admin.for_this_day')}} </p>
                                    <p class="font-large-1 text-bold-700 mb-50">{{@$totalRevenueThisDay}}</p>
                                </div>
                                <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                    <p class="mb-50">{{__('admin.total_month')}}</p>
                                    <p class="font-large-1 text-bold-700 mb-50">{{ round($totalRevenueThisMonth,4)}}</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p style="padding: 5px 10px; font-style: inherit">  {{__('admin.most_products')}}<strong> {{__('admin.buy')}}</strong>  </p>
                                <ul>
                                    @foreach(@$bestSellerProduct  as $itam)
                                        <li><a style="color: black;" href="{{route('site.showProduct' ,@$itam->id)}}">{{@$itam->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong> {{__('admin.visitors_visits')}}</strong> </h4>
                        <p class="mb-50"> {{__('admin.Who_online')}}<span style="color:red;">(11)</span> </p>

                    </div>
                    <div class="card-content">
                        <div class="card-body px-0 pb-0" style="position: relative;">
                            <div class="row">
                                <div class="col-xl-6">
                                    <p class="border-top" style="padding: 5px 10px; font-style: inherit"> {{__('admin.most_products')}} <strong>{{__('admin.visit')}}</strong> {{__('admin.for_this_week')}}    </p>
                                    <div class="row  text-center mx-0">
                                        <ul>
                                            @foreach(@$visitorSee  as $itam)
                                                <li><a style="color: black;" href="{{route('site.showProduct' ,@$itam->id)}}">{{@$itam->name}}</a></li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="border-top" style="padding: 5px 10px; font-style: inherit"> {{__('admin.most_products')}} <strong>{{__('admin.request')}}</strong>  {{__('admin.for_this_week')}}  </p>
                                    <div class="row  text-center mx-0">
                                        <ul>
                                            @foreach(@$bestSellerThisWeek  as $itam)
                                                <li><a style="color: black;" href="{{route('site.showProduct' ,@$itam->product->id)}}">{{$itam->product->name}}</a></li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <hr>


                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
