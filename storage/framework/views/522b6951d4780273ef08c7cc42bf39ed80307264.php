<?php if($status == \App\Models\Status::STATUS_ACCEPT): ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-success "><?php echo e($name); ?></span>
<?php elseif($status == \App\Models\Status::STATUS_REJECT): ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-danger "><?php echo e($name); ?></span>
<?php elseif($status == \App\Models\Status::STATUS_SENT_SHIPMENT): ?>
    <span style="cursor: pointer"  class="m--font-bold btn btn-sm m-btn--pill btn-warning"><?php echo e($name); ?></span>
<?php elseif($status == \App\Models\Status::STATUS_DELIVERY): ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-primary "><?php echo e($name); ?></span>
<?php elseif($status == \App\Models\Status::STATUS_PREPARATION): ?>
    <span style="cursor: pointer"  class="m--font-bold btn btn-sm m-btn--pill btn-info  "><?php echo e($name); ?></span>
<?php elseif($status == \App\Models\Status::STATUS_PENDING): ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-light "><?php echo e($name); ?></span>
   <?php elseif($status == \App\Models\Status::STATUS_CANCEL): ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-dark "><?php echo e($name); ?></span>
<?php else: ?>
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-dark "><?php echo e($name); ?></span>

<?php endif; ?>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/orders/parts/btnStatus.blade.php ENDPATH**/ ?>