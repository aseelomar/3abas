<html>
<head>


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo app('translator')->get('site.store_name'); ?>-<?php echo $__env->yieldContent('site.title'); ?></title>
    <!--FONT LINKS-->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.6.13/sweetalert2.min.css')); ?>">
    <!--MAIN STYLE FILE-->
    <link rel="stylesheet" href="<?php echo e(asset('site/css/main-rtl.css')); ?>">

    <?php echo $__env->yieldContent('style'); ?>
</head>
<body class="bg-body">
<header>
    <?php echo $__env->make('site.layout.include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</header><!--header-->
<?php echo $__env->yieldContent('content'); ?>



<footer>
    <div class="container-content">
        <div class="content-footer">
            <div class="right-section">
                <div class="logo">
                    <span>Abbas Express</span>
                </div>
                <ul class="links">
                    <li><a target="_self"  href="<?php echo e(route('site.index')); ?>"><?php echo app('translator')->get('site.home'); ?> </a></li>
                    <li><a target="_self" href="<?php echo e(route('site.allCategory')); ?>"><?php echo app('translator')->get('site.category'); ?></a></li>
                    <?php if(Auth::user()): ?>
                        <li><a target="_self"  href="<?php echo e(route('logout')); ?>"><?php echo app('translator')->get('site.sign_out'); ?></a></li>
                    <?php else: ?>
                    <li>  <a target="_self" href="<?php echo e(route('login')); ?>" class="login-link">
                            <span> <?php echo app('translator')->get('site.login'); ?></span>

                        </a></li>
                    <?php endif; ?>

                </ul>
            </div>
            <ul class="social-media-buttons">
                <li>
                    <a href="<?php echo e(\App\Models\Confiq::getValue('other')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.002" height="26.19" viewBox="0 0 36.002 26.19">
                            <g id="Icon_feather-youtube" data-name="Icon feather-youtube" transform="translate(0.001 -4.5)">
                                <path id="Path_7" data-name="Path 7" d="M33.81,9.63a4.17,4.17,0,0,0-2.91-3C28.32,6,18,6,18,6S7.68,6,5.1,6.69a4.17,4.17,0,0,0-2.91,3,43.5,43.5,0,0,0-.69,7.935,43.5,43.5,0,0,0,.69,7.995A4.17,4.17,0,0,0,5.1,28.5c2.58.69,12.9.69,12.9.69s10.32,0,12.9-.69a4.17,4.17,0,0,0,2.91-3,43.5,43.5,0,0,0,.69-7.875,43.5,43.5,0,0,0-.69-8Z" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Path_8" data-name="Path 8" d="M14.625,22.53l8.625-4.905-8.625-4.9Z" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(\App\Models\Confiq::getValue('instagram')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 33 33">
                            <g id="Icon_feather-instagram" data-name="Icon feather-instagram" transform="translate(-1.5 -1.5)">
                                <path id="Path_4" data-name="Path 4" d="M10.5,3h15A7.5,7.5,0,0,1,33,10.5v15A7.5,7.5,0,0,1,25.5,33h-15A7.5,7.5,0,0,1,3,25.5v-15A7.5,7.5,0,0,1,10.5,3Z" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Path_5" data-name="Path 5" d="M24,17.055A6,6,0,1,1,18.945,12,6,6,0,0,1,24,17.055Z" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                                <path id="Path_6" data-name="Path 6" d="M26.25,9.75h0" fill="none" stroke="#f0f72b" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/>
                            </g>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(\App\Models\Confiq::getValue('twitter')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="39.329" height="31.904" viewBox="0 0 39.329 31.904">
                            <path id="Icon_awesome-twitter" data-name="Icon awesome-twitter" d="M32.3,10.668c.023.32.023.64.023.959,0,9.754-7.424,20.992-20.992,20.992A20.85,20.85,0,0,1,0,29.307a15.263,15.263,0,0,0,1.782.091,14.776,14.776,0,0,0,9.16-3.152,7.391,7.391,0,0,1-6.9-5.117,9.3,9.3,0,0,0,1.393.114,7.8,7.8,0,0,0,1.942-.251,7.379,7.379,0,0,1-5.916-7.241V13.66A7.431,7.431,0,0,0,4.8,14.6,7.389,7.389,0,0,1,2.513,4.728a20.972,20.972,0,0,0,15.213,7.721,8.329,8.329,0,0,1-.183-1.69A7.385,7.385,0,0,1,30.312,5.711a14.526,14.526,0,0,0,4.683-1.782,7.358,7.358,0,0,1-3.244,4.066A14.791,14.791,0,0,0,36,6.853a15.86,15.86,0,0,1-3.7,3.815Z" transform="translate(0.541 -1.715)" fill="none" stroke="#f0f72b" stroke-width="2"/>
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(\App\Models\Confiq::getValue('facebook')); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="36.233" height="36.233" viewBox="0 0 36.233 36.233">
                            <path id="Icon_metro-facebook" data-name="Icon metro-facebook" d="M31.1,1.928H8.276a5.705,5.705,0,0,0-5.7,5.706V30.455a5.705,5.705,0,0,0,5.7,5.706H19.687V21.184H15.408V16.9h4.279V13.7a5.349,5.349,0,0,1,5.349-5.349h5.349v4.279H25.036a1.07,1.07,0,0,0-1.07,1.07V16.9H29.85l-1.07,4.279H23.966V36.161H31.1a5.705,5.705,0,0,0,5.7-5.706V7.634a5.706,5.706,0,0,0-5.7-5.706Z" transform="translate(-1.571 -0.928)" fill="none" stroke="#f0f72b" stroke-width="2"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer><!--footer-->

<!--JQUERY FILE CDN-->
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<!--SLIDER FILE CDN-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" defer></script>
<script src="<?php echo e(asset('site/js/sweetalert2/sweetalert2.min.js')); ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="<?php echo e(asset('site/js/main.js')); ?>"></script>
<?php echo $__env->yieldContent('js'); ?>

<script>



    document.getElementById('search-button').addEventListener("click", function () {
        var form = document.getElementById('form-search');

        form.submit();
    });
</script>
<script>



    document.getElementById('main-search').addEventListener("click", function () {
        var form = document.getElementById('form-main-search');

        form.submit();
    });
</script>



</body>
</html>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/layout/master.blade.php ENDPATH**/ ?>