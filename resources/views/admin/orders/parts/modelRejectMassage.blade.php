  <div class="modal fade text-left" id="modalForReject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">{{__('admin.massage_reject')}}</h4>
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
            <form class="nameForm" action="{{route('orders.post_status')}}" id="up_reject_order2" method="POST" >
                @csrf
                <div class="modal-body">
                    <input   hidden  name="id"  id ="orderID" value="">
                    <input hidden name="status_id" value="{{\App\Models\Status::STATUS_REJECT}}">

                    <div class="col-md-12 col-12" style="    margin-top: 30px;">
                        <fieldset class="form-group">
                            <label class="form-label"  for="helpInputTop">{{__('admin.massageReject')}}</label>
                            <fieldset class="form-group">
                                <textarea class="form-control" name="note" id="basicTextarea" rows="3" placeholder="Textarea"></textarea>
                            </fieldset>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="uploadInvoiceBtn2" type="submit"  class="btn btn-primary me-1 waves-effect waves-float rejectOrder waves-light save" >
                        {{__('admin.submit')}}</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <script>
      $('.openModal').on('click',function (e){
          e.preventDefault();
          var setOrder =$(this).data('whatever');

          $('#modalForReject ').modal('show');
      });
  </script>
