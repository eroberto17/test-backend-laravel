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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('usuarios', 'UserController');
Route::resource('cobros', 'CollectionController');

Route::get('/usuarios/desinscribir/{id}', 'UserController@desinscribir');
Route::get('/cobros/notificacion/{id}', 'CollectionController@notificacion');