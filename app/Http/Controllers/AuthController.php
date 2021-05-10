<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Notifications\EmailVerification;
use App\Notifications\ResetPassword;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Sending Email to verify the request
     * return sending verification link to email
     * account
    */
    public function register(UserRequest $request)
    {
        try {
            $data = User::create($request->all());
            $token = $data->createToken('access_token');
            $data->notify(new EmailVerification($data, $token->plainTextToken));
            return redirect()->route('successSent');
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    /**
     *
     * Check if the user has a access Token
     * To access the Route
     *
    */
    public function checkToken(User $user, $token)
    {
        if($user->tokens->isEmpty()){
            return view('notVerified');
        }
        return view('registration',compact('user'));

    }

    /**
     *
     * Register after clicking button from email
     * return saving data in database
    */
    public function registrationForm(UserRequest $request, User $user)
    {
        try {
            $details = $request->all();
            $details["password"] = Hash::make($request->password);
            $details["email_verified_at"] = now();
            $user->update($details);
            return redirect()->route('success');
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    /**
     *
     * Login logic | Adding Access Token to
     * to Authorized
     * return dashboard
    */
    public function login(UserRequest $request)
    {
        try {
            $user = User::where('email',$request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)){
                return back()->with('error','Email or Password is incorrect!');
            }else{
                $user->createToken('access_token');
                Auth::login($user);
                return redirect()->route('dashboard',$user);
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    /**
     *
     * Logout logic | removing Access Token
     * to be not Authorized
     * return login page
    */
    public function logout()
    {
        if(Auth::user()->tokens->isNotEmpty()){
            Auth::user()->tokens()->delete();
        }
        return redirect()->route('base');
    }

     /**
     *
     * Welcome check if the user has
     * Access Token to Authorized
     * return Dashboard
    */
    public function welcome(User $user){
        if($user->tokens->isEmpty()){
            return view('unAuthorized');
        }
        return view('welcome',compact('user'));
    }

      /**
     *
     * Forgot Password
     * Via Email
     * return view
    */
    public function forgotPassword(){
        return view('forgotPassword');
    }

    /**
     *
     * Forgot Password
     * Via Email
     * return view
    */
    public function resetPassword(UserRequest $request){
        try {
            $user = User::where('email',$request->email)->first();
            if(!$user){
                return back()->with('error','Your email is not found!');
            }else{
                $token = $user->createToken('access_token');
                $user->notify(new ResetPassword($user,$token->plainTextToken));
                return redirect()->route('successSent');
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    public function resetingPassword(User $user, $token)
    {
        $test = Carbon::parse($user->tokens()->latest()->first()->created_at);
        $time = $test->diff(now())->format('%i');
        if($time > "2"){
            return view('PageExpired');
        }
        if($user->tokens->isEmpty()){
            return view('unAuthorized');
        }
        return view('resetPassword',compact('user'));
    }

    public function resetSuccess(UserRequest $request, User $user)
    {
        try {
            $user->update(['password' => Hash::make($request->password)]);
            return redirect()->route('success');
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }
}
