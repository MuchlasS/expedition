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

Route::group(['middleware' => 'auth'], function (){
    // AUTH
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
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
});
