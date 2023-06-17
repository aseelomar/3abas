<section class="large-swiper">
    <div class="swiper no-padding" id="large_swiper">
        <div class="swiper-wrapper">
            @foreach(@$slider as $item)
            <div class="swiper-slide">
                <div class="img-box">
                    <img src="{{ asset('images/slider/' . $item->slider_image) }}" alt="img"/>
                </div>
            </div>

            @endforeach
        </div>
    </div>
    <div class="swiper-pagination"></div>
</section><!--large-swiper-->
