<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    //
    public function index()
    {
        $this->setPage();
        // $category = Category::with('parent')->get();
        $count = Color::where('is_delete', 0 )->count();


        return $this->setView('admin.color.index')->with(['count'=>$count]);
    }
    public function storeUpdateColor(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [
            'color_name_ar' => 'required|unique:colors,color_name_ar,' . $id,
            'color_name_en' => 'required|unique:colors,color_name_en,' . $id,
            'color_code' => 'required|unique:colors,color_code,' . $id,
            'rank' => 'required|gt:0'
        ]);
        $array = [
            'tb_name' => 'colors',
            'sql' => [
                // 'type' => 'admin_emp',
                'id' => $request->id,

            ],
        ];

         $create_id = CRUDcontroller::updateOrCreate($array, $request->only(['color_name_ar', 'color_name_en', 'color_code', 'rank' , 'is_delete']));

        return ['message' => $id ? __(' Updated Success') : __('Created Success'), 'code' => 200, 'value2' => $request->color_name_ar, 'value1' => $id ?? $create_id];
    }
    public function color_data(Request $request)
    {
        # code...
        $columns = array(
            0 => 'rank',
            1 => 'color_name_ar',
            2 =>  'color_name_en',
            3 =>  'color_code',
            4 =>  'id',
            // 4 => 'options'

        );

        $totalData = Color::where('is_delete', 0)->count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $colors = Color::where('is_delete', 0)->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)

                ->get();
        } else {
            $search = $request->input('search.value');
            $colors = Color::where('is_delete', 0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('color_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('color_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('color_code', 'LIKE', "%{$search}%")
                    ->orWhere('rank', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Color::where('is_delete', 0)->where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('color_name_ar', 'LIKE', "%{$search}%")
                    ->orWhere('color_name_en', 'LIKE', "%{$search}%")
                    ->orWhere('color_code', 'LIKE', "%{$search}%")
                    ->orWhere('rank', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($colors)) {
            foreach ($colors as $item) {

                $nestedData['check'] = $item->parent_id;
                $nestedData['id'] = "<td ><a   onClick='update_item(" . $item . " , this.parentNode.querySelector(`a`));'>" .
                    $item->id .
                    "</a></td>";
                $nestedData['color_name_en'] = " <td><a  onclick='update_item(" . $item . " , this.parentNode.querySelector(`a`));'>" .
                    $item->color_name_en .
                    "</a></td>";;
                $nestedData['color_name_ar'] = " <td><a  onclick='update_item(" . $item . " , this.parentNode.querySelector(`a`));'>" .
                    $item->color_name_ar .
                    "</a></td>";;
                $nestedData['color_code'] = "<td ><a   onClick='update_item(" . $item . " , this.parentNode.querySelector(`a`));'>" .
                    $item->color_code .
                    "</a></td>";
                $nestedData['rank'] = "<td ><a   onClick='update_item(" . $item . " , this.parentNode.querySelector(`a`));'>" .
                    $item->rank .
                    "</a></td>";


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
}
