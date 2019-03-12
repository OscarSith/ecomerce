<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	function listNewAdded($onlyStock = true) {
		$flag = '>=';
		if ($onlyStock) {
			$flag = '>';
		}
    	$productList = $this->getListProducts($flag);

    	return view('welcome', compact('productList'));
    }

    public function getList(Request $request) {
		// id_marca => si en caso se pasa por parametro ese flag, se filtra por marca
	    $id_marca = $request->input('id_marca', 0);
	    $stock = $request->input('stock');
	    $flag = '>';

	    if (!$stock) {
	    	$flag = '>=';
	    }
	    $productList = $this->getListProducts($flag, $id_marca);
	    $brands = DB::table('brands')->get();

		return view('product-list', compact('productList', 'brands', 'id_marca', 'stock'));
    }

    public function listBrands() {
		$brands = DB::table('brands')->get();
		return view('list-brands', compact('brands'));
    }

    public function detalleProducto($id) {
		$product = Product::find($id);
		return view('product-detail', compact('product'));
    }

    function agregarProductoCarrito(Request $request, $id) {
    	$productSession = Product::find($id)->toArray();
    	$productSession['cantidad'] = $request->has('cantidad') ? (int)$request->input('cantidad') : 1;

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

    public function actualizarItem(Request $request, $id) {
		session()->put('products.prod' . $id . '.cantidad', $request->input('cantidad'));
	    return redirect()->back()->with(['success_message' => 'Producto Actualizado del carrito']);
    }

    private function getListProducts($flag, $id_brand = 0) {
		$product = Product::where('prod_new', true)->where('prod_stock', $flag, 0);

		if ($id_brand > 0) {
			$product = $product->where('id_marca', $id_brand);
		}

	    return $product->join('brands', 'products.id_marca', '=', 'brands.id')
			->paginate(20, ['products.id', 'prod_codigo', 'prod_nombre', 'prod_imagen', 'prod_info', 'prod_precio', 'prod_stock', 'products.created_at', 'brand_name']);
    }
}
