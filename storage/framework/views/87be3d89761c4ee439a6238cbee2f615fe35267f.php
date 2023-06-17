

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky+.content {
        padding-top: 99px;
    }

    .print_btn{
        display:none !important;
    }
    .excel_btn{
        display:none !important;
    }


</style>
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;"><?php echo e(__('admin.orders')); ?> / <small><?php echo e(__('admin.all_orders')); ?> </small> </p>


        </div>

    </div>

    <div class="row">

        <div class="col-lg-12 ">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2 col-12">
                                <div class="form-label-group">
                                    <select class="form-control m-bootstrap-select" id="statusOrder">
                                        <option value="" > <?php echo e(__('admin.all')); ?></option>

                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>

                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <div class="form-label-group">
                                    <input name="title" type="search" class="form-control m-input" placeholder="<?php echo e(trans('admin.search')); ?>..." id="generalSearchOrder">
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
                                                   href="<?php echo e(route('shipment.exportShipmentOrder')); ?>">Excel </a>
                                            </div>
                                            </div>

                                    </div>




                    <div class="table-responsive">
                        <table id="table_shipment_order" class="table  display nowrap table-hover" style="text-align: center">
                            <input hidden value="<?php echo e($shipment->id); ?>" id="shipmentId" name="shipmentId">
                            <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col"><?php echo e(__('admin.number_order')); ?></th>
                                <th scope="col"><?php echo e(__('admin.customers_name')); ?></th>
                                <th scope="col"><?php echo e(__('admin.phone')); ?></th>
                                <th scope="col"><?php echo e(__('admin.country')); ?></th>
                                <th scope="col"><?php echo e(__('admin.product_name')); ?></th>
                                <th scope="col"><?php echo e(__('admin.payment_method')); ?></th>
                                <th scope="col"><?php echo e(__('admin.created_at')); ?></th>
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
    <?php echo $__env->make('admin.shipment.parts.modalForDelivery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <div>

</div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>



    <script src="/admin/shipment.js" type="text/javascript"></script>

    <script>


        $(document).ready(function () {
            Shipment.init();



        });

    </script>

    <script>

        $('#btnPrint').on('click', function() {
            document.getElementsByClassName('print_btn')[0].click();

        });
        $('#btnExecl').on('click', function() {
            document.getElementsByClassName('excel_btn')[0].click();

        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/shipment/shipmentOrder.blade.php ENDPATH**/ ?>