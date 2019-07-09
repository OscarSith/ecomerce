@extends('layouts.master')

@section('title', 'Producto: ' . $product->prod_nombre)

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view">
								<img src="{{ $product->prod_imagen }}" alt="">
							</div>
							<div class="product-view">
								<img src="{{ asset('/img/main-product02.jpg') }}" alt="">
							</div>
							<div class="product-view">
								<img src="{{ asset('/img/main-product03.jpg') }}" alt="">
							</div>
						</div>
						<div id="product-view">
							<div class="product-view">
								<img src="{{ $product->prod_imagen }}" alt="">
							</div>
							<div class="product-view">
								<img src="{{ asset('img/thumb-product02.jpg') }}" alt="">
							</div>
							<div class="product-view">
								<img src="{{ asset('img/thumb-product03.jpg') }}" alt="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							@if ($product->prod_new)
							<div class="product-label">
								<span>Nuevo</span>
							</div>
							@endif
							<h2 class="product-name">{{ $product->prod_nombre }}</h2>
							<h3 class="product-price">
								@auth
								S/. {{ $product->prod_precio }}
								@endauth
							</h3>
							@auth
							<p><strong>Disponible:</strong> {{ $product->prod_stock }} In Stock</p>
							@endauth
							<p><strong>Marca:</strong> E-SHOP</p>
							<p>{{ $product->prod_detalle }}</p>
							{{--<div class="product-options">
								<ul class="size-option">
									<li><span class="text-uppercase">Size:</span></li>
									<li class="active"><a href="#">S</a></li>
									<li><a href="#">XL</a></li>
									<li><a href="#">SL</a></li>
								</ul>
							</div>--}}
							@auth
							<hr>
							<div class="product-btns">
								<form action="{{ route('agregarProducto', $product->id) }}" method="post">
									@csrf
									<div class="qty-input">
										<span class="text-uppercase">Cantidad: </span>
										<input class="input" type="number" name="cantidad" value="1">
									</div>
									<button class="primary-btn add-to-cart">
										<i class="fa fa-shopping-cart"></i> Agregar al carrito
									</button>
								</form>
							</div>
							@endauth
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									<p>{{ $product->prod_info }}</p>
								</div>
								<div id="tab2" class="tab-pane fade in">
									<p>Tab 2</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection