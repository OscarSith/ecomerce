<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!session()->has('categorias')) {
			session()->flash('categorias', $this->categorias());
		}
	}

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
		$id_categoria = $request->input('id_categoria', 0);
		$stock = $request->input('stock');
		$sort = $request->input('sort', '1');
		$flag = '>';

	    if (!$stock) {
	    	$flag = '>=';
	    }
	    $productList = $this->getListProducts($flag, $id_marca, $id_categoria, $sort);
	    $brands = DB::table('brands')->get();

		return view('product-list', compact('productList', 'brands', 'id_marca', 'stock', 'id_categoria', 'sort'));
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
	    $precioTotal = $this->totalMontoCarrito();

	    return view('carrito', compact('listacarrito', 'precioTotal'));
    }

    public function eliminarItem($id) {
		session()->forget('products.prod' . $id);
		return redirect()->back()->with(['success_message' => 'Producto eliminado del carrito']);
    }

    public function actualizarItem(Request $request, $id) {
		session()->put('products.prod' . $id . '.cantidad', $request->input('cantidad'));
	    return redirect()->back()->with(['success_message' => 'Producto Actualizado del carrito']);
    }

    private function getListProducts($flag, $id_brand = 0, $id_categoria = 0, $sort = '1') {
		$product = Product::where('prod_new', true)->where('prod_stock', $flag, 0);

		if ($id_brand > 0) {
			$product = $product->where('id_marca', $id_brand);
		}

		if ($id_categoria > 0) {
			$product = $product->where('id_categoria', $id_categoria);
		}

		$product = $product->join('brands', 'products.id_marca', '=', 'brands.id');

		if ($sort == '1') {
			$product->orderBy('prod_nombre', 'ASC');
		} else {
			$product->orderBy('prod_precio', 'ASC');
		}

		//dd($product->toSql());

	    return $product->paginate(20, [
	    	'products.id',
		    'prod_codigo',
		    'prod_nombre',
		    'prod_imagen',
		    'prod_info',
		    'prod_precio',
		    'prod_stock',
		    'products.created_at',
		    'brand_name'
	    ]);
    }
}
