<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	function listNewAdded() {
    	$productList = Product::where('prod_new', true)
		    ->get(['id', 'prod_codigo', 'prod_nombre', 'prod_imagen', 'prod_info', 'prod_precio', 'created_at'])
		    ->take(20);

    	return view('welcome', compact('productList'));
    }

    function agregarProductoCarrito(Request $request, $id) {
    	$productSession = Product::find($id)->toArray();
    	$productSession['cantidad'] = 1;

		$request->session()->put('products.prod'.$id, $productSession);
		return redirect()->back();
    }

    function listarCarrito() {
	    $listacarrito = [];

    	if (session()->has('products')) {
		    $listacarrito = session()->get('products');
	    }
	    return view('carrito', compact('listacarrito'));
    }

    public function eliminarItem($id) {
		session()->forget('products.prod' . $id);
		return redirect()->back()->with(['success_message' => 'Producto eliminado del carrito']);
    }
}
