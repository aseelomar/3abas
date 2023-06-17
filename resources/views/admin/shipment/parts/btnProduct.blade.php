

    <a  class="m--font-bold btn btn-sm m-btn--pill btn-primary " style="color: white" onclick="show_product_modal({{ $id }})">{{ __('admin.product') }}</a>


    <div class="modal fade" id="kt_modal_product" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content" style="    width: auto">
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
                       url: '{{ route('shipment.showOrderProductShipment','+item+') }}',
                       data: {
                           id: item,
                           _token: "{{ csrf_token() }}"
                       },
                       success: function(response) {

                           $('#edit_form_holder').html(response);
                           $('#kt_modal_product').modal('show');

                       }
                   });
        }
    </script>
