@extends('layouts.master')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="order-summary clearfix">
						@if (session()->has('success_message'))
							<div class="alert alert-success">
								{{ session('success_message') }}
							</div>
						@endif
						<div class="section-title">
							<h3 class="title">Order Review</h3>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Producto</th>
									<th></th>
									<th class="text-center">Precio</th>
									<th class="text-center">Cantidad</th>
									<th class="text-center">Total</th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody id="tabla-carrito">
								@foreach($listacarrito as $product)
									<tr>
										<td class="thumb"><img src="{{ $product['prod_imagen'] }}" alt=""></td>
										<td class="details">
											<a href="{{ route('detalleProducto', $product['id']) }}">{{ $product['prod_nombre'] }}</a>
											<ul>
												<li><span>Size: XL</span></li>
												<li><span>Color: Camelot</span></li>
											</ul>
										</td>
										<td class="price text-center"><strong>S/. {{ $product['prod_precio'] }}</strong></td>
										<td class="qty text-center">
											<input class="input cantidad-event" type="number" value="{{ $product['cantidad'] }}">
										</td>
										<td class="total text-center">
											<strong class="primary-color">S/. {{ $product['prod_precio'] * (isset($product['cantidad']) ? $product['cantidad'] : 1) }}</strong>
										</td>
										<td class="text-right">
											<form action="{{ route('actualizarItem', $product['id']) }}" method="post" style="display: inline;">
												@method('PUT')
												@csrf
												<input type="hidden" class="cantidad-value" name="cantidad" value="{{ $product['cantidad'] }}">
												<button class="main-btn icon-btn"><i class="fa fa-pencil"></i></button>
											</form>
											<form action="{{ route('eliminarItem', $product['id']) }}" style="display: inline;" method="post">
												@method('DELETE')
												@csrf
												<button class="main-btn icon-btn"><i class="fa fa-close"></i></button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th colspan="3" class="empty"></th>
									<th>Sub Total</th>
									<th class="sub-total" colspan="2">
										S/. {{ number_format(floatval(session('precioTotal') / 1.18), 2) }}
									</th>
								</tr>
								<tr>
									<th colspan="3" class="empty"></th>
									<th>IGV</th>
									<th colspan="2" class="sub-total">
										S/. {{ number_format(floatval(session('precioTotal')) - (floatval(session('precioTotal')) / 1.18), 2) }}
									</th>
								</tr>
								<tr>
									<th colspan="3" class="empty"></th>
									<th>Total a pagar</th>
									<th class="total" colspan="2">
										S/. {{ session('precioTotal') }}
									</th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<a href="{{ route('venta') }}" class="primary-btn">Generar Venta</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection