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

Route::get('/roles', 'App\Http\Controllers\RoleController@index');
Route::post('/roles', 'App\Http\Controllers\RoleController@create');
Route::get('/roles/{id}/edit', 'App\Http\Controllers\RoleController@edit');
Route::post('/roles/{id}/edit', 'App\Http\Controllers\RoleController@update');
Route::get('/roles/{id}/delete', 'App\Http\Controllers\RoleController@delete');
