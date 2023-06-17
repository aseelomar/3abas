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
<style> #toast-container > .toast-error { background-color: #BD362F; } </style>
<style> #toast-container > .toast-success { background-color: #2dc45a; } </style>

@section('title')
Create Page
@endsection

@section('content')


    <div class="row">
        <div class="col-8">
            <p style="margin-right: 25px;"> {{__('admin.add_page')}} / <small>{{__('admin.new_page')}}  </small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">

                <div class="card-content">
                 <br>

                    <div class="row">
                        <div class="col-10">
                            <h3 style="margin-right:60px;"> {{__('admin.add_page')}}</h3>
                        </div>
                        <div class="col-md-2 col-sm-1">
                            <button  type="button" onclick="window.location='{{route('page.index')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:50px;margin-left: 40px;">{{__('admin.back')}}</button>
                        </div>
                    </div>

                    {{-- <p style="margin-right: 25px;">@lang('Add A New Page')</p> --}}
                    <form class="form container" method="POST" id="myFormStore" action="{{ route('page.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                   <div class="row">
                        <div class="form-label-group col-md-6">
                            <input type="text" id="" class="form-control"  placeholder="{{__('admin.arabic_name')}}" name="page_title_ar" >
                            {{-- <label for="first-name-column">{{__('admin.arabic_name')}} </label> --}}
                        </div>

                        <div class="form-label-group col-md-6">
                            <input type="text" id="" class="form-control"  placeholder="{{__('admin.title_en')}}" name="page_title_en" >
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">   {{__('admin.body_ar')}}</label>
                           <textarea  class="form-control" name="page_body_ar" id="editor" cols="30" rows="10"></textarea>
                         </div>

                        <div class="col-md-6">
                            <label for="">   {{__('admin.body_en')}}</label>
                           <textarea  class="form-control" name="page_body_en" id="editor1" cols="30" rows="10"></textarea>
                         </div>
                    </div>
                    <br>
                    {{-- <div class="form-group">
                        <label>  Image </label>
                        <input type="file" accept="image/*"  value="" name="image">
                    </div> --}}
                    <div class="col-md-6 col-12" style="    margin-top: 30px;">
                        <fieldset class="form-group">
                            <label class="form-label"  for="helpInputTop">{{__('admin.image')}}</label>
                            <div class=" custom-file mb-1">
                                <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label form-control" id="helpInputTop">Choose file</label>
                            </div>
                        </fieldset>
                    </div>

                                <br>
                                {{-- @if (isset($product))

                                    <input type="file" hidden name="main_file" id="hidden_main_file" />
                                    <input type="file" hidden name="sub_file[]" id="hidden_file" multiple />
                                @endif --}}

                                <div class="col-12">
                                    <button class="btn btn-primary mr-1 mb-1"  id="store_btn">{{__('admin.submit')}}</button>
                                    <button type="reset"  id ="reset"class="btn btn-outline-warning mr-1 mb-1">{{__('admin.reset')}}</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>






@endsection

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor1' ) )
        .catch( error => {
            console.error( error );
        } );
</script>

<script>
    CKEDITOR.replace('editor',{
               filebrowserBrowseUrl:'/fileman/index.html', // Öntanımlı Dosya Yöneticisi
               filebrowserImageBrowseUrl:'/fileman/index.html?type=image', // Sadece Resim Dosyalarını Gösteren Dosya Yöneticisi
               removeDialogTabs: 'link:upload;image:upload' // Upload işlermlerini dosya Yöneticisi ile yapacağımız için upload butonlarını kaldırıyoruz
           });

    let name;
    let object;
    $(document).ready(function() {

        $('#store_btn').on('click', function(e) {
            var myBookId = $(this).data('id');
            $(".modal-body #bookId").val(myBookId);
        });

        $('#store_btn').on('click', function(e) {
            e.preventDefault();
            console.log($('#myFormStore'));
            // alert($('#myFormStore'));

            CKEDITOR.instances['editor'].updateElement();
            var formData = new FormData($("#myFormStore")[0]);

            func($('#myFormStore'), formData);
        });


        $('#update_btn').on('click', function(e) {
            e.preventDefault();
            console.log($('#myFormStore'));
            // alert($('#myFormStore'));
            var formData = new FormData($("#myFormUpdate")[0]);
            func($('#myFormUpdate'), formData);
        });

        window.addEventListener("click", function(event) {

            if (event.target.nodeName !== 'TD' && $('#myFormStore').attr('hidden') == 'hidden' && event
                .target.nodeName !== 'BUTTON' && event
                .target.nodeName !== 'INPUT' && event
                .target.nodeName !== 'A' && event
                .target.nodeName !== 'SELECT') {
                console.log('window');

                $('#myFormStore').attr('hidden', false)
                $('#myFormUpdate').attr('hidden', true)
                var s = document.querySelector('tr.selected');
                s && s.classList.remove('selected');
            }

        });
        $('#dataTableClients').DataTable();
    });


    function update_client(client, sel) {
        var st = sel.parentNode.parentNode;
        //    .classList.add("selected");
        var s = document.querySelector('tr.selected');
        s && s.classList.remove('selected');
        st.classList.add('selected')

        $('#myFormStore').attr('hidden', true)
        $('#myFormUpdate').attr('hidden', false)
        $("#update_client_name").val(client.name);
        $("#update_client_email").val(client.email);
        $("#update_id").val(client.id);


    }
</script>
<script>
    var table = $('#dataTableClients').DataTable({
        autoWidth: true,
        responsive: true,
        "processing": true,
        "serverSide": true,
        dom: 'Bfrtip',

        "oLanguage": {
            "sSearch": {{__('admin.search')}},
        },

        destroy: true,
        "bInfo": false,
        buttons: [{
                extend: 'print',
            },
            {
                extend: 'excel',
            },
        ],
        // paging: true,
        "ajax": {
            "url": "{{ route('client.data') }}",
            "dataType": "json",
            "type": "POST",
            "data": {
                _token: "{{ csrf_token() }}"
            }
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "name"
            },
            {
                "data": "email"
            },

            {
                "data": "type"
            },

            {
                "data": "mobile"
            },
            {
                "data": "location"
            },

            {
                "data": "country_id"
            },






        ],



    });

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

                table.ajax.reload();

                display_error_messages('success', resp.message)
                document.getElementById("reset").click();


            },

            error: function(resp) {
                console.log(resp);
                $.each(resp.responseJSON.errors, function(i, error) {
                    display_error_messages("error", error[0]);


                });


            },
            'complete': function() {}
        });

    }

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
