
@if($status == \App\Models\Status::STATUS_PENDING)
    <input id="setStatus" type="hidden" name="status" value="">
    <span style="cursor: pointer" href="{{route('orders.status')}}" data-whatever="{{$id}}" data-value="{{\App\Models\Status::STATUS_REJECT}}"  class="m--font-bold btn btn-sm m-btn--pill btn-danger   openModal">{{ trans('admin.reject') }}</span>
    <span style="cursor: pointer" href="{{route('orders.status')}}" data-user="{{@$shipment_id}}" data-value="{{\App\Models\Status::STATUS_ACCEPT}}" id="change-status" data-value="{{\App\Models\Status::STATUS_ACCEPT}}" data-whatever="{{$id}}" class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status openModalChooseShipping">{{ trans('admin.accept') }}</span>
@else
    <span  disabled class="m--font-bold btn btn-sm m-btn--pill btn-danger "><i class="fa fa-ban" aria-hidden="true"></i>
{{ trans('admin.Cant_edited') }}</span>

@endif
<script>
    $('.openModal').on('click',function (e){
        e.preventDefault();
        var setOrder =$(this).data('whatever');
        $('#orderID').val(setOrder)
        $('#modalForReject').modal('show');
    });
</script>
<script>
    $('.openModalChooseShipping').on('click',function (e){
        e.preventDefault();
        var setOrder =$(this).data('whatever');
        var setShipment =$(this).data('user');

        $('#orderIDShipping').val(setOrder) ;
        $("#setShipmentId").val(setShipment);
        $('#modalChooseShipping').modal('show');
    });
</script>

