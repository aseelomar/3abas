@extends('layouts.app')

<style>
    .dataTables_filter {
        float: right !important;
        padding: 10px;
    }

    .form-control-sm {
        margin-right: 10px;
    }

    .sticky + .content {
        padding-top: 99px;
    }

    .buttons-excel {
        border-radius: 0px !important;
    }
</style>
<style>
    #toast-container > .toast-error {
        background-color: #BD362F;
    }
</style>
<style>
    #toast-container > .toast-success {
        background-color: #2dc45a;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;margin-left: 25px"> {{ __('admin.add_product') }} /
                <small>{{ __('admin.new_product') }} </small>
            </p>

        </div>

    </div>


    <div class="row">

        <div class="col-lg-12 ">
            <div class="card">

                <div class="card-content">
                    <br>
                    <div class="row">
                        <div class="col-md-9 col-sm-2">
                            <p style="margin-right: 25px;margin-left: 25px">@lang('admin.new_product')</p>

                        </div>
                        <div class="col-md-2  col-sm-2">
                            <button type="button" onclick="window.location='{{ route('product.index') }}'"
                                    class=" btn btn-outline-danger"
                                    style="margin-bottom: 20px ;margin-right:140px;margin-left: 135px;">{{ __('admin.back') }}</button>
                        </div>
                    </div>

                    <form class="form container" method="POST" id="myFormStore" action="{{ route('product.store') }}"
                          enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" value="{{ isset($product) ? $product->id : '' }}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="first-name-column">{{ __('admin.arabic_name') }} </label>
                                        <input type="text" id="first-name-column" class="form-control"
                                               placeholder="{{ __('admin.arabic_name') }}" name="product_name_ar"
                                               value="{{ isset($product) ? $product->product_name_ar : '' }}">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="last-name-column">{{ __('admin.english_name') }}</label>
                                        <input type="text" id="last-name-column" class="form-control"
                                               placeholder="{{ __('admin.english_name') }}" name="product_name_en"
                                               value="{{ isset($product) ? $product->product_name_en : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="city-column">{{ __('admin.description_product') }}</label>
                                        <input type="text" id="city-column" class="form-control"
                                               placeholder="{{ __('admin.description_product') }} "
                                               name="product_description_ar"
                                               value="{{ isset($product) ? $product->product_description_ar : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="Product-Details">{{ __('admin.product_details') }}</label>
                                        <input type="text" id="Product-Details" class="form-control"
                                               placeholder="{{ __('admin.product_details') }}"
                                               name="product_description_en"
                                               value="{{ isset($product) ? $product->product_description_en : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="city-column">{{ __('admin.product_category') }} </label>
{{--                                         <input type="text" id="category-column" class="form-control" placeholder="تصنيف المنتج  " name="category_id">--}}
                                        <select name="category_id" onchange="getval(this);" id="category_column"
                                                class="form-control">
                                            <option value="" selected disabled>
                                                {{ __('admin.must_choose_main_category') }} </option>
                                            @if (isset($category))
                                                @foreach ($category as $item)
                                                    <option
                                                        @if (isset($product)) @if ($product->category_id == $item->id)
                                                        selected @endif
                                                        @endif
                                                        value="{{ $item->id }}">{{ $item->category_name_ar }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="sub_category">{{ __('admin.sub_category') }} </label>
                                        <select name="sub_category_id" id="sub_category" class="form-control"
                                                @if (!isset($product) && !isset($product->sub_category_id)) disabled @endif>
                                            @if (isset($sub_category))
                                                @foreach ($sub_category as $item)
                                                    <option
                                                        @if (isset($product)) @if ($product->sub_category_id == $item->id)
                                                        selected @endif
                                                        @endif
                                                        value="{{ $item->id }}">{{ $item->category_name_ar }}
                                                    </option>
                                                @endforeach

                                            @endif

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="sub_category">{{ __('admin.supplierChoise') }} </label>


                                        <select class="form-control  select2" name="supplier_id">
                                            @foreach ($suppliers as $supplier)
                                                <option
                                                    @if (isset($product)) @if ($product->supplier_id == $supplier->id)
                                                    selected @endif
                                                    @endif
                                                    value="{{ $supplier->id }}"> {{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="country-floating">@lang('admin.price')</label>
                                        <input type="number" id="country-floating" class="form-control"
                                               name="product_price" placeholder="@lang('admin.price')"
                                               value="{{ isset($product) ? $product->product_price : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="company-column">@lang('admin.sale_price')</label>
                                        <input type="number" id="company-column" class="form-control"
                                               name="product_sale_price" placeholder="@lang('admin.sale_price')"
                                               value="{{ isset($product) ? $product->product_sale_price : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8 row">
                                    <div class="col-6">
                                        <label for="email-id-column">@lang('admin.inventory')</label>
                                        <input type="number" id="email-id-column" class="form-control" name="inventory"
                                               placeholder="@lang('admin.inventory')"
                                               value="{{ isset($product) ? $product->inventory : '' }}">
                                    </div>

                                    <br>
                                    <div class="col-6">
                                        <label for="email-id-column"> منتج مميز</label>
                                        <div class=" form-control custom-control custom-switch custom-control-inline"
                                             style="border-style: none">
                                            <input type="checkbox"
                                                   @isset($product)
                                                   @if ($product->featured)
                                                   checked

                                                   @endif

                                                   @endisset
                                                   name="switch" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">
                                            </label>
                                            <span class="switch-label"></span>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-4 col-10 mb-5">
                                    <label for="formFileSm" class="form-label"> {{ __('admin.main_photo') }}</label>
                                    @if (!isset($product))

                                        <input class="form-control form-control-sm" id="formFileSm" name="main_file"
                                               type="file" @if (isset($product)) hidden @endif>
                                    @endif
                                    @if (isset($product))
                                        @isset($product->mainPhoto->image)
                                            <img width="200" height="200" class=" img-fluid mb-3" id="img"
                                                 onclick="mainimage({{ isset($product->mainPhoto->id) ? $product->mainPhoto->id : 0 }})"
                                                 src="{{ asset('images/products/' . $product->id . '/' . $product->mainPhoto->image) }}"
                                                 alt="" srcset="">
                                        @endisset

                                    @endif
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-4">
                                        <label for="formFileSm"
                                               class="form-label">{{ __('admin.more_pictures_product') }}</label>
                                         @if (!isset($product))
                                        <input class="form-control form-control-sm" id="formFileSm" name="sub_file[]"
                                               type="file" multiple>
                                         @endif
                                        @if (isset($product) && isset($product->morePhoto))
                                            <div id="carousel-example-generic" class="carousel slide"
                                                 data-ride="carousel" id="slider-morephoto">
                                                <ol class="carousel-indicators">
                                                    @foreach ($product->morePhoto as $key => $image)
                                                        <li id="{{ $image->id }}li"
                                                            data-target="#carousel-example-generic"
                                                            data-slide-to="{{ $key }}"
                                                            @if ($key == 0) class="active" @endif>
                                                        </li>
                                                    @endforeach
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    @foreach ($product->morePhoto as $key => $image)
                                                        <div class="carousel-item @if ($key == 0) active @endif "
                                                             onclick="subimage({{ $image->id }})">
                                                            <img class="img-fluid border-3" width="200" height="100"
                                                                 id="{{ $image->id }}"
                                                                 src="{{ asset('images/products/' . $product->id . '/sub/' . $image->image) }}"
                                                                 alt="Second slide">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-example-generic"
                                                   role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">{{ __('admin.previous') }}</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-example-generic"
                                                   role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">{{ __('admin.next') }}</span>
                                                </a>
                                            </div>

                                        @endif

                                    </div>
                                </div>
                                @if (isset($product))

                                    <input type="file" hidden name="main_file" id="hidden_main_file"/>
                                    <input type="file" hidden name="sub_file[]" id="hidden_file" multiple/>
                                @endif

                                <div class="custom-control col-md-2 custom-checkbox"
                                     style="margin-top: 40px;text-align: center;">
                                    <input type="checkbox" class="custom-control-input" value="1"
                                           @if (@$productSpecification !== null) checked @endif name="productSpecificat"
                                           id="customCheck1" onclick="packageCheck()">
                                    <label class="custom-control-label"
                                           for="customCheck1">{{ __('admin.productSpecifications') }}</label>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="check_model" class=" btn btn-primary "
                                            style="  width: 100%;font-size: 13px; ; margin-top: 30px"
                                            data-toggle="modal"
                                            data-target="#addProductSpecifications">{{ __('admin.add_Specifications') }}</button>
                                </div>

                                <div class="col-md-12 col-12 mb-5">
                                    <label for="formFileSm" class="form-label">{{ __('admin.addColorAndSize') }}</label>

                                    <div class="repeater">
                                        <div data-repeater-list="group_a">
                                            @if (isset($product->details))
{{--                                                @if(\PHPUnit\Framework\isEmpty($product->details))--}}
{{--                                                    <p>lkjhbjk</p>--}}
{{--                                            @endif--}}
                                                @foreach ($product->details as $row)
                                                    <div data-repeater-item class="row"
                                                         style="padding-top: 10px;padding-bottom: 5px">
                                                        <div class="col-md-3">

                                                            <input type="hidden" name="row_id" value="{{ $row->id }}">
                                                            <select class="form-control form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" disabled>
                                                                    {{ __('admin.choose_color') }}</option>
                                                                @if (isset($color))
                                                                    @foreach ($color as $item)
                                                                        <option
                                                                            @if ($item->color_id == $row->color_id) selected
                                                                            @endif
                                                                            value="{{ $item->id }}">
                                                                            {{ $item->color_name_ar }}</option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" disabled>
                                                                    {{ __('admin.choose_size') }}</option>
                                                                <option value="{{ $row->size }}" selected>
                                                                    {{ $row->size }}</option>

                                                                <option value="s">{{ __('admin.small') }}</option>
                                                                <option value="m">{{ __('admin.medium') }}</option>
                                                                <option value="l">{{ __('admin.large') }}</option>
                                                                <option value="xl">{{ __('admin.x-Large') }}</option>
                                                                <option value="xxl">{{ __('admin.xx-Large') }}</option>
                                                                <option value="xxx">{{ __('admin.xxx-large') }}
                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input class="form-control" type="number" name="count"
                                                                   value="{{ $row->count }}"
                                                                   placeholder="{{ __('admin.count') }}"/>

                                                        </div>

                                                        <div class="col-md-2">

                                                            <input
                                                                class=" btn-danger form-control form-control-solid outer"
                                                                data-repeater-delete type="button" value="Delete"/>
                                                        </div>

                                                    </div>
                                                @endforeach

                                                <div class="row">

                                                    <div data-repeater-item  id="first" class="row col-md-12"
                                                         style="padding-top: 10px;padding-bottom: 5px; display: none;"
                                                         id="row_repeter">
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" selected disabled>
                                                                    {{ __('admin.choose_color') }}</option>
                                                                @if (isset($color))
                                                                    @foreach ($color as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->color_name_ar }}</option>
                                                                    @endforeach

                                                                @endif

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" selected disabled>
                                                                    {{ __('admin.choose_size') }}</option>

                                                                <option value="s">{{ __('admin.small') }}</option>
                                                                <option value="m">{{ __('admin.medium') }}</option>
                                                                <option value="l">{{ __('admin.large') }}</option>
                                                                <option value="xl">{{ __('admin.x-Large') }}</option>
                                                                <option value="xxl">{{ __('admin.xx-Large') }}</option>
                                                                <option value="xxx">{{ __('admin.xxx-large') }}</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input class=" counts form-control" type="number"
                                                                   disabled name="count"
                                                                   placeholder="{{ __('admin.count') }}"/>

                                                        </div>

                                                        <div class="col-md-1">

                                                            <button
                                                                class=" btn-danger form-control form-control-solid outer"
                                                                style="text-align: center" data-repeater-delete
                                                                type="button">
                                                                <i style="font-size: 18px" class="fa fa-trash"
                                                                   aria-hidden="true"></i>
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>

                                            @else
                                                <div class="row">

                                                    <div data-repeater-item  id="first" class="row col-md-12"
                                                         style="padding-top: 10px;padding-bottom: 5px; display: none;"
                                                         id="row_repeter">
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" selected disabled>
                                                                    {{ __('admin.choose_color') }}</option>
                                                                @if (isset($color))
                                                                    @foreach ($color as $item)
                                                                        <option value="{{ $item->id }}">
                                                                            {{ $item->color_name_ar }}</option>
                                                                    @endforeach

                                                                @endif

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" selected disabled>
                                                                    {{ __('admin.choose_size') }}</option>

                                                                <option value="s">{{ __('admin.small') }}</option>
                                                                <option value="m">{{ __('admin.medium') }}</option>
                                                                <option value="l">{{ __('admin.large') }}</option>
                                                                <option value="xl">{{ __('admin.x-Large') }}</option>
                                                                <option value="xxl">{{ __('admin.xx-Large') }}</option>
                                                                <option value="xxx">{{ __('admin.xxx-large') }}</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input class=" counts form-control" type="number"
                                                                   disabled name="count"
                                                                    placeholder="{{ __('admin.count') }}"/>

                                                        </div>

                                                        <div class="col-md-1">

                                                            <button
                                                                class=" btn-danger form-control form-control-solid outer"
                                                                style="text-align: center" data-repeater-delete
                                                                type="button">
                                                                <i style="font-size: 18px" class="fa fa-trash"
                                                                   aria-hidden="true"></i>
                                                            </button>
                                                        </div>

                                                    </div>

                                                </div>
                                            @endif
                                            <div class="col-md-3">
                                                <input class="clickNewRow form-control form-control-solid outer"
                                                       data-repeater-create type="button"
                                                       style=" background: #28C76F;color: white;border: #28C76F;margin-top: 10px;"
                                                       value="{{ __('admin.addColorSize') }}"/>
                                            </div>


{{--                                             <input data-repeater-create type="button" style="padding-top: 10px" class="btn btn-success btn-sm" value="Add" />--}}
                                        </div>
                                    </div>

                                    <hr>
                                    <center>
                                        <div class="col-12">
                                            <button class="btn btn-primary mr-1 mb-1"
                                                    id="store_btn">{{ __('admin.submit') }}</button>
                                            <button type="reset" id="reset"
                                                    class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.reset') }}</button>
                                        </div>
                                    </center>
                                </div>

                            </div>
                        </div>
                        <div class="modal fade" id="addProductSpecifications" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">
                                            {{ __('admin.add_Specifications') }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">


                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.brand_name') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="brand_name"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->brand_name : '' }}"
                                                                   placeholder="{{ __('admin.brand_name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.certificate') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="certificate"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->certificate : '' }}"
                                                                   placeholder="{{ __('admin.certificate') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.type_product') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="type"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->type : '' }}"
                                                                   placeholder="{{ __('admin.type_product') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.metal_stamp') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="metal_stamp"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->metal_stamp : '' }}"
                                                                   placeholder="{{ __('admin.metal_stamp') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.main_stone') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="main_stone"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->main_stone : '' }}"
                                                                   placeholder="{{ __('admin.main_stone') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.type_certificate') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="type_certificate"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->type_certificate : '' }}"
                                                                   placeholder="{{ __('admin.type_certificate') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.occasion') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="occasion"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->occasion : '' }}"
                                                                   placeholder="{{ __('admin.occasion') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.pattern') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="pattern"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->pattern : '' }}"
                                                                   placeholder="{{ __('admin.pattern') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.item_type') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="item_type"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->item_type : '' }}"
                                                                   placeholder="{{ __('admin.item_type') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.pattern_shape') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="pattern_shape"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->pattern_shape : '' }}"
                                                                   placeholder="{{ __('admin.pattern_shape') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.chain_length') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="chain_length"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->chain_length : '' }}"
                                                                   placeholder="{{ __('admin.chain_length') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.origin') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="origin"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->origin : '' }}"
                                                                   placeholder="{{ __('admin.origin') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.weight') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="weight"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->weight : '' }}"
                                                                   placeholder="{{ __('admin.weight') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.metal_type') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="metal_type"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->metal_type : '' }}"
                                                                   placeholder="{{ __('admin.metal_type') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.gender') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="gender"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->gender : '' }}"
                                                                   placeholder="{{ __('admin.gender') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.diameter') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="diameter"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->diameter : '' }}"
                                                                   placeholder="{{ __('admin.diameter') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.personalization') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="personalization"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->personalization : '' }}"
                                                                   placeholder="{{ __('admin.personalization') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.fashion') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="fashion"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->fashion : '' }}"
                                                                   placeholder="{{ __('admin.fashion') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.side_stone') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="side_stone"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->side_stone : '' }}"
                                                                   placeholder="{{ __('admin.side_stone') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.certificate_number') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="certificate_number"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->certificate_number : '' }}"
                                                                   placeholder="{{ __('admin.certificate_number') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.model_number') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="model_number"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->model_number : '' }}"
                                                                   placeholder="{{ __('admin.model_number') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span>{{ __('admin.stamp') }}</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="stamp"
                                                                   value="{{ isset($productSpecification) ? $productSpecification->stamp : '' }}"
                                                                   placeholder="{{ __('admin.stamp') }}">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div class="bg-white p-3 rounded box-shadow">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row align-items-center">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="addNewColor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{ __('admin.addColor') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('color.store.edit') }}" method="POST" id="add_product_color">
                        @csrf
                        <div class="modal-body">
                            <div class="bg-white p-3 rounded box-shadow">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-3"><label for="colorName"
                                                                         class='font-sm'>{{ __('admin.color_arabic') }}</label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" id="colorName" name="color_name_ar"
                                                               class='form-control'
                                                               placeholder='{{ __('admin.color_arabic') }}'>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" id="colorName" name="color_name_en"
                                                               class='form-control'
                                                               placeholder='{{ __('admin.color_en') }}'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row pt-3 align-items-center">

                                    <div class="col-md-6"><label for="color_code">{{ __('admin.color_degree') }}</label>
                                    </div>
                                    <div class="col-md-3"><input type="color" id="color_code" name="color_code"
                                                                 class='form-control'></div>
                                </div>

                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ __('admin.close') }}</button>
                            <button type="button" id="add_color_sbtn"
                                    class="btn btn-primary">{{ __('admin.submit') }}</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('app-assets/js/jquery.repeater.js') }}"></script>

    <script>
        $('.clickNewRow').click(function (e) {
            e.preventDefault()

            setTimeout(function (){

                var inputs = document.getElementsByClassName("counts");
                for(var i = 0; i < inputs.length; i++) {
                    inputs[i].removeAttribute('disabled');
                }
            }, 100)





            //$('.countColorRow').removeAttribute('disabled');
            //cls.removeAttribute('disabled');

        });
    </script>




    <script>
        $(document).ready(function () {
            colors();
            $('#first').remove();
        });

        function colors()
        {
            'use strict';
            $('.repeater').repeater({
                                        defaultValues: {
                                            'select_input': '',
                                            'select_input': '',
                                            'select_input': '',
                                        },
                                        show         : function () {
                                            $(this).slideDown();
                                        },
                                        hide         : function (deleteElement) {
                                            if (confirm("{{ __('admin.sure_want_delete') }}"))
                                            {
                                                $(this).slideUp(deleteElement);
                                            }
                                        },
                                        ready        : function (setIndexes) {}
                                    });
            window.outerRepeater = $('.outer-repeater').repeater({
                                                                     isFirstItemUndeletable: true,
                                                                     defaultValues         : {
                                                                         'select2_input': 'outer-default'
                                                                     },
                                                                     show                  : function () {
                                                                         console.log('outer show');
                                                                         $(this).slideDown();
                                                                     },
                                                                     hide                  : function (deleteElement) {
                                                                         console.log('outer delete');
                                                                         $(this).slideUp(deleteElement);
                                                                     },
                                                                     repeaters             : [
                                                                         {
                                                                             isFirstItemUndeletable: true,
                                                                             selector              : '.inner-repeater',
                                                                             defaultValues         : {
                                                                                 'inner-select_input': 'inner-default'
                                                                             },
                                                                             show                  : function () {
                                                                                 console.log('inner show');
                                                                                 $(this).slideDown();
                                                                             },
                                                                             hide                  : function (deleteElement) {
                                                                                 console.log('inner delete');
                                                                                 $(this).slideUp(deleteElement);
                                                                             }
                                                                         }
                                                                     ]
                                                                 });
        }
    </script>
    <script>
        let name;
        let object;
        var img_id;
        $(document).ready(function () {
            packageCheck();
            // $("#check_model").hide();
            $(function () {
                $('#hidden_main_file').change(function () {
                    var input = this;
                    var url   = $(this).val();
                    var ext   = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext ==
                        "jpeg" || ext == "jpg"))
                    {
                        var reader    = new FileReader();
                        reader.onload = function (e) {
                            $('#img').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    } else
                    {
                        @isset($product->mainPhoto->image)

                        $('#img').attr('src',
                                       "{{ isset($product) ? asset('images/products/' . $product->id . '/' . $product->mainPhoto->image) : '' }}"
                        );
                        @endisset
                    }
                });
            });
            $('#store_btn').on('click', function (e) {
                e.preventDefault();
                console.log($('#myFormStore'));
                console.log('22222222222222222222');
                var formData = new FormData($("#myFormStore")[0]);
                console.log($('.repeater').length)
                if ($('.repeater').length > 1)
                {
                    var trans = $('.repeater').repeaterVal();
                    $.each(trans.group_a, function (key, value) {
                        console.log(value);
                        console.log(key);
                        formData.append('name[' + key + ']', [
                            value.text_input, value.select_input,
                            value.select_color
                        ])
                    });
                }
                //var trans = $('.repeater').repeaterVal();
                //$.each(trans.group_a, function(key, value) {
                //    console.log(value);
                //    console.log(key);
                //    formData.append('name[' + key + ']', [value.text_input, value.select_input,
                //        value.select_color
                //    ])
                //});
                func($('#myFormStore'), formData);
            });
        });

        function packageCheck()
        {
            if ($('#customCheck1').is(':checked'))
            {
                $("#check_model").show();
            } else
            {
                $("#check_model").hide();
            }
        }
    </script>
    <script>
        var city = document.getElementById('sub_category');

        function getval(sel)
        {
            // var city = document.getElementById('city')
            $.ajax({
                       url     : '{{ route('category.child') }}',
                       dataType: 'html',
                       method  : 'GET',
                       data    : {
                           id: sel.value
                       },
                       success : function (resp) {
                           // $("#code").append('<option value=' + value.code + '>' +value.language_name+' : '+value.code + '</option>');
                           $('#sub_category')
                               .find('option')
                               .remove()
                               .end()
                               .append('<option value=""> {{ __('admin.sub_category') }}</option>')
                               .val('');
                           $("#sub_category").attr('disabled', false);
                           console.log(resp);
                           $.each(JSON.parse(resp), function (key, value) {
                               console.log(value);
                               $("#sub_category").append('<option value="' + value['id'] + '">' + value[
                                   'category_name_ar'] + '</option>');
                           });
                       }
                   });
        }

        function func(form, formData)
        {
            $.ajax({
                       headers    : {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       url        : form.attr('action'),
                       dataType   : 'json',
                       type       : 'POST',
                       data       : formData,
                       contentType: false,
                       processData: false,
                       success    : function (resp) {
                           display_error_messages('success', resp.message)
                           location.reload();
                       },
                       error      : function (resp) {
                           $.each(resp.responseJSON.errors, function (i, error) {
                               display_error_messages("error", error[0]);
                           });
                       },
                       'complete' : function () {}
                   });
        }

        function mainimage(id)
        {
            Swal.fire({
                          title            : "{{ __('admin.Do_you_want_to_edit') }}",
                          showDenyButton   : true,
                          showCancelButton : true,
                          confirmButtonText: "{{ __('admin.edit') }}",
                          cancelButtonText : "{{ __('admin.close') }}",
                          denyButtonText   : "{{ __('admin.close') }}",
                      }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                console.log(result);
                if (result.value == true)
                {
                    $('#hidden_main_file').click();
                } else
                {
                    Swal.fire("{{ __('admin.closed') }}", '', 'info')
                }
            })
        }

        function subimage(id)
        {
            img_id = id;
            Swal.fire({
                          title            : "{{ __('admin.Do_you_want_to_add_or_delete') }}",
                          showDenyButton   : true,
                          showCancelButton : true,
                          confirmButtonText: "{{ __('admin.add') }}",
                          cancelButtonText : "{{ __('admin.delete') }}",
                          denyButtonText   : "{{ __('admin.delete') }}",
                      }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                console.log(result);
                if (result.value == true)
                {
                    $('#hidden_file').click();
                } else
                {
                    Swal.fire({
                                  text             : "{{ __('admin.sure_want_delete_product') }}",
                                  icon             : "warning",
                                  showCancelButton : true,
                                  buttonsStyling   : false,
                                  confirmButtonText: "{{ __('admin.Yes_delete') }}",
                                  cancelButtonText : "{{ __('admin.No_back_off') }}",
                                  customClass      : {
                                      confirmButton: "btn btn-primary",
                                      cancelButton : "btn btn-active-light"
                                  }
                              }).then(function (result) {
                        if (result.value)
                        {
                            $.ajax({
                                       headers : {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                           // 'X-CSRF-TOKEN': csrf_token()
                                       },
                                       url     : "{{ route('product.delete') }}",
                                       type    : "POST",
                                       data    : {
                                           id: id
                                       },
                                       dataType: "html",
                                       success : function () {
                                           $('#' + id + 'li').remove();
                                           $('#' + id).remove();
                                           // table.row($(parent)).remove().draw();
                                           // location.reload()
                                       },
                                       error   : function (xhr, ajaxOptions, thrownError) {
                                           swal("Error deleting!", "Please try again", "error");
                                       }
                                   });
                        } else if (result.dismiss === "cancel")
                        {
                            Swal.fire({
                                          text             : "{{ __('admin.Not_deleted') }}",
                                          icon             : "error",
                                          buttonsStyling   : false,
                                          confirmButtonText: "{{ __('admin.Well_get_it') }}",
                                          customClass      : {
                                              confirmButton: "btn btn-primary",
                                          }
                                      });
                        }
                    });
                }
            })
        }

        function display_error_messages(type, msg)
        {
            toastr.options = {
                "closeButton"      : false,
                "debug"            : false,
                "newestOnTop"      : false,
                "progressBar"      : false,
                "positionClass"    : "toast-bottom-left",
                "preventDuplicates": false,
                "onclick"          : null,
                "showDuration"     : "300",
                "hideDuration"     : "1000",
                "timeOut"          : "5000",
                "extendedTimeOut"  : "1000",
                "showEasing"       : "swing",
                "hideEasing"       : "linear",
                "showMethod"       : "fadeIn",
                "hideMethod"       : "fadeOut"
            };
            if (type == 'error')
            {
                toastr.error(msg);
            } else
            {
                toastr.success(msg);
            }
        }
    </script>
    <script>
        $("#add_color_sbtn").click(function (e) {
            e.preventDefault();
            var formData = new FormData($("#add_product_color")[0]);
            add_product_color(formData);
        });

        function add_product_color(formData)
        {
            $.ajax({
                       headers    : {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       url        : $("#add_product_color").attr('action'),
                       dataType   : 'json',
                       type       : 'POST',
                       data       : formData,
                       contentType: false,
                       processData: false,
                       success    : function (resp) {
                           // $('#addNewColor').modal('hide');
                           // $('#color_id').append($('<option>', {
                           //     value: resp.value1,
                           //     text: resp.value2
                           // }));
                           display_error_messages('success', resp.message)
                           var delayInMilliseconds = 2000; //2 second
                           setTimeout(function () {
                               //your code to be executed after 2 second
                               location.reload();
                           }, delayInMilliseconds);
                           // DisplayToastrMessage_General("success",resp.message, 3000);
                           // }
                       },
                       error      : function (resp) {
                           $.each(resp.responseJSON.errors, function (i, error) {
                               display_error_messages("error", error[0]);
                           });
                       },
                       'complete' : function () {}
                   });
        }
    </script>
@endsection
