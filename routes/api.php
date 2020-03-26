<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:airlock')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:airlock')->get('/logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response('Logout', 200);
});

Route::post('/create', 'UserController@create');
Route::post('/login', 'Login@getToken');
Route::get('/states', 'Login@getstates');
Route::post('/reset/password', 'ResetPassword@reset');
Route::post('/create/business', 'Login@createbusiness');
