@extends('layouts.master')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="billing-details">
						<div class="col-sm-4">
							De:
							<address>
								<strong>Admin, Inc.</strong><br>
								795 Folsom Ave, Suite 600<br>
								San Francisco, CA 94107<br>
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
						<div class="col-sm-4">
							<b>Invoice #{{ $config['nro_factura'] }}</b><br>
							<br>
							<b>Order ID:</b> {{ $config['nro_orden'] }}<br>
							<b>Payment Due:</b> {{ \Carbon\Carbon::now()->toDateString() }}<br>
							<b>Account:</b> 968-34567
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
					<div class="row">
						<div class="col-xs-offset-6 col-xs-6">
							<p class="lead">Amount Due 2/22/2014</p>

							<div class="table-responsive">
								<table class="table">
									<tbody><tr>
										<th style="width:50%">Subtotal:</th>
										<td>$250.30</td>
									</tr>
									<tr>
										<th>Tax (9.3%)</th>
										<td>$10.34</td>
									</tr>
									<tr>
										<th>Shipping:</th>
										<td>$5.80</td>
									</tr>
									<tr>
										<th>Total:</th>
										<td>$265.24</td>
									</tr>
									</tbody></table>
							</div>
						</div>
						<div class="row no-print">
							<div class="col-xs-12">
								<a href="invoice-print.html" target="_blank" class="btn btn-default pull-right"><i class="fa fa-print"></i> Print</a>
								<button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection