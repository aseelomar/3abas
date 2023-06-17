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
                        <h3 class="text-white"> Contact US </h3>
                    </div>
                    <div class="card-body">

                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <form method="POST" id="contactUsForm">
                           @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Address:</strong>
                                        <input type="text" name="address" class="form-control" placeholder="address" >
                                        {{-- @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif --}}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="Email" >

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Phone:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="Phone" >

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
                                <button type="reset" id="reset" class="btn btn-outline-warning ">{{__('admin.reset')}}</button>

                            </div>
                        </form>
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
        var postUrl  ='{{route('contact.us.store')}}';
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
                    document.getElementById("reset").click();

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
