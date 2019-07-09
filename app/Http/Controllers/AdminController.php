<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index() {
	    $enterprices = User::where('rol', '=', 'CLIENTE')->get(['id', 'ruc', 'nombre', 'correo']);
    	return view('admin.home', compact('enterprices'));
    }

    public function storeClient(Request $request) {
    	$params = $request->all();
    	$params['password'] = bcrypt($params['password']);

    	$user = new User($params);

	    $response = redirect()->back();

    	try {
		    $user->save();
		    $response->with('message', 'Cliente registrado');
	    } catch (QueryException $ex) {
			Log::error($ex->getMessage());
			$response->withErrors(['error_message' => 'Hubo un error inesperado, parece que el RUC es inválido o ya existe']);
	    }

    	return $response;
    }

    public function indexRegister() {
    	return view('admin.register');
    }

    public function reporteDeVentas() {
    	$now = now();
    	$sql = DB::table('sales as s')
		    ->selectRaw('id_user, u.nombre, count(s.id) as facturas, sum(total_venta) as total_venta')
		    ->join('users as u', 's.id_user', '=', 'u.id')
//		    ->whereYear('s.created_at', $now->year)
//		    ->whereMonth('s.created_at', $now->month)
		    ->groupBy(['id_user']);

    	return view('admin.reporte-ventas', ['reporte' => $sql->get()]);
    }

    public function listaFacturasPorUserId($id_user) {
    	$data = Sale::where('id_user', $id_user)->get();

    	return response()->json($data);
    }
}
