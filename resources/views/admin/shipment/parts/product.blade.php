<div class="row" id="table-striped" >
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{__('admin.product_order')}}</h4>
            </div>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                        <tr>
                            <th scope="col">{{__('admin.id')}}</th>
                            <th scope="col">{{__('admin.name')}}</th>
                            <th scope="col">{{__('admin.count')}}</th>
                            <th scope="col">{{__('admin.price')}}</th>
                            <th scope="col">{{__('admin.total')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products->orderProduct  as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="{{route('site.showProduct',@$product->cart->product->id)}}" data-toggle="modal" data-target="#showProduct{{ @$product->cart->id }}">{{@$product->cart->product->name}}</a></td>
                                <td>{{$product->cart->count}}</td>
                                <td>{{$product->cart->product_sale_price}}</td>
                                @if(@$product->cart->total_price === $product->cart->price_before_discount)
                                    <td class="text-center" >${{@$product->cart->total_price}} </td>

                                @else
                                    <td class="text-center" class="total_price"><span class="text-center" style=" text-decoration: line-through;color: red;">${{@$product->cart->price_before_discount}}</span>
                                        ${{@$product->cart->total_price}}
                                    </td>

                                @endif

                            </tr>
                            <div class="modal  showProduct " id="showProduct{{ @$product->cart->id }}"  tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">تفاصيل المنتج</h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>
                                        <div class="modal-body">
                                            <img width="100%" height="100%"  src="{{ asset('images/products/'.@$product->cart->product->id .'/'.@$product->cart->product->mainPhoto->image) }}">
                                            @if(isset($product->cart->size))
                                                <h4 > الحجم:{{@$product->cart->size}}  </h4>
                                            @else
                                                <h4> {{'لا يوجد حجم معين'}}</h4>
                                            @endif
                                            @if(isset($product->cart->color_id))
                                                <h4 > اللون:{{@$product->cart->color->name}}  </h4>

                                            @else
                                                <h4> {{'لا يوجد لون معين'}}</h4>
                                            @endif
                                            {{--                                        <p>@if(isset($item->contact_us))--}}
                                            {{--                                                <span class="order-num">الرسالة:</span>--}}
                                            {{--                                                {!!@$item->contactUs->message!!}--}}
                                            {{--                                            @elseif(isset($item->order))--}}
                                            {{--                                                <span class="order-num">الرسالة:</span>--}}
                                            {{--                                                {!! $item->order->note!!}--}}
                                            {{--                                            @endif--}}
                                            {{--                                        </p>--}}
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                        <tr class="table-primary">
                            <td></td>
                            <td style="text-align: center;">{{__('admin.order_price_before_discount')}}</td>
                            <td>{{@$products->price_before_discount}}</td>
                            <td  style="text-align: center;">{{__('admin.order_price_after_discount')}}</td>
                            <td >{{@$products->total}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
