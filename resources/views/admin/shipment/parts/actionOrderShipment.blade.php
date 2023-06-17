
@if($status == \App\Models\Status::STATUS_SENT_SHIPMENT)
    <input id="setStatus" type="hidden" name="status" value="">
    <span style="cursor: pointer" href="{{route('shipment.updateOrderStatue')}}" data-value="{{\App\Models\Status::STATUS_PREPARATION}}"  class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status-order">{{ trans('admin.preparation') }}</span>
    <span style="cursor: pointer" href="{{route('shipment.updateOrderStatue')}}" data-value="{{\App\Models\Status::STATUS_CANCEL}}"  class="m--font-bold btn btn-sm m-btn--pill  btn-danger  change-status-order">{{ trans('admin.cancel') }}</span>
@elseif($status == \App\Models\Status::STATUS_PREPARATION)
    <button  type="button" class="m--font-bold btn btn-sm m-btn--pill btn-success openModal" data-toggle="modal" data-target="#modalForDelivery" data-whatever="{{$id}}">{{ trans('admin.delivery') }}</button>
    <span style="cursor: pointer" href="{{route('shipment.updateOrderStatue')}}" data-value="{{\App\Models\Status::STATUS_CANCEL}}"  class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status-order">{{ trans('admin.cancel') }}</span>
@else
    <span  disabled class="m--font-bold btn btn-sm m-btn--pill btn-danger "><i class="fa fa-ban" aria-hidden="true"></i>
    {{ trans('admin.Cant_edited') }}</span>

@endif
<script>
    $('.openModal').on('click',function (e){
        e.preventDefault();
        var setOrder =$(this).data('whatever');
        $('#orderID').val(setOrder)
        $('#modalForDelivery').modal('show');
    });
</script>

