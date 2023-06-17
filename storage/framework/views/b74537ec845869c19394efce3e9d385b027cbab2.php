<?php $__env->startSection('style'); ?>
    <style>
        .breadcrumb{
            background: #B074FF;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',__('site.order_history')); ?>
<?php $__env->startSection('subTitle',__('site.order_history')); ?>
<?php $__env->startSection('sub_Title',__('site.order_history')); ?>
<?php $__env->startSection('content'); ?>

    <main>
        <div class="profile-page">
            <div class="container-content">
                <div class="profile-layout">
                    <aside>
                        <div class="user-menu-side">
                            <div class="img-box">
                                <img src="<?php echo e(asset('site/images/user.png')); ?>" alt="img"/>
                            </div>
                            <div class="info">
                                <h2><?php echo e(@$user->name); ?></h2>
                                <p><?php echo e(@$user->mobile); ?></p>
                            </div>
                        </div>
                        <ul class="links-aside">
                            <li><a>
                                <a   target="_self" href="<?php echo e(route('profile')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="33.16" height="25.791" viewBox="0 0 33.16 25.791">
                                        <path id="Icon_awesome-id-card" data-name="Icon awesome-id-card" d="M30.4,2.25H2.763A2.764,2.764,0,0,0,0,5.013v.921H33.16V5.013A2.764,2.764,0,0,0,30.4,2.25ZM0,25.278a2.764,2.764,0,0,0,2.763,2.763H30.4a2.764,2.764,0,0,0,2.763-2.763V7.777H0ZM20.265,11.922a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461Zm0,3.684a.462.462,0,0,1,.461-.461h8.29a.462.462,0,0,1,.461.461v.921a.462.462,0,0,1-.461.461h-8.29a.462.462,0,0,1-.461-.461ZM10.132,11.461a3.684,3.684,0,1,1-3.684,3.684A3.688,3.688,0,0,1,10.132,11.461ZM3.863,23.217a3.69,3.69,0,0,1,3.506-2.545h.472a5.93,5.93,0,0,0,4.583,0H12.9A3.69,3.69,0,0,1,16.4,23.217a.907.907,0,0,1-.9,1.14H4.761A.909.909,0,0,1,3.863,23.217Z" transform="translate(0 -2.25)" fill="#000"/>
                                    </svg>
                                    <span>المعلومات الشخصية</span>
                                </a>
                            </li>
                            <li>
                                <a   target="_self" href="<?php echo e(route('site.order.orderHistory')); ?>" class="active">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28.958" height="38.102" viewBox="0 0 28.958 38.102">
                                        <g id="Icon_ionic-ios-document" data-name="Icon ionic-ios-document" transform="translate(-7.313 -3.938)">
                                            <path id="Path_19" data-name="Path 19" d="M22.411,13.365H31.08a.472.472,0,0,0,.476-.476h0a2.819,2.819,0,0,0-1.019-2.181L23.269,4.649a3.059,3.059,0,0,0-1.962-.7h0a.7.7,0,0,0-.7.7v6.906A1.809,1.809,0,0,0,22.411,13.365Z" transform="translate(4.714 0.002)"/>
                                            <path id="Path_20" data-name="Path 20" d="M22.839,11.558V3.938H10.361A3.057,3.057,0,0,0,7.313,6.986V38.991a3.057,3.057,0,0,0,3.048,3.048H33.222a3.057,3.057,0,0,0,3.048-3.048V15.844H27.126A4.293,4.293,0,0,1,22.839,11.558Z"/>
                                        </g>
                                    </svg>
                                    <span>سجل الطلبات</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('profile.notification')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27.485" height="34.402" viewBox="0 0 27.485 34.402">
                                        <g id="Icon_ionic-ios-notifications-outline" data-name="Icon ionic-ios-notifications-outline" transform="translate(-6.775 -3.93)">
                                            <path id="Path_21" data-name="Path 21" d="M21.633,28.336a1.114,1.114,0,0,0-1.092.877,2.155,2.155,0,0,1-.43.937,1.625,1.625,0,0,1-1.384.507,1.652,1.652,0,0,1-1.384-.507,2.155,2.155,0,0,1-.43-.937,1.114,1.114,0,0,0-1.092-.877h0A1.121,1.121,0,0,0,14.728,29.7a3.842,3.842,0,0,0,4,3.19,3.835,3.835,0,0,0,4-3.19,1.125,1.125,0,0,0-1.092-1.367Z" transform="translate(1.767 5.439)"/>
                                            <path id="Path_22" data-name="Path 22" d="M33.915,29.407c-1.324-1.745-3.929-2.769-3.929-10.584,0-8.022-3.542-11.247-6.844-12.02-.31-.077-.533-.181-.533-.507V6.046A2.109,2.109,0,0,0,20.545,3.93h-.052A2.109,2.109,0,0,0,18.43,6.046v.249c0,.318-.224.43-.533.507-3.31.782-6.844,4-6.844,12.02,0,7.816-2.605,8.83-3.929,10.584A1.707,1.707,0,0,0,8.49,32.141H32.574A1.708,1.708,0,0,0,33.915,29.407Zm-3.353.5H10.511a.377.377,0,0,1-.284-.628,10.417,10.417,0,0,0,1.806-2.872,19.485,19.485,0,0,0,1.23-7.584c0-3.207.6-5.718,1.8-7.463a5.517,5.517,0,0,1,3.328-2.373,3.013,3.013,0,0,0,1.6-.9.68.68,0,0,1,1.023-.017,3.115,3.115,0,0,0,1.616.92,5.517,5.517,0,0,1,3.328,2.373c1.2,1.745,1.8,4.256,1.8,7.463a19.485,19.485,0,0,0,1.23,7.584,10.535,10.535,0,0,0,1.849,2.915A.355.355,0,0,1,30.562,29.906Z" transform="translate(0 0)"/>
                                        </g>
                                    </svg>
                                    <div>
                                        <span>التنبيهات</span>
                                        <span class="count"><?php echo e(@$countNotSeen); ?></span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('site.product.favProduct')); ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32.5" height="31.25" viewBox="0 0 32.5 31.25">
                                        <path id="Icon_ionic-ios-heart-empty" data-name="Icon ionic-ios-heart-empty" d="M27.5,4.375h-.078A8.889,8.889,0,0,0,20,8.438a8.889,8.889,0,0,0-7.422-4.062H12.5A8.833,8.833,0,0,0,3.75,13.2,19.017,19.017,0,0,0,7.484,23.57C12.188,30,20,35.625,20,35.625S27.813,30,32.516,23.57A19.017,19.017,0,0,0,36.25,13.2,8.833,8.833,0,0,0,27.5,4.375Zm3.25,17.906A59.921,59.921,0,0,1,20,32.875a60.011,60.011,0,0,1-10.75-10.6A16.854,16.854,0,0,1,5.938,13.2,6.629,6.629,0,0,1,12.516,6.57h.07a6.55,6.55,0,0,1,3.211.844,6.827,6.827,0,0,1,2.375,2.227,2.195,2.195,0,0,0,3.672,0,6.9,6.9,0,0,1,2.375-2.227A6.55,6.55,0,0,1,27.43,6.57h.07A6.629,6.629,0,0,1,34.078,13.2,17.067,17.067,0,0,1,30.75,22.281Z" transform="translate(-3.75 -4.375)"/>
                                    </svg>
                                    <span>المفضلة</span>
                                </a>
                            </li>
                        </ul>
                    </aside>
                    <div class="main-wrapper">
                        <div class="title-profile">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24.774" height="32.598" viewBox="0 0 24.774 32.598">
                                    <g id="Icon_ionic-ios-document" data-name="Icon ionic-ios-document" transform="translate(-7.313 -3.938)">
                                        <path id="Path_19" data-name="Path 19" d="M22.15,12h7.416a.4.4,0,0,0,.407-.407h0A2.412,2.412,0,0,0,29.1,9.731L22.883,4.548a2.617,2.617,0,0,0-1.679-.6h0a.6.6,0,0,0-.6.6v5.908A1.548,1.548,0,0,0,22.15,12Z" transform="translate(2.113 0.001)"/>
                                        <path id="Path_20" data-name="Path 20" d="M20.6,10.457V3.938H9.92A2.615,2.615,0,0,0,7.313,6.545V33.928A2.616,2.616,0,0,0,9.92,36.535H29.479a2.616,2.616,0,0,0,2.608-2.608v-19.8H24.263A3.673,3.673,0,0,1,20.6,10.457Z"/>
                                    </g>
                                </svg>
                            </div>
                            <h3>سجل الطلبات</h3>
                        </div>
                        <div class="order-boxes" >

                            <?php $__currentLoopData = @$orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="order-box">
                                <div class="header-box row col-12 ">

                                    <span class="order-num">العناصر # <?php echo e($loop->iteration); ?></span>
                                    <span class="order-num"># <?php echo e(@$order->number_order); ?></span>
                                    <?php echo $__env->make('site.pages.order.include.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                    <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#productView<?php echo e(@$order->id); ?>">
                                        عرض الطلب
                                    </button>
                                    <button type="button" class="btn btn-outline-success waves-effect waves-light" data-toggle="modal" data-target="#orderTracking<?php echo e(@$order->id); ?>">
                                        تتبع الطلب
                                    </button>


                                    <button type="button"  onclick="window.location='<?php echo e(route('contactUs')); ?>'"   class="btn-order yellow-color">تقديم شكوى</button>
                                </div>

                            </div>
                                <div class="modal fade" id="productView<?php echo e(@$order->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content" style="width: auto;margin: auto !important;">
                                            <div id="edit_form_holder">
                                                <div class="order-box" style="border-radius: unset; width:revert; margin: auto" >
                                                    <div class="header-box">
                                                        <span class="order-num">العناصر #<?php echo e($loop->iteration); ?></span>
                                                        <span class="order-num">#<?php echo e(@$order->number_order); ?></span>
                                                        <?php echo $__env->make('site.pages.order.include.status', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <span class="price"><?php echo e(@$order->total); ?> <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                        <?php if($order->status_id == \App\Models\Status::STATUS_PENDING): ?>
                                                        <button type="button" data-status="<?php echo e($order->status_id); ?>" data-value="<?php echo e(@$order->id); ?>" class="btn-order delete_order">الغاء الطلب</button>
                                                            <?php endif; ?>
                                                    </div>
                                                    <div class="order-body">
                                                        <div class="flex-items">
                                                            <div class="info">
                                                                <h3 class="date"> <?php echo e(\Carbon\Carbon::parse(@$order->created_at)->toFormattedDateString()); ?></h3>
                                                                <p>
                                                                    <span><?php echo e(@$order->created_at->format('H:i:s')); ?></span>

                                                                </p>
                                                                <div class="items">
                                                                    <?php $__currentLoopData = @$order->orderProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="item">
                                                                        <div class="head">
                                                                            <a href="<?php echo e(route('site.showProduct',@$item->cart->product->id ?? 0)); ?>">
                                                                            <h4><?php echo e(@$item->cart->product->product_name_ar); ?> </h4>
                                                                            <span style="font-weight: bold;     text-align: center;"> السعر النهائي<?php echo e(@$item->cart->total_price); ?><span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                            </a>
                                                                        </div>
                                                                        <p><?php echo e(@$item->cart->product_sale_price); ?>*<?php echo e(@$item->cart->count); ?>= <?php echo e(@$item->cart->price_before_discount); ?> <span style="font-size: x-small;font-weight: 500;">شيكل</span></p>
                                                                    </div>

                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            </div>
                                                            <div class="calculator">
                                                                <div class="items">
                                                                    <div class="item">
                                                                        <span>سعر الطلب</span>
                                                                        <span><?php echo e(@$order->price_before_discount); ?><span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                    </div>
                                                                    <div class="item">
                                                                        <span>سعر التوصيل</span>
                                                                        <span>0<span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                    </div>
                                                                    <div class="item">
                                                                        <span>الضريبة</span>
                                                                        <span>0<span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                    </div>
                                                                    <div class="item">
                                                                        <span>قيمة الخصم</span>
                                                                        <span><?php echo e(@$order->discount); ?><span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                    </div>
                                                                    <div class="item">
                                                                        <span class="bold-text">المجموع الكلي</span>
                                                                        <span><?php echo e(@$order->total); ?><span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="orderTracking<?php echo e(@$order->id); ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <div class="modal-content" style="width: max-content;margin: auto !important;">
                                            <div id="edit_form_holder">
                                                <div class="order-box" style="border-radius: unset; width: max-content; margin: auto" >
                                                    <div class="table-responsive">
                                                        <table class="table table-striped mb-0">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col"><?php echo e(__('admin.id')); ?></th>
                                                                <th scope="col"><?php echo e(__('admin.order_status')); ?></th>
                                                                <th scope="col"><?php echo e(__('admin.created_at')); ?></th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php $__currentLoopData = $order->orderTracking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <th scope="row"><?php echo e($loop->iteration); ?></th>
                                                                    <td><?php echo e($item->status->name); ?></td>
                                                                    <td><?php echo e(@$item->created_at); ?></td>



                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <a id="redirict" href="<?php echo e(route('site.order.orderHistory')); ?>" hidden></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php $__env->stopSection(); ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function(){


        $(document).on('click', '.delete_order', function(){
            var id = $(this).attr('data-value');
            var status = $(this).attr('data-status');
            var token ='<?php echo e(csrf_token()); ?>'

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
                               url: '<?php echo e(route('site.order.deleteOrder')); ?>',
                               type: 'POST',
                               data: {
                                   _token: '<?php echo e(csrf_token()); ?>',
                                   id:id,
                                   status :status,
                               } ,

                           })
                        .done(function(response){
                            //swal.fire('تم الحذف!', response.message, response.status);
                            
                            document.getElementById("redirict").click();
                            $('#redirict').click();
                        })
                        .fail(function(){
                            swal.fire("عفوًا ..." , "حدث خطأ ما !" , 'error');
                        });
                }

            })

        });
    });


</script>
<script>
    <?php if(session('success')): ?>

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
                   title: '<?php echo e(session('success')); ?>'
               });
    <?php endif; ?>


</script>




<?php echo $__env->make('site.layout.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/order/orderHistory.blade.php ENDPATH**/ ?>