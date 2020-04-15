<?php

use App\Http\Resources\User as UserResource;
use App\User;
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
    return view('welcome');
});

Route::get('/user', function () {
    return new UserResource(User::find(31));
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/email/verify', 'UserController@VerifyEmail');

Route::get('/reset/password', 'ResetPassword@password');
Route::post('/new/password', 'ResetPassword@newpassword');
//Route::post('login', 'Auth\LoginController@login');
