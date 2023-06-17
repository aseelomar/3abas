@extends('layouts.app')
<title>{{ __('admin.advertising') }}</title>

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky+.content {
        padding-top: 99px;
    }



    .buttons-excel {
        border-radius: 0px !important;

    }
</style>
<style>
    #toast-container>.toast-error {
        background-color: #BD362F;
    }
</style>
<style>
    #toast-container>.toast-success {
        background-color: #2dc45a;
    }
</style>
@section('content')


        <div class="content-body">
            <!-- Analytics card section start -->

            <section id="analytics-card">
                <div style="text-align: center" class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="card">

                            @for ($i = 1; $i <= $confiq; $i++)
                                <div class="card-header d-flex justify-content-between align-items-end">
                                    <strong>{{ __('admin.advertising'). $i }}</strong>
                                </div>
                                <hr>
                                <div class="card-content">
                                    <div class="card-body pt-50">
                                        <form id="myFormData{{ $i }}" action="{{ route('advertising.store') }}"
                                            method="post" class="form">

                                            <input type="hidden" name="number" value="{{ $i }}">
                                            <div class="row" style="text-align: right">
                                                <div class="col-xl-3">
                                                    <label>{{__('admin.url')}}</label>
                                                    <input class="form-control" type="text" name="link"
                                                        id="link{{ $i }}"
                                                        @if (isset($ads)) value="{{ $ads->where('number', $i)->first()->link ?? '' }}" @endif>
                                                </div>
                                                <div class="col-xl-3 ">
                                                    <label> {{__('admin.choose_picture')}} </label><small> 150*350 </small>
                                                    <div class="form-control form-upload" style="padding: 0px">
                                                        <label id="file_name"></label>
                                                        <button
                                                            style="line-height: 10px;width: 50%;float: right;border-radius: initial;"
                                                            type="button" class="btn  bg-gradient-success"
                                                            onclick="document.getElementById('img{{ $i }}').click()">{{__('admin.choose_picture')}} </button>
                                                        <input type='file' name="image" id="img{{ $i }}"
                                                            style="opacity: 0"
                                                            value="{{ $ads->where('number', $i)->first()->ads_image ?? '' }}">

                                                    </div>
                                                </div>
                                                <div class="col-xl-3">
                                                    <label>{{__('admin.optional_title')}} </label>
                                                    <input class="form-control" type="text" name="title"
                                                        id="title{{ $i }}"
                                                        value="{{ $ads->where('number', $i)->first()->title ?? '' }}">
                                                </div>

                                                <div class="col-xl-3" style="padding: 5px; align-content: center">
                                                    <div class="row pt-3">
                                                        <br>
                                                        <div class="col-md-4">
                                                            <div class="custom-control custom-switch mr-2 mb-1">
                                                                <input type="checkbox" class="custom-control-input"
                                                                    name="is_active"
                                                                    @if ($ads->where('number', $i)->first()->is_visible ?? 0 == 1) checked @endif
                                                                    id="customSwitch{{ $i }}">
                                                                <label class="custom-control-label"
                                                                    for="customSwitch{{ $i }}"></label>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <button onclick="syncBtn({{ $i }}) "
                                                                class=" btn bg-gradient-success"
                                                                style="border-radius: initial; margin-top: -8px" type="button"
                                                                id="btn{{ $i }}">{{__('admin.submit')}}</button>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endfor

                                <div class="col-md-12" style="margin-bottom: 40px;margin-top: -40px;">
                                    <button type="button" onclick="window.location='{{route('setting')}}'" class="btn btn-outline-danger">{{__('admin.back')}}</button>
                                </div>
                        </div>
                    </div>


                </div>
            </section>
        </div>

@endsection

@section('js')
    <script>
        $("#img1").change(function() {
            filename = this.files[0].name
            document.getElementById('file_name1').innerText = filename;
        });

        $("#img2").change(function() {
            filename = this.files[0].name
            document.getElementById('file_name2').innerText = filename;
        });

        $("#img3").change(function() {
            filename = this.files[0].name
            document.getElementById('file_name3').innerText = filename;
        });
    </script>
    <script>
        function syncBtn(id) {
            console.log(id);
            var formData = new FormData($("#myFormData" + id)[0]);

            console.log(formData);
            func($('#myFormData' + id), formData);
        }

        function func(form, formData) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: form.attr('action'),
                dataType: 'json',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(resp) {
                    console.log(resp);

                    display_error_messages('success', resp.message)



                },
                error: function(resp) {

                    $.each(resp.responseJSON.errors, function(i, error) {
                        display_error_messages("error", error[0]);

                    });


                },
                'complete': function() {}
            });

        }

        function display_error_messages(type, msg) {

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
                toastr.error(msg);
            } else {
                toastr.success(msg);
            }

        }
    </script>
@endsection
