@extends('layouts.admin')

@section('body')
	<div class="col-sm-8 col-sm-offset-2">
		<h1 class="text-center">Listado de Empresas</h1>
		<hr>
		<br>
		<table class="table table-striped">
			<thead>
			<tr>
				<th>Nombre</th>
				<th>RUC</th>
				<th>Correo</th>
			</tr>
			</thead>
			<tbody>
			@foreach($enterprices as $enterprice)
				<tr>
					<td>{{ $enterprice->nombre }}</td>
					<td>{{ $enterprice->ruc }}</td>
					<td>{{ $enterprice->correo }}</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
@endsection
