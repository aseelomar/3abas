
<section class="best-seller section-margin">
    <div class="container-content">
        <div class="section-header">
            <h2>@lang('site.best_seller')</h2>
            <a target="_self" href="{{route('site.product.bestSellerProduct')}}">
                <span>@lang('site.all')</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.508" height="23.984" viewBox="0 0 14.508 23.984">
                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M11.874,16.118l9.6-9.068a1.641,1.641,0,0,0,0-2.42,1.9,1.9,0,0,0-2.569,0L8.029,14.9a1.644,1.644,0,0,0-.053,2.363L18.9,27.614a1.9,1.9,0,0,0,2.569,0,1.641,1.641,0,0,0,0-2.42Z" transform="translate(-7.5 -4.129)"/>
                </svg>
            </a>
        </div>
        <div class="swiper" id="best_seller_swiper">
            <div class="swiper-wrapper">
                @foreach(@$bestSeller as $item)
                <div class="swiper-slide">
                    <div class="large-product-box">
                        <div class="img-box">
                            <a target="_self" href="{{route('site.showProduct',@$item->id)}}">
                            <img src="{{ asset('images/products/'.@$item->id .'/'.@$item->mainPhoto->image) }}" alt="img"/>
                            </a>
                        </div>
                        <div class="details">
                            <div class="title-like">
                                <a target="_self" href="{{route('site.showProduct',@$item->id)}}">{{@$item->name}}</a>
                                <button type="button" class="like-button @if(Auth::user() && isset(Auth::user()->fav_product) && in_array($item->id , Auth::user()->fav_product))
                                    active
                                @endif" productId='{{ @$item->id }}'>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21.305" height="20.485" viewBox="0 0 21.305 20.485">
                                        <path id="Icon_ionic-ios-heart" data-name="Icon ionic-ios-heart" d="M18.944,3.937h-.051A5.827,5.827,0,0,0,14.027,6.6,5.827,5.827,0,0,0,9.162,3.937H9.111A5.79,5.79,0,0,0,3.375,9.725a12.466,12.466,0,0,0,2.448,6.8,42.9,42.9,0,0,0,8.2,7.9,42.9,42.9,0,0,0,8.2-7.9,12.466,12.466,0,0,0,2.448-6.8A5.79,5.79,0,0,0,18.944,3.937Z" transform="translate(-3.375 -3.937)" fill="#bebebe"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="price-rate">
                                <h3>{{@$item->product_sale_price}}<span style="font-size: x-small;font-weight: 500;">شيكل</span></h3>

                                <div class="rate-text">
                                    <span>{{ round(@$item->rating, 2) }} ({{ @$item->total_reviews }})</span>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
                                        <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section><!--best-seller-swiper-->
