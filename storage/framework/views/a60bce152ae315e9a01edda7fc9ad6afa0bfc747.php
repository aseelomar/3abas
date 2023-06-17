
<?php if($status == \App\Models\Status::STATUS_PENDING): ?>
    <input id="setStatus" type="hidden" name="status" value="">
    <span style="cursor: pointer" href="<?php echo e(route('orders.status')); ?>" data-whatever="<?php echo e($id); ?>" data-value="<?php echo e(\App\Models\Status::STATUS_REJECT); ?>"  class="m--font-bold btn btn-sm m-btn--pill btn-danger   openModal"><?php echo e(trans('admin.reject')); ?></span>
    <span style="cursor: pointer" href="<?php echo e(route('orders.status')); ?>" data-user="<?php echo e(@$shipment_id); ?>" data-value="<?php echo e(\App\Models\Status::STATUS_ACCEPT); ?>" id="change-status" data-value="<?php echo e(\App\Models\Status::STATUS_ACCEPT); ?>" data-whatever="<?php echo e($id); ?>" class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status openModalChooseShipping"><?php echo e(trans('admin.accept')); ?></span>
<?php else: ?>
    <span  disabled class="m--font-bold btn btn-sm m-btn--pill btn-danger "><i class="fa fa-ban" aria-hidden="true"></i>
<?php echo e(trans('admin.Cant_edited')); ?></span>

<?php endif; ?>
<script>
    $('.openModal').on('click',function (e){
        e.preventDefault();
        var setOrder =$(this).data('whatever');
        $('#orderID').val(setOrder)
        $('#modalForReject').modal('show');
    });
</script>
<script>
    $('.openModalChooseShipping').on('click',function (e){
        e.preventDefault();
        var setOrder =$(this).data('whatever');
        var setShipment =$(this).data('user');

        $('#orderIDShipping').val(setOrder) ;
        $("#setShipmentId").val(setShipment);
        $('#modalChooseShipping').modal('show');
    });
</script>

<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/orders/parts/action.blade.php ENDPATH**/ ?>