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

Route::get('/login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@loginPost');
Route::get('/register', 'App\Http\Controllers\AuthController@register');
Route::post('/register', 'App\Http\Controllers\AuthController@registerPost');

Route::group(['middleware' => 'auth'], function(){
    // ROLES
    Route::get('/roles', 'App\Http\Controllers\RoleController@index');
    Route::post('/roles', 'App\Http\Controllers\RoleController@create');
    Route::get('/roles/{id}/edit', 'App\Http\Controllers\RoleController@edit');
    Route::post('/roles/{id}/edit', 'App\Http\Controllers\RoleController@update');
    Route::get('/roles/{id}/delete', 'App\Http\Controllers\RoleController@delete');

    // AUTH
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
});