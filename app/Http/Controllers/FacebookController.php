<?php

namespace App\Http\Controllers;

use App\Models\User;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    /**
     *
     * Where the use will redirect to FB page
     * to login
     * return datas
    */
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


    /**
     *
     * Callback where the FB response
     * create Access Token to Authorized
     * return dashboard
    */
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
                $user = $fbId;
                $user->createToken('access_token');
                return redirect()->route('dashboard',$user);
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
                $user->createToken('access_token');
                Auth::login($user);
                return redirect()->route('dashboard',$user);
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }
}
