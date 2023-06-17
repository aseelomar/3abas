<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Http\Controllers\CRUDcontroller;
use App\Models\ContactUS;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function index ()
    {

        return view('site.pages.contactUs.index');
    }

    public function postcontactUs(Request $request)
    {

        $this->validate(
            $request,
            [
                'address' => 'string|required',
                'email' => 'email|required',
                'phone' => 'string|required',
                'message' => 'required|required'
            ]
        );

   $row_id = ContactUS::where('email' ,$request->email)->where('is_delete',0)->where('row_id',0)->first();

                   $userContact=      ContactUS::create(
                            [
                                'address' => $request->address,
                                'email'=>$request->email,
                                'phone'=>$request->phone,
                                'message' =>$request->message,
                                 'row_id'=>$row_id->id ?? 0,

                            ]
                        );





//      $id =  CRUDcontroller::updateOrCreate($array, $request, null);



           return response()->json( [ 'message' => 'تم ارسالة الرسالة بنجاح', ], 200 );





    }

}
