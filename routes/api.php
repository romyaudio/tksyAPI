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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:airlock')->get('/logout', function (Request $request) {
    $request->user()->tokens()->delete();
    return response('Logout', 200);
});

Route::middleware('auth:sanctum')->post('/create/team', 'TeamController@store')->name('create-team');
Route::middleware('auth:sanctum')->get('/list/teams', 'TeamController@index')->name('list-teams');
Route::middleware('auth:sanctum')->get('/edit/team', 'TeamController@edit')->name('edit-teams');
Route::middleware('auth:sanctum')->post('/update/team', 'TeamController@update')->name('update-team');
Route::middleware('auth:sanctum')->post('/delete/team', 'TeamController@destroy')->name('destroy-team');

Route::post('/create', 'UserController@create')->name('create-user');
Route::post('/login', 'Login@login')->name('login');
Route::get('/states', 'Login@getstates')->name('Get-states');
Route::post('/reset/password', 'ResetPassword@reset')->name('reset-password');
Route::post('/create/business', 'Login@createbusiness')->name('create-business');
