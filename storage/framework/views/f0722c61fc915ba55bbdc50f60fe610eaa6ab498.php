<div class="modal fade text-left" id="modalChooseShipping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33"><?php echo e(__('admin.chooseShipping')); ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form class="set-shipping-company" action="<?php echo e(route('orders.post_status')); ?>" id="choose-shipping-company" method="POST" >
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input   hidden  name="id"  id ="orderIDShipping" value="">
                    <input hidden name="status_id" value="<?php echo e(\App\Models\Status::STATUS_ACCEPT); ?>">

                    <div class="col-md-12 col-12" style="    margin-top: 30px;">
                        <fieldset class="form-group">
                            <label class="form-label"  for="helpInputTop"><?php echo e(__('admin.chooseShipping')); ?></label>
                            <select class="form-control " id="setShipmentId" name="shipment_id"
                                  >
                                <?php $__currentLoopData = $shipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>">
                                        <?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="submit"  class="btn btn-primary me-1 waves-effect waves-float setShippingOrder waves-light save" >
                        <?php echo e(__('admin.submit')); ?></button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/orders/parts/modalChooseShipping.blade.php ENDPATH**/ ?>