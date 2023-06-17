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


    }
</style>

@section('content')
    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;">{{ __('admin.settings') }}</p>
        </div>
    </div>

    <div style="text-align: center" class="row">

        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-header">


                    <h1>{{ __('admin.public_setting') }}</h1>
                </div>
                <div class="card-body">


                    <form method="post" id="socialForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>{{ __('admin.website_address') }} </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="title" id=""
                                            value="{{ $title }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>{{ __('admin.content') }}</label>
                                    </div>
                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="content" id=""
                                            value="{{ $content }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> {{ __('admin.number_ads') }} </label>
                                    </div>
                                    <div class="col-md-4">

                                        <input class="form-control" type="text" name="ads.number" id=""
                                            value="{{ $ads }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> {{ __('admin.ip') }} </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="admin_ip" minlength="7"
                                            maxlength="15" size="15" value="{{ $admin_ip }}" autocomplete="off"
                                            pattern="^((\d{1,2}|1\d\d|2[0-4]\d|25[0-5])\.){3}(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])$">

                                    </div>
                                    <div class="col-md-4">
                                        <h3> your Ip <Address> {{ $ip }} </Address>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary mr-1 mb-1"
                                id="store_btn">{{ __('admin.submit') }}</button>
                            {{-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.reset')}}</button> --}}
                        </div>





                    </form>
                </div>
                <div class="card-footer">
                    <div class="card-header">


                        <h1>{{ __('admin.icon') }}</h1>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> {{ __('admin.icon') }} </label>
                                    </div>
                                    <div class="col-md-4">


                                        <input class="form-control" style="border: 1cm" type="file" name="icon"
                                            id="icon" autocomplete="off">

                                    </div>
                                    <div class="col-md-4" id="img_icon">
                                        @if (isset($icon))
                                            <img height="50px" src="{{ asset('images/setting/' . $icon) }}" alt=""
                                                srcset="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    @endsection


    @section('js')
        <script>
            $('body').on("click", '#store_btn', function() {
                formData = $('#socialForm').serializeArray();
                // formData.append('icon',$('#icon').val)
                var token = $("input[name='_token']").val();
                var postUrl = '{{ route('social.add') }}';
                // alert(postUrl);
                $.ajax({
                    type: "POST",
                    data: {
                        'formData': formData,
                        '_token': token,
                        // 'file': $('#icon').value
                    },
                    datatype: 'json',
                    url: postUrl,
                    success: function(resp) {
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
        <script>
            $('#icon').change(function(e) {
                // var file = e.target.files[0];
                // var imageType = /image.*/;

                // if (!file.type.match(imageType)) return;

                // var form_data = new FormData();
                // form_data.append('file', file);
                var path = $('#icon').value;
                var url = '{{ route('social.add') }}';

                var file = $('#icon').prop('files')[0];
                var form_data = new FormData();

                form_data.append('file', file);
                form_data.append('path', path);
                form_data.append('name', name);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}",
                        'form_data': form_data,
                    },
                    url: url,
                    dataType: 'json', // <-- what to expect back from the PHP script, if anything
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'POST',

                    success: function(resp) {

                        display_error_messages('success', resp.message);
                        $("#img_icon").load();

                    },
                    error: function(error) {
                        $.each(resp.responseJSON.errors, function(i, error) {
                            display_error_messages("error", error[0]);

                        });
                    }
                });
            })
        </script>
    @endsection
