@extends('layouts.master')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Lista de productos</h2>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="box-tools">
						{{ $productList->links() }}
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>Imagen</th>
								<th>Código</th>
								<th>Descripción</th>
								<th>Precio</th>
								<th>Stock</th>
							</tr>
						</thead>
						<tbody>
						@foreach($productList as $product)
							<tr>
								<td>
									<img src="{{ $product->prod_imagen }}" alt="" style="width: 100px">
								</td>
								<td>
									<a href="{{ route('detalleProducto', $product->id) }}">Cod: {{ $product->prod_codigo }}</a><br>
									<strong>{{ $product->brand_name }}</strong>
								</td>
								<td>
									<p>{{ $product->prod_info }}</p>
								</td>
								<td>S/.{{ $product->prod_precio }}</td>
								<td>{{ $product->prod_stock }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="box-tools">
						{{ $productList->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection