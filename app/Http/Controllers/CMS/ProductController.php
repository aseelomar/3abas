<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\PaymentsMethods;
use App\Models\Product;
use App\Models\ProductDetails;
use App\Models\ProductImage;
use App\Models\ProductRate;
use App\Models\ProductSpecification;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\countOf;

class ProductController extends Controller
{
    //
    public function index()
    {
        $this->setPage();

        // $category = Category::with('parent')->get();
        $parents = Product::where('is_delete', 0)->get();



        return $this->setView('admin.product.index')->with(compact('parents'));
    }

    public function supplierData()
    {
        $this->setPage();
        $suppliers = Supplier::orderBy('id', 'desc')->where('is_delete', 0)->get();
        return $this->setView('admin.suppliers.index')->with(compact('suppliers'));
    }

    public function supplierCreate()
    {
        $this->setPage();

        $paymentMethode = PaymentsMethods::where('is_delete', 0)->active()->get();

        return $this->setView('admin.suppliers.supplierCreate')->with(compact(['paymentMethode']));
    }

    public function supplierPost(Request $request)
    {
        $array = ['tb_name' => 'suppliers'];
        CRUDcontroller::Create($array, $request);
    }

    public function supplierUpdate(Request $request)
    {
        $id = $request->id;
        $this->setPage();
        $supplier = Supplier::Find($id);
        $paymentMethode = PaymentsMethods::where('is_delete', 0)->active()->get();

        return $this->setView('admin.suppliers.supplierUpdate')->with(compact(['supplier', 'paymentMethode']));
    }

