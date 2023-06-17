<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CRUDcontroller;
use Session;
use Illuminate\Http\Request;
use Exception;


class GoogleAuthController extends Controller
{


    public function redirect (){
        //  return Socialite::driver('google')->redirectUrl(route('google-auth//-callback'))->stateless()->redirect();

        return Socialite::driver('google') ->setScopes(['openid', 'email'])
                        ->redirect();
    }

    public function callbackGoogle(){

        $google_user = Socialite::driver('google')->redirectUrl(route('google-auth-callback'))->stateless()->user();
        $user = User::where('email', $google_user->email)->first();

        $name = explode("@",$google_user->email);
        $userAuth = User::updateOrCreate([
                                             'google_id' => $google_user->id,
                                             'email' => $google_user->email,

                                         ], [

                                             'name' =>$user->name ?? $name[0]   ,
                                             'type'=>$user->type ??'client',
                                             'google_token' => $google_user->token,
                                             'google_refresh_token' => $google_user->refreshToken,
                                             'provider'=>'google',
                                         ]);
//}



        Auth::login($userAuth);

        return redirect()->route('site.index')->with(compact('userAuth'));

    }


    public function redirectToFacebook() {

        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback() {

        $facebook_user = Socialite::driver('facebook')->redirectUrl(route('auth.facebookCallback'))->stateless()->user();



        $user = User::where('email', $facebook_user->email)->first();

        $name = explode("@",$facebook_user->email);

        $userAuth = User::updateOrCreate(
            [
                'facebook_id' => $facebook_user->id,
                'email' => $facebook_user->email,

            ], [
                'name' => $facebook_user->name ?? $name ,
                'type'=>$user->type ??'client',
                'google_token' => $facebook_user->token,
                'google_refresh_token' => $facebook_user->refreshToken,
                'provider'=>'facebook',
            ]);
//}



        Auth::login($userAuth);

        return redirect()->route('site.index')->with(compact('userAuth'));

    }

    public function addPassword(Request $request)
    {

        $array = [
            'tb_name' => 'users',
            'sql' => [
                'id' => $request->id

            ],
        ];
        CRUDcontroller::updateOrCreate($array, $request);
        return ['message' =>$request->is_deleted? __('deletedSuccess'):__('Success'), 'code' => 204];
    }

}
