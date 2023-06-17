<div class="container-content">
    <div class="content-header">
        <div class="shopping-and-login">
            <div class="wrap" id="show-links-header">
                <div class="hamburger hamburger--squeeze">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </div>
            </div>
            <?php if(Auth::user()): ?>
            <a target="_self" href="<?php echo e(route('profile')); ?>" class="login-link">
                <span><?php echo e(Auth::user()->name); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <path id="Icon_open-person" data-name="Icon open-person" d="M18,0C13.05,0,9,5.04,9,11.25S13.05,22.5,18,22.5s9-5.04,9-11.25S22.95,0,18,0ZM8.6,22.5a9.009,9.009,0,0,0-8.6,9V36H36V31.5a8.978,8.978,0,0,0-8.6-9A12.638,12.638,0,0,1,18,27,12.638,12.638,0,0,1,8.6,22.5Z" fill="#f0f72b"/>
                </svg>
            </a>
            <?php else: ?>
            <a target="_self" href="<?php echo e(route('login')); ?>" class="login-link">
                <span> <?php echo app('translator')->get('site.login'); ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
                    <path id="Icon_open-person" data-name="Icon open-person" d="M18,0C13.05,0,9,5.04,9,11.25S13.05,22.5,18,22.5s9-5.04,9-11.25S22.95,0,18,0ZM8.6,22.5a9.009,9.009,0,0,0-8.6,9V36H36V31.5a8.978,8.978,0,0,0-8.6-9A12.638,12.638,0,0,1,18,27,12.638,12.638,0,0,1,8.6,22.5Z" fill="#f0f72b"/>
                </svg>
            </a>
            <?php endif; ?>

            <div class="shopping-bag">
                <a target="_self"  href="<?php echo e(route('site.cart.show')); ?>">
                    <span class="count"></span>
                    <svg id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" xmlns="http://www.w3.org/2000/svg" width="41.951" height="40.18" viewBox="0 0 41.951 40.18">
                        <path id="Path_1" data-name="Path 1" d="M15.541,31.77A1.77,1.77,0,1,1,13.77,30,1.77,1.77,0,0,1,15.541,31.77Z" transform="translate(1.893 5.139)" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        <path id="Path_2" data-name="Path 2" d="M32.041,31.77A1.77,1.77,0,1,1,30.27,30,1.77,1.77,0,0,1,32.041,31.77Z" transform="translate(4.869 5.139)" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        <path id="Path_3" data-name="Path 3" d="M1.5,1.5H8.582l4.745,23.707a3.541,3.541,0,0,0,3.541,2.851H34.077a3.541,3.541,0,0,0,3.541-2.851l2.833-14.854h-30.1" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                    </svg>
                </a>
            </div>
        </div>
        <ul class="links">
            <li class="current-link">
                <a href="#"> <?php echo app('translator')->get('site.home'); ?></a>
            </li>
            <li>
                <a target="_self" href="<?php echo e(route('site.allCategory')); ?>"><?php echo app('translator')->get('site.category'); ?> </a>
            </li>
        </ul>
        <div class="search-box-header">
            <div class="form-group-search">
                <svg xmlns="http://www.w3.org/2000/svg" width="21.053" height="21.059" viewBox="0 0 21.053 21.059">
                    <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M23.807,22.53l-5.855-5.91A8.345,8.345,0,1,0,16.685,17.9L22.5,23.774a.9.9,0,0,0,1.272.033A.907.907,0,0,0,23.807,22.53ZM11.394,17.974a6.589,6.589,0,1,1,4.66-1.93A6.548,6.548,0,0,1,11.394,17.974Z" transform="translate(-3 -2.995)"/>
                </svg>
                <form  action="<?php echo e(route('site.product.searchProduct')); ?>" method="POST" id="form-main-search">
                    <?php echo csrf_field(); ?>
                <input type="text" id="input-search" name="search" value=""/>
                <button type="submit" class="filter-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24.535" height="15.249" viewBox="0 0 24.535 15.249">
                        <path id="Icon_material-filter-list" data-name="Icon material-filter-list" d="M2.7,21.015H8.152V18.289H2.7Zm0-15.249V8.492H27.235V5.766Zm0,8.784H19.057V11.823H2.7Z" transform="translate(-2.7 -5.766)"/>
                    </svg>
                </button>

                    <ul class="search-results" style="height: auto">

                        <li>
                            <a  id="main-search"><?php echo e('ابحث'); ?></a>
                        </li>
                        </li>


                    </ul>
                </form>
            </div>
        </div>
        <h1 class="logo">
            <a target="_self" href="<?php echo e(route('site.index')); ?>">
                <span><?php echo app('translator')->get('site.name_store_en'); ?></span>
            </a>
        </h1>
    </div>
</div>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/layout/include/header.blade.php ENDPATH**/ ?>