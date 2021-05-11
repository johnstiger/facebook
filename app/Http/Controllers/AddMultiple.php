<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminEmail;
use App\Notifications\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddMultiple extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function sendEmail()
    {
        return view('sendEmail');
    }

    public function sendMultipleEmail(Request $request)
    {
        $sender = Auth::user();
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return back()->with('error','Not Found!');
        }
        $user->notify(new SendEmail($request->message));
        $admin = User::where('email','johnstiger12@gmail.com')->first();
        $admin->notify(new AdminEmail($user,$request->message,$sender));
        return back()->with('success','SuccessFully send your email');
    }
}
