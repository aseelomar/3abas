@extends('layouts.master')

@section('content')

    <div class="container">
        <div class=" justify-content-center">
            <div class="card">
                <div class="card-header">{{__('auth.welcome_back_login_please')}}</div>
                <div class="card-body">
                    <div class="row m-0">
                        <div class="col-lg-6 col-12 p-0">

                            <div class="card rounded-0 mb-0 px-2">
                                <div class="card-header pb-1">
                                    <div class="card-title">
                                        <h4 class="mb-0">{{__('auth.sign_in')}}</h4>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pt-1">

                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{__('auth.email')}}" >
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{__('auth.error_email')}}</strong>
                                                </span>
                                                @enderror

                                                <div class="form-control-position">
                                                    <i class="feather icon-user"></i>
                                                </div>
                                                <label for="username"> {{__('auth.username')}}</label>
                                            </fieldset>

                                            <fieldset class="form-label-group position-relative has-icon-left">
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="{{__('auth.password')}}" >
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{__('auth.error_password')}}</strong>
                                                </span>
                                                @enderror

                                                <div class="form-control-position">
                                                    <i class="feather icon-lock"></i>
                                                </div>
                                                <label for="password">{{__('auth.password')}}</label>
                                            </fieldset>
                                            <div class="form-group d-flex justify-content-between align-items-center">
                                                <div class="text-left">
                                                    <fieldset class="checkbox">
                                                        <div class="vs-checkbox-con vs-checkbox-primary">
                                                            <input type="checkbox" name="remember" id="remember">
                                                            <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                            <span class="">{{__('auth.remember_me')}}</span>
                                                        </div>
                                                    </fieldset>
                                                    <a class="links" href="{{route('client.getRegister')}}"> ليس لديك حساب ؟ تسجيل </a>
                                                </div>
                                            </div>
                                            <center>
                                                <button type="submit" class="btn btn-primary btn-inline">{{__('auth.sign_in')}}</button>
                                            </center>
                                        </form>
<br>
                                        <div style="text-align: center;">
                                            <label class="font-size-h6 font-weight-bolder text-dark"> -أو- </label>
                                        </div>
                                        <br>

                                        <center>
                                            <a href="{{route('google-auth')}}">
                                            <button type="submit" class="btn btn-primary btn-inline">

                                                <span class="svg-icon svg-icon-md">
                                                    <!--begin::Svg Icon | path:assets/media/svg/social-icons/google.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 20 20" fill="none">
                                                        <path
                                                            d="M19.9895 10.1871C19.9895 9.36767 19.9214 8.76973 19.7742 8.14966H10.1992V11.848H15.8195C15.7062 12.7671 15.0943 14.1512 13.7346 15.0813L13.7155 15.2051L16.7429 17.4969L16.9527 17.5174C18.879 15.7789 19.9895 13.221 19.9895 10.1871Z"
                                                            fill="#4285F4" />
                                                        <path
                                                            d="M10.1993 19.9313C12.9527 19.9313 15.2643 19.0454 16.9527 17.5174L13.7346 15.0813C12.8734 15.6682 11.7176 16.0779 10.1993 16.0779C7.50243 16.0779 5.21352 14.3395 4.39759 11.9366L4.27799 11.9466L1.13003 14.3273L1.08887 14.4391C2.76588 17.6945 6.21061 19.9313 10.1993 19.9313Z"
                                                            fill="#34A853" />
                                                        <path
                                                            d="M4.39748 11.9366C4.18219 11.3166 4.05759 10.6521 4.05759 9.96565C4.05759 9.27909 4.18219 8.61473 4.38615 7.99466L4.38045 7.8626L1.19304 5.44366L1.08875 5.49214C0.397576 6.84305 0.000976562 8.36008 0.000976562 9.96565C0.000976562 11.5712 0.397576 13.0882 1.08875 14.4391L4.39748 11.9366Z"
                                                            fill="#FBBC05" />
                                                        <path
                                                            d="M10.1993 3.85336C12.1142 3.85336 13.406 4.66168 14.1425 5.33717L17.0207 2.59107C15.253 0.985496 12.9527 0 10.1993 0C6.2106 0 2.76588 2.23672 1.08887 5.49214L4.38626 7.99466C5.21352 5.59183 7.50242 3.85336 10.1993 3.85336Z"
                                                            fill="#EB4335" />
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span> تسجيل باستخدام جوجل</button>
                                            </a>

                                            <a href="{{route('auth.facebook')}}">
                                                <button type="submit" class="btn btn-primary btn-inline">تسجيل باستخدام فيسبوك</button>
                                            </a>                                        </center>


                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6 d-lg-block d-none text-center ">

                            <img src="{{url('app-assets/images/login.jpg')}}" style="width: 100%;margin-top: -60px;" alt="branding logo">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
