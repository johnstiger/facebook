<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('base');

Route::get('auth/redirect','FacebookController@redirect');
Route::get('auth/facebook/callback','FacebookController@callback');

Route::view('/register','register')->name('registerHere');

Route::post('/register','AuthController@register')->name('sendEmail');

Route::get('/registration-form/{email}',function($email){
    return view('registration',compact('email'));
});

Route::post('/registration-form','AuthController@registrationForm')->name('register');
Route::post('/login','AuthController@login')->name('login');

Route::view('/success','success')->name('success');
Route::get('/NotVerified','AuthController@notVerified')->name('verification.notice');

Route::get('/dashboard/{user}',function(User $user){
    return view('welcome',compact('user'));
})->name('dashboard');
