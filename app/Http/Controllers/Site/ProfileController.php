<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Product;
use App\Models\User;
use App\Models\ProductDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\CRUDcontroller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profilePage(){


        $user = Auth::user();
        $countNotSeen =Notification::where('user_to',Auth::id())->where('seen',0)->count();

        return view('site.pages.profile.profile')->with(compact('user' ,'countNotSeen'));
    }

    public function profilePagePost(Request $request)
    {
        $id = $request->id;

        $array = [
            'tb_name' => 'users',
            'sql' => [
                'id' => $request->id,


            ],
        ];
        if (!empty($_FILES) && isset($_FILES['image']) && $request->hasFile('image')) {

            $image = $request->file('image');

            $timeNow = Carbon::now('UTC');

            $time = $timeNow->minute . '' . $timeNow->second . '' . $timeNow->hour . '' . $timeNow->day . '' . $timeNow->month . '_' . $timeNow->year;

            $name = $time . ''  . '' . preg_replace('/\s+/', '',  $image->getClientOriginalName());


            $image->move('images/user',  $name);

            $request['user_image'] = $name;
        }
        // return session()->flash('success','تم التعديل بنجاح ');
        CRUDcontroller::updateOrCreate($array, $request->except('image'));
        return ['message' => __('admin.update_success'), 'code' => 200];

    }
    public function notification(){
        if(Auth::id()){
              $user = Auth::user();
                $notification = Notification::where('user_to',Auth::id())->with(['userForm'=>function($q){
                                         $q->select('id','name');
                                                         }])->orderBy('created_at', 'DESC')->get();

                foreach ($notification as $index => $item ){

        if($item->table == 'contact_us'){
            $notification[$index]= $item->load(['contactUs'=>function($q){
                $q->select('id','message');
            }]);

        }elseif($item->table == 'orders'){
            $notification[$index]= $item->load(['order'=>function($q){
                $q->select('id','note');
            }]);

        }
    }
//       return $notification;
            $countNotSeen =Notification::where('user_to',Auth::id())->where('seen',0)->count();
        return view('site.pages.profile.notification')->with(compact('notification','countNotSeen','user'));
        } else{
            return redirect()->route('login');
        }
  }
    public function editNotification(Request $request){
            $notification = Notification::findOrFail($request->id);
            $notification->seen =1;
            $notification->save();

        return ['message' => __('admin.update_success'), 'code' => 200];

    }


}
