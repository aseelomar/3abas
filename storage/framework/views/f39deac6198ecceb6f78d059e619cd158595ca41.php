

    <a  class="btn btn-sm  btn-primary  " style="color: white;" onclick="show_product_modal(<?php echo e($id); ?>)"><?php echo e(__('admin.product')); ?></a>


    <div class="modal fade" id="kt_modal_product" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div id="edit_form_holder">

                </div>

            </div>
        </div>
    </div>

    <script>
        function show_product_modal(item) {


            $.ajax({
                       headers: {
                           'X-Requested-With': 'XMLHttpRequest'
                       },
                       type: 'GET',
                       url: '<?php echo e(route('orders.showOrderProduct','+item+')); ?>',
                       data: {
                           id: item,
                           _token: "<?php echo e(csrf_token()); ?>"
                       },
                       success: function(response) {

                           $('#edit_form_holder').html(response);
                           $('#kt_modal_product').modal('show');

                       }
                   });
        }
    </script>
<?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/orders/parts/btnProduct.blade.php ENDPATH**/ ?>