    public function supplierUpdatePost(Request $request)
    {
        $id = $request->id;
        $request = CRUDcontroller::getRequest($request);

        $array = [
            'tb_name' => 'suppliers',
            'sql' => [
                'id' => $id,
            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);
    }
    public function supplierDelete(Request $request)
    {

        $supplier = Supplier::Find($request->id);

        $supplier->is_delete = 1;
        $supplier->save();

        return redirect()->back();
    }


    public function create(Request $request)
    {
        $this->setPage();
        $category = Category::where('parent_id', 0)->where('is_delete', 0)->get();
        $color = Color::where('is_delete', 0)->get();

        $suppliers = Supplier::where('is_delete', 0)->get();
        return $this->setView('admin.product.create')->with(compact('category', 'color', 'suppliers'));
    }

    public function products_data(Request $request)
    {
        # code...
        $columns = array(
            0 => 'id',
            1 => 'parent',
            2 =>  'category_name_ar',
            3 =>  'category_name_en',
            4 =>  'status',
            // 4 => 'options'

        );

        // dd($request->all());
        // $totalData =  User::where('is_delete' , 0)->whereIn('user_role', array(2, 3, 4))->count();
        $totalData = Product::where('status','active')->where('is_delete', 0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        // $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');
        //var_dump($request->input('search.value')); die;
        if (empty($request->input('search.value'))) {
            // var_dump(55555); die;
            $products = Product::where('status','active')->where('is_delete', 0)->offset($start)
                ->limit($limit)
                // ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');


            $products = Product::where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('inventory', 'LIKE', "%{$search}%")
                    ->orWhere('product_price', 'LIKE', "%{$search}%")
                    ->orWhere('product_sale_price', 'LIKE', "%{$search}%")
                    ->orWhere('category_id', 'LIKE', "%{$search}%")
                    ->orWhere('sub_category_id', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('product_description_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_description_ar', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })->orwhereHas('mainCategory', function ($q) use ($search) {
                $q->where('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%");
            })->orwhereHas('subCategory', function ($q) use ($search) {
                $q->where('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                // ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Product::where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('inventory', 'LIKE', "%{$search}%")
                    ->orWhere('product_price', 'LIKE', "%{$search}%")
                    ->orWhere('product_sale_price', 'LIKE', "%{$search}%")
                    ->orWhere('category_id', 'LIKE', "%{$search}%")
                    ->orWhere('sub_category_id', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('product_description_en', 'LIKE', "%{$search}%")
                    ->orWhere('product_description_ar', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })->orwhereHas('mainCategory', function ($q) use ($search) {
                $q->where('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%");
            })->orwhereHas('subCategory', function ($q) use ($search) {
                $q->where('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($products)) {
            $category = Category::where('is_delete', 0)->get();
            $main_photo = ProductImage::where('is_delete', 0)->where('is_main', 1)->get();
            foreach ($products as $product) {



                //  $category =  Category::where('id',$product->category_id)->first();
                // $sub_category =  Category::find($product->sub_category_id);
                $nestedData['id'] = " <td><a  onClick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                    $product->id .
                    "</a></td>";
                $nestedData['inventory'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                    $product->inventory .
                    "</a></td>";
                $nestedData['product_price'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                    $product->product_price .
                    "</a></td>";
                $nestedData['product_sale_price'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                    $product->product_sale_price .
                    "</a></td>";
                if ($category->where('id', $product->category_id)->first()) {
                    $nestedData['category_id'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                        $category->where('id', $product->category_id)->first()->name .
                        "</a></td>";
                } else {
                    $nestedData['category_id'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                        'null' .
                        "</a></td>";
                }
                if ($category->where('id', $product->sub_category_id)->first()) {
                    $nestedData['sub_category_id'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));' ondblclick='dblCilick();'>" .
                        $category->where('id', $product->sub_category_id)->first()->name .
                        "</a></td>";
                } else {
                    $nestedData['sub_category_id'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'ondblclick='dblCilick();'>" .
                        'null' .
                        "</a></td>";
                }

                // $nestedData['sub_category_id'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'>" .
                //     $product->sub_category_id  .
                //     "</a></td>";;
                $nestedData['product_name'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'ondblclick='dblCilick();'>" .
                    $product->product_name_ar .
                    "</a></td>";;
                $nestedData['product_name_en'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'ondblclick='dblCilick();'>" .
                    $product->product_name_en .
                    "</a></td>";;
                $nestedData['product_description_ar'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'ondblclick='dblCilick();'>" .
                    $product->product_description_ar .
                    "</a></td>";;
                $nestedData['product_description_en'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'ondblclick='dblCilick();'>" .
                    $product->product_description_en .
                    "</a></td>";;


                // $nestedData['product_name_en'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'>" .
                //     $product->product_name_en .
                //     "</a></td>";;
                // $nestedData['product_name_ar'] = " <td><a  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'>" .
                //     $product->product_name_ar .
                //     "</a></td>";
                if ($main_photo->where('product_id', $product->id)->first()) {

                    $nestedData['product_image'] = " <td> <a  ondblclick='dblCilick();' onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'><img  width='50' src='" . asset('images/products/' . $product->id . '/' . $main_photo->where('product_id', $product->id)->first()->image) . "' alt='" . $product->product_name_en . "'></a></td>";
                } else {

                    $nestedData['product_image'] = " <td> <a ondblclick='dblCilick();'  onclick='update_product(" . $product . " , this.parentNode.querySelector(`a`));'><img  width='50' src='#' alt='" . $product->product_name_en . "'></a></td>";
                }
                if ($product->status == 'active') {

                    $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;"  onclick="ChangeStatus(' . $product->id . ')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status">
                     ' . __("admin.active") . '</a></td>';
                } elseif ($product->status == 'inactive') {
                    $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;" onclick="ChangeStatus(' . $product->id . ')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-warning  change-status">
                     ' . __("admin.inactive") . '</a></td>';
                } else {

                    $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;"onclick="ChangeStatus(' . $product->id . ')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status">
                     ' . __("admin.blocked") . '</a></td>';
                }
                $nestedData['rate'] = ' <td><a href="' . route("product.showRate", ['product_id' => $product->id]) . '">' .
                    '<span>' . $product->rating . '  <svg xmlns="http://www.w3.org/2000/svg" width="40.009" height="38.293" viewBox="0 0 40.009 38.293">
<path id="Icon_awesome-star" data-name="Icon awesome-star" d="M18.819,1.331l-4.883,9.9L3.01,12.826a2.394,2.394,0,0,0-1.324,4.083l7.9,7.7L7.721,35.492a2.392,2.392,0,0,0,3.47,2.52l9.774-5.138,9.774,5.138a2.393,2.393,0,0,0,3.47-2.52L32.34,24.611l7.9-7.7a2.394,2.394,0,0,0-1.324-4.083L27.995,11.233l-4.883-9.9a2.4,2.4,0,0,0-4.293,0Z" transform="translate(-0.961 0.001)" fill="#fd9c00"/>
</svg></span>' .
                    '</a></td>';

                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        echo  json_encode($json_data);
    }
    public function store(Request $request)
    {

        $id = $request->id;
        if (!$id) {
            $request['serial_number'] = $this->quickRandom();
        }

//        return $request->all();
        $this->validate(
            $request,
            [
                'category_id' => 'required|exists:categories,id',
                'sub_category_id' => 'nullable|exists:categories,id',
                'product_name_ar' => 'required|string|max:64',
                'product_name_en' => 'required|string|max:64',
                'product_description_ar' => 'required|string',
                'product_description_en' => 'required|string',
                'product_price' => 'required|numeric|gte:0',
                'product_sale_price' => 'required|numeric|gte:product_price',
                'inventory' => 'required|numeric|gte:0',
                'serial_number' => [
                    Rule::requiredIf(!$id), 'unique:products,serial_number'

                ],
                'main_file' => [
                    Rule::requiredIf(!$id), 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'

                ],
                'sub_file.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'group_a.*' => 'nullable|array',
                'group_a.*.color_id' => 'required|exists:colors,id',
                'group_a.*.count' => 'required|numeric|gte:0',
                'group_a.*.size' => 'required|in:s,m,l,xl,xxl,xxxl'

            ]
        );
        if ($request->group_a) {
            $counts = 0;
            $arr = array();
            foreach ($request->group_a as $item) {
                $counts += $item['count'];
                $arr[] = isset($item['row_id']) ? $item['row_id'] : null;
            }


            $this->validate(
                $request,
                [
                    'inventory' => 'required|numeric|gte:' . $counts . '|lte:' . $counts,
                ]
            );
            if ($request->id) {

                $pluck_arr = ProductDetails::where('product_id', $request->id)->get()->pluck('id')->toArray();
                $arr_diff = array_diff($pluck_arr,$arr );
                ProductDetails::whereIn('id',$arr_diff)->delete();


           }
        }

        $request['featured'] = $request->switch ? true : false;
        $array = [
            'tb_name' => 'products',
            'sql' => [
                // 'type' => 'admin_emp',
                'id' => $request->id,

            ],
        ];
        try {
            //code...
            $create_id = CRUDcontroller::updateOrCreate($array, $request->except([
                'main_file', 'sub_file', 'group_a', 'name', 'productSpecificat', 'brand_name', 'certificate', 'type', 'metal_stamp', 'main_stone', 'type_certificate', 'occasion', 'pattern', 'item_type',
                'pattern_shape', 'chain_length', 'origin', 'weight', 'metal_type', 'gender', 'diameter', 'personalization', 'fashion', 'side_stone',
                'certificate_number', 'model_number', 'stamp', 'switch'
            ]));
            //            $create_id = 0;
        } catch (\Throwable $th) {
            return $th;
            //throw $th;
        }
        if ($id) {
            $image = null;

            if (!empty($_FILES) && isset($_FILES['main_file']) && $request->hasFile('main_file')) {

                $image = $request->file('main_file');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '' . $timeNow->second . '' . $timeNow->hour . '' . $timeNow->day . '' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . ''  . '' . preg_replace('/\s+/', '',  $image->getClientOriginalName());


                $image->move('images/products/' . $id, $name);

                $image = $name;
                try {
                    //code...
                    ProductImage::where('product_id', $id)->where('is_main', 1)->where('is_delete', 0)->update(['is_delete' => 1, 'is_main' => 0]);

                    ProductImage::create(
                        [
                            'product_id' => $id,
                            'is_main' => 1,
                            'image' => $name,
                            'status' => 'active',
                            'is_delete' => 0,
                            'created_by' => Auth::id()
                        ]
                    );
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }
            if ($request->hasFile('sub_file')) {
                foreach ($request->file('sub_file') as $key => $file) {

                    $image = new ProductImage();
                    $extention =  $_FILES['sub_file']['name'][$key];
                    $filename = time() . '.' . $extention;
                    $file->move('images/products/' . $create_id . '/sub', $filename);
                    $image->product_id = $create_id;
                    $image->is_main = 0;
                    $image->image = $filename;
                    $image->status = 'active';
                    $image->created_by = Auth::id();
                    $image->save();
                }
            }
        } else {

            $image = null;
            if (!empty($_FILES) && isset($_FILES['main_file'])) {

                $image = $request->file('main_file');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '' . $timeNow->second . '' . $timeNow->hour . '' . $timeNow->day . '' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . ''  . '' . preg_replace('/\s+/', '',  $image->getClientOriginalName());

                $image->move('images/products/' . $create_id, $name);

                $image = $name;
                //code...
                ProductImage::create(
                    [
                        'product_id' => $create_id,
                        'is_main' => 1,
                        'image' => $name,
                        'status' => 'active',
                        'created_by' => Auth::id()
                    ]
                );
            }

            if ($request->hasFile('sub_file')) {
                foreach ($request->file('sub_file') as $key => $file) {

                    $image = new ProductImage();
                    $extention =  $_FILES['sub_file']['name'][$key];
                    $filename = time() . '.' . $extention;
                    $file->move('images/products/' . $create_id . '/sub', $filename);
                    $image->product_id = $create_id;
                    $image->is_main = 0;
                    $image->image = $filename;
                    $image->status = 'active';
                    $image->created_by = Auth::id();
                    $image->save();
                }
            }
        }
        $product_id = $id ?? $create_id;
        $productDetails= ProductDetails::Where('product_id',$product_id)->delete();
        if ($request->group_a) {
//            dd($request->group_a);

            foreach ($request->group_a as $item) {



                   ProductDetails::updateOrCreate(
                       [ 'product_id' => $product_id, 'color_id' => $item['color_id'], 'size' => $item['size'] ],
                       [ 'count' => $item['count'] ]
                   );

            }
        }

        if ($request->productSpecificat) {

            if ($id) {
                $productSpecificate = ProductSpecification::where('product_id', $id)->first();


                if ($productSpecificate) {
                    $specificate_id = $productSpecificate->id;
                    $product_id = $id;
                } else {
                    $product_id = $create_id;
                }
            } else {
                $product_id = $create_id;
            }
            $array = [
                'tb_name' => 'product_specifications',
                'sql' => [
                    // 'type' => 'admin_emp',
                    'id' => $specificate_id ?? null,
                    'product_id' => $product_id
                ],
            ];
            $ss =  CRUDcontroller::updateOrCreate($array, $request->only([
                'product_id', 'brand_name', 'certificate', 'type', 'metal_stamp', 'main_stone', 'type_certificate', 'occasion', 'pattern', 'item_type',
                'pattern_shape', 'chain_length', 'origin', 'weight', 'metal_type', 'gender', 'diameter', 'personalization', 'fashion', 'side_stone',
                'certificate_number', 'model_number', 'stamp'
            ]));
        }
        return ['message' => $id ? __('Updated Success') : __('Created Success'), 'code' => 200];
    }
    public function status(Request $request)
    {
        $id = $request->id;
        $updateStatus = Product::findOrFail($id);
        if ($updateStatus->status == 'active') {
            $status = 'inactive';
            $productCart = Cart::where('product_id',$id)->where('status',0)->where('is_delete',0)->delete();

        } elseif ($updateStatus->status == 'inactive') {
            $status = 'active';
        } else {
            $status = 'active';
        }
        $updateStatus->update([
            'status' => $status
        ]);
        $saved = $updateStatus->save();
        if ($saved) {
            return ['message' => __('admin.update_success'), 'code' => 200];
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $product = Product::where('id', $id)->where('is_delete', 0)->with(['mainPhoto', 'details', 'morePhoto' => function ($q) {
            $q->where('is_delete', 0);
        }])->first();
        if($product->status =='active')
        {
            $this->validate( $request, [
                'id' => 'required|exists:products,id'
            ] );

            $this->setPage();
            $category             = Category::where( 'parent_id', 0 )->where( 'is_delete', 0 )->get();
            $product              = Product::where( 'id', $id )->where( 'is_delete', 0 )->with( [
                                                                                                    'mainPhoto',
                                                                                                    'details',
                                                                                                    'morePhoto' => function ( $q ) {
                                                                                                        $q->where( 'is_delete', 0 );
                                                                                                    }
                                                                                                ] )->first();
            $sub_category         = $product ? Category::where( 'parent_id', $product->category_id )->get() : null;
            $color                = Color::where( 'is_delete', 0 )->get();
            $productSpecification = ProductSpecification::where( 'product_id', $id )->first();
            $suppliers            = Supplier::where( 'is_delete', 0 )->get();
//
//            return $product->details->isEmty;
            return $this->setView( 'admin.product.create' )->with( compact( 'category', 'sub_category', 'color', 'product', 'productSpecification', 'suppliers' ) );
        }
        $massage = "تم حذف المنتج ";
        return view('site.pages.product.deleteProductResult')->with(compact(['massage']));

    }
    public function showRate(Request $request)
    {
        $this->setPage();

        $rates = ProductRate::where('product_id', $request->product_id)->where('is_delete', 0)->with([
            'user' => function ($q) {
                $q->select(['id', 'name']);
            }
        ])->get();
        $count = $rates->count();

        return $this->setView('admin.product.productRate')->with(compact(['count', 'rates']));
    }
    public function delete_image(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:product_images,id',
        ]);
        $check = ProductImage::find($request->id)->update(['is_delete' => 1]);
        if (!$check) {
            $result['status'] = false;
            $result['message'] = __('product.delete_faild');
        } else {
            $result['status'] = true;
            $result['message'] = __('product.delete_successfully');
        }
        echo json_encode($result);
    }
    private  function quickRandom($length = 10)
    {
        //    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pool = '0123456789';

        return substr(str_shuffle(str_repeat($pool, 10)), 0, $length);
    }
}
