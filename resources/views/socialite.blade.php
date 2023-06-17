@extends('layouts.app')

@section('title')
Contact Us Page
@endsection

@section('content')


    <div class="container">
        <div class="row mt-5 mb-5">

                    <div class="card-body">


                        <form method="POST" id="PassForm" action="#">
                           @csrf
                           <input type="hidden" name="id" value="{{ isset($user) ? $user->id : '' }}">

                           <input  type="hidden" name="name" class="form-control" value="{{$user->name}}">
                             <input  type="hidden" name="email" class="form-control" value="{{ $user->email}}">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>Password:</strong>
                                        <input type="text" name="password" rows="3" class="form-control">
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


@endsection


@section('js')
<script>
     $('body').on("click", '#contact_btn',function(){
        var formData = new FormData($("#PassForm")[0]);
        var postUrl  ='{{route('google.auth.password')}}';
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
