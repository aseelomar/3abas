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
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-8">

            <p style="margin-right: 25px;margin-left: 25px"> <?php echo e(__('admin.add_product')); ?> /
                <small><?php echo e(__('admin.new_product')); ?> </small>
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
                            <p style="margin-right: 25px;margin-left: 25px"><?php echo app('translator')->get('admin.new_product'); ?></p>

                        </div>
                        <div class="col-md-2  col-sm-2">
                            <button type="button" onclick="window.location='<?php echo e(route('product.index')); ?>'"
                                    class=" btn btn-outline-danger"
                                    style="margin-bottom: 20px ;margin-right:140px;margin-left: 135px;"><?php echo e(__('admin.back')); ?></button>
                        </div>
                    </div>

                    <form class="form container" method="POST" id="myFormStore" action="<?php echo e(route('product.store')); ?>"
                          enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="<?php echo e(isset($product) ? $product->id : ''); ?>">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="first-name-column"><?php echo e(__('admin.arabic_name')); ?> </label>
                                        <input type="text" id="first-name-column" class="form-control"
                                               placeholder="<?php echo e(__('admin.arabic_name')); ?>" name="product_name_ar"
                                               value="<?php echo e(isset($product) ? $product->product_name_ar : ''); ?>">
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="last-name-column"><?php echo e(__('admin.english_name')); ?></label>
                                        <input type="text" id="last-name-column" class="form-control"
                                               placeholder="<?php echo e(__('admin.english_name')); ?>" name="product_name_en"
                                               value="<?php echo e(isset($product) ? $product->product_name_en : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="city-column"><?php echo e(__('admin.description_product')); ?></label>
                                        <input type="text" id="city-column" class="form-control"
                                               placeholder="<?php echo e(__('admin.description_product')); ?> "
                                               name="product_description_ar"
                                               value="<?php echo e(isset($product) ? $product->product_description_ar : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label for="Product-Details"><?php echo e(__('admin.product_details')); ?></label>
                                        <input type="text" id="Product-Details" class="form-control"
                                               placeholder="<?php echo e(__('admin.product_details')); ?>"
                                               name="product_description_en"
                                               value="<?php echo e(isset($product) ? $product->product_description_en : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="city-column"><?php echo e(__('admin.product_category')); ?> </label>

                                        <select name="category_id" onchange="getval(this);" id="category_column"
                                                class="form-control">
                                            <option value="" selected disabled>
                                                <?php echo e(__('admin.must_choose_main_category')); ?> </option>
                                            <?php if(isset($category)): ?>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        <?php if(isset($product)): ?> <?php if($product->category_id == $item->id): ?>
                                                        selected <?php endif; ?>
                                                        <?php endif; ?>
                                                        value="<?php echo e($item->id); ?>"><?php echo e($item->category_name_ar); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="sub_category"><?php echo e(__('admin.sub_category')); ?> </label>
                                        <select name="sub_category_id" id="sub_category" class="form-control"
                                                <?php if(!isset($product) && !isset($product->sub_category_id)): ?> disabled <?php endif; ?>>
                                            <?php if(isset($sub_category)): ?>
                                                <?php $__currentLoopData = $sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                        <?php if(isset($product)): ?> <?php if($product->sub_category_id == $item->id): ?>
                                                        selected <?php endif; ?>
                                                        <?php endif; ?>
                                                        value="<?php echo e($item->id); ?>"><?php echo e($item->category_name_ar); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php endif; ?>

                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="sub_category"><?php echo e(__('admin.supplierChoise')); ?> </label>


                                        <select class="form-control  select2" name="supplier_id">
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                    <?php if(isset($product)): ?> <?php if($product->supplier_id == $supplier->id): ?>
                                                    selected <?php endif; ?>
                                                    <?php endif; ?>
                                                    value="<?php echo e($supplier->id); ?>"> <?php echo e($supplier->supplier_name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="country-floating"><?php echo app('translator')->get('admin.price'); ?></label>
                                        <input type="number" id="country-floating" class="form-control"
                                               name="product_price" placeholder="<?php echo app('translator')->get('admin.price'); ?>"
                                               value="<?php echo e(isset($product) ? $product->product_price : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8">
                                    <div class="mb-1">
                                        <label for="company-column"><?php echo app('translator')->get('admin.sale_price'); ?></label>
                                        <input type="number" id="company-column" class="form-control"
                                               name="product_sale_price" placeholder="<?php echo app('translator')->get('admin.sale_price'); ?>"
                                               value="<?php echo e(isset($product) ? $product->product_sale_price : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 col-8 row">
                                    <div class="col-6">
                                        <label for="email-id-column"><?php echo app('translator')->get('admin.inventory'); ?></label>
                                        <input type="number" id="email-id-column" class="form-control" name="inventory"
                                               placeholder="<?php echo app('translator')->get('admin.inventory'); ?>"
                                               value="<?php echo e(isset($product) ? $product->inventory : ''); ?>">
                                    </div>

                                    <br>
                                    <div class="col-6">
                                        <label for="email-id-column"> منتج مميز</label>
                                        <div class=" form-control custom-control custom-switch custom-control-inline"
                                             style="border-style: none">
                                            <input type="checkbox"
                                                   <?php if(isset($product)): ?>
                                                   <?php if($product->featured): ?>
                                                   checked

                                                   <?php endif; ?>

                                                   <?php endif; ?>
                                                   name="switch" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">
                                            </label>
                                            <span class="switch-label"></span>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-4 col-10 mb-5">
                                    <label for="formFileSm" class="form-label"> <?php echo e(__('admin.main_photo')); ?></label>
                                    <?php if(!isset($product)): ?>

                                        <input class="form-control form-control-sm" id="formFileSm" name="main_file"
                                               type="file" <?php if(isset($product)): ?> hidden <?php endif; ?>>
                                    <?php endif; ?>
                                    <?php if(isset($product)): ?>
                                        <?php if(isset($product->mainPhoto->image)): ?>
                                            <img width="200" height="200" class=" img-fluid mb-3" id="img"
                                                 onclick="mainimage(<?php echo e(isset($product->mainPhoto->id) ? $product->mainPhoto->id : 0); ?>)"
                                                 src="<?php echo e(asset('images/products/' . $product->id . '/' . $product->mainPhoto->image)); ?>"
                                                 alt="" srcset="">
                                        <?php endif; ?>

                                    <?php endif; ?>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-4">
                                        <label for="formFileSm"
                                               class="form-label"><?php echo e(__('admin.more_pictures_product')); ?></label>
                                         <?php if(!isset($product)): ?>
                                        <input class="form-control form-control-sm" id="formFileSm" name="sub_file[]"
                                               type="file" multiple>
                                         <?php endif; ?>
                                        <?php if(isset($product) && isset($product->morePhoto)): ?>
                                            <div id="carousel-example-generic" class="carousel slide"
                                                 data-ride="carousel" id="slider-morephoto">
                                                <ol class="carousel-indicators">
                                                    <?php $__currentLoopData = $product->morePhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li id="<?php echo e($image->id); ?>li"
                                                            data-target="#carousel-example-generic"
                                                            data-slide-to="<?php echo e($key); ?>"
                                                            <?php if($key == 0): ?> class="active" <?php endif; ?>>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <?php $__currentLoopData = $product->morePhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="carousel-item <?php if($key == 0): ?> active <?php endif; ?> "
                                                             onclick="subimage(<?php echo e($image->id); ?>)">
                                                            <img class="img-fluid border-3" width="200" height="100"
                                                                 id="<?php echo e($image->id); ?>"
                                                                 src="<?php echo e(asset('images/products/' . $product->id . '/sub/' . $image->image)); ?>"
                                                                 alt="Second slide">
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-example-generic"
                                                   role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only"><?php echo e(__('admin.previous')); ?></span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-example-generic"
                                                   role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only"><?php echo e(__('admin.next')); ?></span>
                                                </a>
                                            </div>

                                        <?php endif; ?>

                                    </div>
                                </div>
                                <?php if(isset($product)): ?>

                                    <input type="file" hidden name="main_file" id="hidden_main_file"/>
                                    <input type="file" hidden name="sub_file[]" id="hidden_file" multiple/>
                                <?php endif; ?>

                                <div class="custom-control col-md-2 custom-checkbox"
                                     style="margin-top: 40px;text-align: center;">
                                    <input type="checkbox" class="custom-control-input" value="1"
                                           <?php if(@$productSpecification !== null): ?> checked <?php endif; ?> name="productSpecificat"
                                           id="customCheck1" onclick="packageCheck()">
                                    <label class="custom-control-label"
                                           for="customCheck1"><?php echo e(__('admin.productSpecifications')); ?></label>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" id="check_model" class=" btn btn-primary "
                                            style="  width: 100%;font-size: 13px; ; margin-top: 30px"
                                            data-toggle="modal"
                                            data-target="#addProductSpecifications"><?php echo e(__('admin.add_Specifications')); ?></button>
                                </div>

                                <div class="col-md-12 col-12 mb-5">
                                    <label for="formFileSm" class="form-label"><?php echo e(__('admin.addColorAndSize')); ?></label>

                                    <div class="repeater">
                                        <div data-repeater-list="group_a">
                                            <?php if(isset($product->details)): ?>



                                                <?php $__currentLoopData = $product->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div data-repeater-item class="row"
                                                         style="padding-top: 10px;padding-bottom: 5px">
                                                        <div class="col-md-3">

                                                            <input type="hidden" name="row_id" value="<?php echo e($row->id); ?>">
                                                            <select class="form-control form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" disabled>
                                                                    <?php echo e(__('admin.choose_color')); ?></option>
                                                                <?php if(isset($color)): ?>
                                                                    <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option
                                                                            <?php if($item->color_id == $row->color_id): ?> selected
                                                                            <?php endif; ?>
                                                                            value="<?php echo e($item->id); ?>">
                                                                            <?php echo e($item->color_name_ar); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" disabled>
                                                                    <?php echo e(__('admin.choose_size')); ?></option>
                                                                <option value="<?php echo e($row->size); ?>" selected>
                                                                    <?php echo e($row->size); ?></option>

                                                                <option value="s"><?php echo e(__('admin.small')); ?></option>
                                                                <option value="m"><?php echo e(__('admin.medium')); ?></option>
                                                                <option value="l"><?php echo e(__('admin.large')); ?></option>
                                                                <option value="xl"><?php echo e(__('admin.x-Large')); ?></option>
                                                                <option value="xxl"><?php echo e(__('admin.xx-Large')); ?></option>
                                                                <option value="xxx"><?php echo e(__('admin.xxx-large')); ?>

                                                                </option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input class="form-control" type="number" name="count"
                                                                   value="<?php echo e($row->count); ?>"
                                                                   placeholder="<?php echo e(__('admin.count')); ?>"/>

                                                        </div>

                                                        <div class="col-md-2">

                                                            <input
                                                                class=" btn-danger form-control form-control-solid outer"
                                                                data-repeater-delete type="button" value="Delete"/>
                                                        </div>

                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="row">

                                                    <div data-repeater-item  id="first" class="row col-md-12"
                                                         style="padding-top: 10px;padding-bottom: 5px; display: none;"
                                                         id="row_repeter">
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" selected disabled>
                                                                    <?php echo e(__('admin.choose_color')); ?></option>
                                                                <?php if(isset($color)): ?>
                                                                    <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($item->id); ?>">
                                                                            <?php echo e($item->color_name_ar); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" selected disabled>
                                                                    <?php echo e(__('admin.choose_size')); ?></option>

                                                                <option value="s"><?php echo e(__('admin.small')); ?></option>
                                                                <option value="m"><?php echo e(__('admin.medium')); ?></option>
                                                                <option value="l"><?php echo e(__('admin.large')); ?></option>
                                                                <option value="xl"><?php echo e(__('admin.x-Large')); ?></option>
                                                                <option value="xxl"><?php echo e(__('admin.xx-Large')); ?></option>
                                                                <option value="xxx"><?php echo e(__('admin.xxx-large')); ?></option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input class=" counts form-control" type="number"
                                                                   disabled name="count"
                                                                   placeholder="<?php echo e(__('admin.count')); ?>"/>

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

                                            <?php else: ?>
                                                <div class="row">

                                                    <div data-repeater-item  id="first" class="row col-md-12"
                                                         style="padding-top: 10px;padding-bottom: 5px; display: none;"
                                                         id="row_repeter">
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid color_id"
                                                                    name="color_id" id="color_id">
                                                                <option value="" selected disabled>
                                                                    <?php echo e(__('admin.choose_color')); ?></option>
                                                                <?php if(isset($color)): ?>
                                                                    <?php $__currentLoopData = $color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($item->id); ?>">
                                                                            <?php echo e($item->color_name_ar); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                <?php endif; ?>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <select class="form-control  form-control-solid" name="size"
                                                                    id="size">
                                                                <option value="" selected disabled>
                                                                    <?php echo e(__('admin.choose_size')); ?></option>

                                                                <option value="s"><?php echo e(__('admin.small')); ?></option>
                                                                <option value="m"><?php echo e(__('admin.medium')); ?></option>
                                                                <option value="l"><?php echo e(__('admin.large')); ?></option>
                                                                <option value="xl"><?php echo e(__('admin.x-Large')); ?></option>
                                                                <option value="xxl"><?php echo e(__('admin.xx-Large')); ?></option>
                                                                <option value="xxx"><?php echo e(__('admin.xxx-large')); ?></option>

                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input class=" counts form-control" type="number"
                                                                   disabled name="count"
                                                                    placeholder="<?php echo e(__('admin.count')); ?>"/>

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
                                            <?php endif; ?>
                                            <div class="col-md-3">
                                                <input class="clickNewRow form-control form-control-solid outer"
                                                       data-repeater-create type="button"
                                                       style=" background: #28C76F;color: white;border: #28C76F;margin-top: 10px;"
                                                       value="<?php echo e(__('admin.addColorSize')); ?>"/>
                                            </div>



                                        </div>
                                    </div>

                                    <hr>
                                    <center>
                                        <div class="col-12">
                                            <button class="btn btn-primary mr-1 mb-1"
                                                    id="store_btn"><?php echo e(__('admin.submit')); ?></button>
                                            <button type="reset" id="reset"
                                                    class="btn btn-outline-warning mr-1 mb-1"><?php echo e(__('admin.reset')); ?></button>
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
                                            <?php echo e(__('admin.add_Specifications')); ?></h5>
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
                                                            <span><?php echo e(__('admin.brand_name')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="brand_name"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->brand_name : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.brand_name')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.certificate')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="certificate"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->certificate : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.certificate')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.type_product')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="type"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->type : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.type_product')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.metal_stamp')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="metal_stamp"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->metal_stamp : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.metal_stamp')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.main_stone')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="main_stone"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->main_stone : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.main_stone')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.type_certificate')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="type_certificate"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->type_certificate : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.type_certificate')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.occasion')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="occasion"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->occasion : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.occasion')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.pattern')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="pattern"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->pattern : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.pattern')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.item_type')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="item_type"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->item_type : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.item_type')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.pattern_shape')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="pattern_shape"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->pattern_shape : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.pattern_shape')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.chain_length')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="chain_length"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->chain_length : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.chain_length')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.origin')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="origin"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->origin : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.origin')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.weight')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="weight"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->weight : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.weight')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.metal_type')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="metal_type"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->metal_type : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.metal_type')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.gender')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="gender"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->gender : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.gender')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.diameter')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="diameter"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->diameter : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.diameter')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.personalization')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="personalization"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->personalization : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.personalization')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.fashion')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="fashion"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->fashion : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.fashion')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.side_stone')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="side_stone"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->side_stone : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.side_stone')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.certificate_number')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="certificate_number"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->certificate_number : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.certificate_number')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.model_number')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control"
                                                                   name="model_number"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->model_number : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.model_number')); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <span><?php echo e(__('admin.stamp')); ?></span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control" name="stamp"
                                                                   value="<?php echo e(isset($productSpecification) ? $productSpecification->stamp : ''); ?>"
                                                                   placeholder="<?php echo e(__('admin.stamp')); ?>">
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
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('admin.addColor')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('color.store.edit')); ?>" method="POST" id="add_product_color">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <div class="bg-white p-3 rounded box-shadow">

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row align-items-center">
                                            <div class="col-md-3"><label for="colorName"
                                                                         class='font-sm'><?php echo e(__('admin.color_arabic')); ?></label>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="text" id="colorName" name="color_name_ar"
                                                               class='form-control'
                                                               placeholder='<?php echo e(__('admin.color_arabic')); ?>'>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" id="colorName" name="color_name_en"
                                                               class='form-control'
                                                               placeholder='<?php echo e(__('admin.color_en')); ?>'>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row pt-3 align-items-center">

                                    <div class="col-md-6"><label for="color_code"><?php echo e(__('admin.color_degree')); ?></label>
                                    </div>
                                    <div class="col-md-3"><input type="color" id="color_code" name="color_code"
                                                                 class='form-control'></div>
                                </div>

                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal"><?php echo e(__('admin.close')); ?></button>
                            <button type="button" id="add_color_sbtn"
                                    class="btn btn-primary"><?php echo e(__('admin.submit')); ?></button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('app-assets/js/jquery.repeater.js')); ?>"></script>

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
                                            if (confirm("<?php echo e(__('admin.sure_want_delete')); ?>"))
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
                        <?php if(isset($product->mainPhoto->image)): ?>

                        $('#img').attr('src',
                                       "<?php echo e(isset($product) ? asset('images/products/' . $product->id . '/' . $product->mainPhoto->image) : ''); ?>"
                        );
                        <?php endif; ?>
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
                       url     : '<?php echo e(route('category.child')); ?>',
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
                               .append('<option value=""> <?php echo e(__('admin.sub_category')); ?></option>')
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
                          title            : "<?php echo e(__('admin.Do_you_want_to_edit')); ?>",
                          showDenyButton   : true,
                          showCancelButton : true,
                          confirmButtonText: "<?php echo e(__('admin.edit')); ?>",
                          cancelButtonText : "<?php echo e(__('admin.close')); ?>",
                          denyButtonText   : "<?php echo e(__('admin.close')); ?>",
                      }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                console.log(result);
                if (result.value == true)
                {
                    $('#hidden_main_file').click();
                } else
                {
                    Swal.fire("<?php echo e(__('admin.closed')); ?>", '', 'info')
                }
            })
        }

        function subimage(id)
        {
            img_id = id;
            Swal.fire({
                          title            : "<?php echo e(__('admin.Do_you_want_to_add_or_delete')); ?>",
                          showDenyButton   : true,
                          showCancelButton : true,
                          confirmButtonText: "<?php echo e(__('admin.add')); ?>",
                          cancelButtonText : "<?php echo e(__('admin.delete')); ?>",
                          denyButtonText   : "<?php echo e(__('admin.delete')); ?>",
                      }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                console.log(result);
                if (result.value == true)
                {
                    $('#hidden_file').click();
                } else
                {
                    Swal.fire({
                                  text             : "<?php echo e(__('admin.sure_want_delete_product')); ?>",
                                  icon             : "warning",
                                  showCancelButton : true,
                                  buttonsStyling   : false,
                                  confirmButtonText: "<?php echo e(__('admin.Yes_delete')); ?>",
                                  cancelButtonText : "<?php echo e(__('admin.No_back_off')); ?>",
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
                                       url     : "<?php echo e(route('product.delete')); ?>",
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
                                          text             : "<?php echo e(__('admin.Not_deleted')); ?>",
                                          icon             : "error",
                                          buttonsStyling   : false,
                                          confirmButtonText: "<?php echo e(__('admin.Well_get_it')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/admin/product/create.blade.php ENDPATH**/ ?>