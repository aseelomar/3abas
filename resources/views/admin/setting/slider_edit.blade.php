<div class="card">
    <div class="card-header">
        <h4 class="card-title">{{__('admin.edit_slider')}}</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="form container" action="{{ route('slider.sync') }}" method="POST" id="myFormUpdate"
                enctype="multipart/form-data"    >
                @csrf
                <input type="hidden" name="id" value="{{ $slider->id }}">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="first-name-column" class="form-control"
                                    placeholder="{{ __('admin.arabic_title') }}" name="title_ar" value="{{ $slider->title_ar }}">
                                <label for="first-name-column">{{ __('admin.arabic_title') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="first-name-column" class="form-control"
                                    placeholder="{{ __('admin.english_title') }}" name="title" value="{{ $slider->title }}">
                                <label for="first-name-column">{{ __('admin.english_title') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group">
                                <textarea type="text" id="first-name-column" class="form-control" placeholder="{{ __('admin.arabic_body') }}" name="body_ar">{{ $slider->body_ar }}</textarea>
                                <label for="first-name-column">{{ __('admin.arabic_body') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group">
                                <textarea type="text" id="first-name-column" class="form-control" placeholder="{{ __('admin.english_body') }}" name="body">{{ $slider->body }}</textarea>
                                <label for="first-name-column">{{ __('admin.english_body') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-label-group">
                                <select name="is_visible" id="visible" class="form-control">
                                    <option selected value="1">{{ __('admin.visible') }}</option>
                                    <option value="0">{{ __('admin.hidden') }}</option>
                                </select>

                                <label for="first-name-column">{{ __('admin.english_body') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3 col-10 mb-5">


                            <input class="form-control-sm " id="formFileSm" name="image" type="file">

                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary mr-1 mb-1" type="button" id="update_btn" onclick="test()">{{ __('admin.submit') }}</button>
                            <button type="reset"
                                class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.reset') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>


