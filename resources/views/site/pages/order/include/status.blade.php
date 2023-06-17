@if($order->status_id == \App\Models\Status::STATUS_ACCEPT)
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status  m-btn--pill btn-success ">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_REJECT)
    <div style="cursor: pointer"   class="m--font-bold btn  status btn-sm m-btn--pill btn-danger ">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_SENT_SHIPMENT)
    <div style="cursor: pointer"  class="m--font-bold btn btn-sm status m-btn--pill btn-warning">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_DELIVERY)
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill rejected ">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_PREPARATION)
    <div style="cursor: pointer"  class="m--font-bold btn btn-sm status m-btn--pill btn-info  ">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_PENDING)
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill underway ">{{@$order->status->name_ar}}</div>
@elseif($order->status_id == \App\Models\Status::STATUS_CANCEL)
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill btn-dark ">{{@$order->status->name_ar}}</div>
@else
    <div style="cursor: pointer"   class="m--font-bold btn btn-sm status m-btn--pill hanging ">{{@$order->status->name_ar}}</div>

@endif
