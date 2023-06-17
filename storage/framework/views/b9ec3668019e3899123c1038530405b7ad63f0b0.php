<?php $__env->startSection('style'); ?>
    <style>
        .page-item{
            padding: 8px;
        }
        .pagination{

            font-weight: bold;
            font-size: 20px;
            --swiper-theme-color: #B074FF;
            display: inline-flex;

        }
        .show {
            color: white;
            border: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            gap: 20px;
            padding: 13px 26px;
            line-height: 1;
            border-radius: 20px;
            background: rgba(126, 51, 224, 0.67);
            -webkit-box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }
        footer{
        position: fixed;
        bottom:0;
        left: 0;
        right:0;}
    </style>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('title',@$information->page_title_ar); ?>
<?php $__env->startSection('subTitle',@$information->page_title_ar); ?>
<?php $__env->startSection('sub_Title',@$information->page_title_ar); ?>
<?php $__env->startSection('content'); ?>

    <main id="main">

        <section class="products-page">
            <div class="container-content" style="    text-align: center;">
        <p><?php echo @$information->page_body_ar; ?></p>
        <div>


            </div>
            </div>
        </section>
    </main><!--main-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('site.pages.product.include.addToCart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('site.layout.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/staticPage/index.blade.php ENDPATH**/ ?>