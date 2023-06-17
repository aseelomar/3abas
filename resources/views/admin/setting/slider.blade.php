@extends('layouts.app')
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

        <div class="row">
            <div class="col-md-6 col-sm-6">

                <p style="margin-right: 25px;">{{ __('admin.settings') }} / <small>{{ __('admin.slider') }} ({{$count}})</small>
                </p>


            </div>
            <div class="col-md-6 col-sm-6" style="right:290px;left:270px">
                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#kt_modal_store">
                  {{__('admin.create_slider')}}
                </button>
                <button type="button" onclick="window.location='{{route('setting')}}'" class="btn btn-outline-danger mr-1 mb-1">{{__('admin.back')}}
                </button>
            </div>

        </div>
        <hr>
        <!-- pagination swiper start -->
        <section id="component-swiper-pagination">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{__('admin.visible_slider')}}</h4>
                </div>
                <div class="card-content" id="setting_slider">
                    <div class="card-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"
                            id="slider-morephoto">
                            <ol class="carousel-indicators">
                                @foreach ($shown_slider as $key => $image)
                                    <li id="{{ $image->id }}li" data-target="#carousel-example-generic"
                                        data-slide-to="{{ $key }}"
                                        @if ($key == 0) class="active" @endif>
                                    </li>
                                @endforeach

                            </ol>
                            <div style="text-align: center" class="carousel-inner" role="listbox">
                                @foreach ($shown_slider as $key => $item)
                                    <div class="carousel-item @if ($key == 0) active @endif "
                                        ondblclick="show_edit_modal({{ $item->id }})">

                                        <div class="card bg-dark text-white">
                                            <img style="width: 100% ; height: 300px" class="card-img border-4"
                                                src="{{ asset('images/slider/' . $item->slider_image) }}"alt="Second slide">
                                            <div class="card-img-overlay">
                                                <h5 class="card-title">{{ $item->title }}</h5>
                                                <p class="card-text">
                                                    {{ $item->title }}
                                                </p>
                                                <p class="card-text">{{ $item->created_at->format('j F, Y') }}</p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <a class="carousel-control-prev" href="#carousel-example-generic" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" style="background-color: #2dc45a"
                                    aria-hidden="true"></span>
                                <span class="sr-only">{{ __('admin.previous') }}</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-generic" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" style="background-color: #2dc45a"
                                    aria-hidden="true"></span>
                                <span class="sr-only">{{ __('admin.next') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div class="modal fade" id="kt_modal_store" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div id="store_form_holder">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{__('admin.add_slider')}}</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form container" method="POST" id="myFormStore"
                                        action="{{ route('slider.sync') }}" enctype="multipart/form-data">
                                        @csrf
                                        {{-- <input type="hidden" name="id"
                                            value="{{ isset($product) ? $product->id : '' }}"> --}}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="{{ __('admin.arabic_title') }}" name="title_ar">
                                                        <label for="first-name-column">{{ __('admin.arabic_title') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-label-group">
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="{{ __('admin.english_title') }}" name="title">
                                                        <label for="first-name-column">{{ __('admin.english_title') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-label-group">
                                                        <textarea type="text" id="first-name-column" class="form-control" placeholder="{{ __('admin.arabic_body') }}" name="body_ar"></textarea>
                                                        <label for="first-name-column">{{ __('admin.arabic_body') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-label-group">
                                                        <textarea type="text" id="first-name-column" class="form-control" placeholder="{{ __('admin.english_body') }}" name="body"></textarea>
                                                        <label for="first-name-column">{{ __('admin.english_body') }}
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-10 mb-5">


                                                    <input class="form-control-sm " id="formFileSm" name="image"
                                                        type="file">
                                                    {{--
                                                    <img height="200" class=" img-fluid mb-3"
                                                        id="img" onclick="mainimage()"
                                                        src="{{ asset('app-assets/images/bg.jpg') }}" alt=""
                                                        srcset=""> --}}
                                                </div>


                                                <div class="col-12">
                                                    <button class="btn btn-primary mr-1 mb-1"
                                                        id="store_btn">{{ __('admin.submit') }}</button>
                                                    <button type="reset"
                                                        class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.reset') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kt_modal_edit" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <div id="edit_form_holder">
                    </div>

                </div>
            </div>
        </div>



        <!-- pagination swiper ends -->


    @endsection

    @section('js')
        <script>
            function test(){
                var formData = new FormData($("#myFormUpdate")[0]);

                    func($('#myFormUpdate'), formData);
            }
            function show_edit_modal(id) {
                // var id = user_id.attr('user_id');

                $.ajax({
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    type: 'GET',
                    url: '{{ route('slider.edit') }}',
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {

                        $('#edit_form_holder').html(response);
                        $('#kt_modal_edit').modal('show');

                    }
                });

            }
        </script>
        <script>
            let name;
            let object;
            // var img_id ;
            $(document).ready(function() {
                $('#store_btn').on('click', function(e) {

                    e.preventDefault();
                    console.log($('#myFormStore'));
                    var formData = new FormData($("#myFormStore")[0]);

                    func($('#myFormStore'), formData);
                });

            });
        </script>
        <script>
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

                        display_error_messages('success', resp.message)
                        $("#setting_slider").load(location.href + " #setting_slider");
                        $('#kt_modal_edit').modal('hide');


                    },
                    error: function(resp) {

                        $.each(resp.responseJSON.errors, function(i, error) {
                            display_error_messages("error", error[0]);

                        });


                    },
                    'complete': function() {}
                });

            }

            // function mainimage(id) {
            //     Swal.fire({
            //         title: 'هل تود تعديل  ',
            //         showDenyButton: true,
            //         showCancelButton: true,
            //         confirmButtonText: 'تعديل',
            //         cancelButtonText: 'اغلاق',
            //         denyButtonText: `اغلاق`,
            //     }).then((result) => {
            //         /* Read more about isConfirmed, isDenied below */
            //         console.log(result);
            //         if (result.value == true) {

            //             $('#hidden_main_file').click();


            //         } else {
            //             Swal.fire('تم اغلاق', '', 'info')
            //         }
            //     })

            // }

            function subimage(id) {
                img_id = id;
                Swal.fire({
                    title:"{{__('admin.Do_you_want_to_add_or_delete')}}",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "{{__('admin.add')}}",
                    cancelButtonText: "{{__('admin.delete')}}",
                    denyButtonText: "{{__('admin.delete')}}",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    console.log(result);
                    if (result.value == true) {
                        $('#hidden_file').click();
                    } else {
                        Swal.fire({
                            text: "{{__('admin.sure_want_delete_product')}}",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "{{__('admin.Yes_delete')}}",
                            cancelButtonText: "{{__('admin.No_back_off')}}",
                            customClass: {
                                confirmButton: "btn btn-primary",
                                cancelButton: "btn btn-active-light"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        // 'X-CSRF-TOKEN': csrf_token()
                                    },
                                    url: "{{ route('product.delete') }}",
                                    type: "POST",
                                    data: {
                                        id: id
                                    },
                                    dataType: "html",
                                    success: function() {
                                        $('#' + id + 'li').remove();
                                        $('#' + id).remove();
                                        // table.row($(parent)).remove().draw();
                                        // location.reload()

                                    },
                                    error: function(xhr, ajaxOptions, thrownError) {
                                        swal("Error deleting!", "Please try again", "error");
                                    }
                                });
                            } else if (result.dismiss === "cancel") {
                                Swal.fire({
                                    text: "{{__('admin.Not_deleted')}}",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText:"{{__('admin.Well_get_it')}}",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    }
                                });
                            }
                        });


                    }
                })


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
