<?php if($order->status_id == \App\Models\Status::STATUS_ACCEPT): ?>
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status  m-btn--pill btn-success "><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_REJECT): ?>
    <div style="cursor: pointer"   class="m--font-bold btn  status btn-sm m-btn--pill btn-danger "><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_SENT_SHIPMENT): ?>
    <div style="cursor: pointer"  class="m--font-bold btn btn-sm status m-btn--pill btn-warning"><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_DELIVERY): ?>
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill rejected "><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_PREPARATION): ?>
    <div style="cursor: pointer"  class="m--font-bold btn btn-sm status m-btn--pill btn-info  "><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_PENDING): ?>
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill underway "><?php echo e(@$order->status->name_ar); ?></div>
<?php elseif($order->status_id == \App\Models\Status::STATUS_CANCEL): ?>
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill btn-dark "><?php echo e(@$order->status->name_ar); ?></div>
<?php else: ?>
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill hanging "><?php echo e(@$order->status->name_ar); ?></div>

<?php endif; ?>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/order/include/status.blade.php ENDPATH**/ ?>