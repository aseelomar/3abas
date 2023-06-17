    <div class="modal fade text-left" id="modalForDelivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33"><?php echo e(__('admin.Attach_invoice')); ?></h4>
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
                <form class="nameForm" action="<?php echo e(route('shipment.deliveryOrderStatue')); ?>" id="up_delivery_order2" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                            <input   hidden  name="id"  id ="orderID" value="">
                            <input hidden name="status_id" value="<?php echo e(\App\Models\Status::STATUS_DELIVERY); ?>">
                      <div class="col-md-6 col-12" style="    margin-top: 30px;">
                            <fieldset class="form-group">
                                <label class="form-label"  for="helpInputTop"><?php echo e(__('admin.imageOrder')); ?></label>
                                <div class=" custom-file mb-1">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label form-control" id="helpInputTop">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="uploadInvoiceBtn2" type="submit"  class="btn btn-primary me-1 waves-effect waves-float deliverOrder waves-light save" >
                            <?php echo e(__('admin.submit')); ?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>












    <script type="text/javascript">
        $(document).ready(function(){


        });
    </script>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/shipment/parts/modalForDelivery.blade.php ENDPATH**/ ?>