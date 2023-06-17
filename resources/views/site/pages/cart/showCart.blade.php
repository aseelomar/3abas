@extends('site.layout.site')

@section('title',__('site.cart'))
@section('style')
    <link rel="stylesheet" type="text/css"
          href="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('subTitle',__('site.cart'))
@section('sub_Title',__('site.cart'))
@section('content')

    <main class="update">

        <div class="shopping-basket">
            <div class="container-content">
                <div class="shopping-basket-grid">
                    <div class="table-info">
                        <div class="head">
                            <div class="empty"></div>
                            <div class="info">
                                <h4>{{__('site.product_description')}}</h4>
                                <h4 class="text-center">{{__('site.price')}}</h4>
                                <h4>{{__('site.quantity')}}</h4>
                                <h4 class="text-center">{{__('site.total')}}</h4>
                            </div>
                        </div>
                        <div class="items">
                            @foreach($products as $item)

                                <div class="item">
                                    <div class="img-box">
                                        <img
                                            src="{{ asset('images/products/'.@$item->product->id .'/'.@$item->product->mainPhoto->image) }}"
                                            alt="img"/>
                                    </div>
                                    <div class="info">
                                        <div class="res-item">
                                            <h4 class="hidden-h4">وصف المنتج</h4>
                                            <a href="{{route('site.showProduct',@$item->product->id ?? 0)}}">
                                            <h4>{{@$item->product->product_name_ar}}</h4>
                                            </a>
                                        </div>
                                        <div class="res-item">
                                            <h4 class="hidden-h4">السعر</h4>

                                            <h4 class="text-center"><del>{{@$item->product_sale_price}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></del></h4>
                                        </div>

                                        <div class="res-item">
                                            <input type="hidden" value="{{@$item->id}}" class="cart_id">
                                            <h4 class="hidden-h4">الكمية</h4>
                                            <div class="increase-order">
                                                <input type="number" placeholder="1" value="{{@$item->count}}"
                                                       class="count" readonly/>
                                                <div class="btns">
                                                    <button data-type="plus"  class="plus btn-update-cart">+</button>
                                                    <button data-type="sub"   class="min btn-update-cart">-</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="res-item">
                                            <h4 class="hidden-h4">الإجمالي</h4>
                                            @if(@$item->discount_total_product== 0)
                                                <h4 class="text-center" >{{@$item->total_price}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></h4>

                                            @else
                                                <h4 class="text-center" class="total_price" style=" text-decoration: line-through;color: red;">{{@$item->total_price}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></h4>
                                                <h4 class="text-center">{{@$item->discount_total_product}}</h4>

                                            @endif

                                            <div class="res-item">
                                                <button class="btn btn-warning delete_product" data-value="{{@$item->id}}" style="margin-right: 40%;margin-top: 20px;border-color: red;background: red;border-radius: 5px;width: 30px;height: 30px;">
                                                    <i class="fa fa-trash-o" style="color: white;font-size:20px;"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="operation-summary">
                        <h3>{{__('site.operation_summary')}}</h3>
                        <form id="form-check-discount" action="{{route('site.cart.setDiscount')}}" method="POST">
                            @csrf
                            <div class="discount-code">
                                <input type="text" id="coupon_code" placeholder="{{__('site.discount_code')}}" value="" name="code"/>
                                <button type="submit" class="check-discount">تطبيق الكود</button>
                            </div>
                        </form>

                        <div class="total">
                             <span>{{__('site.total')}} </span>
                            <span>{{@$total}} <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>

                        </div>


  <form  id="form-complete-payment-process"  action="{{route('site.order.createOrder')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{@$products}}" name="product_cart" id="product_cart" >
                             <input type="hidden" value="{{@$total}}" name="final_total" id="final_total" >
                             <input type="hidden" value="{{@$total_before_cart}}" name="total_before_cart" id="total_before_cart" >
                             <input type="hidden" value="{{@$discountAllProduct}}" name="discount_all_product" id="discount-all-product" >

                             <button type="submit" class="complete-payment-process">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18.977" height="16.151"
                                 viewBox="0 0 18.977 16.151">
                                <g id="Icon_feather-arrow-right" data-name="Icon feather-arrow-right"
                                   transform="translate(-11.273 -9.925)">
                                    <path id="Path_33" data-name="Path 33" d="M7.5,18H22.977"
                                          transform="translate(5.523)" fill="none" stroke="#f0f72b"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5"/>
                                    <path id="Path_34" data-name="Path 34" d="M18,7.5l5.6,5.6L18,18.7"
                                          transform="translate(4.899 4.899)" fill="none" stroke="#f0f72b"
                                          stroke-linecap="round" stroke-linejoin="round" stroke-width="3.5"/>
                                </g>
                            </svg>
                            <span>اكمال عملية الدفع</span>
                        </button>
</form>
                    </div>
                </div>
                <a href="{{route('site.cart.show')}}" class="update-btn">
                    تحديث السلة
                </a>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script
        src="{{url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.js')}}"></script>

    <script>
        $(document).on('click', '.btn-update-cart', function (e) {
            e.preventDefault();
            var ele            = $(this);
            var type           = ele.attr('data-type');
            var quantityHolder = ele.closest('.res-item').find('.count');
            var count          = parseInt(quantityHolder.val());

            var ItemHolder = ele.closest('.res-item').find('.cart_id');
            var cart_id    = ItemHolder.val();

            if (type === 'sub')
            {
                if (count <= 1)
                {
                    return;
                }

                count = count - 1;
            } else
            {
                count = count + 1
            }

            $.ajax({
                       url   : '{{route('site.cart.updateCount')}}',
                       method: 'POST',
                       data  : {
                           _token: '{{csrf_token()}}',

                           cart_id: cart_id,
                           count  : count,

                       },

                       success: function (response) {
                           $('.shopping-basket').html(response).fadeIn();
                           display_error_messages('success', 'تم التحديث بنجاح')
                       },
                       error  : function (response) {

                           $.each(response.responseJSON.errors, function (k, v) {
                               display_error_messages('error', v[0])
                           });
                       }

                   });
        });


        function display_error_messages(type, msg)
        {
            const Toast = Swal.mixin({
                                         toast            : true,
                                         position         : 'bottom-left',
                                         showConfirmButton: false,
                                         timer            : 3000,
                                         timerProgressBar : true,

                                         didOpen: (toast) => {
                                             toast.addEventListener('mouseenter', Swal.stopTimer)
                                             toast.addEventListener('mouseleave', Swal.resumeTimer)
                                         }
                                     });

            Toast.options = {
                "closeButton"      : false,
                "debug"            : false,
                "newestOnTop"      : false,
                "progressBar"      : false,
                "positionClass"    : "toast-bottom-left",
                "preventDuplicates": false,
                "onclick"          : null,
                "showDuration"     : "300",
                "hideDuration"     : "1000",
                "timeOut"          : "5000",
                "extendedTimeOut"  : "1000",
                "showEasing"       : "swing",
                "hideEasing"       : "linear",
                "showMethod"       : "fadeIn",
                "hideMethod"       : "fadeOut"
            };
            if (type == 'error')
            {
                Toast.fire({
                               icon : 'error',
                               title: msg
                           })

                Toast.error(msg);
            } else
            {
                Toast.fire({
                               icon : 'success',
                               title: msg
                           });
            }

        }


        $(document).on('click', '.check-discount', function (e) {

            e.preventDefault();

            var form = document.getElementById('form-check-discount');

            var url  = $('#form-check-discount').attr('action');
            var data = new FormData(form)
            $('.btn-update-cart').attr('disabled', true);

            $.ajax({
                       url        : url,
                       method     : 'POST',
                       data       : {
                           _token: '{{csrf_token()}}',
                           code: $('#coupon_code').val(),

                       },
                       success    : function (response) {

                           $('.shopping-basket').html(response).fadeIn();
                           display_error_messages('success', 'تم الخصم بنجاح')
                           $('.btn-update-cart').attr('disabled', false);


                       },
                       error      : function (response) {


                           if(response.status === 422)
                           {
                               if (response.responseJSON.message)
                               {
                                   display_error_messages('error', response.responseJSON.message)
                                   $('.')
                                   $('.btn-update-cart').attr('disabled', false);
                               } else
                               {
                                   $.each(response.responseJSON.errors, function (k, v) {
                                       display_error_messages('error', msg)
                                   });
                                   $('.btn-update-cart').attr('disabled', false);
                               }
                           }
                       }

                   });
        });






            $(document).on('click', '.delete_product', function(){
                var id = $(this).attr('data-value');

                var token ='{{csrf_token()}}'
                $('.delete_product').attr('disabled', false);

                swal.fire({
                              title: 'هل انت متأكد من حذف الطلب؟',
                              text: "لن تتمكن من التراجع عن هذا!",
                              icon: 'warning',
                              showCancelButton: true,
                              confirmButtonColor: '#3085d6',
                              cancelButtonColor: '#d33',
                              confirmButtonText: 'نعم ، احذفها!',
                          }).then((result) => {
                    if (result.value){
                        $.ajax({
                                   url: '{{route('site.cart.deleteProduct')}}',
                                   type: 'POST',
                                   data: {
                                       _token: '{{csrf_token()}}',
                                       id:id,
                                       status :status,
                                   } ,

                               })
                            .done(function(response){
                                //swal.fire('تم الحذف!', response.message, response.status);
                                {{--window.location('{{route('site.order.orderHistory')}}')--}}
                                $('.shopping-basket').html(response).fadeIn();
                                display_error_messages('success', 'تم الحذف بنجاح')
                                $('.delete_product').attr('disabled', true);
                            })
                            .fail(function(){
                                swal.fire("عفوًا ..." , "حدث خطأ ما !" , 'error');
                            });
                    }

                })

            });


    </script>
    <script>
        @if (session('success'))

        const Toast = Swal.mixin({
                                     toast: true,
                                     position: 'bottom-left',
                                     showConfirmButton: false,
                                     timer: 3000,
                                     timerProgressBar: true,
                                     didOpen: (toast) => {
                                         toast.addEventListener('mouseenter', Swal.stopTimer)
                                         toast.addEventListener('mouseleave', Swal.resumeTimer)
                                     }
                                 });

        Toast.fire({
                       icon: 'success',
                       title: '{{ session('success') }}'
                   });
        @endif


    </script>
@endsection
