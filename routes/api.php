<?php

use Illuminate\Http\Request;

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


Route::group(['prefix' => 'v1'], function () {
    Route::match(['get', 'post'], 'clientes', "api\\v1\ClientesController@index");
    Route::match(['get', 'post'], 'clientes/nuevo', "api\\v1\ClientesController@create");
    Route::match(['get', 'post'], 'clientes/eliminar/', "api\\v1\ClientesController@eliminar");
    Route::match(['get', 'post'], 'clientes/actualizar', "api\\v1\ClientesController@actualizar");
    
    Route::match(['get', 'post'], 'ventas', "api\\v1\VentasController@index");
    Route::match(['get', 'post'], 'ventas/nuevo', "api\\v1\VentasController@create");
    Route::match(['get', 'post'], 'ventas/eliminar/', "api\\v1\VentasController@eliminar");
    Route::match(['get', 'post'], 'ventas/actualizar', "api\\v1\VentasController@actualizar");
    
});

