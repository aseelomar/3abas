<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('site.store_name')-@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('site/contact/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/contact/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/contact/css/style.css') }}">


    <!--FONT LINKS-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <!--MAIN STYLE FILE-->
    <link rel="stylesheet" href="{{ asset('site/css/sweetalert2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('site/css/main-rtl.css') }}">
    @yield('style')
</head>

<body>

    <section class="header-pages">
        <div class="container-content">
            <div class="info-header">
                <ul class="info">
                    <li>
                        <a href="#">+970123456789</a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31.5" height="31.5" viewBox="0 0 31.5 31.5">
                            <path id="Icon_awesome-phone-square-alt" data-name="Icon awesome-phone-square-alt"
                                d="M28.125,2.25H3.375A3.375,3.375,0,0,0,0,5.625v24.75A3.375,3.375,0,0,0,3.375,33.75h24.75A3.375,3.375,0,0,0,31.5,30.375V5.625A3.375,3.375,0,0,0,28.125,2.25ZM26.973,23.862l-1.055,4.57a1.055,1.055,0,0,1-1.027.818A20.392,20.392,0,0,1,4.5,8.859a1.1,1.1,0,0,1,.818-1.027l4.57-1.055a1.282,1.282,0,0,1,.237-.027,1.144,1.144,0,0,1,.97.639L13.2,12.311a1.259,1.259,0,0,1,.085.416,1.2,1.2,0,0,1-.387.816l-2.664,2.18a16.306,16.306,0,0,0,7.789,7.789l2.18-2.664a1.2,1.2,0,0,1,.816-.387,1.255,1.255,0,0,1,.416.085l4.922,2.109a1.143,1.143,0,0,1,.639.97,1.224,1.224,0,0,1-.027.237Z"
                                transform="translate(0 -2.25)" fill="#f0f72b" />
                        </svg>
                    </li>
                    <li>
                        <a href="#">
                            info@AbbasExpress.com
                        </a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="34.178" height="27" viewBox="0 0 34.178 27">
                            <g id="Icon_feather-mail" data-name="Icon feather-mail" transform="translate(-0.911 -4.5)">
                                <path id="Path_9" data-name="Path 9"
                                    d="M6,6H30a3.009,3.009,0,0,1,3,3V27a3.009,3.009,0,0,1-3,3H6a3.009,3.009,0,0,1-3-3V9A3.009,3.009,0,0,1,6,6Z"
                                    fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="3" />
                                <path id="Path_10" data-name="Path 10" d="M33,9,18,19.5,3,9" fill="none"
                                    stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </g>
                        </svg>
                    </li>
                </ul>
                <ul class="social-media-buttons">
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('other') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36.002" height="26.19"
                                viewBox="0 0 36.002 26.19">
                                <g id="Icon_feather-youtube" data-name="Icon feather-youtube"
                                    transform="translate(0.001 -4.5)">
                                    <path id="Path_7" data-name="Path 7"
                                        d="M33.81,9.63a4.17,4.17,0,0,0-2.91-3C28.32,6,18,6,18,6S7.68,6,5.1,6.69a4.17,4.17,0,0,0-2.91,3,43.5,43.5,0,0,0-.69,7.935,43.5,43.5,0,0,0,.69,7.995A4.17,4.17,0,0,0,5.1,28.5c2.58.69,12.9.69,12.9.69s10.32,0,12.9-.69a4.17,4.17,0,0,0,2.91-3,43.5,43.5,0,0,0,.69-7.875,43.5,43.5,0,0,0-.69-8Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                    <path id="Path_8" data-name="Path 8" d="M14.625,22.53l8.625-4.905-8.625-4.9Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('instagram') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33">
                                <g id="Icon_feather-instagram" data-name="Icon feather-instagram"
                                    transform="translate(-1.5 -1.5)">
                                    <path id="Path_4" data-name="Path 4"
                                        d="M10.5,3h15A7.5,7.5,0,0,1,33,10.5v15A7.5,7.5,0,0,1,25.5,33h-15A7.5,7.5,0,0,1,3,25.5v-15A7.5,7.5,0,0,1,10.5,3Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="3" />
                                    <path id="Path_5" data-name="Path 5"
                                        d="M24,17.055A6,6,0,1,1,18.945,12,6,6,0,0,1,24,17.055Z" fill="none"
                                        stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                    <path id="Path_6" data-name="Path 6" d="M26.25,9.75h0" fill="none"
                                        stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('twitter') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39.329" height="31.904"
                                viewBox="0 0 39.329 31.904">
                                <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter"
                                    d="M32.3,10.668c.023.32.023.64.023.959,0,9.754-7.424,20.992-20.992,20.992A20.85,20.85,0,0,1,0,29.307a15.263,15.263,0,0,0,1.782.091,14.776,14.776,0,0,0,9.16-3.152,7.391,7.391,0,0,1-6.9-5.117,9.3,9.3,0,0,0,1.393.114,7.8,7.8,0,0,0,1.942-.251,7.379,7.379,0,0,1-5.916-7.241V13.66A7.431,7.431,0,0,0,4.8,14.6,7.389,7.389,0,0,1,2.513,4.728a20.972,20.972,0,0,0,15.213,7.721,8.329,8.329,0,0,1-.183-1.69A7.385,7.385,0,0,1,30.312,5.711a14.526,14.526,0,0,0,4.683-1.782,7.358,7.358,0,0,1-3.244,4.066A14.791,14.791,0,0,0,36,6.853a15.86,15.86,0,0,1-3.7,3.815Z"
                                    transform="translate(0.541 -1.715)" fill="none" stroke="#f0f72b"
                                    stroke-width="2" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('facebook') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36.233" height="36.233"
                                viewBox="0 0 36.233 36.233">
                                <path id="Icon_metro-facebook" data-name="Icon metro-facebook"
                                    d="M31.1,1.928H8.276a5.705,5.705,0,0,0-5.7,5.706V30.455a5.705,5.705,0,0,0,5.7,5.706H19.687V21.184H15.408V16.9h4.279V13.7a5.349,5.349,0,0,1,5.349-5.349h5.349v4.279H25.036a1.07,1.07,0,0,0-1.07,1.07V16.9H29.85l-1.07,4.279H23.966V36.161H31.1a5.705,5.705,0,0,0,5.7-5.706V7.634a5.706,5.706,0,0,0-5.7-5.706Z"
                                    transform="translate(-1.571 -0.928)" fill="none" stroke="#f0f72b"
                                    stroke-width="2" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="second-header">
            <div class="container-content">
                <div class="content-links">
                    <a href="#" class="logo">
                        <span>@lang('site.logo')</span>
                    </a>
                    <ul class="links">
                        <li class="active-link"><a href="{{ route('site.index') }}">@lang('site.home')</a></li>
                        <li><a  target="_self" href="{{ route('site.product.offerProduct') }}">@lang('site.offers')</a></li>
                        <li><a  target="_self" href="{{ route('site.product.favProduct') }}">@lang('site.favorite')</a></li>
                        <li><a target="_self"  href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_CALL_US)}}">@lang('site.contact_us')</a></li>
                        <li><a  target="_self" href="{{route('contactUs') }}">@lang('site.support')</a></li>
                        <li><a target="_self" href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_TERMS_SERVICE)}}">@lang('site.terms_service')</a></li>
                        <li><a target="_self" href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_WHO_ARE_WE)}}">@lang('site.who_are_we')</a></li>
                    </ul>
                    <div class="action-header">
                        <button type="button" class="search-button custom-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="34.251" height="34.259"
                                viewBox="0 0 34.251 34.259">
                                <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search"
                                    d="M38.349,36.273l-9.526-9.615a13.575,13.575,0,1,0-2.06,2.087L36.226,38.3a1.466,1.466,0,0,0,2.069.054A1.476,1.476,0,0,0,38.349,36.273ZM18.156,28.861a10.719,10.719,0,1,1,7.582-3.14A10.653,10.653,0,0,1,18.156,28.861Z"
                                    transform="translate(-4.5 -4.493)" />
                            </svg>
                        </button>
                        <ul class="search-results custom-position-and-width">
                            <li>
                                <input type="text" id="input-search" />
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                            <li>
                                <a href="#">الانتقال الى التطبيق</a>
                            </li>
                        </ul>
                        <a target="_self" href="{{ route('site.cart.show') }}" class="shopping-bag custom-link">
                            <span class="count">2</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="37.385" height="35.799"
                                viewBox="0 0 37.385 35.799">
                                <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart"
                                    transform="translate(1.25 1.25)">
                                    <path id="Path_14" data-name="Path 14"
                                        d="M13.171,26.586A1.586,1.586,0,1,1,11.586,25,1.586,1.586,0,0,1,13.171,26.586Z"
                                        transform="translate(1.1 5.128)" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                                    <path id="Path_15" data-name="Path 15"
                                        d="M26.921,26.586A1.586,1.586,0,1,1,25.336,25,1.586,1.586,0,0,1,26.921,26.586Z"
                                        transform="translate(4.792 5.128)" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                                    <path id="Path_16" data-name="Path 16"
                                        d="M1.25,1.25H7.593l4.25,21.232a3.171,3.171,0,0,0,3.171,2.553H30.426A3.171,3.171,0,0,0,33.6,22.482l2.537-13.3H9.178"
                                        transform="translate(-1.25 -1.25)" fill="none" stroke="#000"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" />
                                </g>
                            </svg>
                        </a>
                        <button   @if(Auth::user() == null) onclick="window.location='{{route('login')}}'"@endIf type="button" class="show-user-menu custom-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28.538" height="28.538"
                                viewBox="0 0 28.538 28.538">
                                <path id="Icon_material-person-outline" data-name="Icon material-person-outline"
                                    d="M19.269,8.389a3.746,3.746,0,1,1-3.746,3.746,3.745,3.745,0,0,1,3.746-3.746m0,16.052c5.3,0,10.88,2.6,10.88,3.746v1.962H8.389V28.187c0-1.142,5.583-3.746,10.88-3.746M19.269,5A7.134,7.134,0,1,0,26.4,12.134,7.132,7.132,0,0,0,19.269,5Zm0,16.052C14.507,21.052,5,23.442,5,28.187v5.351H33.538V28.187C33.538,23.442,24.031,21.052,19.269,21.052Z"
                                    transform="translate(-5 -5)" />
                            </svg>
                        </button>
                        <ul class="user-menu">
                            @if(Auth::user())
                        <li><a target="_self" href="{{route('profile')}}">@lang('site.profile')</a></li>
                        <li><a  target="_self" href="#">@lang('site.settings')</a></li>
                        <li><a  target="_self" href="#">@lang('site.sign_out')</a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @yield('content')


    <footer>
        <div class="container-content">
            <div class="content-footer">
                <div class="right-section">
                    <div class="logo">
                        <span>Abbas Express</span>
                    </div>
                    <ul class="links">
                        <li><a target="_self" href="{{ route('site.index') }}">@lang('site.home')</a></li>
                        <li><a target="_self"  href="{{ route('site.allCategory') }}">@lang('site.category')</a></li>
                        <li><a target="_self" href="#">@lang('site.login')</a></li>
                    </ul>
                </div>
                <ul class="social-media-buttons">
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('other') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36.002" height="26.19"
                                viewBox="0 0 36.002 26.19">
                                <g id="Icon_feather-youtube" data-name="Icon feather-youtube"
                                    transform="translate(0.001 -4.5)">
                                    <path id="Path_7" data-name="Path 7"
                                        d="M33.81,9.63a4.17,4.17,0,0,0-2.91-3C28.32,6,18,6,18,6S7.68,6,5.1,6.69a4.17,4.17,0,0,0-2.91,3,43.5,43.5,0,0,0-.69,7.935,43.5,43.5,0,0,0,.69,7.995A4.17,4.17,0,0,0,5.1,28.5c2.58.69,12.9.69,12.9.69s10.32,0,12.9-.69a4.17,4.17,0,0,0,2.91-3,43.5,43.5,0,0,0,.69-7.875,43.5,43.5,0,0,0-.69-8Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="3" />
                                    <path id="Path_8" data-name="Path 8" d="M14.625,22.53l8.625-4.905-8.625-4.9Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="3" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('instagram') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33"
                                viewBox="0 0 33 33">
                                <g id="Icon_feather-instagram" data-name="Icon feather-instagram"
                                    transform="translate(-1.5 -1.5)">
                                    <path id="Path_4" data-name="Path 4"
                                        d="M10.5,3h15A7.5,7.5,0,0,1,33,10.5v15A7.5,7.5,0,0,1,25.5,33h-15A7.5,7.5,0,0,1,3,25.5v-15A7.5,7.5,0,0,1,10.5,3Z"
                                        fill="none" stroke="#f0f72b" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="3" />
                                    <path id="Path_5" data-name="Path 5"
                                        d="M24,17.055A6,6,0,1,1,18.945,12,6,6,0,0,1,24,17.055Z" fill="none"
                                        stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                    <path id="Path_6" data-name="Path 6" d="M26.25,9.75h0" fill="none"
                                        stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="3" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('twitter') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39.329" height="31.904"
                                viewBox="0 0 39.329 31.904">
                                <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter"
                                    d="M32.3,10.668c.023.32.023.64.023.959,0,9.754-7.424,20.992-20.992,20.992A20.85,20.85,0,0,1,0,29.307a15.263,15.263,0,0,0,1.782.091,14.776,14.776,0,0,0,9.16-3.152,7.391,7.391,0,0,1-6.9-5.117,9.3,9.3,0,0,0,1.393.114,7.8,7.8,0,0,0,1.942-.251,7.379,7.379,0,0,1-5.916-7.241V13.66A7.431,7.431,0,0,0,4.8,14.6,7.389,7.389,0,0,1,2.513,4.728a20.972,20.972,0,0,0,15.213,7.721,8.329,8.329,0,0,1-.183-1.69A7.385,7.385,0,0,1,30.312,5.711a14.526,14.526,0,0,0,4.683-1.782,7.358,7.358,0,0,1-3.244,4.066A14.791,14.791,0,0,0,36,6.853a15.86,15.86,0,0,1-3.7,3.815Z"
                                    transform="translate(0.541 -1.715)" fill="none" stroke="#f0f72b"
                                    stroke-width="2" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="{{ \App\Models\Confiq::getValue('facebook') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="36.233" height="36.233"
                                viewBox="0 0 36.233 36.233">
                                <path id="Icon_metro-facebook" data-name="Icon metro-facebook"
                                    d="M31.1,1.928H8.276a5.705,5.705,0,0,0-5.7,5.706V30.455a5.705,5.705,0,0,0,5.7,5.706H19.687V21.184H15.408V16.9h4.279V13.7a5.349,5.349,0,0,1,5.349-5.349h5.349v4.279H25.036a1.07,1.07,0,0,0-1.07,1.07V16.9H29.85l-1.07,4.279H23.966V36.161H31.1a5.705,5.705,0,0,0,5.7-5.706V7.634a5.706,5.706,0,0,0-5.7-5.706Z"
                                    transform="translate(-1.571 -0.928)" fill="none" stroke="#f0f72b"
                                    stroke-width="2" />
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!--footer-->

    <!--JQUERY FILE CDN-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--SLIDER FILE CDN-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('site/js/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" defer></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
    <script src="{{ asset('site/js/order-request.js') }}"></script>
    <script src="{{ asset('site/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
