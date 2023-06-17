@extends('site.layout.site')

@section('title', @$product->name)
@section('subTitle', __('site.product'))
@section('content')
    <main>
        <section class="products-page">
            <div class="container-content">
                <h3 style="    text-align: -webkit-center;">{{$massage}}</h3>
            </div>
        </section>
    </main>
    <!--main-->

@endsection
