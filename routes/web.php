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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard/{user}','AuthController@welcome')->name('dashboard');
    Route::any('/logout','AuthController@logout')->name('logout');
});

//Facebook
Route::get('auth/redirect','FacebookController@redirect');
Route::get('auth/facebook/callback','FacebookController@callback');

Route::view('/register','register')->name('registerHere');
Route::post('/register','AuthController@register')->name('sendEmail');

Route::post('/login','AuthController@login')->name('login');
Route::view('/success','success')->name('success');
Route::get('/registration-form/{user}/{token}','AuthController@checkToken');
Route::post('/registration-form/{user}','AuthController@registrationForm')->name('register');
Route::view('/success/sentEmail','successSentEmail')->name('successSent');
