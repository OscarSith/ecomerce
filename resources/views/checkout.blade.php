@extends('layouts.master')

@section('title', 'Factura y detalle')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="billing-details">
						<div class="col-sm-4">
							De:
							<address>
								<strong>{{ $configuracion->razon }}</strong><br>
								Ruc: {{ $configuracion->ruc }} <br>
								{{ $configuracion->direccion }}<br>
								Phone: (804) 123-5432<br>
								Email: info@almasaeedstudio.com
							</address>
						</div>
						<div class="col-sm-4">
							Para:
							<address>
								<strong>{{ Auth::user()->nombre }}</strong><br>
								{{ Auth::user()->direccion }}<br>
								{{ Auth::user()->ruc }}<br>
								Phone: (804) 123-5432<br>
								Email: {{ Auth::user()->correo }}
							</address>
						</div>
					</div>
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped">
							<thead>
							<tr>
								<th>Qty</th>
								<th>Producto</th>
								<th>Codigo</th>
								<th>Descripcion</th>
								<th>Subtotal</th>
							</tr>
							</thead>
							<tbody>
								@foreach($products as $product)
								<tr>
									<td>{{ $product['cantidad'] }}</td>
									<td>{{ $product['prod_codigo'] }}</td>
									<td>{{ $product['prod_nombre'] }}</td>
									<td>{{ $product['prod_info'] }}</td>
									<td>S/. {{ number_format($product['prod_precio'] * $product['cantidad'], 2) }}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<hr>
					</div>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-xs-offset-6 col-xs-6">
								<p class="lead">Fecha de facturación {{ now()->toDateString() }}</p>

								<div class="table-responsive">
									<table class="table">
										<tbody>
										<tr>
											<th style="width:50%">Subtotal:</th>
											<td>S/. {{ number_format(floatval($precioTotal / 1.18), 2) }}</td>
										</tr>
										<tr>
											<th>IGV (18%)</th>
											<td>S/. {{ number_format(floatval($precioTotal) - (floatval($precioTotal) / 1.18), 2) }}</td>
										</tr>
										<tr>
											<th>Total:</th>
											<td>S/. {{ $precioTotal }}</td>
										</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="row no-print">
							<div class="col-xs-12 text-right">
								<a href="{{ route('listarCarrito') }}" class="btn btn-info" style="margin-right: 20px">
									<i class="fa fa-arrow-left"></i> Regresar
								</a>
								<form action="{{ route('generar-venta') }}" method="post" style="display: inline">
									@csrf
									<button class="btn btn-success pull-right">
										Generar Venta
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection