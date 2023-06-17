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

                <p style="margin-right: 25px;">{{__('admin.settings')}} / <small>{{__('admin.all_settings')}} </small> </p>


            </div>

        </div>
        <div class="content-body">
            <!-- Analytics card section start -->
            <section id="analytics-card">
                <div style="text-align: center" class="row">

                    <div class="col-lg-3 col-10 ">
                        <div class="card">
                            <a href="{{ route('page.index') }}">

                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.pages') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/pagesStatic.png')}}" style="width: 150px">
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-10">
                        <div class="card">
                            <a href="{{ route('social.page') }}">

                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.social_media') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/social.png')}}" style="width: 190px;height:135px;margin-right: -9;">
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-10">
                        <div class="card">
                            <a href="{{ route('slider') }}">

                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.slider') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/multi-Slider.png')}}" style="width: 150px;height:135px">
                                    {{-- <i  class="feather icon-sliders" style="font-size: 100px"></i> --}}
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-10">
                        <div class="card">
                            <a href="{{ route('advertising') }}">

                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.ads') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/adv.jpg')}}" style="width: 193px;height:135px;">
                                    {{-- <i  class="feather icon-layout" style="font-size: 100px"></i> --}}
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-8">
                        <div class="card">
                            <a href="{{ route('setting.pages_link') }}">

                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.pages_link') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/social.png')}}" style="width: 150px;height:135px;">
                                </div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-8">
                        <div class="card">
                            <a href="{{ route('setting.public') }}">


                            <div class="card-header d-flex justify-content-between align-items-end">
                                <h4>{{ __('admin.setting') }}</h4>

                            </div>
                            <div class="card-content">
                                <div class="card-body pt-50">
                                    <img src="{{asset('images/settings/setting.jpg')}}" style="width: 150px;height:135px;">
                                </div>
                            </div></a>
                        </div>
                    </div>



                </div>

            </section>
            <!-- Analytics Card section end-->

        </div>



@endsection

@section('js')

@endsection
