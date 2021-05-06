<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->fields([
            'first_name',
            'last_name',
            'birthday',
            'gender',
            'age'
        ])->scopes(['user_birthday','email','user_gender'])->redirect();
    }

    public function callback()
    {
        try {
            $user = Socialite::driver('facebook')->fields([
                'first_name',
                'last_name',
                'birthday',
                'gender',
                'email'
            ])->user();
            $fbId = User::where('facebook_id',$user->id)->first();

            $date = DateTime::createFromFormat('m/d/Y',$user['birthday'])->format('Y-m-d');
            $age = Carbon::parse($date)->diff(Carbon::now())->format('%y');

            if($fbId){
                Auth::login($user);
                return view('welcome',compact('user'));
            }else{

                $user = User::create([
                    'name' => $user['first_name']." ".$user['last_name'],
                    'email' => $user['email'],
                    'birthday' => $date,
                    'gender' => $user['gender'],
                    'email_verified_at' => now(),
                    'age' => $age,
                    'facebook_id' => $user['id'],
                ]);

                Auth::login($user);
                return view('welcome',compact('user'));
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }
}
