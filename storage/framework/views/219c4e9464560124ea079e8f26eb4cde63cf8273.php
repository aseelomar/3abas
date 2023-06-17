<?php $__env->startSection('css'); ?>




<?php $__env->stopSection(); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky + .content {
        padding-top: 99px;
    }

    .dt-buttons {
        float: right;
    }

    .print_btn{
       display:none !important;
    }
    .excel_btn{
        display:none !important;
    }


</style>
<style> #toast-container > .toast-error {
        background-color: #BD362F;
    } </style>
<style> #toast-container > .toast-success {
        background-color: #2dc45a;
    } </style>
<?php $__env->startSection('content'); ?>


    <div class="row">

        <div class="col-lg-12 ">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="form-label-group">
                                    <select class="form-control m-bootstrap-select" id="status">
                                        <option value=""> <?php echo e(__('admin.all')); ?></option>

                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-label-group">
                                    <input name="title" type="search" class="form-control m-input"  placeholder="<?php echo e(trans('admin.search')); ?>..." id="generalSearch">
                                    <label for="last-name-column"><?php echo e(trans('admin.search')); ?></label>
                                </div>
                            </div>
                            <div class="col-md-4 col-xl-0"></div>

                            <div class="col-md-3 col-12">
                                <?php if(\Illuminate\Support\Facades\App::isLocale('ar')): ?>
                                    <div class="row" style="float:left;  ">
                                        <?php else: ?>
                                            <div class="row" style="float:right; ">
                                                <?php endif; ?>
                                                <a class=" btn mr-1 mb-1 btn-secondary"
                                                   style="border-radius: 0px !important; margin: 0px !important;"
                                                   href="<?php echo e(url('exportOrder')); ?>">Excel </a>

                                            </div>

                                    </div>
                            </div>
                          <div class="table-responsive">
                        <table id="table_order" class="table  display  table-hover" style="text-align: center">


                            <thead style="margin-top: 30px !important;">
                               <tr>
                                    <th scope="col">#id</th>
                                    <th scope="col"><?php echo e(__('admin.number_order')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.customers_name')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.phone')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.country')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.product_name')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.payment_method')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.transfer_at')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.created_at')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.name_shipment')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.order_status')); ?></th>
                                    <th scope="col"><?php echo e(__('admin.action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    <?php echo $__env->make('admin.orders.parts.modelRejectMassage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.orders.parts.modalChooseShipping', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="<?php echo e(asset('admin/order.js')); ?>" type="text/javascript"></script>
    <script>


        $(document).ready(function () {
            Order.init();

        });

    </script>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/orders/index.blade.php ENDPATH**/ ?>