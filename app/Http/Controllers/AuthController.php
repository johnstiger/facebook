<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\EmailVerification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|email|unique:users'
        ]);
        try {
            if($validation->fails()){
                return back()->withErrors($validation);
            }else{
                $data = new User();
                $data->email = $request->email;
                $data->notify(new EmailVerification($data));
                $message = "Link Verification Successfully Sent!";
                return back()->with(['success'=>$message,'user'=>$data]);
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }


    public function registrationForm(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
        ]);
        try {
            if($validation->fails()){
                return back()->withErrors($validation);;
            }else{
                $details = $request->all();
                $details["password"] = Hash::make($request->password);
                $details["email_verified_at"] = now();
                User::create($details);
                return redirect()->route('success');
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }

    public function login(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        try {
            if($validation->fails()){
                return back()->withErrors($validation);
            }else{
                $user = User::where('email',$request->email)->first();

                if(!$user || !Hash::check($request->password, $user->password)){
                    return back()->with('error','Email or Password is incorrect!');
                }else{
                    if($user->email_verified_at == null){
                        return back()->with('error','Your Email is Not Verified Yet! Please Register');
                    }
                    return view('welcome',compact('user'));
                }
            }
        } catch (\Exception $error) {
            dd($error->getMessage());
        }
    }



}
