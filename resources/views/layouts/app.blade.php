<!DOCTYPE html>
<html class="loading" lang="{{ app()->getLocale() }}" direction="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" dir="{{(App::isLocale('ar') ? 'rtl' : 'ltr')}}" style="direction: {{(App::isLocale('ar') ? 'rtl' : 'ltr')}}">
<!-- BEGIN: Head-->

<head>

    <style>
        .btn-group > .btn:not(:last-child):not(.dropdown-toggle), .btn-group > .btn-group:not(:last-child) > .btn {

        display: inline;
       }

       .btn-group > .btn:not(:first-child), .btn-group > .btn-group:not(:first-child) > .btn {

        display: inline;
       }
        </style>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <meta name="author" content="{{ $content }}">
    <title>{{$title}} </title>
    @if ($icon)

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/setting/'.$icon) }}">
    @else

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('app-assets/images/ico/favicon.ico') }}">
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{__('admin.name_store')}} </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Template files -->
    <link rel="apple-touch-icon" href="{{url('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->

    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/extensions/toastr.css')}}">

    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/forms/select/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">


    @stack('css')

    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->

    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/themes/semi-dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/plugins/extensions/toastr.css')}}">

    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="{{url('app-assets/assets/css/forms/select/select2.min.css')}}">

    @if(App::isLocale('en'))
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/core/colors/palette-gradient.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css/pages/card-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/vendors.min.css')}}">

    @else
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/vendors/css/vendors-rtl.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/pages/card-analytics.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/core/colors/palette-gradient.css')}}">

@endif

<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
<style>
    ul#menu li {
        display:inline;
    }
</style>
<!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{url('app-assets/css-rtl/custom-rtl.css')}}">

    <!-- END: Page CSS-->
    <!-- BEGIN: Custom CSS-->
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body style="font-size: 18px" class="vertical-layout vertical-menu-modern content-left-sidebar chat-application navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="content-left-sidebar">
<!-- BEGIN: Main Menu-->

<nav @if (App::islocal('en'))
style="margin: 0px 0px;
width: 83%;"

@endif class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                    <ul class="nav navbar-nav">

                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a> </li>


                    </ul>
                    <span class="d-xl-none"> {{__('admin.name_store')}}</span>

                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block" style="margin-right:25px ">@lang('admin.welcome_back') {{ Auth::user()->name }}s</li>
                    </ul>
                </div>
                <div>
                  @if(\Illuminate\Support\Facades\App::isLocale('ar'))
                    <a href="{{ url('/lang/en') }}">
                        <img src = "{{asset('images/united-states-flag-icon.svg')}}" alt="English" style="width: 25px;  margin: 25px;" >
                    </a>
                    @endif
                      @if(\Illuminate\Support\Facades\App::isLocale('en'))
                    <a href="{{ url('/lang/ar') }}">
                        <img src = "{{asset('images/saudi-arabia-flag-icon.svg')}}" alt="العربية" style="width: 25px;  margin: 25px;" >
                    </a>
                    @endif
                </div>
                <ul class="nav navbar-nav float-right">




                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ url('/admincp') }}" style=" margin-left: 25px;float: left;color: #7367F0">
                            {{__('admin.name_store')}}
                        </a>
                    </li>




                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" @if (Auth::user()->type == 'shipping')
                href="{{url('/shippingcp')}}"
            @else
            href="{{route('admincp')}}"
            @endif >
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{__('admin.control_panel')}}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a @if (Auth::user()->type == 'shipping')
                href="{{url('/shippingcp')}}"
            @else
            href="{{url('/admincp')}}"
            @endif><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">{{__('admin.home')}}</span></a>
            </li>
            <li class=" navigation-header"><span>{{__('admin.sections_and_pages')}}</span>
            </li>

                @foreach($mainPages as $key=>$page)

                                            <li class=" {{$key = 0? 'active':''}} nav-item">
                                                <a href="{{url($page->url)}}">
                                                    @if($page->icon == 'money')
                                                        <i class="fa fa-{{$page->icon}}"></i>
                                                    @else
                                                        <i class="feather icon-{{$page->icon}}"></i>

                                                    @endif

                                                    <span class="menu-title">{{$page->name}}</span>
                                                </a>

                                                @if($page->parent_id == 0)
                                                    <ul>
                                                        @foreach($subPages as $key=>$sub)
                                                            @if($sub->parent_id == $page->id && $sub->parent_id != 0)
                                                                <li class="" style="background-color: #e9e9e9">
                                                                    @if ($sub->type != 'shipping')
                                                                    <a href="{{url($sub->url)}}" >

                                                                        <i class="feather icon-{{$sub->icon}}"></i>
                                                                        <span class="menu-title">{{$sub->name}}</span>
                                                                    </a>
                                                                    @else
                                                                    <a href="{{url($sub->url)}}" >

                                                                        <i class="feather icon-{{$sub->icon}}"></i>
                                                                        <span class="menu-title">{{$sub->name}}</span>
                                                                    </a>

                                                                    @endif

                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>

                                                @endif
                                            </li>
                                        @endforeach
            <br><br><br><br><br><br><br><br>

                           <li  style="background-color: #e9e9e9">
                                        <a href="{{url('logout')}}">
                                            <i class="feather icon-log-out"></i>
                                            <span class="menu-title">{{__('admin.logout')}}</span>
                                        </a>
                                    </li>



            </li>



        </ul>

    </div>



</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="container-fluid">
        <div class="card-header">
            <div class="row" style="margin-top: 23px">

            </div>
        </div>
        <br>


        @yield('content')




    </div>

</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    {{__('admin.first_version_v1.0')}}
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="{{url('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>


<script src="{{url('app-assets/vendors/js/vendors.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/datatables.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/buttons.html5.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/buttons.print.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js')}}"></script>

{{--<script defer src="{{url('admin/assets/datatables.bundle.js')}}" type="text/javascript"></script>--}}


<script src="{{url('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>


<script src="{{url('app-assets/vendors/js/tables/datatable/pdfmake.min.js')}}"></script>
<!-- BEGIN Vendor JS-->


<script src="{{url('app-assets/js/core/app-menu.js')}}"></script>
<script src="{{url('app-assets/js/core/app.js')}}"></script>
<script src="{{url('app-assets/js/scripts/components.js')}}"></script>
<!-- END: Theme JS-->

<!-- My JS-->
<script src="{{url('app-assets/js/scripts/cards/card-analytics.js')}}"></script>
<script src="{{url('app-assets/js/scripts/extensions/sweet-alerts.js')}}"></script>
<script src="{{url('app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script src="{{url('app-assets/js/scripts/datatables/datatable.js')}}"></script>
<script type="text/javascript" src="{{url('app-assets/vendors/js/tables/datatable/jszip.min.js')}}"></script>



<script src="{{url('app-assets/js/scripts/forms/form-select2.min.js')}}"></script>
<script src="{{url('app-assets/vendors/js/extensions/toastr.min.js')}}"></script>
<script src="{{url('app-assets/js/scripts/forms/form-select2.min.js')}}"></script>
<script src="{{url('admin/common.js')}}"></script>
<script src="{{url('admin/datatable.js')}}"></script>



@yield('js')

</body>
<!-- END: Body-->

</html>


