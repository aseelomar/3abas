<?php $__env->startPush('css'); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/menu/menu-types/vertical-menu.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/core/colors/palette-gradient.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('app-assets/css/pages/app-chat.css')); ?>">
    <?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

    <div class="content-area-wrapper" style="margin: auto">
        <div class="sidebar-left">
            <div class="sidebar">

                <div class="sidebar-content card">
                        <span class="sidebar-close-icon">
                            <i class="feather icon-x"></i>
                        </span>
                    <div class="chat-fixed-search">
                        <div class="d-flex align-items-center">
                            <div class="sidebar-profile-toggle position-relative d-inline-flex">
                                <div class="avatar">
                                    <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" height="40" width="40">
                                    <span class="avatar-status-online"></span>
                                </div>
                                <div class="bullet-success bullet-sm position-absolute"></div>
                            </div>
                            <fieldset class="form-group position-relative has-icon-left mx-1 my-0 w-100">
                                <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat">
                                <div class="form-control-position">
                                    <i class="feather icon-search"></i>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div id="users-list" class="chat-user-list list-group position-relative ps ps--active-y">

                        <h3 class="primary p-1 mb-0">Contacts</h3>
                        <ul class="chat-users-list-wrapper media-list   ">
                            <?php $__currentLoopData = @$mainContact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="" onclick="show_product_modal(<?php echo e($item->id); ?>)">
                                <div class="pr-1">
                                        <span class="avatar m-0 avatar-md"><img class="media-object rounded-circle" src="<?php echo e(asset('images/user/'. @$item->user->image)); ?>" height="42" width="42" alt="Generic placeholder image">
                                            <i></i>
                                        </span>
                                </div>
                                <div class="user-chat-info">
                                    <div class="contact-info">
                                        <h5 class="font-weight-bold mb-0"><?php echo e(isset($item->user)  ? $item->user->name : explode("@",$item->email)[0]); ?></h5>
                                        <p class="truncate"> </p>
                                    </div>
                                    <div class="contact-meta">
                                        <span class="float-right mb-25"> <?php echo e(@$item->created_at->format('d/m/Y')); ?></span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 470px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 238px;"></div></div></div>
                </div>
                <!--/ Chat Sidebar area -->

            </div>
        </div>

        <div class="content-right"  aria-hidden="true">
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body" >
                    <div class="chat-overlay"></div>
                    <section class="chat-app-window">
                        <div class="start-chat-area d-none">
                            <span class="mb-1 start-chat-icon feather icon-message-square"></span>
                            <h4 class="py-50 px-1 sidebar-toggle start-chat-text">Start Conversation</h4>
                        </div>

                        
                        <div class="active-chat d-none" id="showChat">

                    <!--/ User Chat profile right area -->


                        </div>
                    </section>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

    <script src="<?php echo e(url('app-assets/js/scripts/pages/app-chat.js')); ?>"></script>
    <script>
        function show_product_modal(item) {


            $.ajax({
                       headers: {
                           'X-Requested-With': 'XMLHttpRequest'
                       },
                       type: 'GET',
                       url: '<?php echo e(route('showMassage','+item+')); ?>',
                       data: {
                           id: item,
                           _token: "<?php echo e(csrf_token()); ?>"
                       },
                       success: function(response) {

                           $('#showChat').html('');
                           $('#showChat').html(response);


                       }
                   });
        }
    </script>
            <script>

                $(document).on('click', '.save-massage', function (e) {

                    var message = $(".message").val();
                    if(message != "")
                    {
                        e.preventDefault();
                        var id      = $('.id').val();
                        var message = $('.valMassage').val();
                        var email   = $('.email').val();
                        $('.save-massage').attr('disabled', true);

                        $.ajax({
                                   url    : "<?php echo e(route('contact.us.replyPost')); ?>",
                                   method : 'POST',
                                   data   : {
                                       _token : '<?php echo e(csrf_token()); ?>',
                                       row_id : id,
                                       message: message,
                                       email  : email,

                                   },
                                   success: function (response) {

                                       //$('.shopping-basket').html(response).fadeIn();
                                       $(".message").val("");

                                       display_error_messages('success', 'تم ارسال الرسالة بنجاح')
                                       $('.save-massage').attr('disabled', false);
                                       
                                       
                                       
                                       show_product_modal(id);
                                   },
                                   error  : function (response) {

                                       if (response.status === 422)
                                       {
                                           if (response.responseJSON.message)
                                           {
                                               display_error_messages('error', response.responseJSON.message)
                                               $('.')
                                               $('.save-massage').attr('disabled', false);
                                           } else
                                           {
                                               $.each(response.responseJSON.errors, function (k, v) {
                                                   display_error_messages('error', msg)
                                                   $('.save-massage').attr('disabled', false);
                                               });
                                           }
                                       }
                                   }

                               });
                    }else {
                        display_error_messages('error', 'قم بادخال رسالة')
                    }
                });


                function display_error_messages(type, msg) {

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-bottom-left",
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
                        toastr.error(msg);
                    } else {
                        toastr.success(msg);
                    }

                }


            </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/contact/chatContact.blade.php ENDPATH**/ ?>