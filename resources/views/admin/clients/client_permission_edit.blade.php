<form class="form" method="POST" id="kt_modal_edit_form">
    @csrf
    <input id="user_id" type="hidden" name="user_id"
        value="@if (isset($user->id)) {{ $user->id }}@else{{ '' }} @endif" />

    <div class="modal-header" id="kt_modal_edit_header">
        <!--begin::Modal title-->
        <h2 class="fw-bolder">Edit user Permissions</h2>
        <!--end::Modal title-->
        <!--begin::Close-->

        <!--end::Close-->
    </div>
    <!--end::Modal header-->
    <!--begin::Modal body-->
    <div class="modal-body py-10 px-lg-17">
        <!--begin::Scroll-->
        <div class="scroll-y me-n7 pe-7">
            <!--begin::Input group-->
            @foreach ($page as $item)
            <div class="fv-row mb-7">
                <!--begin::Label-->
                <div class="custom-control custom-switch mr-2 mb-1">
                        <p class="mb-0">{{ $item->title }}</p>
                        <input type="checkbox" class="custom-control-input" onclick="performUpdate('{{ $item->title }}')" value="{{ $item->title }}" name="permission[{{ $item->title }}]"
                            @if ($user->hasPermissionTo($item->title)) checked @endif id="customSwitch{{ $item->id }}">
                            <label class="custom-control-label" for="customSwitch{{ $item->id }}"></label>
                            <input type="hidden" class="custom-control-input"  value="{{ $item->title }}" name="hidden_permission[{{ $item->title }}]">
                    </div>
                    <!--end::Input-->
                </div>
            @endforeach



        </div>
        <!--end::Scroll-->
    </div>


    <!--end::Modal body-->
    <!--begin::Modal footer-->

    <!--end::Modal footer-->
</form>
<script>


    function performUpdate(title) {
        console.log(title);
        var anytestfortest = title ;
        var formData = new FormData($("#kt_modal_edit_form")[0]);

        $.ajax({
                   headers: {
                //    'X-CSRF-TOKEN':"{{ csrf_token() }}"
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
            url:" {{ route('admin.sync_emp_permissions') }}",
            dataType: 'json',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(resp) {
                //alert(resp.status);
                if (resp.status === false) {
                    $.each(resp.message, function(i, error) {
                        display_error_messages("error", error[0]);

                    });

                } else {
                    display_error_messages("success", resp.message);
                    //DisplayToastrMessage_General("success",resp.message, 3000);
                    // location.reload()
                    // table.ajax.reload();
                    $('#kt_modal_edit').modal('hide');
                    //  RefreshTable($("#posts") , "{{ url('cms/admin/get') }}");


                }

            },
            'complete': function() {

            }
        });

    }

</script>
<!--end::Form-->
