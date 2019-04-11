@extends('layouts.admin')

@section('body')
	<div class="col-sm-6 col-sm-offset-3">
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
		<form action="{{ route('storeClient') }}" method="post">
			@csrf
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4">
						<label for="ruc">RUC</label>
						<input type="tel" class="form-control" name="ruc" id="ruc" maxlength="11" placeholder="RUC">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="company">Nombre de la Empresa</label>
				<input type="text" class="form-control" name="nombre" id="company">
			</div>
			<div class="form-group">
				<label for="address">Dirección</label>
				<input type="text" class="form-control" name="direccion" id="address">
			</div>
			<div class="form-group">
				<label for="email">Correo</label>
				<input type="email" class="form-control" name="correo" id="email">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			<div class="form-group">
				<label class="radio-inline">
					<input type="radio" name="rol" id="rolAdmin" value="ADMIN"> ADMIN
				</label>
				<label class="checkbox-inline">
					<input type="radio" name="rol" id="rolCliente" value="CLIENTE" checked> CLIENTE
				</label>
			</div>
			<button class="btn btn-primary">Crear</button>
		</form>
	</div>
@endsection
