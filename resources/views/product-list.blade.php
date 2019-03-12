@extends('layouts.master')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-3" id="aside">
					<div class="aside">
						<h3 class="aside-title">Por Marca</h3>
						<ul class="list-links">
							<li {{ $id_marca == 0 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_marca=0&stock={{ $stock }}">Todos</a>
							</li>
							@foreach($brands as $brand)
							<li {{ $brand->id == $id_marca ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_marca={{ $brand->id }}&stock={{ $stock }}">{{ $brand->brand_name }}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="aside">
						<h3 class="aside-title">Otros detalles</h3>
						<ul class="size-option">
							<li {{ $stock == 1 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_marca={{ $id_marca }}&stock=1">Con Stock</a>
							</li>
							<li {{ $stock == 0 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_marca={{ $id_marca }}&stock=0">Sin Stock</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9" id="main">
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
									<option value="0">Alfabeticamente</option>
									<option value="0">Precio</option>
								</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Mostrar:</span>
								<select class="input" name="show">
									<option value="10">10</option>
									<option value="30">30</option>
									<option value="50">50</option>
								</select>
							</div>
							{!! $productList->appends(['id_marca' => $id_marca, 'stock' => $stock])->links() !!}
						</div>
					</div>
					<div id="store">
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
											<a href="{{ route('detalleProducto', $product->id) }}">
												<img src="{{ $product->prod_imagen }}" alt="" style="width: 100px">
											</a>
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
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection