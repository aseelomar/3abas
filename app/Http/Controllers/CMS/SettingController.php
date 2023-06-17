<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Ads;
use App\Models\Confiq;
use App\Models\Page;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

class SettingController extends Controller
{
    //
    public function index()
    {
        $this->setPage();


        return $this->setView('admin.setting.index');
    }
    public function pageLink()
    {
        $this->setPage();


        $count = Page::count();

        return $this->setView('admin.setting.pageLink')->with(compact('count'));
    }
    public function slider()
    {
        $this->setPage();
        $shown_slider = Slider::where('is_delete', 0)->where('is_visible', 1)->get();
        $not_shown_slider = Slider::where('is_delete', 0)->where('is_visible', 0)->get();
        $count =$shown_slider->count();


        return $this->setView('admin.setting.slider')->with(['shown_slider' => $shown_slider])->with(['not_shown_slider' => $not_shown_slider])->with(['count' => $count]);
    }
    public function sliderEdit(Request $request)
    {

        $slider = Slider::where('id', $request->id)->first();

        return View::make('admin.setting.slider_edit', compact(['slider']))->render();
    }
    public function sliderSync(Request $request)
    {
         $id = $request->id;

        $this->validate(
            $request,
            [
                'title' => 'nullable',
                'title_ar' => 'nullable',
                'body' => 'nullable',
                'body_ar' => 'nullable',
                'image' => [
                    Rule::requiredIf(!$id), 'image',
                ]
            ]
        );
        $array = [
            'tb_name' => 'sliders',
            'sql' => [
                // 'type' => 'admin_emp',
                'id' => $request->id,

            ],
        ];
        if ($id) {

            if (!empty($_FILES) && isset($_FILES['image']) && $request->hasFile('image')) {

                $image = $request->file('image');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . '_'  . '_' . $image->getClientOriginalName();

                $image->move('images/slider/', $name);

                $image = $name;
                $request['slider_image'] = $name;
            }
        } else {

            if (!empty($_FILES) && isset($_FILES['image'])) {
                $image = $request->file('image');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . '_'  . '_' . $image->getClientOriginalName();

                $image->move('images/slider/', $name);

                $image = $name;
                $request['slider_image'] = $name;
            }
        }
        CRUDcontroller::updateOrCreate($array, $request->except('image'));



        return ['message' => $id ? __('admin.updateSuccess') : __('admin.createdSuccess'), 'code' => 200];
    }

    public function advertising()
    {
        $this->setPage();
          $ads = new Ads();
          $confiq = Confiq::getValue('ads.number',3);
        return $this->setView('admin.setting.advertising')->with('ads',$ads)->with('confiq',$confiq);
    }
    public function advertisingStore(Request $request)
    {
        $id = $request->number;
        $this->validate($request , [
            'link'=>'nullable|string|max:250',
            'image'=>'nullable|image',
            'title'=>'nullable|string|max:250',
            'number'=>'required',
        ]);
        $is_visible = 0 ;
        $is_visible = $request['is_active'] == 'on' ?1 :0 ;

        $array = [
            'tb_name' => 'ads',
            'sql' => [
                // 'type' => 'admin_emp',
                'is_visible' => $is_visible ,
                // 'check_by' => 'number',

            ],
        ];
        $plusArray = [

                // 'type' => 'admin_emp',
                'id' => $request->number,
                'check_by' => 'number',


        ];
        if ($id) {

            if (!empty($_FILES) && isset($_FILES['image']) && $request->hasFile('image')) {

                $image = $request->file('image');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . '_'  . '_' . $image->getClientOriginalName();

                $image->move('images/ads/', $name);

                $image = $name;
                $request['ads_image'] = $name;
            }
        } else {

            if (!empty($_FILES) && isset($_FILES['image'])) {
                $image = $request->file('image');

                $timeNow = Carbon::now('UTC');

                $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

                $name = $time . '_'  . '_' . $image->getClientOriginalName();

                $image->move('images/ads/', $name);

                $image = $name;
                $request['ads_image'] = $name;
            }
        }
        CRUDcontroller::updateOrCreate($array, $request->except(['image','is_active']) , $plusArray);


        return ['message' =>  __(' Updated Success') , 'code' => 200];



    }
    public function public(Request $request)
    {


            $this->setPage();
            $ads = Confiq::getValue('ads.number',3);
            $title = Confiq::getValue('title');
            $content = Confiq::getValue('content');
            $icon = Confiq::getValue('icon');
            $admin_ip = Confiq::getValue('admin_ip');


            return $this->setView('admin.setting.public')->with('ads',$ads)
            ->with('title',$title)
            ->with('content',$content)
            ->with('admin_ip',$admin_ip)
            ->with('ip',$request->ip())
            ->with('icon',$icon);


    }
    public function links_data(Request $request)
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
        $totalData = Page::where('parent_id',0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        // $dir =  $request->input('order.0.dir');
        //var_dump($request->input('search.value')); die;
        if (empty($request->input('search.value'))) {
            // var_dump(55555); die;
             $pages = Page::where('parent_id',0)
            ->offset($start)
                ->limit($limit)
                // ->orderBy($order, $dir)
                ->get();
        } else {
            $search = $request->input('search.value');


            $pages = Page::where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('title_en', 'LIKE', "%{$search}%")
                    ->orWhere('url', 'LIKE', "%{$search}%");
            })->where('parent_id',0)
                ->offset($start)
                ->limit($limit)
                ->orderBy('rank')
                ->get();

