    <div class="modal fade text-left" id="modalForDelivery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">{{__('admin.Attach_invoice')}}</h4>
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
                <form class="nameForm" action="{{route('shipment.deliveryOrderStatue')}}" id="up_delivery_order2" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                            <input   hidden  name="id"  id ="orderID" value="">
                            <input hidden name="status_id" value="{{\App\Models\Status::STATUS_DELIVERY}}">
                      <div class="col-md-6 col-12" style="    margin-top: 30px;">
                            <fieldset class="form-group">
                                <label class="form-label"  for="helpInputTop">{{__('admin.imageOrder')}}</label>
                                <div class=" custom-file mb-1">
                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label form-control" id="helpInputTop">Choose file</label>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="uploadInvoiceBtn2" type="submit"  class="btn btn-primary me-1 waves-effect waves-float deliverOrder waves-light save" >
                            {{__('admin.submit')}}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


{{--    <script>--}}

{{--        $('#modalForDelivery').on('shown.bs.modal', function (e) {--}}
{{--            e.preventDefault();--}}
{{--            --}}
{{--            var setOrder =$(this).data('whatever');--}}
{{--            $('#orderID').val(setOrder)--}}
{{--        })--}}
{{--    </script>--}}

    <script type="text/javascript">
        $(document).ready(function(){


        });
    </script>
