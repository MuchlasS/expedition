<?php

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

Route::get('/coba', 'App\Http\Controllers\DeliveryFleetController@coba');
Route::get('/coba/{id}', 'App\Http\Controllers\DeliveryFleetController@cobaById');

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@loginPost');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/register', 'App\Http\Controllers\AuthController@registerPost');

Route::group(['middleware' => 'auth'], function (){
    // AUTH
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::get('/change-password/{id}', 'App\Http\Controllers\AuthController@changePassword');
    Route::post('/change-password/{id}', 'App\Http\Controllers\AuthController@changePasswordPost');
    // USERS
    Route::get('/user', 'App\Http\Controllers\AuthController@index');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\AuthController@edit');
    Route::post('/user/{id}/edit', 'App\Http\Controllers\AuthController@update');
    Route::get('/user/{id}/delete', 'App\Http\Controllers\AuthController@delete');
    // ROLES
    Route::get('/roles', 'App\Http\Controllers\RoleController@index');
    Route::post('/roles', 'App\Http\Controllers\RoleController@create');
    Route::get('/roles/{id}/edit', 'App\Http\Controllers\RoleController@edit');
    Route::post('/roles/{id}/edit', 'App\Http\Controllers\RoleController@update');
    Route::get('/roles/{id}/delete', 'App\Http\Controllers\RoleController@delete');
    // DELIVERY TYPES
    Route::get('/delivery-type', 'App\Http\Controllers\DeliveryTypeController@index');
    Route::post('/delivery-type', 'App\Http\Controllers\DeliveryTypeController@create');
    Route::get('/delivery-type/{id}/edit', 'App\Http\Controllers\DeliveryTypeController@edit');
    Route::post('/delivery-type/{id}/edit', 'App\Http\Controllers\DeliveryTypeController@update');
    Route::get('/delivery-type/{id}/delete', 'App\Http\Controllers\DeliveryTypeController@delete');
    // DELIVERY TYPES
    Route::get('/delivery-fleet', 'App\Http\Controllers\DeliveryFleetController@index');
    Route::post('/delivery-fleet', 'App\Http\Controllers\DeliveryFleetController@create');
    Route::get('/delivery-fleet/{id}/edit', 'App\Http\Controllers\DeliveryFleetController@edit');
    Route::post('/delivery-fleet/{id}/edit', 'App\Http\Controllers\DeliveryFleetController@update');
    Route::get('/delivery-fleet/{id}/delete', 'App\Http\Controllers\DeliveryFleetController@delete');
});
