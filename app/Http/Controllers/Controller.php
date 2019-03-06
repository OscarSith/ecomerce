<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Controller constructor.
	 */
	public function __construct()
	{
		// Se usa la funcion middlaware para que se pueda acceder a la session desde el constructor
		$this->middleware(function ($request, $next) {
			session(['precioTotal' => $this->totalMontoCarrito()]);
			session(['cantidadTotal' => $this->totalCantidadProductos()]);
			return $next($request);
		});
	}

	public function totalMontoCarrito() {
    	$total = 0;
    	if (session()->has('products')) {
			foreach (session('products') as $product) {
				$total += ($product['prod_precio'] * $product['cantidad']);
			}
	    }

	    return number_format($total, 2);
    }

    public function totalCantidadProductos() {
		return session()->has('products') ? count(session('products')) : 0;
    }
}
