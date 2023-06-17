<?php $__env->startSection('title', @$product->name); ?>
<?php $__env->startSection('style'); ?>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .increase-product {
            display: flex;
            -webkit-box-align: center;
            box-shadow: 0px 0px 10px #872cff !important;
            padding: 0 32px;
            background: #FFFFFF;
            height: 62px;
            border-radius: 18px;
            justify-content: space-between;

        }

        .page-title-breadcrumb{
            text-align: initial;
        }
        .productSpecification{
            border: none;
            display: flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            gap: 20px;
            padding: 13px 26px;
            line-height: 1;
            border-radius: 20px;
            background: rgba(126, 51, 224, 0.67);
            -webkit-box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            box-shadow: 0px 0px 10px rgb(0 0 0 / 16%);
            -webkit-transition: all 0.3s ease-in-out;
            COLOR: WHITE;
            height: 60;
        }
    </style>
    <style>
        .breadcrumb{
            background-color: #B074FF !important;

        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
            float: right;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('subTitle', __('site.product')); ?>
<?php $__env->startSection('sub_Title'); ?>

    <a target="_self" href="<?php echo e(route('site.showProductCategory', @$product->mainCategory->id)); ?>"> <?php echo e(@$product->mainCategory->name); ?></a>
    <li>
        <svg xmlns="http://www.w3.org/2000/svg" width="9.389" height="15.523" viewBox="0 0 9.389 15.523">
            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                d="M10.331,11.888,16.545,6.02a1.062,1.062,0,0,0,0-1.567,1.228,1.228,0,0,0-1.662,0L7.842,11.1a1.064,1.064,0,0,0-.034,1.53l7.07,6.7a1.23,1.23,0,0,0,1.662,0,1.062,1.062,0,0,0,0-1.567Z"
                transform="translate(-7.5 -4.129)" />
        </svg>
    </li>
    <li>
        <?php if($product->subCategory): ?>
            <a
                target="_self" href="<?php echo e(route('site.showProductSubCategory', @$product->subCategory->id)); ?>"><?php echo e(@$product->subCategory->name); ?></a>

    </li>
    <li>
        <svg xmlns="http://www.w3.org/2000/svg" width="9.389" height="15.523" viewBox="0 0 9.389 15.523">
            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                d="M10.331,11.888,16.545,6.02a1.062,1.062,0,0,0,0-1.567,1.228,1.228,0,0,0-1.662,0L7.842,11.1a1.064,1.064,0,0,0-.034,1.53l7.07,6.7a1.23,1.23,0,0,0,1.662,0,1.062,1.062,0,0,0,0-1.567Z"
                transform="translate(-7.5 -4.129)" />
        </svg>
    </li>
    <?php endif; ?>
    <li>
        <span> <?php echo e(@$product->name); ?></span>
    </li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <main>
        <section class="products-page">
            <div class="container-content">
                <div class="boxes">
                    <div class="category-box">
                        <div class="img-box">
                            <img src="<?php echo e(asset('images/products/' . @$product->id . '/' . @$product->mainPhoto->image)); ?>"
                                alt="category" />
                        </div>
                        <div class="details">
                            <div class="content">
                                <a  href="#" class="title">
                                    <h3><?php echo e(@$product->name); ?></h3>
                                    
                                    <p> <span><?php echo e(@$product->rating); ?>  <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
                                            <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
                                        </svg></span>(<?php echo e(@$product->total_reviews); ?>) </p>
                                </a>
                                <p class="description" style=" text-align: initial;"><?php echo e(@$product->description); ?></p>
                                <div class="price-and-add-to-cart">

                                    <span class="price"><?php echo e(@$product->product_sale_price); ?> <span style="font-size: x-small;font-weight: 500;">شيكل</span></span>
                                    <form  id="form-add-car" method="POST" style="DISPLAY: CONTENTS;">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" value="<?php echo e(@$product->id); ?>" name="product_id" id="product_id">

                                        <?php if($product->details()->exists()): ?>

                                            <div>
                                                <select class="form-control increase-product " name="color_id"
                                                    id="color_id" onchange="getval(this);">

                                                    <option class="" value="" selected readonly>
                                                        <?php echo e(__('admin.choose_color')); ?></option>
                                                    <?php $__currentLoopData = $product->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->color_id); ?>"><?php echo e($item->color->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <div class="">
                                                <select class="form-control increase-product" name="size"
                                                    id="sub_category" readonly>
                                                    <option value="" selected> <?php echo e(__('admin.choose_size')); ?></option>

                                                    
                                                    

                                                    


                                                </select>
                                            </div>
                                        <?php endif; ?>
                                        <a href="#"    class="add-to-cart">
                                            <span><?php echo app('translator')->get('site.add_car'); ?></span>
                                            <svg id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart"
                                                xmlns="http://www.w3.org/2000/svg" width="36" height="34.5"
                                                viewBox="0 0 36 34.5">
                                                <path id="Path_30" data-name="Path 30"
                                                    d="M15,31.5A1.5,1.5,0,1,1,13.5,30,1.5,1.5,0,0,1,15,31.5Z" fill="none"
                                                    stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="3" />
                                                <path id="Path_31" data-name="Path 31"
                                                    d="M31.5,31.5A1.5,1.5,0,1,1,30,30,1.5,1.5,0,0,1,31.5,31.5Z"
                                                    fill="none" stroke="#fff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="3" />
                                                <path id="Path_32" data-name="Path 32"
                                                    d="M1.5,1.5h6l4.02,20.085a3,3,0,0,0,3,2.415H29.1a3,3,0,0,0,3-2.415L34.5,9H9"
                                                    fill="none" stroke="#fff" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="3" />
                                            </svg>
                                        </a>
                                    </form>
                                    <?php if($productSpecification !==null): ?>
                                    <a class="<?php echo \Illuminate\Support\Arr::toCssClasses('productSpecification') ?>" data-toggle="modal" data-target="#SpecificationView">
                                        <span >تفاصيل المنتج</span>

                                    </a>

                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php echo $__env->make('site.layout.include.flash-messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <form action="<?php echo e(route('site.showProduct.store',$product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-group-comments mb-6" style="margin-bottom :70px;">

                                    <div class="rate">
                                        <input  type="radio" id="star5"
                                            class="rate" name="rating" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio"  id="star4" class="rate" name="rating"
                                            value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" class="rate" name="rating"
                                            value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" class="rate" name="rating"
                                            value="2">
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" class="rate" name="rating"
                                            value="1"  name="rating" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>

                                <div class="form-group-comments mt-3">
                                    <input type="text" name="review" placeholder="أضف تعليقاً" />
                                    <button type="submit" class="submit-btn" id="stars_btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            fill="#fff" class="bi bi-send" viewBox="0 0 16 16">
                                            <path
                                                d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="gallery-images">
                    <?php $__currentLoopData = @$product->morePhoto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="img-box">
                            <img src="<?php echo e(asset('images/products/' . @$product->id . '/sub/' . @$img->image)); ?>"
                                alt="img" />
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="comments-boxes">
                    <?php $__currentLoopData = @$product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="comment">
                        <div class="img-box">
                            <img src="<?php echo e($item->user->image); ?>" alt="img" />
                        </div>
                        <h1> <?php echo e($item->comment); ?> </h1>

                        <p> <span><?php echo e(@$item->rate_value); ?>  <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
                            <path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
                        </svg></span></p>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
            <div class="similar-products">
                <div class="container-content">
                    <div class="section-header">
                        <h2>منتجات مشابهة </h2>

                        <?php if($product->sub_category_id): ?>
                            <a target="_self" href="<?php echo e(route('site.showProductSubCategory', $product->sub_category_id)); ?>">
                                <span><?php echo e(__('site.all')); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14.508" height="23.984"
                                    viewBox="0 0 14.508 23.984">
                                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                        d="M11.874,16.118l9.6-9.068a1.641,1.641,0,0,0,0-2.42,1.9,1.9,0,0,0-2.569,0L8.029,14.9a1.644,1.644,0,0,0-.053,2.363L18.9,27.614a1.9,1.9,0,0,0,2.569,0,1.641,1.641,0,0,0,0-2.42Z"
                                        transform="translate(-7.5 -4.129)" />
                                </svg>
                            </a>
                        <?php else: ?>
                            <a target="_self" href="<?php echo e(route('site.showProductMainCategory', $product->category_id)); ?>">
                                <span><?php echo e(__('site.all')); ?></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="14.508" height="23.984"
                                    viewBox="0 0 14.508 23.984">
                                    <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                        d="M11.874,16.118l9.6-9.068a1.641,1.641,0,0,0,0-2.42,1.9,1.9,0,0,0-2.569,0L8.029,14.9a1.644,1.644,0,0,0-.053,2.363L18.9,27.614a1.9,1.9,0,0,0,2.569,0,1.641,1.641,0,0,0,0-2.42Z"
                                        transform="translate(-7.5 -4.129)" />
                                </svg>
                            </a>
                        <?php endif; ?>

                    </div>
                    <div class="boxes">
                        <?php $__currentLoopData = @$similarProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similarProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="img-box">
                                <a target="_self" href="<?php echo e(route('site.showProduct', @$similarProduct->id)); ?> ">
                                    <img src="<?php echo e(asset('images/products/' . @$similarProduct->id . '/' . @$similarProduct->mainPhoto->image)); ?>"
                                        alt="img" />
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
            <div class="modal show" id="SpecificationView"  tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">تفاصيل المنتج</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <div class="modal-body">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">اسم التصنيف</th>
                                    <th scope="col">القيمة</th>
                                    <th scope="col">اسم التصنيف</th>
                                    <th scope="col">القيمة</th>
                                </tr>
                                </thead>
                                <tbody>

                               <tr>
                                        <th><?php echo e(__('admin.brand_name')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->brand_name!==null ? $productSpecification->brand_name : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.certificate')); ?></th>
                                       <th><?php echo e(isset($productSpecification ) && $productSpecification->certificate !==null ? $productSpecification->certificate : 'لايوجد'); ?></th>

                               </tr>
                               <tr>
                                        <th><?php echo e(__('admin.type_product')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->type !==null ? $productSpecification->type : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.metal_stamp')); ?></th>
                                       <th><?php echo e(isset($productSpecification ) && $productSpecification->metal_stamp !==null ? $productSpecification->metal_stamp : 'لايوجد'); ?></th>

                               </tr>
                                <tr>
                                        <th><?php echo e(__('admin.main_stone')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->main_stone!== null  ? $productSpecification->main_stone : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.type_certificate')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->type_certificat !== null ? $productSpecification->type_certificate : 'لايوجد'); ?></th>
                                </tr>

                                <tr>
                                        <th><?php echo e(__('admin.occasion')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->occasion !== null ? $productSpecification->occasion : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.pattern')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->pattern !== null ? $productSpecification->pattern : 'لايوجد'); ?></th>
                                </tr>
                                <tr>
                                        <th><?php echo e(__('admin.item_type')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->item_type !== null ? $productSpecification->item_type : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.pattern_shape')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->pattern_shap !== null ? $productSpecification->pattern_shape : 'لايوجد'); ?></th>
                                </tr>
                                <tr>
                                        <th><?php echo e(__('admin.chain_length')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->chain_length  !== null ? $productSpecification->chain_length : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.origin')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->origin !== null ? $productSpecification->origin : 'لايوجد'); ?></th>
                                </tr>
                                <tr>
                                        <th><?php echo e(__('admin.weight')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->weight !== null  ? $productSpecification->weight : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.metal_type')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->metal_type !== null  ? $productSpecification->metal_type : 'لايوجد'); ?></th>
                                </tr>
                               <tr>
                                        <th><?php echo e(__('admin.gender')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->gender  !== null ? $productSpecification->gender : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.diameter')); ?></th>
                                        <th> <?php echo e(isset($productSpecification ) &&  $productSpecification->diameter !== null   ? $productSpecification->diameter : 'لايوجد'); ?></th>
                                </tr><tr>
                                        <th><?php echo e(__('admin.personalization')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->personalization !== null ? $productSpecification->personalization : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.fashion')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->fashion !== null ? $productSpecification->fashion : 'لايوجد'); ?></th>
                                </tr><tr>
                                        <th><?php echo e(__('admin.side_stone')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->side_stone !== null ? $productSpecification->side_stone : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.certificate_number')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) &&  $productSpecification->certificate_number !== null ? $productSpecification->certificate_number : 'لايوجد'); ?></th>
                                </tr><tr>
                                        <th><?php echo e(__('admin.model_number')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->model_number !== null ? $productSpecification->model_number : 'لايوجد'); ?></th>
                                        <th><?php echo e(__('admin.stamp')); ?></th>
                                        <th><?php echo e(isset($productSpecification ) && $productSpecification->stamp !== null ? $productSpecification->stamp : 'لايوجد'); ?></th>

                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!--main-->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('site.pages.product.include.addToCart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('.productSpecification').on('click',function() {
        $("#SpecificationView").show();
    });
</script>

<?php echo $__env->make('site.layout.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/c/Users/jit/Desktop/addass/3abas/resources/views/site/pages/product/productDetails.blade.php ENDPATH**/ ?>