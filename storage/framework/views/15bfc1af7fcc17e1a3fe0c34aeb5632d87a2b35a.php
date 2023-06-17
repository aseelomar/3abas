<?php $__env->startSection('content'); ?>
    <main>

        <?php echo $__env->make('site.home.include.subHeader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.shopByCategories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.bestSellerProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.featuredProduct', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.bestSellerThisWeek', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.visitorsSee', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.bestSeller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('site.home.include.ads', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>





        <section class="features-list">
            <img src="./images/bg-features.png" alt="img" class="bg-features"/>
            <button class="go-top-button" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33">
                    <g id="Icon_feather-arrow-up-circle" data-name="Icon feather-arrow-up-circle" transform="translate(-1.5 -1.5)">
                        <path id="Path_27" data-name="Path 27" d="M33,18A15,15,0,1,1,18,3,15,15,0,0,1,33,18Z" fill="none" stroke="#872cff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        <path id="Path_28" data-name="Path 28" d="M24,18l-6-6-6,6" fill="none" stroke="#872cff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                        <path id="Path_29" data-name="Path 29" d="M18,24V12" fill="none" stroke="#872cff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                    </g>
                </svg>
            </button>
            <div class="container-content">
                <div class="items">
                    <?php $__currentLoopData = @$staticPage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="img-box">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="47" height="47" viewBox="0 0 47 47">
                                <image id="support" width="47" height="47" xlink:href="<?php echo e(asset('/images/pages/'.@$item->page_image)); ?>">
                            </svg>
                        </div>
                        <a target="_self" href="<?php echo e(route('site.staticPage',@$item->id)); ?>"><?php echo e(@$item->page_title_ar); ?></a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section><!--features-list-->
    </main><!--main-->
<?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>

    <script>

        function display_error_messages(type, msg) {
            const Toast = Swal.mixin({
                toast: true,
                position: 'bottom-left',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,

                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            Toast.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };
            if (type == 'error') {
                Toast.fire({
                    icon: 'error',
                    title: msg
                })

                Toast.error(msg);
            } else {
                Toast.fire({
                    icon: 'success',
                    title: msg
                });
            }

        }
    </script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('site.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/home/index.blade.php ENDPATH**/ ?>