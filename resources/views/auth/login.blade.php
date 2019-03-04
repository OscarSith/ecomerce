@extends('layouts.master')

@section('body')

<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Autenticarse</h2>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <form method="post" action="{{ route('login') }}">
                	@csrf
                	<div class="form-group">
					    <label for="ruc">RUC</label>
					    <input type="tel" class="form-control" name="ruc" id="ruc" placeholder="RUC" value="{{ old('ruc', '') }}">
				  	</div>
				  	<div class="form-group">
					    <label for="password">Contraseña</label>
					    <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
				  	</div>
				  	<button type="submit" class="btn btn-default">Entrar</button>
                </form>
                @if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>

@endsection