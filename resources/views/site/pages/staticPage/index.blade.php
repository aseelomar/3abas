@extends('site.layout.site')
@section('style')
    <style>
        .page-item{
            padding: 8px;
        }
        .pagination{

            font-weight: bold;
            font-size: 20px;
            --swiper-theme-color: #B074FF;
            display: inline-flex;

        }
        .show {
            color: white;
            border: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            gap: 20px;
            padding: 13px 26px;
            line-height: 1;
            border-radius: 20px;
            background: rgba(126, 51, 224, 0.67);
            -webkit-box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        footer{
        position: fixed;
        bottom:0;
        left: 0;
        right:0;}
    </style>

@endsection
@section('title',@$information->page_title_ar)
@section('subTitle',@$information->page_title_ar)
@section('sub_Title',@$information->page_title_ar)
@section('content')

    <main id="main">

        <section class="products-page">
            <div class="container-content" style="    text-align: center;">
        <p>{!! @$information->page_body_ar !!}</p>
        <div>

{{--    <img src="{{asset('/images/pages/'.@$information->page_image)}}">--}}
            </div>
            </div>
        </section>
    </main><!--main-->
@endsection
@include('site.pages.product.include.addToCart')
