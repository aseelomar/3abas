<section class="best-seller section-margin">
    <div class="container-content">
        <div class="section-header">
            <h2><?php echo app('translator')->get('site.best_seller'); ?>
               </h2>
            <a href="<?php echo e(route('site.product.bestSellerProduct')); ?>">
                <span><?php echo app('translator')->get('site.all'); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14.508" height="23.984" viewBox="0 0 14.508 23.984">
                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M11.874,16.118l9.6-9.068a1.641,1.641,0,0,0,0-2.42,1.9,1.9,0,0,0-2.569,0L8.029,14.9a1.644,1.644,0,0,0-.053,2.363L18.9,27.614a1.9,1.9,0,0,0,2.569,0,1.641,1.641,0,0,0,0-2.42Z" transform="translate(-7.5 -4.129)"/>
                </svg>
            </a>
        </div>
        <div class="boxes-products">
            <div class="large-item">
                <div class="rate-text">
                    <span><?php echo e(round(@$bestSellerProduct[0]->rating, 2)); ?> (<?php echo e(@$bestSellerProduct[0]->total_reviews); ?>)</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
                        <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
                    </svg>
                </div>
                <a target="_self" href="<?php echo e(route('site.showProduct',@$bestSellerProduct[0]->id)); ?>">
                <img src="<?php echo e(asset('images/products/'.@$bestSellerProduct[0]->id .'/'.@$bestSellerProduct[0]->mainPhoto->image)); ?>" class="img-product" alt="img"/>
                </a>
                    <div class="description">
                    <a target="_self" href="<?php echo e(route('site.showProduct',@$bestSellerProduct[0]->id)); ?>"><?php echo e(@$bestSellerProduct[0]->name); ?> </a>
                    <p><?php echo e(@$bestSellerProduct[0]->description); ?> </p>
                </div>
            </div>
            <div class="items">
                <?php $__currentLoopData = @$bestSellerProduct->skip(1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item">
                    <div class="img-box">
                        <a target="_self" href="<?php echo e(route('site.showProduct',@$item->id)); ?>">
                        <img src="<?php echo e(asset('images/products/'.@$item->id .'/'.@$item->mainPhoto->image)); ?>" class="img-product" alt="img"/>
                        </a>
                    </div>
                    <div class="description">
                        <a target="_self" href="<?php echo e(route('site.showProduct',@$item->id)); ?>"><?php echo e(@$item->description); ?></a>
                        <div class="rate-text">
                            <span><?php echo e(round(@$item->rating, 2)); ?> (<?php echo e(@$item->total_reviews); ?>)</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
                                <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section><!--best-seller-->
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/home/include/bestSellerProduct.blade.php ENDPATH**/ ?>