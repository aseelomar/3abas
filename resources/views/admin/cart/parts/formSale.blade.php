<div class="col-md-12">
    <div class="card">

<form id="{{$product->id}}" action="{{route('cart.store')}} "method="POST">
    @csrf
        <div class="card-content">
            <div class="card-body">
                <div class="row">
<input hidden value="{{$product->id}}" name="product_id">


                    <div class="col-xl-4 col-md-4  mb-1">
                        <fieldset class="form-group">
                            <label for="helpInputTop">count</label>
                            <input type="text" class="form-control" name="count" id="">
                        </fieldset>
                    </div>
                    @if($product->details()->exists())

                    <div class="col-xl-4 col-md-4  mb-1">



                        <select class="form-control form-control-solid color_id"
                                name="color_id" id="color_id">

                            <option value="" SELECTED> {{__('admin.choose_color')}}</option>

                                @foreach ($product->details as $item)
                                    <option value="{{ $item->color_id }}">{{ $item->color->name }}</option>

                                @endforeach


                        </select>
                    </div>
                        <div class="col-xl-4 col-md-4  mb-1">
                            <select class="form-control form-control-solid color_id"
                                    name="size" id="color_id">
                                <option value="" disabled> {{__('admin.choose_size')}}</option>

                                @foreach ($product->details as $item)
                                    <option value="{{ $item->size }}">{{ $item->size }}</option>

                                @endforeach


                            </select>
                    </div>


                    @endif

                </div>
            </div>
        </div>
</form>
    </div>
</div>