            $totalFiltered = Page::where(function ($q) use ($search) {
                $q->where('title', 'LIKE',"%{$search}%")
                ->orWhere('title_en', 'LIKE', "%{$search}%")
                ->orWhere('url', 'LIKE', "%{$search}%");
            })->where('parent_id',0)
                ->count();
        }
        $data = array();

        if (!empty($pages)) {

            $sub_pages = Page::where('parent_id','!=',0)->get();

            foreach ($pages as $key =>$page) {
                    $parent = 'قسم  رئيسي ';
                if ($page->parent_id == 0) {
                    $nestedData['check'] = $page->parent_id;
                    $nestedData['id'] = "<td ><a ondblclick='dbClick(".$page->id.")'   onClick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $key++ .
                        "</a></td>";
                    $nestedData['parent'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $parent .
                        "</a></td>";
                    $nestedData['url'] = " <td><a  ondblclick='dbClick(".$page->id.")' onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->url .
                        "</a></td>";
                    $nestedData['title'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->title .
                        "</a></td>";
                    $nestedData['title_en'] = " <td><a  ondblclick='dbClick(".$page->id.")' onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->title_en .
                        "</a></td>";
                    $nestedData['icon'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->icon .
                        "</a></td>";
                    $nestedData['rank'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->rank .
                        "</a></td>";
                    $nestedData['type'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        $page->type .
                        "</a></td>";
                    if ($page->visible == 1) {

                        $nestedData['visible'] = " <td><a ondblclick='dbClick(".$page->id.")'  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        __('admin.active') .
                            "</a></td>";
                     } else {

                        $nestedData['visible'] = " <td <a  onclick='update_sel(" . $page . " , this.parentNode.querySelector(`a`));'>" .
                        __('admin.inactive') .
                            "</a></td>";
                    }


                    $data[] = $nestedData;

                    $sub_key = 0 ;
                    foreach ($sub_pages as $sub) {
                            $parent =  '--';
                        if ($sub->parent_id == $page->id) {
                            $nestedData['check'] = $sub->parent_id;
                            $nestedData['id'] = "<td ><a  ondblclick='dbClick(".$sub->id.")'  onClick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub_key ++.
                                "</a></td>";
                            $nestedData['parent'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                // $categories->parent_id?Category::find($categories->parent_id)->category_name_ar??Category::find($categories->parent_id)->category_name_en : ' تصنيف رئيسي' .
                                $parent .
                                "</a></td>";
                                $nestedData['url'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->url .
                                "</a></td>";
                            $nestedData['title'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->title .
                                "</a></td>";
                            $nestedData['title_en'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->title_en .
                                "</a></td>";
                            $nestedData['icon'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->icon .
                                "</a></td>";
                            $nestedData['rank'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->rank .
                                "</a></td>";
                            $nestedData['type'] = " <td><a ondblclick='dbClick(".$sub->id.")'  onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                $sub->type."------" .
                                "</a></td>";
                                if ($sub->visible == 1) {

                                    $nestedData['visible'] = " <td><a ondblclick='dbClick(".$sub->id.")' style='color:green' onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                    __('admin.active') .
                                        "</a></td>";
                                    } else {

                                        $nestedData['visible'] = " <td><a ondblclick='dbClick(".$sub->id.")' style='color:red' onclick='update_sel(" . $sub . " , this.parentNode.querySelector(`a`));'>" .
                                        __('admin.inactive') .
                                            "</a></td>";

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
    public function updateOrCreate(Request $request)
    {

        $array = [
            'tb_name' => 'pages',
            'sql' => [
                'id' => $request->id ?? null,

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);

        return  $request->id ? ['message' =>  __('admin.updateSuccess')] : ['message' => __('admin.createdSuccess')];
    }

    public function editPage(Request $request)
    {
//        return 1 ;
        $this->setPage();

$page =Page::find($request->id);
$parent = Page::where('parent_id',0)->get();
// dd($page->title);

        return $this->setView('admin.setting.edit')->with(['page'=>$page , 'parent'=>$parent]);
    }
    public function getAllparent()
    {

        return   Page::where('parent_id', '==', 0)->get();
    }
    public function getAllChild(Request $request)
    {
        $this->validate($request, ['id' => 'required|exists:categories,id']);
        return   Page::where('parent_id', $request->id)->get();
    }
}
