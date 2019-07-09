@extends('layouts.master')

@section('title', 'Venta satisfactória')

@section('body')
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="text-center">Venta generada exitosamente</h2>
				<p class="text-center">Aqui los detalles de la venta</p>
				<div class="col-sm-4 col-sm-offset-4">
					<b>Factura #{{ $sale['nro_factura'] }}</b><br>
					<br>
					<b>Order ID:</b> {{ $sale['nro_orden'] }}<br>
					<b>Monto total a pagar:</b> S/ {{ $precioTotal }}<br>
					<b>Fecha de creación de la Factura:</b> {{ $sale->created_at->format('Y-m-d') }}<br>
					<b>Nro cuenta a abonar:</b> 192819182713
				</div>
			</div>
		</div>
		<br>
		<hr>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<p class="text-center">ir a <a href="{{ route('home') }}">la página principal</a></p>
			</div>
		</div>
	</div>
</div>
@endsection