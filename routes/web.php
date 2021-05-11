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

Route::get('/login', function () {
    return view('login');
})->name('base');
Route::post('/login','AuthController@login')->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard/{user}','AuthController@welcome')->name('dashboard');
    Route::any('/logout','AuthController@logout')->name('logout');
    Route::get('/email','AddMultiple@sendEmail')->name('email');
    Route::post('/email','AddMultiple@sendMultipleEmail')->name('send');
});

//Facebook
Route::get('auth/redirect','FacebookController@redirect');
Route::get('auth/facebook/callback','FacebookController@callback');

Route::view('/register','register')->name('registerHere');
Route::post('/register','AuthController@register')->name('sendEmail');
Route::get('/registration-form/{user}/{token}','AuthController@checkToken');
Route::post('/registration-form/{user}','AuthController@registrationForm')->name('register');
Route::get('/forgotPassword','AuthController@forgotPassword')->name('forgotPassword');
Route::post('/send/email/resetPassword','AuthController@resetPassword')->name('sendToEmail');
Route::get('/resetingPassword/{user}/{hash}','AuthController@resetingPassword')->name('resetPassword');
Route::post('/reset/{user}','AuthController@resetSuccess')->name('reset');


