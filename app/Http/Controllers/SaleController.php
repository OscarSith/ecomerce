<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function detalleVenta(Request $request) {
		$products = $request->session()->get('products');
		$precioTotal = $this->totalMontoCarrito();
		$configuracion = DB::table('configuracion')->first();

		return view('checkout', compact('products', 'precioTotal', 'configuracion'));
	}

	public function venta(Request $request) {
		$configuracion = DB::table('configuracion')->first();
		$products = $request->session()->get('products');
		$precioTotal = $this->totalMontoCarrito();

		$sale = new Sale([
			'id_user' => Auth::user()->id,
			'nro_orden' => 'OD'.str_pad($configuracion->nro_orden, 6, '0', STR_PAD_LEFT),
			'nro_factura' => 'FA'.str_pad($configuracion->nro_factura, 6, '0', STR_PAD_LEFT),
			'total_venta' => $precioTotal
		]);
		$sale->save();

		foreach ($products as $product) {
			$item = [
				'id_producto' => $product['id'],
				'id_venta' => $sale->id,
				'total' => $product['prod_precio'] * $product['cantidad'],
				'cantidad' => $product['cantidad']
			];
			DB::table('productsDetails')->insert($item);
			DB::table('products')
				->where('id', $product['id'])
				->decrement('prod_stock', $product['cantidad']);
		}

		$request->session()->forget(['products', 'precioTotal', 'cantidadTotal']);
		DB::table('configuracion')->increment('nro_orden', 1);
		DB::table('configuracion')->increment('nro_factura', 1);

		return redirect()->route('venta_exitosa', $sale->id);
	}

	function ventaExitosa($id) {
		$sale = Sale::find($id);
		$productDetails = DB::table('productsDetails')->where('id_venta', $sale->id)->get();
		$precioTotal = 0.0;

		foreach ($productDetails as $product) {
			$precioTotal += $product->total;
		}

		$precioTotal = number_format($precioTotal, 2);

		return view('venta-exitosa', compact('precioTotal', 'sale'));
	}
}
