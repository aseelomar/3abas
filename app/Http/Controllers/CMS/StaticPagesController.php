<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\StaticPages;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{


    public function index()
    {
        $this->setPage();
        $count = StaticPages::where('is_delete', 0)->count();

        return $this->setView('admin.staticPages.index')->with(compact(['count']));
    }


    public function create()
    {
        $this->setPage();

        return $this->setView('admin.staticPages.create');
    }



    public function updateOrCreate(Request $request)
    {
        // dd($request->file('image'));
        $id = $request->id ;

        $this->validate(
            $request,
            [
                'page_title_ar' => 'nullable|string|max:255',
                'page_title_en' => 'nullable|string|max:255',
                'page_body_ar' => 'nullable|string',
                'page_body_en' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
            ]
        );
        if (!empty($_FILES) && isset($_FILES['image']) && $request->hasFile('image')) {
            $image = $request->file('image');

            $timeNow = Carbon::now();

            $time = $timeNow->minute . '_' . $timeNow->second . '_' . $timeNow->hour . '_' . $timeNow->day . '_' . $timeNow->month . '_' . $timeNow->year;

            $name = $time . '_' . $image->getClientOriginalName();

            $image->move('images/pages/', $name);

            $request['page_image'] = $name;


        }

        $array = [
            'tb_name' => 'static_pages',
            'sql' => [

                'id' => $request->id,

            ],
        ];

        CRUDcontroller::updateOrCreate($array,$request->except('image'));

        // return ['message' => __('Updated Success'), 'code' => 204];
        return back();
    }



    // public function page_data(){
    //     $this->setPage();
    //     // return 'kkk';
    //     $pages= StaticPages::all();
    //     return $this->setView('admin.staticPages.index')->with(compact('pages'));
    // }


    public function page_data(Request $request)
    {

        $columns = array(
            0 => 'id',
            1 => 'title',
            2 =>  'body',
            3 =>  'page_image',
        );

        $totalData = StaticPages::where('is_delete', 0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');

        $dir =  $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {

            $pages = StaticPages::where('is_delete', 0)
            ->limit($limit)
            ->get();
        } else {
            $search = $request->input('search.value');


            $pages = StaticPages::where(function ($q) use ($search) {
                $q->where('id', $search)
                    // ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->orWhere('page_image', 'LIKE', "%{$search}%");
            })->where('is_delete', 0)
                //->offsfet($start)
                ->limit($limit)

                ->get();

            $totalFiltered = StaticPages::where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('id', 'LIKE', "%{$search}%")
                    ->orWhere('title', 'LIKE', "%{$search}%")
                    ->orWhere('body', 'LIKE', "%{$search}%")
                    ->orWhere('page_image', 'LIKE', "%{$search}%");
            })->where('is_delete', 0)
                ->count();
        }
        $data = array();

        if (!empty($pages)) {
            foreach ($pages as $pages) {


                $nestedData['id'] = " <td><a  onClick='update_page(".$pages." , this.parentNode.querySelector(`a`));'>" .
                $pages->id .
                    "</a></td>";

                $nestedData['page_title_ar'] = " <td><a  onclick='update_page(".$pages." , this.parentNode.querySelector(`a`));'>" .
                    $pages->page_title_ar .
                    "</a></td>";;

                $nestedData['page_title_en'] = " <td><a  onclick='update_page(".$pages." , this.parentNode.querySelector(`a`));'>" .
                    $pages->page_title_en .
                    "</a></td>";;


                $nestedData['page_body_ar'] = " <td><a  onclick='update_page(".$pages." , this.parentNode.querySelector(`a`));'>" .
                    $pages->page_body_ar .
                    "</a></td>";;

                $nestedData['page_body_en'] = " <td><a  onclick='update_page(".$pages." , this.parentNode.querySelector(`a`));'>" .
                    $pages->page_body_en .
                    "</a></td>";;


                    $nestedData['page_image'] = " <td> <a  onclick='update_page(" . $pages . " , this.parentNode.querySelector(`a`));'><img  width='50' src='" . asset('images/pages/'.$pages->page_image) . "' alt='" . 'jjjj' . "'></a></td>";

                    $nestedData['action'] = ' <td class="but-click">

                    <a  href="'.url('admincp/settings/website-pages/update?id='.$pages->id).'" >
                    <i class="fa fa-edit" aria-hidden="true"></i></a>


                    <i onclick="deletefunc('.$pages->id.')" style="color: red" class="fa fa-trash delete" aria-hidden="true"></i>
                 </td>';

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

    public function delete(Request $request)
    {

        $request['is_delete'] =1;
        $array = [
            'tb_name' => 'static_pages',
            'sql' => [
              'id' => $request->id
            ],
        ];

        CRUDcontroller::updateOrCreate($array, $request);
        return ('Deleted Success');

        // return redirect()->back();
    }


    public function edit(Request $request )
    {
        $this->validate($request,[
            'id'=>'required',
            'image'=>'nullable',
        ]);

        $this->setPage();
        $page = StaticPages::find($request->id);
        return $this->setView('admin.staticPages.edit')->with(compact('page'));

    }


    public function destroy($id)
    {
        //
    }
}
