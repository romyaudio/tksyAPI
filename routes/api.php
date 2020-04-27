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
Route::middleware('auth:sanctum')->post('/create/item', 'ItemController@store')->name('create-item');
Route::middleware('auth:sanctum')->post('/create/category', 'CategoryController@store')->name('create-category');
Route::middleware('auth:sanctum')->get('/fetch/categories', 'CategoryController@index')->name('list-categories');
Route::middleware('auth:sanctum')->get('/fetch/items', 'ItemController@index')->name('list-items');
Route::middleware('auth:sanctum')->get('/edit/item', 'ItemController@edit')->name('edit-item');
Route::middleware('auth:sanctum')->post('/delete/item', 'ItemController@destroy')->name('destroy-item');
Route::middleware('auth:sanctum')->post('/update/item', 'ItemController@update')->name('update-item');
Route::middleware('auth:sanctum')->post('/update/category', 'CategoryController@update')->name('update-category');
Route::middleware('auth:sanctum')->get('/edit/category', 'CategoryController@edit')->name('edit-category');
Route::middleware('auth:sanctum')->post('/delete/category', 'CategoryController@destroy')->name('destroy-category');

Route::post('/create', 'UserController@create')->name('create-user');
Route::post('/login', 'Login@login')->name('login');
Route::get('/states', 'Login@getstates')->name('Get-states');
Route::post('/reset/password', 'ResetPassword@reset')->name('reset-password');
Route::post('/create/business', 'Login@createbusiness')->name('create-business');
