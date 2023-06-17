<?php if(Session::has('success')): ?>
    <div  class="alert alert-success" style="background-color: #4be54b ">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>
<?php if(Session::has('info')): ?>
    <div class="alert alert-info">
        <?php echo e(Session::get('info')); ?>

    </div>
<?php endif; ?>
<?php if(Session::has('warning')): ?>
    <div class="alert alert-warning">
        <?php echo e(Session::get('warning')); ?>

    </div>
<?php endif; ?>
<?php if(Session::has('erorr')): ?>
    <div class="alert alert-danger">
        <?php echo e(Session::get('erorr')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<style>
    .alert {
        text-align: center;
        font-size: 1rem;
    }

    .is-invalid {
        border-color: red !important;
    }

    .invalid-feedback {
        color: red !important;
    }

</style>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/layout/include/flash-messages.blade.php ENDPATH**/ ?>