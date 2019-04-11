@extends('layouts.admin')

@section('body')
	<div class="col-md-10 col-md-offset-1">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (session()->has('message'))
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		@endif
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Nro. Facturas</th>
					<th>Monto Total</th>
				</tr>
			</thead>
			<tbody>
				@if (count($reporte))
					@foreach($reporte as $fila)
						<tr>
							<td>{{ $fila->nombre }}</td>
							<td>{{ $fila->facturas }}</td>
							<td>{{ $fila->total_venta }}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3">
							<p class="text-center">No hay registros que mostrar</p>
						</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection
