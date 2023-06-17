<a href="{{route('paymentsMethod.edit')}}" class=" edit-2   update_btn " title="{{trans('admin.edit')}}">
    <i style="color: #0a8cf0;" class="fa fa-edit"></i>
</a>
<a href="{{route('paymentsMethod.delete')}}" class=" delete_btn " title="{{trans('admin.delete')}}">
    <i style="color: red" class="fa fa-trash-o"></i>
</a>
<input type="hidden" value={{$id}} name="id" id="id">
