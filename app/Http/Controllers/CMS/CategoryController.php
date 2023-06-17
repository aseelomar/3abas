<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Category;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use function PHPUnit\Framework\isNull;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $this->setPage();

        // $category = Category::with('parent')->get();
        $count = Category::where('is_delete', 0)->count();


        return $this->setView('admin.categories.index')->with(compact('count'));
    }

    public function category_data(Request $request)
    {
        # code...
        $columns = array(
            0 => 'id',
            1 => 'parent_id',
            2 =>  'category_name_ar',
            3 =>  'category_name_en',
            4 =>  'status',
            // 4 => 'options'

        );

        // dd($request->all());
        // $totalData =  User::where('is_delete' , 0)->whereIn('user_role', array(2, 3, 4))->count();
        $totalData = Category::where('is_delete', 0)->where('parent_id',0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');
        //var_dump($request->input('search.value')); die;
        if (empty($request->input('search.value'))) {
            // var_dump(55555); die;
            $categoriess = Category::where('is_delete', 0)->where('parent_id',0)
            ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
        } else {
             $search = $request->input('search.value');


               $categoriess = Category::where('parent_id',0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })->orWhereHas('child',function($q)use($search){
                $q->where('id', $search)
                ->orWhere('category_name_en', 'LIKE', "%{$search}%")
                ->orWhere('category_name_ar', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Category::where('parent_id',0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('category_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('category_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%");
            })->orWhereHas('child',function($q)use($search){
                $q->where('id', $search)
                ->orWhere('category_name_en', 'LIKE', "%{$search}%")
                ->orWhere('category_name_ar', 'LIKE', "%{$search}%")
                ->orWhere('status', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($categoriess)) {

            $sub_category = Category::where('is_delete', 0 )->where('parent_id','!=',0)->get();

            foreach ($categoriess as $key =>$categories) {
                    $parent = 'قسم  رئيسي ';
                if ($categories->parent_id == 0) {
                    $nestedData['check'] = $categories->parent_id;
                    $nestedData['id'] = "<td ><a   onClick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'>" .
                        $key++ .
                        "</a></td>";
                        if($categories->category_image){

                            $nestedData['image'] = "<td ><a   onClick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'><img  width='150' src='" .
                               asset('images/category/'.$categories->category_image) .
                                "'</a></td>";
                        }else{
                            $nestedData['image'] = "<td ><a   onClick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'><img width='50' src='" .
                               asset('images/category/'.$categories->category_image) .
                                "'</a></td>";

                        }
                    $nestedData['parent'] = " <td><a  onclick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'>" .
                        $parent .
                        "</a></td>";
                    $nestedData['category_name_ar'] = " <td><a  onclick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'>" .
                        $categories->category_name_ar .
                        "</a></td>";;
                    $nestedData['category_name_en'] = " <td><a  onclick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'>" .
                        $categories->category_name_en .
                        "</a></td>";;
                    if ($categories->status == 'active') {

                        $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;"  onclick="ChangeStatus('.$categories->id.')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status"> '.__("admin.active").'</a></td>';

                    } elseif ($categories->status == 'inactive') {

                        $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;" onclick="ChangeStatus('.$categories->id.')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status"> '.__("admin.inactive").'</a></td>';
                    }
//                    else {
//
//                        $nestedData['status'] = " <td></td> <span class='m--font-bold btn btn-sm m-btn--pill btn-lock  change-status' style='background-color:#626262; color: #fff;' onclick='update_category(" . $categories . " , this.parentNode.querySelector(`a`));'>" .
//                            $categories->status .
//                            "</span></td>";
//                    }


                    $data[] = $nestedData;

                    $sub_key = 0 ;
                    foreach ($sub_category as $cate) {
                            $parent =  '--';
                        if ($cate->parent_id == $categories->id) {
                            $nestedData['check'] = $cate->parent_id;
                            $nestedData['id'] = "<td ><a   onClick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'>" .
                                $sub_key ++.
                                "</a></td>";
                                if($cate->category_image){

                                    $nestedData['image'] = "<td ><a '  onClick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'><img width='150' src='" .
                                       asset('images/category/'.$cate->category_image) .
                                        "'</a></td>";
                                }else{
                                    $nestedData['image'] = "<td ><a   onClick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'><img width='50' src='" .
                                       asset('images/category/'.$cate->category_image) .
                                        "'</a></td>";

                                }

                            $nestedData['parent'] = " <td><a  onclick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'>" .
                                // $categories->parent_id?Category::find($categories->parent_id)->category_name_ar??Category::find($categories->parent_id)->category_name_en : ' تصنيف رئيسي' .
                                $parent .
                                "</a></td>";
                            $nestedData['category_name_ar'] = " <td><a  onclick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'>" .
                                $cate->category_name_ar .
                                "</a></td>";
                            $nestedData['category_name_en'] = " <td><a  onclick='update_category(" . $cate . " , this.parentNode.querySelector(`a`));'>" .
                                $cate->category_name_en .
                                "</a></td>";
//
//                            $nestedData['action'] = ' <td class="but-click">
//                    <a  href="'.url('admincp/clients/edit?id='.$clients->id.'&email='.$clients->email).'" >
//                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
//                </td>';


                            if ($cate->status == 'active') {
                                $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;"  onclick="ChangeStatus('.$cate->id.')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-success  change-status"> '.__("admin.active").'</a></td>';

                            } elseif ($cate->status == 'inactive') {

                                $nestedData['status'] = '<td> <a style="cursor: pointer ;color:white;" onclick="ChangeStatus('.$cate->id.')"
                    id="change-status"class="m--font-bold btn btn-sm m-btn--pill btn-danger  change-status"> '.__("admin.inactive").'</a></td>';
                            }

                            $data[] = $nestedData;
                        }
                    }
                }
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

    public function status(  Request $request)
    {
        $id= $request->id;
        $updateStatus = Category::findOrFail($id);

      $updateStatus->load('child');
        if ($updateStatus->status == 'active') {
            $status = 'inactive';

        } elseif ($updateStatus->status == 'inactive'){
            $status = 'active';

        } else {
            $status = 'active';

        }
        if( sizeof($updateStatus->child)){
         foreach ($updateStatus->child as $item){
             $item->update([
                                       'status' => $status
                                   ]);
             $saved = $item->save();
         }
        }

        $updateStatus->update([
            'status' => $status
        ]);
        $saved = $updateStatus->save();
        if ($saved) {
            return ['message' => __('admin.update_success'), 'code' => 200];
        }
    }
    public function updateOrCreate(Request $request)
    {
        $this->validate(
            $request,
            [
                'parent_id' => 'required',
                'category_name_ar' => 'required|string|max:64',
                'category_name_en' => 'required|string|max:64',
                'cat_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
//                'status_input' => 'required',

            ]
        );
        $request['status'] = $request->status_input ?'active':'inactive';
        if (!empty($_FILES) && isset($_FILES['cat_image']) && $request->hasFile('cat_image')) {

            $image = $request->file('cat_image');

            $timeNow = Carbon::now('UTC');

            $time = $timeNow->minute . '' . $timeNow->second . '' . $timeNow->hour . '' . $timeNow->day . '' . $timeNow->month . '_' . $timeNow->year;

            $name = $time . ''  . '' . preg_replace('/\s+/', '',  $image->getClientOriginalName());


            $image->move('images/category/', $name);

            $request['category_image'] = $name;
        }


        $array = [
            'tb_name' => 'categories',
            'sql' => [
                'id' => $request->id ?? null,

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request->except('status_input','cat_image'));

        return  $request->id ? ['message' =>  __('admin.updateSuccess')] : ['message' => __('admin.createdSuccess')];
    }
    public function category_edit(Request $request)
    {
        return   $category = Category::find($request->id);


        // return View::make('admin.categories.categories_edit', compact(['category']))->render();
    }
    public function getAllparent()
    {

        return   Category::where('parent_id', '==', 0)->get();
    }
    public function getAllChild(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:categories,id']);
        return   Category::where('parent_id', $request->id)->get();
    }
    // public function category_active_deactive(Request $request)
    // {
    //      $category = Category::find($request->id);
    //      if($category->status == 'actve'){
    //         $category->status = 'inactive';
    //         $category->save();
    //         return ['message'=> __('Success')];


    //      }else{
    //         $category->status = 'active';
    //         $category->save();
    //         return ['message'=> __('Success')];


    //      }


    //     // return View::make('admin.categories.categories_edit', compact(['category']))->render();
    // }
    // public function category_bloacked(Request $request)
    // {
    //      $category = Category::find($request->id);
    //      if($category->status !== 'blocked'){
    //         $category->status = 'blocked';
    //         $category->save();
    //         return ['message'=> __('Success')];


    //      }else{
    //         $category->status = 'active';
    //         $category->save();
    //         return ['message'=> __('Success')];


    //      }


    //     // return View::make('admin.categories.categories_edit', compact(['category']))->render();
    // }


}
