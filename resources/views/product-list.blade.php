@extends('layouts.master')

@section('title', 'Listado de productos')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-sm-3" id="aside">
					<div class="aside">
						<h3 class="aside-title">Por Categoria</h3>
						<ul class="list-links">
							<li {{ $id_categoria == 0 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_categoria=0&id_marca=0&stock={{ $stock }}&sort={{$sort}}">Todos</a>
							</li>
							@foreach(session('categorias') as $categoria)
								<li {{ $categoria->id == $id_categoria ? "class=active" : '' }}>
									<a href="{{ route('productList') }}?id_categoria={{ $categoria->id }}&id_marca={{ $id_marca }}&stock={{ $stock }}&sort={{$sort}}">{{ $categoria->cat_nombre }}</a>
								</li>
							@endforeach
						</ul>
					</div>
					<div class="aside">
						<h3 class="aside-title">Por Marca</h3>
						<ul class="list-links">
							<li {{ $id_marca == 0 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_categoria={{ $id_categoria }}&id_marca=0&stock={{ $stock }}&sort={{$sort}}">Todos</a>
							</li>
							@foreach($brands as $brand)
							<li {{ $brand->id == $id_marca ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_categoria={{ $id_categoria }}&id_marca={{ $brand->id }}&stock={{ $stock }}&sort={{$sort}}">{{ $brand->brand_name }}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="aside">
						<h3 class="aside-title">Otros detalles</h3>
						<ul class="size-option">
							<li {{ $stock == 1 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_categoria={{ $id_categoria }}&id_marca={{ $id_marca }}&stock=1&sort={{$sort}}">Con Stock</a>
							</li>
							<li {{ $stock == 0 ? "class=active" : '' }}>
								<a href="{{ route('productList') }}?id_categoria={{ $id_categoria }}&id_marca={{ $id_marca }}&stock=0&sort={{$sort}}">Sin Stock</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-9" id="main">
					<div class="store-filter clearfix">
						<div class="pull-left">
							@auth
							<div class="sort-filter">
								<form action="{{route('productList')}}?id_categoria={{ $id_categoria }}&id_marca={{ $id_marca }}&stock={{$stock}}">
									<input type="hidden" name="id_marca" value="{{$id_marca}}">
									<input type="hidden" name="id_categoria" value="{{$id_categoria}}">
									<input type="hidden" name="id_stock" value="{{$stock}}">
									<span class="text-uppercase">Sort By:</span>
									<select class="input" name="sort">
										<option value="1" {{ $sort == '1' ? 'selected' : '' }}>Alfabeticamente</option>
										<option value="2" {{ $sort == '2' ? 'selected' : '' }}>Precio</option>
									</select>
									<button class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></button>
								</form>
							</div>
							@endauth
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
							{!! $productList->appends(['id_marca' => $id_marca, 'stock' => $stock, 'id_categoria' => $id_categoria, 'sort' => $sort])->links() !!}
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
												<img src="{{ asset('img/products/' . $product->prod_imagen) }}" alt="" class="img-responsive" style="width: 100px">
											</a>
										</td>
										<td>
											<a href="{{ route('detalleProducto', $product->id) }}">
												<p>{{ $product->prod_nombre }}</p>
												Cod: {{ $product->prod_codigo }}<br>
											</a>
											<strong>{{ $product->brand_name }}</strong>
										</td>
										<td>
											<p>{{ $product->prod_info }}</p>
										</td>
										<td>
											@auth
											S/.{{ $product->prod_precio }}
											@endauth
										</td>
										<td>
											@auth
											{{ $product->prod_stock }}
											@endauth
										</td>
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