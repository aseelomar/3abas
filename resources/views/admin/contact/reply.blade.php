@extends('layouts.app')

@section('title')
Contact Us Page
@endsection

@section('content')


{{--
    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> {{__('admin.add_page')}} / <small>{{__('admin.new_page')}}  </small> </p>
        </div>
    </div> --}}

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-10 offset-1 mt-5">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-white"> Reply </h3>
                    </div>
                    <div class="card-body">


                        <form method="POST" id="contactUsForm" action="#">
                           @csrf
                           <input type="hidden" name="row_id" value="{{ isset($inbox) ? $inbox->id : '' }}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input disabled type="text" class="form-control" value="{{ $inbox->email}}"  placeholder="Email" >
                                        <input  type="hidden" name="email" class="form-control" value="{{ $inbox->email}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Message:</strong>
                                        <textarea name="message" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <button type="button" id='contact_btn' class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('js')
<script>
     $('body').on("click", '#contact_btn',function(){
        var formData = new FormData($("#contactUsForm")[0]);
        var postUrl  ='{{route('contact.us.replyPost')}}';
        // alert(postUrl);
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: postUrl,
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success:function (resp) {
                    display_error_messages('success', resp.message)
                },
                error: function(resp) {

                $.each(resp.responseJSON.errors, function(i, error) {
                    display_error_messages("error", error[0]);

                });


}   ,
'complete': function() {}
});

    });


    function display_error_messages(type, msg) {
            console.log(msg);

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-bottom-left",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            if (type == 'error') {
                console.log(type);
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
</script>
@endsection
