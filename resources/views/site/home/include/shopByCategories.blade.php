<section class="shop-by-categories section-margin">
    <div class="container-content">
        <div class="section-header">
            <h2>@lang('site.shop_by_categories')</h2>
            <a target="_self" href="{{route('site.allCategory')}}">
                <span>@lang('site.all')</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.508" height="23.984" viewBox="0 0 14.508 23.984">
                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M11.874,16.118l9.6-9.068a1.641,1.641,0,0,0,0-2.42,1.9,1.9,0,0,0-2.569,0L8.029,14.9a1.644,1.644,0,0,0-.053,2.363L18.9,27.614a1.9,1.9,0,0,0,2.569,0,1.641,1.641,0,0,0,0-2.42Z" transform="translate(-7.5 -4.129)"/>
                </svg>
            </a>
        </div>
        <div class="content-swiper">
            <div class="swiper" id="shop_by_categories_swiper">
                <div class="swiper-wrapper">
                    @foreach(@$categories as $item)
                    <div class="swiper-slide">
                        <div class="small-product-box">
                            <div class="img-box">
                                <a target="_self" href="{{route('site.showProductMainCategory',@$item->id)}}">
                                <img src="{{   asset('images/category/'.$item->category_image)}}" alt="img"/>
                                </a>
                            </div>
                            <h3><a target="_self" href="{{route('site.showProductMainCategory',@$item->id)}}">{{@$item->name}}</a></h3>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section><!--hero-->
