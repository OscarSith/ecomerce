<?php

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

Route::get('/login', 'Auth\LoginController@showLoginForm');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/', 'ProductController@listNewAdded');
Route::post('/agregar-producto/{id}/carrito', 'ProductController@agregarProductoCarrito')->name('agregarProducto');
Route::get('/listar-carrito', 'ProductController@listarCarrito')->name('listarCarrito');
Route::delete('/eliminar-producto/{id}/carrito', 'ProductController@eliminarItem')->name('eliminarItem');

Route::get('/detalle-venta', 'SaleController@venta')
	->name('venta')
	->middleware('auth');

Route::get('borrar', function () {
	session()->flush();
});
