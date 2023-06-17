<section class="large-swiper">
    <div class="swiper no-padding" id="large_swiper">
        <div class="swiper-wrapper">
            <?php $__currentLoopData = @$slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide">
                <div class="img-box">
                    <img src="<?php echo e(asset('images/slider/' . $item->slider_image)); ?>" alt="img"/>
                </div>
            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</section><!--large-swiper-->
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/home/include/slider.blade.php ENDPATH**/ ?>