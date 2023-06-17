<div class="modal fade text-left" id="modalChooseShipping" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">{{__('admin.chooseShipping')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="set-shipping-company" action="{{route('orders.post_status')}}" id="choose-shipping-company" method="POST" >
                @csrf
                <div class="modal-body">
                    <input   hidden  name="id"  id ="orderIDShipping" value="">
                    <input hidden name="status_id" value="{{\App\Models\Status::STATUS_ACCEPT}}">

                    <div class="col-md-12 col-12" style="    margin-top: 30px;">
                        <fieldset class="form-group">
                            <label class="form-label"  for="helpInputTop">{{__('admin.chooseShipping')}}</label>
                            <select class="form-control " id="setShipmentId" name="shipment_id"
                                  >
                                @foreach ($shipments as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="" type="submit"  class="btn btn-primary me-1 waves-effect waves-float setShippingOrder waves-light save" >
                        {{__('admin.submit')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
