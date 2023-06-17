<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;


use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class SocialController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('google')->stateless()->redirect();

//        return Socialite::driver('google')->stateless()->redirect();
    }

    public function callbackGoogle()
    {
        $user = Socialite::driver('google')->stateless()->user();
      $user = User::where('email', $user->email)->where('provider','google')->first();

        $this->_registerorLoginUser($user);
        return redirect()->route('home');

//     $google_user = Socialite::driver('google')->stateless()->user();
//
//      $user = User::where('email', $google_user->email)->where('provider','google')->first();
//
//        if ($user) {
//            return "aseel";
//            Auth::loginUsingId($user->id);
//            return redirect(url('home'));
//         } else {
//            return redirect(url('login'));
//            // return ('Email is not registered');
//         }
//



        // Auth::login($user);

        // if (User::where('email', '=', $google_user->email)->count() > 0) {
        //     return ('Email Exists');
        //  } else {
        //     return ('Email is not registered');
        //  }


        // if (Auth::login($user)) {
        //     return ('lkjh');
        // } else {
        //     return redirect('/');
        // }


        // Auth::login($user);
        // $this->setPage();
        // return $this->setView('socialite')->with(compact('user'));

    }
}
