@extends('layouts.app')
<style>
    .fa {
      padding: 20px;
      font-size: 20px;
      width: 50px;
      height: 50px;
      text-align: center;
      text-decoration: none;
      margin: 3px 2px;
      /* border-radius: 50%; */
    }

    .fa:hover {
        opacity: 0.7;
    }

    .fa-facebook {
      background: #3B5998;
      color: white;
    }

    .fa-twitter {
      background: #55ACEE;
      color: white;
    }

    .fa-instagram {
      background: #125688;
      color: white;
    }
label{
    width:80px;
}

    </style>

@section('content')

        <div class="row">
            <div class="col-8">
                <p style="margin-right: 25px;">{{__('admin.settings')}} / <small>{{__('admin.social')}} </small> </p>
            </div>
        </div>

        <div style="text-align: center" class="row">

            <div class="col-lg-12 ">
                <div class="card">

                    <form  method="post" id="socialForm">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2" >
                                        <br>
                                        <label >{{__('admin.facebook')}}</label>
                                         <i  class="fa fa-facebook" > </i> </div>
                                         <div class="col-md-8">
                                            <br>
                                            <input class="form-control" type="text" name="facebook" id="" value="{{ $facebook }}" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2" >
                                        <br>
                                        <label>{{__('admin.twitter')}}</label>
                                         <i  class="fa fa-twitter" > </i> </div>
                                         <div class="col-md-8">
                                            <br>
                                            <input class="form-control" type="text" name="twitter" id="" value="{{ $twitter }}" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                        </div>


                       <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2" >
                                        <br>
                                        <label >{{__('admin.instagram')}}</label>
                                         <i  class="fa fa-instagram" > </i> </div>
                                         <div class="col-md-8">
                                            <br>
                                            <input class="form-control" type="text" name="instagram" id="" value="{{ $instagram }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>


                       <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-2 ">
                                        <br>
                                        <label>{{__('admin.other')}}</label>
                                        <i class='fa fa-dribbble'></i>
                                         </div>
                                         <div class="col-md-8">
                                            <br>
                                            <input class="form-control" type="text" name="other" id="" value="{{ $other }}" autocomplete="off" >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary mr-1 mb-1" id="store_btn">{{__('admin.submit')}}</button>
                             <button type="button" onclick="window.location='{{route('setting')}}'" class="btn btn-outline-danger mr-1 mb-1">{{__('admin.back')}}</button>
                        </div>


                        </div>


                    </form>


        </div>
    </div>


@endsection


@section('js')

<script>
    $('body').on("click", '#store_btn',function(){
        var formData = $('#socialForm').serializeArray();
        var token = $("input[name='_token']").val();
        var postUrl  ='{{route('social.add')}}';
        // alert(postUrl);
        $.ajax({
                type: "POST",
                data:{'formData':formData ,'_token':token},
                datatype: 'json',
                url: postUrl,
                success:function (resp) {
                    display_error_messages('success', resp.message)
                },
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
