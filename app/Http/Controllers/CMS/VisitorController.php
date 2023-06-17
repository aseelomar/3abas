<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    //

    public function index()
    {
        $this->setPage();

        // $category = Category::with('parent')->get();
        $count = Visitor::count();

        return $this->setView('admin.statistic.visitor')->with(['count' => $count]);
    }
    public function visitor_data(Request $request)
    {
        # code...
        $columns = array(
            0 => 'id',
            1 => 'visitore_ip',
            2 =>  'status',
            3 =>  'created_at',
            4 =>  '',
            // 4 => 'options'

        );

        $totalData = Visitor::count();
        $totalFiltered = $totalData;
        $limit = $request->input('length');
        $start = $request->input('start');
        $order =  $columns[$request->input('order.0.column')];
        $dir =  $request->input('order.0.dir');
        if (empty($request->input('search.value'))) {
            $Visitors = Visitor::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)

                ->get();
        } else {
            $search = $request->input('search.value');
            $Visitors = Visitor::where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('visitor_ip', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%");
            })
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Visitor::where(function ($q) use ($search) {
                $q->where('id', $search)
                    ->orWhere('visitor_ip', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%");
            })
                ->count();
        }
        $data = array();

        if (!empty($Visitors)) {
            foreach ($Visitors as $key => $item) {
                $status = '';
                if($item->status == 3){
                    $status = "<p style='color :red'>".__('admin.block')."</p>";

                }elseif($item->status == 2){
                    $status = "<p style='color :yellow'>".__('admin.hidden')."</p>";


                }elseif($item->status == 1){
                    $status = "<p style='color :green'>".__('admin.active')."</p>";

                }else{
                    $status = "<p style='color :black'>".__('admin.delete')."</p>";

                }

                $nestedData['id'] = "<td >" .
                    $item->id .
                    "</td>";
                $nestedData['visitor_ip'] = " <td>" .
                    $item->visitor_ip .
                    "</td>";;
                $nestedData['status'] = " <td>" .
                    $status .
                    "</td>";;
                $nestedData['date'] = "<td >" .
                    $item->created_at->diffForHumans() .
                    "</td>";
                $nestedData['option'] = "<td > <span style='cursor: pointer' onClick='active_block(".$item->id.")' id='change-status' class='m--font-bold btn btn-sm m-btn--pill btn-danger  change-status'>" . __('admin.block_or_not') . "</span></td>";


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
    public function block_visitor(Request $request)
    {


        $this->validate($request, ['id' => 'required|exists:visitors,id']);
        $visitor = Visitor::find($request->id);
        if ($visitor->status == '3') {
            Visitor::find($request->id)->update(['status'=> 1]);
        } else {

            Visitor::find($request->id)->update(['status'=>3]);
        }


        return ['message' => __('admin.update_success'), 'code' => 200];

    }
}
