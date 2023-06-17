<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CRUDcontroller;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

class ClientController extends Controller
{


    public function getRegister()
    {
        $country = Country::get();

        return view('site.pages.register.user_register')->with(compact('country'));

    }

    public function postRegister(Request $request)
    {
     $id = $request->id;

   $this->validate(
            $request,
            [
                'email' => [Rule::requiredIf(!$id) , 'email','unique:users,email,'.$id],
                'name' => 'required|string|max:64',
                // 'password' => 'required|min:6|max:20',
                'mobile'=>'required|numeric|digits:10',
                'extra_mobile'=>'nullable|numeric|digits:10',
                'location'=>'required',
                'country_id'=>'required|exists:countries,id',
                'password'=>'required'
            ]
        );

        $array = [
            'tb_name' => 'users',
            'sql' => [
                'type' => 'client',
                'id' => $request->id ?? null ,
                // 'password' => '123'

            ],
        ];

            // Validate the value...

       CRUDcontroller::updateOrCreate($array, $request);

        return view('auth.login');

    }




    public function clients()
    {
        $this->setPage();
        // $count = User::where('is_deleted', 0)->count();

        $clients = User::where('type', 'client')->where('is_deleted', 0)->get();
        return $this->setView('admin.clients.clients')->with(compact('clients'));
    }

    public function client_create(){
        $this->setPage();
        $country = Country::get();
//         $city = City::get();
        return $this->setView('admin.clients.create')->with(compact('country',));
    }

    public function client_edit(Request $request)
    {
        $this->setPage();
        $client = User::find($request->id);
        $country = Country::get();
//        $city = City::get();
        return $this->setView('admin.clients.edit')->with(compact('client','country'));

    }

    public function delete(Request $request)
    {

        $request['is_deleted'] =1;
        $array = [
            'tb_name' => 'users',
            'sql' => [
              'id' => $request->id
            ],
        ];

        CRUDcontroller::updateOrCreate($array, $request);
        // return ['message' =>$request->is_deleted? __('deletedSuccess'):__('Success'), 'code' => 204];
           return __('admin.delete_success') ;
    }





    public function client_data(Request $request)
    {
        return null ;
    }
    // {
    //     // return ('kk');
    //     # code...
    //     $columns = array(
    //         0 => 'id',
    //         1 => 'name',
    //         2 =>  'email',
    //         // 3 =>  'category_name_en',
    //         // 3 =>  'status',
    //         // 4 => 'options'

    //     );

    //     $totalData = User::where('type', 'client')
    //         ->where('is_deleted', 0)
    //         ->count();
    //     $totalFiltered = $totalData;
    //     $limit = $request->input('length');
    //     $start = $request->input('start');
    //     $dir =  $request->input('order.0.dir');
    //     if (empty($request->input('search.value'))) {
    //         $clients = User::where('type', 'client')->offset($start)
    //             ->where('is_deleted', 0)
    //             ->limit($limit)
    //             ->get();
    //     } else {
    //         $search = $request->input('search.value');


    //         $clients = User::where(function ($q) use ($search) {
    //             $q->where('id', $search)
    //                 // ->orWhere('id', 'LIKE', "%{$search}%")
    //                 ->orWhere('name', 'LIKE', "%{$search}%")
    //                 ->orWhere('email', 'LIKE', "%{$search}%")
    //                 ->orWhere('type', 'LIKE', "%{$search}%")
    //                 ->orWhere('provider', 'LIKE', "%{$search}%")
    //                 ->orWhere('mobile', 'LIKE', "%{$search}%")
    //                 ->orWhere('location', 'LIKE', "%{$search}%")
    //                 ->orWhere('country_id', 'LIKE', "%{$search}%")
    //                 ->orWhere('is_deleted', 'LIKE', "%{$search}%")
    //                 ->orWhere('created_by', 'LIKE', "%{$search}%")
    //                 ->orWhere('visible', 'LIKE', "%{$search}%")
    //                 ->orWhere('updated_by', 'LIKE', "%{$search}%");
    //             // ->orWhere('status', 'LIKE', "%{$search}%");
    //         })
    //             ->where('type', 'client')
    //             ->where('is_deleted', 0)
    //             ->offset($start)
    //             ->limit($limit)
    //             // ->orderBy($order, $dir)
    //             ->get();

    //         $totalFiltered = User::where(function ($q) use ($search) {
    //             $q->where('id', $search)
    //                 // ->orWhere('id', 'LIKE', "%{$search}%")
    //                 ->orWhere('name', 'LIKE', "%{$search}%")
    //                 ->orWhere('email', 'LIKE', "%{$search}%");
    //             // ->orWhere('status', 'LIKE', "%{$search}%");
    //         })
    //             ->where('is_deleted', 0)
    //             ->count();
    //     }
    //     $data = array();

    //     if (!empty($clients)) {
    //         foreach ($clients as $clients) {


    //             $nestedData['id'] = " <td><a  onClick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->id .
    //                 "</a></td>";
    //             $nestedData['name'] = " <td><a  onclick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->name .
    //                 "</a></td>";
    //             $nestedData['email'] = " <td><a  onclick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->email .
    //                 "</a></td>";;
    //             $nestedData['mobile'] = " <td><a  onclick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->mobile .
    //                 "</a></td>";;

    //             $nestedData['location'] = " <td><a  onclick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->location .
    //                 "</a></td>";;

    //             $nestedData['country_id'] = " <td><a  onclick='update_client(" . $clients . " , this.parentNode.querySelector(`a`));'>" .
    //                 $clients->country_id .
    //                 "</a></td>";;




    //             // if($categories->status == 'active'){

    //             //     $nestedData['status'] = " <td><a  onclick='update_category(".$categories." , this.parentNode.querySelector(`a`));'>" .
    //             //         $categories->status .
    //             //         "</a></td>";
    //             // }elseif($categories->status == 'inactive'){

    //             //     $nestedData['status'] = " <td><a  onclick='update_category(".$categories." , this.parentNode.querySelector(`a`));'>" .
    //             //         $categories->status .
    //             //         "</a></td>";
    //             // }else{

    //             //     $nestedData['status'] = " <td <a  onclick='update_category(".$categories." , this.parentNode.querySelector(`a`));'>" .
    //             //         $categories->status .
    //             //         "</a></td>";
    //             // }

    //             $data[] = $nestedData;
    //         }
    //     }
    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),
    //         "recordsTotal"    => intval($totalData),
    //         "recordsFiltered" => intval($totalFiltered),
    //         "data"            => $data
    //     );
    //     echo  json_encode($json_data);
    // }

    public function updateOrCreate(Request $request)
    {
        $id = $request->id;
        $this->validate(
            $request,
            [
                'email' => [Rule::requiredIf(!$id) , 'email','unique:users,email,'.$id],
                'name' => 'required|string|max:64',
                // 'password' => 'required|min:6|max:20',
                'mobile'=>'required|numeric|digits:10',
                'extra_mobile'=>'nullable|numeric|digits:10',
                'location'=>'required',
                'country_id'=>'required'
            ]
        );

        $array = [
            'tb_name' => 'users',
            'sql' => [
                'type' => 'client',
                'id' => $request->id,
                'password' => '123'

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);

        return ['message' => $request->is_deleted ? __('deletedSuccess') : __('admin.success'), 'code' => 204];
    }


    public function getAllparent()
    {

        return   Category::where('parent_id', '!==', 0)->get();
    }
}
