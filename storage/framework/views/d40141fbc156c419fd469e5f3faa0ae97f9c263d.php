<?php $__env->startSection('style'); ?>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <main>



        <div class="content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <div class="row justify-content-center">
                            <div class="col-md-6">

                                <p class="heading mb-4"><?php echo e(__('admin.talk')); ?></p>
                                

                                <p><img src="<?php echo e(asset('site/contact/images/undraw-contact.svg')); ?>" alt="Image" class="img-fluid"></p>


                            </div>
                            <div class="col-md-6">

                                

                                    <form method="POST" id="contactUsForm">
                                        <?php echo csrf_field(); ?>


                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="address" id="address"
                                                placeholder="<?php echo e(__('admin.Your Address')); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="email" id="email"
                                                placeholder="<?php echo e(__('admin.email')); ?>">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" class="form-control" name="phone" id="phone"
                                                placeholder="<?php echo e(__('admin.mobile')); ?>">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <textarea class="form-control" name="message" id="message" cols="30" rows="7"
                                                placeholder="<?php echo e(__('admin.yourMessage')); ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                        <button type="button"  class="btn btn-primary rounded-0 py-2 px-4" id='contact_btn'><?php echo e(__('admin.Send Message')); ?></button>
                                        <button type="reset" id="reset"  class="btn btn-outline-warning rounded-0 py-2 px-4"><?php echo e(__('admin.reset')); ?></button>
                                        </div>
                                        
                                    </div>
                                </form>

                                <div id="form-message-warning mt-4"></div>
                                <div id="form-message-success">
                                    Your message was sent, thank you!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </main>
    <!--main-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script>
    $('body').on("click", '#contact_btn',function(){
       var formData = new FormData($("#contactUsForm")[0]);
       var postUrl  ='<?php echo e(route('contact.store')); ?>';
       // alert(postUrl);
       $.ajax({
               headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
               url: postUrl,
               dataType: 'json',
               type: 'POST',
               data: formData,
               contentType: false,
               processData: false,
                  success:function(response)
                  {

                      display_error_messages('success', 'تم ارسال الرسالة  بنجاح')
                      document.getElementById("reset").click();

                  },

                  error: function(resp) {

               $.each(resp.responseJSON.errors, function(i, error) {
                   display_error_messages("error", error[0]);

               });


}   ,
'complete': function() {}
});

   });

    function display_error_messages(type, msg)
    {
        const Toast = Swal.mixin({
                                     toast            : true,
                                     position         : 'bottom-left',
                                     showConfirmButton: false,
                                     timer            : 3000,
                                     timerProgressBar : true,

                                     didOpen: (toast) => {
                                         toast.addEventListener('mouseenter', Swal.stopTimer)
                                         toast.addEventListener('mouseleave', Swal.resumeTimer)
                                     }
                                 });

        Toast.options = {
            "closeButton"      : false,
            "debug"            : false,
            "newestOnTop"      : false,
            "progressBar"      : false,
            "positionClass"    : "toast-bottom-left",
            "preventDuplicates": false,
            "onclick"          : null,
            "showDuration"     : "300",
            "hideDuration"     : "1000",
            "timeOut"          : "5000",
            "extendedTimeOut"  : "1000",
            "showEasing"       : "swing",
            "hideEasing"       : "linear",
            "showMethod"       : "fadeIn",
            "hideMethod"       : "fadeOut"
        };
        if (type == 'error')
        {
            Toast.fire({
                           icon : 'error',
                           title: msg
                       })

            Toast.error(msg);
        } else
        {
            Toast.fire({
                           icon : 'success',
                           title: msg
                       });
        }

    }
</script>

<script src="<?php echo e(asset('site/contact/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/contact/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/contact/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/contact/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('site/contact/js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site.layout.site1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/contactUs/index.blade.php ENDPATH**/ ?>