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
            <p style="margin-right: 25px;"> {{__('admin.edit_page')}} </small> </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-content">
                    <br>

                    <div class="row">
                        <div class="col-9">
                            <h3 style="margin-right:60px;"> {{__('admin.edit_page')}}</h3>
                        </div>
                        <div class="col-md-2  col-sm-1">
                            <button  type="button" onclick="window.location='{{route('setting.pages_link')}}'" class=" btn btn-outline-danger" style="margin-bottom: 20px ;margin-right:30px;margin-left: 20px;">{{__('admin.back')}}</button>
                        </div>
                    </div>

                    {{-- <p style="margin-right: 25px;">@lang('Add A New Page')</p> --}}
                    <form class="form container" method="POST" id="myFormStore" action="{{ route('pages_link.store') }}" enctype="multipart/form-data">

                        @csrf

                        <input type="hidden" name="id" value="{{ isset($page) ? $page->id : '' }}">

                   <div class="row">

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.url')}}</label>
                            <input type="text" id="" value="{{isset($page) ? $page->url : ''}}" class="form-control"  placeholder="{{__('admin.url')}}" name="url" >
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.arabic_name')}}</label>
                            <input type="text" id="" value="{{isset($page) ? $page->title : ''}}" class="form-control"  placeholder="{{__('admin.arabic_name')}}" name="title" >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.english_name')}}</label>
                            <input type="text" id="" value="{{isset($page) ? $page->title_en : ''}}" class="form-control"  placeholder="{{__('admin.english_name')}}" name="title_en" >
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="mb-1">
                            <label class="form-label" for="first-name-column">{{__('admin.type')}}</label>
                            <input type="text" id="" value="{{isset($page) ?$page->type : ''}}" class="form-control"  placeholder="{{__('admin.type')}}" name="type" >
                        </div>
                    </div>


                    <div class="col-md-6 col-12">
                        <label class="form-label" for="first-name-column">{{__('admin.rank')}}</label>
                        <input class="form-control" type="number" name="rank" value="{{ isset($page) ? $page->rank : 0}}"
                            placeholder="{{ __('admin.rank') }}" autocomplete='off' required>
                    </div>

                        <div class="col-md-6 col-12">
                            <label class="form-label" for="first-name-column">تصنيف الأب</label>
                            <select name="parent_id" id="update_select" onclick="getParent()" class="form-control">
                                <option value="0" selected> بدون تصنيف الاب  </option>
                                @isset($parent)

                                @foreach ($parent as $item)
                                <option value="{{ $item->id }}" @if($item->id == $page->parent_id )
                                    selected
                                    @endif>{{ $item->name }} </option>

                                @endforeach
                                @endisset

                            </select>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label" for="first-name-column">{{__('admin.icon')}}</label>
                            <input class="form-control" type="text" name="icon"  value="{{isset($page) ? $page->icon : ''}}"
                            placeholder="{{ __('admin.icon') }}" autocomplete='off' required>
                        </div>
                        <div class="col-md-6 col-12">
                            <label class="form-label" for="first-name-column">{{__('admin.status')}}</label>
                            <select name="visible" id="update_status" class="form-control">
                                <option value="1" @isset($page)

                                 @if($page->visible == 1 )
                                    selected
                                    @endif @endisset>{{ __('admin.active') }} </option>
                                <option value="0" @isset($page) @if($page->visible == 0 )
                                    selected
                                    @endif @endisset>{{ __('admin.in_active') }}</option>
                            </select>
                        </div>


                 </div>
                     <br>
                                <div class="col-12">
                                    <button class="btn btn-primary mr-1 mb-1"  id="store_btn">{{__('admin.save')}}</button>
                                    {{-- <button type="reset" class="btn btn-outline-warning mr-1 mb-1">{{__('admin.reset')}}</button> --}}
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>



@endsection

@section('js')

<script>

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
                var formData = new FormData($("#myFormStore")[0]);

                func($('#myFormStore'), formData);
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
