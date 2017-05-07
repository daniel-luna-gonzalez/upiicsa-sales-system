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
    
    Route::match(['get', 'post'], 'marcas', "api\\v1\MarcasController@index");
    Route::match(['get', 'post'], 'marcas/nuevo', "api\\v1\MarcasController@create");
    Route::match(['get', 'post'], 'marcas/eliminar/', "api\\v1\MarcasController@eliminar");
    Route::match(['get', 'post'], 'marcas/actualizar', "api\\v1\MarcasController@actualizar");
    
    Route::match(['get', 'post'], 'pagos', "api\\v1\PagosController@index");
    Route::match(['get', 'post'], 'pagos/nuevo', "api\\v1\PagosController@create");
    Route::match(['get', 'post'], 'pagos/eliminar/', "api\\v1\PagosController@eliminar");
    Route::match(['get', 'post'], 'pagos/actualizar', "api\\v1\PagosController@actualizar");
    
    Route::match(['get', 'post'], 'cambios', "api\\v1\CambiosController@index");
    Route::match(['get', 'post'], 'cambios/nuevo', "api\\v1\CambiosController@create");
    Route::match(['get', 'post'], 'cambios/eliminar/', "api\\v1\CambiosController@eliminar");
    Route::match(['get', 'post'], 'cambios/actualizar', "api\\v1\CambiosController@actualizar");
    
    Route::match(['get', 'post'], 'catalogos', "api\\v1\CatalogosController@index");
    Route::match(['get', 'post'], 'catalogos/nuevo', "api\\v1\CatalogosController@create");
    Route::match(['get', 'post'], 'catalogos/eliminar/', "api\\v1\CatalogosController@eliminar");
    Route::match(['get', 'post'], 'catalogos/actualizar', "api\\v1\CatalogosController@actualizar");
    
});

