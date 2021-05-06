<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $fbId = User::where('facebook_id',$user->id)->first();

            if($fbId){
                Auth::login($user);
                return view('welcome',compact('user'));
            }else{
                $user = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                ]);

                Auth::login($user);
                return view('welcome',compact('user'));
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }
}
