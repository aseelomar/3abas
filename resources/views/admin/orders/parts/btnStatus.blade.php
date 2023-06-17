@if($status == \App\Models\Status::STATUS_ACCEPT)
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-success ">{{ $name }}</span>
@elseif($status == \App\Models\Status::STATUS_REJECT)
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-danger ">{{ $name }}</span>
@elseif($status == \App\Models\Status::STATUS_SENT_SHIPMENT)
    <span style="cursor: pointer"  class="m--font-bold btn btn-sm m-btn--pill btn-warning">{{ $name }}</span>
@elseif($status == \App\Models\Status::STATUS_DELIVERY)
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-primary ">{{ $name }}</span>
@elseif($status == \App\Models\Status::STATUS_PREPARATION)
    <span style="cursor: pointer"  class="m--font-bold btn btn-sm m-btn--pill btn-info  ">{{ $name }}</span>
@elseif($status == \App\Models\Status::STATUS_PENDING)
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-light ">{{ $name }}</span>
   @elseif($status == \App\Models\Status::STATUS_CANCEL)
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-dark ">{{ $name }}</span>
@else
    <span style="cursor: pointer"   class="m--font-bold btn btn-sm m-btn--pill btn-dark ">{{ $name }}</span>

@endif
