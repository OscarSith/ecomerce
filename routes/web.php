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
Route::get('/cerrar-sesion', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'ProductController@listNewAdded')->name('home');
Route::get('/listado-productos', 'ProductController@getList')->name('productList');
Route::get('/productos-por-marca', 'ProductController@listBrands')->name('listBrands');
Route::get('/producto/{id}/detalle', 'ProductController@detalleProducto')->name('detalleProducto');
Route::post('/agregar-producto/{id}/carrito', 'ProductController@agregarProductoCarrito')->name('agregarProducto');
Route::get('/listar-carrito', 'ProductController@listarCarrito')->name('listarCarrito');
Route::delete('/eliminar-producto/{id}/carrito', 'ProductController@eliminarItem')->name('eliminarItem');
Route::put('/actualizar-producto/{id}/carrito', 'ProductController@actualizarItem')->name('actualizarItem');
Route::get('/venta-exitosa-{id}', 'SaleController@ventaExitosa')->name('venta_exitosa');

Route::get('detalle-venta', 'SaleController@detalleVenta')->name('detalleVenta');
Route::post('generar-venta', 'SaleController@venta')
	->name('generar-venta')
	->middleware(['auth', 'web']);

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function ($route) {
	$route->get('', 'AdminController@index')->name('adminHome');
	$route->get('register', 'AdminController@indexRegister')->name('register');
	$route->post('register', 'AdminController@storeClient')->name('storeClient');
	$route->get('reporte-ventas', 'AdminController@reporteDeVentas')->name('reporteDeVentas');

	$route->get('{id_user}/facturas', 'AdminController@listaFacturasPorUserId')->name('listaFacturas');
});