<section class="hero">
    <img src="{{asset('site/images/hero-bg.webp')}}" alt="img" class="hero-bg"/>
    <div class="second-header">
        <div class="container-content">
            <div class="content-links">
                <a href="#" class="logo">
                    <span>@lang('site.logo')</span>
                </a>
                <ul class="links">
                    <li class="active-link"><a href="#">@lang('site.home')</a></li>
                    <li><a target="_self" href="{{route('site.product.offerProduct')}}">@lang('site.offers')</a></li>
                    <li><a target="_self"  href="{{ route('site.product.favProduct') }}">@lang('site.favorite')</a></li>
                    <li><a target="_self" href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_CALL_US)}}">@lang('site.contact_us')</a></li>
                    <li><a  target="_self" href="{{route('contactUs')}}">@lang('site.support')</a></li>
                    <li><a target="_self"  href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_TERMS_SERVICE)}}">@lang('site.terms_service')</a></li>
                    <li><a  target="_self" href="{{route('site.staticPage',\App\Models\StaticPages::STATIC_PAGE_WHO_ARE_WE)}}">@lang('site.who_are_we')</a></li>
                </ul>
                <div class="action-header">
                    <button type="button" class="search-button custom-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="34.251" height="34.259" viewBox="0 0 34.251 34.259">
                            <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M38.349,36.273l-9.526-9.615a13.575,13.575,0,1,0-2.06,2.087L36.226,38.3a1.466,1.466,0,0,0,2.069.054A1.476,1.476,0,0,0,38.349,36.273ZM18.156,28.861a10.719,10.719,0,1,1,7.582-3.14A10.653,10.653,0,0,1,18.156,28.861Z" transform="translate(-4.5 -4.493)"/>
                        </svg>
                    </button>
                    <form  action="{{route('site.product.searchProduct')}}" method="POST" id="form-search">
                        @csrf
                        <ul class="search-results custom-position-and-width" style="height: auto">
                            <li>
                                <input type="text" id="input-search" name="search" value=""/>
                            </li>
                            <li>
                                <a  id="search">{{'ابحث'}}</a>
                            </li>
                            </li>


                        </ul>
                    </form>
                    <a target="_self" href="{{route('site.cart.show')}}" class="shopping-bag custom-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37.385" height="35.799" viewBox="0 0 37.385 35.799">
                            <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1.25 1.25)">
                                <path id="Path_14" data-name="Path 14" d="M13.171,26.586A1.586,1.586,0,1,1,11.586,25,1.586,1.586,0,0,1,13.171,26.586Z" transform="translate(1.1 5.128)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"/>
                                <path id="Path_15" data-name="Path 15" d="M26.921,26.586A1.586,1.586,0,1,1,25.336,25,1.586,1.586,0,0,1,26.921,26.586Z" transform="translate(4.792 5.128)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"/>
                                <path id="Path_16" data-name="Path 16" d="M1.25,1.25H7.593l4.25,21.232a3.171,3.171,0,0,0,3.171,2.553H30.426A3.171,3.171,0,0,0,33.6,22.482l2.537-13.3H9.178" transform="translate(-1.25 -1.25)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"/>
                            </g>
                        </svg>
                    </a>
                    <button  @if(Auth::user() == null) onclick="window.location='{{route('login')}}'"@endIf type="button" class="show-user-menu custom-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28.538" height="28.538" viewBox="0 0 28.538 28.538">
                            <path id="Icon_material-person-outline" data-name="Icon material-person-outline" d="M19.269,8.389a3.746,3.746,0,1,1-3.746,3.746,3.745,3.745,0,0,1,3.746-3.746m0,16.052c5.3,0,10.88,2.6,10.88,3.746v1.962H8.389V28.187c0-1.142,5.583-3.746,10.88-3.746M19.269,5A7.134,7.134,0,1,0,26.4,12.134,7.132,7.132,0,0,0,19.269,5Zm0,16.052C14.507,21.052,5,23.442,5,28.187v5.351H33.538V28.187C33.538,23.442,24.031,21.052,19.269,21.052Z" transform="translate(-5 -5)"/>
                        </svg>
                    </button>
                    <ul class="user-menu">
                        @if(Auth::user() )
                        <li><a target="_self" href="{{route('profile')}}">@lang('site.profile')</a></li>
                        <li><a target="_self"  href="#">@lang('site.settings')</a></li>
                        <li><a target="_self" href="{{route('logout')}}">@lang('site.sign_out')</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="container-content">
            <ul>
                <li class="yellow-color">
                    <span></span>
                    <p>@lang('site.quick_receipt')</p>
                </li>
                <li>
                    <span></span>
                    <p>@lang('site.trusted_products')</p>
                </li>
                <li>
                    <span></span>
                    <p>@lang('site.lower_prices')</p>
                </li>
            </ul>
        </div>
    </div>
</section><!--hero-->
<script>



    document.getElementById('search').addEventListener("click", function () {
        var form = document.getElementById('form-search');

        form.submit();
    });
</script>
