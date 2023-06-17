
@if($active == 0)
    <span style="cursor: pointer" href="{{route('paymentsMethod.status')}}" id="change-status" class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status">{{ trans('admin.inactive') }}</span>
@elseif($active == 1)
    <span style="cursor: pointer" href="{{route('paymentsMethod.status')}}"  id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status">{{ trans('admin.active') }}</span>
@endif




