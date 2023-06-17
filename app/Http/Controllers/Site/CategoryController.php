<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductRate;
use App\Models\ProductDetails;
use App\Models\ProductSpecification;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {

        $allCategory = Category::where('parent_id', 0)->active()->orderBy('created_at', 'DESC')->with(
            [
                'child' => function ($q) {
                    $q->active();
                },
                'product' => function ($q) {
                    $q->active()->orderBy('created_at', 'DESC')->take(3);
                }
            ]
        )->get();

        return view('site.pages.category.allCategory')->with(compact(['allCategory']));
    }



    public function productDetails($id)
    {
        $product = Product::findOrFail( $id );
        if($product->status =='active'){
          $product = $product->load( [
                                           'mainCategory' => function ( $q ) {
                                               $q->select( [
                                                               'id',
                                                               'category_name_ar',
                                                               'category_name_en'
                                                           ] );
                                           },
                                           'subCategory'  => function ( $q ) {
                                               $q->select( [
                                                               'id',
                                                               'category_name_ar',
                                                               'category_name_en'
                                                           ] );
                                           },
                                           'details'      => function ( $q ) {
                                               $q->groupBy( 'color_id' )->with( 'color' );
                                           },
                                           'morePhoto'    => function ( $q ) {
                                               $q->where( 'is_delete', 0 )->where( 'status', 'active' );
                                           },
                                           'reviews'      => function ( $q ) {
                                               $q->with( 'user' )->where( 'is_delete', 0 )->where( 'status', 'active' );
                                           },

                                       ] );

            $productSpecification = ProductSpecification::where( 'product_id', $id )->first();

                $product->visitor = $product->visitor + 1;
                $product->save();


            $productName = $product->name;

            if ($product->subCategory) {
                $similarProducts = Product::where('sub_category_id', $product->sub_category_id)->active()->where(function ($q) use ($productName) {
                    $q->Where('product_name_en', 'LIKE', "%{$productName}%")
                      ->orWhere('product_name_ar', 'LIKE', "%{$productName}%")
                      ->orWhere('product_description_en', 'LIKE', "%{$productName}%")
                      ->orWhere('product_description_ar', 'LIKE', "%{$productName}%");
                })->whereNotIn('id',[$id])->orderBy('created_at', 'DESC')->take(6)->get();
            } else {
                $similarProducts = Product::where('category_id', $product->category_id)->active()->where(function ($q) use ($productName) {
                    $q->Where('product_name_en', 'LIKE', "%{$productName}%")
                      ->orWhere('product_name_ar', 'LIKE', "%{$productName}%")
                      ->orWhere('product_description_en', 'LIKE', "%{$productName}%")
                      ->orWhere('product_description_ar', 'LIKE', "%{$productName}%");
                })->whereNotIn('id',[$id])->orderBy('created_at', 'DESC')->take(6)->get();
            }



            return view('site.pages.product.productDetails')->with(compact(['product', 'similarProducts','productSpecification']));
        }

       $massage = "تم حذف المنتج ";
        return view('site.pages.product.deleteProductResult')->with(compact(['massage']));

    }
    public function productDetailsStore(Request $request , $id)
    {

        $request['product_id'] = $id ;
        $this->validate($request , [
            'product_id'=>'required|exists:products,id',
            'rating'=>['required', 'int', 'min:1', 'max:5'],
            'review'=>'nullable',
        ]);
            $product = Product::find($id);


            // DB::beginTransaction();
            // try {


                ProductRate::updateOrCreate([ 'user_id' => Auth::id(),
                'product_id' => $id],[

                    'rate_value' => $request->get('rating'),
                    'status' => 'inactive',
                    'comment' => $request->get('review'),
                ]);


            //     //store review on classroom
                $result = $product->reviews()
                    ->selectRaw('AVG(rate_value) as avg_rating')
                    ->selectRaw('COUNT(*) as total_reviews')
                    ->first();

                 $product->forceFill([
                    'rating' => $result->avg_rating,
                    'total_reviews' => $result->total_reviews,
                ])->save();

                         session()->flash('success','تم الاضافه بنجاح');
                return  redirect()->back();

                // DB::commit();
            // } catch (Exception $e) {
            //     DB::rollBack();
            //             session()->flash('error',' حدث خطأ يرجى المحاوله مره اخرى');
            //             return  redirect()->back();
            //     throw $e;
            // }



    }


    public function showProductSubCategory($id)
    {

        $category = Category::findOrFail($id);

        $subCategory = Category::where('parent_id', $category->parent_id)->active()->get();

        $products = Product::where('sub_category_id', $id)->orderBy('created_at', 'DESC')->active()->paginate(10);

        return view('site.pages.product.allProducts')->with(compact(['category', 'products', 'subCategory']));
    }
    public function showProductCategory($id)
    {


      $category = Category::findOrFail($id);


      if($category->parent_id == 0){
          $subCategory = Category::where('parent_id', $id)->active()->get();
          $products = Product::where('category_id', $id)->where('sub_category_id', null)->orderBy('created_at', 'DESC')->active()->paginate(10);

      }   else
      {


          $subCategory = Category::where( 'parent_id', $category->parent_id )->active()->get();

          $products = Product::where( 'sub_category_id', $id )->orderBy( 'created_at', 'DESC' )->active()->paginate( 10 );

      }

        return view('site.pages.product.allProducts')->with(compact(['category', 'products','subCategory']));
    }


    public function showSubCategory($id)
    {

        //        return view('site.pages.category.allCategory')->with(compact(['allCategory']));
    }
    public function showProductMainCategory($id)
    {

        $category = Category::findOrFail($id);

        $subCategory = Category::where('parent_id', $id)->active()->get();
        $products = Product::where('category_id', $id)->where('sub_category_id', null)->orderBy('created_at', 'DESC')->active()->paginate(10);

        return view('site.pages.product.allProducts')->with(compact(['category', 'products', 'subCategory']));
    }

    public function getAllDetail(Request $request)
    {
        $productDetail = ProductDetails::where('product_id', $request->product_id)->where('color_id', $request->color_id)->get();

        return $productDetail;
    }
}
