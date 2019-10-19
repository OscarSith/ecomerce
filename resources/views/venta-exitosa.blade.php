@extends('layouts.master')

@section('title', 'Venta satisfactória')

@section('body')
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Venta generada exitosamente</h2>
				<br>
				<br>
				<p class="text-center">Aqui los detalles de la venta</p>
				<div class="col-sm-8 col-sm-offset-2">
					<table class="table table-bordered">
						<tr>
							<th>Factura</th>
							<td><b> #{{ $sale['nro_factura'] }}</b></td>
						</tr>
						<tr>
							<th>Order ID:</th>
							<td><b> {{ $sale['nro_orden'] }}</b></td>
						</tr>
						<tr>
							<th>Monto total a pagar:</th>
							<td><b> S/ {{ $precioTotal }}</b></td>
						</tr>
						<tr>
							<th>Fecha de creación de la Factura:</th>
							<td>{{ $sale->created_at->format('Y-m-d') }}</td>
						</tr>
						<tr>
							<th>Nro cuenta a abonar:</th>
							<td>192819182713332</td>
						</tr>
					</table>
					<br>
					<br>
				</div>
			</div>
		</div>
		<br>
		<hr>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<p class="text-center">ir a <a href="{{ route('home') }}" class="btn btn-primary">la página principal</a></p>
			</div>
		</div>
	</div>
</div>
@endsection