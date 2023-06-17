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
    </style>

@endsection@section('title',__('site.best_seller_this_week'))
@section('subTitle',__('site.best_seller_this_week'))
@section('sub_Title',__('site.best_seller_this_week'))
@section('content')

    <main>

        <section class="products-page">
            <div class="container-content">

                <div class="boxes">
                    @foreach(@$bestSellerThisWeek as $item)
                        <div class="category-box">
                            <div class="img-box">
                                <a  target="_self" href="{{route('site.showProduct',@$item->product_id)}}" >
                                <img src="{{ asset('images/products/'.@$item->product_id .'/'.@$item->product->mainPhoto->image) }}" alt="category"/>
                                </a>
                            </div>
                            <div class="details">
                                <div class="content">
                                    <a target="_self" href="{{route('site.showProduct',@$item->product_id)}}" class="title">
                                        <h3>{{@$item->product->name}}</h3>
                                        <p>( <span>Rate</span> )</p>
                                    </a>
                                    <p class="description">{{@$item->product->description}}</p>
                                    <div class="price-and-add-to-cart">
                                        <span class="price">{{@$item->product->product_sale_price}}<span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                        @if($item->product->details->isEmpty())
                                            <form  id="form-add-car" method="POST" style="DISPLAY: CONTENTS;">
                                                @csrf
                                                <input type="hidden" value="{{@$item->product_id}}" name="product_id" id="product_id">
                                                <a href="#"    class="add-to-cart">

                                                    <span>@lang('site.add_car')</span>
                                                    <svg id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" xmlns="http://www.w3.org/2000/svg" width="36" height="34.5" viewBox="0 0 36 34.5">
                                                        <path id="Path_30" data-name="Path 30" d="M15,31.5A1.5,1.5,0,1,1,13.5,30,1.5,1.5,0,0,1,15,31.5Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                                        <path id="Path_31" data-name="Path 31" d="M31.5,31.5A1.5,1.5,0,1,1,30,30,1.5,1.5,0,0,1,31.5,31.5Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                                        <path id="Path_32" data-name="Path 32" d="M1.5,1.5h6l4.02,20.085a3,3,0,0,0,3,2.415H29.1a3,3,0,0,0,3-2.415L34.5,9H9" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                                    </svg>
                                                </a>
                                            </form>


                                        @else
                                            <a target="_self" href="{{route('site.showProduct',@$item->id)}}" class="show" >

                                                <span>قم بادخال تفاصيل المنتج ثم اضافةالى السلة</span>
                                                <svg id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" xmlns="http://www.w3.org/2000/svg" width="36" height="34.5" viewBox="0 0 36 34.5">
                                                    <path id="Path_30" data-name="Path 30" d="M15,31.5A1.5,1.5,0,1,1,13.5,30,1.5,1.5,0,0,1,15,31.5Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                                    <path id="Path_31" data-name="Path 31" d="M31.5,31.5A1.5,1.5,0,1,1,30,30,1.5,1.5,0,0,1,31.5,31.5Z" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                                    <path id="Path_32" data-name="Path 32" d="M1.5,1.5h6l4.02,20.085a3,3,0,0,0,3,2.415H29.1a3,3,0,0,0,3-2.415L34.5,9H9" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"></path>
                                                </svg>
                                            </a>
                                        @endif

                                    </div>
                                </div>

                                <form action="#">
                                    <div class="form-group-comments">
                                        <input type="text" placeholder="أضف تعليقاً"/>
                                        <button type="submit" class="submit-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#fff" class="bi bi-send" viewBox="0 0 16 16">
                                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    @endforeach

                </div>
                <br>
                <center>
                    {{ @$bestSellerThisWeek->links() }}
                    {{--                    @include('site.layout.paginate', ['paginator' => $featuredProduct])--}}

                    {{--                    {{$featuredProduct->links('site.layout.paginate')}}--}}
                </center>
            </div>
        </section>
    </main><!--main-->
@endsection
@include('site.pages.product.include.addToCart')
