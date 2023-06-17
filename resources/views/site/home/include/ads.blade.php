<section class="special-discount section-margin">
    <div class="container-content">
        <div class="content-special-discount">
            <div class="content">
                <div class="description">
                    <h3>
                        <span>{{@$ads->title}}</span>
{{--                        <b>40%</b>--}}
{{--                        <small>off</small>--}}
                    </h3>
                    <a target="_self" href="{{@$ads->link}}" class="buy-now">شراء الان</a>
                </div>
                <div class="items">
                    <div class="">
                        <img src="{{ asset('images/ads/'.@$ads->ads_image) }}" alt="discount1"/>
                    </div>
{{--                    <span class="plus">+</span>--}}
{{--                    <div class="item">--}}
{{--                        <img src="./images/discount2.png" alt="img"/>--}}
{{--                    </div>--}}
{{--                    <span class="plus">+</span>--}}
{{--                    <div class="item">--}}
{{--                        <img src="./images/discount3.png" alt="img"/>--}}
{{--                    </div>--}}
                </div>
            </div>
            <a href="#" class="show-all">
                <span>عرض المزيد</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="15.701" height="25.957" viewBox="0 0 15.701 25.957">
                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M12.234,17.1,22.625,7.291a1.776,1.776,0,0,0,0-2.62,2.053,2.053,0,0,0-2.78,0L8.072,15.791a1.779,1.779,0,0,0-.057,2.558l11.822,11.2a2.056,2.056,0,0,0,2.78,0,1.776,1.776,0,0,0,0-2.62Z" transform="translate(-7.5 -4.129)"/>
                </svg>
            </a>
        </div>
    </div>
</section><!--special-discount-->
