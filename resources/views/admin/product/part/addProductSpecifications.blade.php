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
