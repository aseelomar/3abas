<?php $__env->startSection('content'); ?>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-gradient-info">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-shopping-cart"></i>
                                <?php echo e(__('admin.orders')); ?>

                                <small><?php echo e($count); ?></small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-success">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-users"></i>
                                <?php echo e(__('admin.customers')); ?>


                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-danger">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-shopping-bag"></i>
                                <?php echo e(__('admin.products')); ?>


                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-gradient-warning">
                    <div class="card-content">
                        <div class="card-body">
                            <h3 class="text-white">
                                <i class="feather icon-mail"></i>
                                <?php echo e(__('admin.messages')); ?>


                                <small>(11)</small>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong>  <?php echo e(__('admin.latest_orders')); ?>..</strong></h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered" style="text-align: center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"><?php echo e(__('admin.number_order')); ?></th>
                                <th scope="col"><?php echo e(__('admin.customers_name')); ?></th>
                                <th scope="col"><?php echo e(__('admin.product_name')); ?></th>
                                <th scope="col"><?php echo e(__('admin.order_status')); ?></th>
                                <th scope="col"><?php echo e(__('admin.payment_method')); ?></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $__currentLoopData = $order; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e(@$item->number_order); ?></td>
                                    <td><?php echo e(@$item->user->name); ?></td>
                                    <td><?php echo $__env->make('admin.orders.parts.btnProduct',['id'=> @$item->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                    <td><?php echo $__env->make('admin.orders.parts.btnStatus',['status'=> @$item->status_id , 'name'=>@$item->status->name], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></td>
                                    <td><?php echo e(@$item->paymentMethod->name); ?></td>

                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong><?php echo e(__('admin.revenues')); ?></strong></h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body px-0 pb-0" style="position: relative;">
                            <div class="row text-center mx-0">
                                <div class="col-6 border-top border-right d-flex align-items-between flex-column py-1">
                                    <p class="mb-50"><?php echo e(__('admin.for_this_day')); ?> </p>
                                    <p class="font-large-1 text-bold-700 mb-50"><?php echo e(@$totalRevenueThisDay); ?></p>
                                </div>
                                <div class="col-6 border-top d-flex align-items-between flex-column py-1">
                                    <p class="mb-50"><?php echo e(__('admin.total_month')); ?></p>
                                    <p class="font-large-1 text-bold-700 mb-50"><?php echo e(round($totalRevenueThisMonth,4)); ?></p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <p style="padding: 5px 10px; font-style: inherit">  <?php echo e(__('admin.most_products')); ?><strong> <?php echo e(__('admin.buy')); ?></strong>  </p>
                                <ul>
                                    <?php $__currentLoopData = @$bestSellerProduct; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a style="color: black;" href="<?php echo e(route('site.showProduct' ,@$itam->id)); ?>"><?php echo e(@$itam->name); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-end">
                        <h4 class="mb-0"> <strong> <?php echo e(__('admin.visitors_visits')); ?></strong> </h4>
                        <p class="mb-50"> <?php echo e(__('admin.Who_online')); ?><span style="color:red;">(11)</span> </p>

                    </div>
                    <div class="card-content">
                        <div class="card-body px-0 pb-0" style="position: relative;">
                            <div class="row">
                                <div class="col-xl-6">
                                    <p class="border-top" style="padding: 5px 10px; font-style: inherit"> <?php echo e(__('admin.most_products')); ?> <strong><?php echo e(__('admin.visit')); ?></strong> <?php echo e(__('admin.for_this_week')); ?>    </p>
                                    <div class="row  text-center mx-0">
                                        <ul>
                                            <?php $__currentLoopData = @$visitorSee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a style="color: black;" href="<?php echo e(route('site.showProduct' ,@$itam->id)); ?>"><?php echo e(@$itam->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <p class="border-top" style="padding: 5px 10px; font-style: inherit"> <?php echo e(__('admin.most_products')); ?> <strong><?php echo e(__('admin.request')); ?></strong>  <?php echo e(__('admin.for_this_week')); ?>  </p>
                                    <div class="row  text-center mx-0">
                                        <ul>
                                            <?php $__currentLoopData = @$bestSellerThisWeek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a style="color: black;" href="<?php echo e(route('site.showProduct' ,@$itam->product->id)); ?>"><?php echo e($itam->product->name); ?></a></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>

                                    </div>
                                </div>
                            </div>


                            <hr>


                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/home.blade.php ENDPATH**/ ?>