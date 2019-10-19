<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>E-Comerce - @yield('title', 'Inicio')</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
<header>
	<div id="header">
		<div class="container">
			<div class="pull-left">
				<!-- Logo -->
				<div class="header-logo">
					<a class="logo" href="/">
						<img src="{{asset('img/logo.jpeg')}}" alt="Logo" class="img-responsive">
					</a>
				</div>
				<!-- /Logo -->
				<div class="header-search hide">
					<form method="get">
						<input class="input" type="text" placeholder="Buscar" name="search">
						<button class="search-btn"><i class="fa fa-search"></i></button>
					</form>
				</div>
			</div>
			<div class="pull-right">
				<ul class="header-btns">
					<!-- Account -->
					<li class="header-account dropdown default-dropdown">
						<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
							<div class="header-btns-icon">
								<i class="fa fa-user-o"></i>
							</div>
							<strong class="text-uppercase">
								@guest
								Cuenta
								@endguest
								@auth
								{{ Auth::user()->nombre }} <i class="fa fa-caret-down"></i>
								@endauth
							</strong>
						</div>
						@guest
						<a href="{{ route('login') }}" class="text-uppercase">Login</a>
						@endguest
						@auth
						<ul class="custom-menu">
							@if (Auth::user()->rol == 'ADMIN')
							<li>
								<a href="{{ route('adminHome') }}"><i class="fa fa-user-o"></i> Administrar</a>
							</li>
							@endif
							<li><a href="{{ route('logout') }}"><i class="fa fa-check"></i> Cerrar Sesión</a></li>
						</ul>
						@endauth
					</li>
					<!-- /Account -->

					<!-- Cart -->
					<li class="header-cart dropdown default-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
							<div class="header-btns-icon">
								<i class="fa fa-shopping-cart"></i>
								<span class="qty">{{ session('cantidadTotal') }}</span>
							</div>
							<strong class="text-uppercase">My Cart:</strong>
							<br>
							<span>{{ session('precioTotal') }}</span>
						</a>
						<div class="custom-menu">
							<div id="shopping-cart">
							@if (session()->has('products'))
								<div class="shopping-cart-list">
									@foreach(session('products') as $product)
									<div class="product product-widget">
										<div class="product-thumb">
											<img src="{{ $product['prod_imagen'] }}" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-price">
												{{ $product['prod_precio'] }}
												<span class="qty">x{{ $product['cantidad'] }}</span>
											</h3>
											<h2 class="product-name">
												<a href="#">{{ $product['prod_nombre'] }}</a>
											</h2>
										</div>
									</div>
									@endforeach
							</div>
								<div class="shopping-cart-btns">
									<a href="{{route('listarCarrito')}}" class="main-btn">View Cart</a>
									<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
								</div>
							@else
								<p class="text-center" style="margin-bottom: 0">
									<strong>No hay ningún producto</strong>
								</p>
							@endif
							</div>
						</div>
					</li>
					<!-- /Cart -->

					<!-- Mobile nav toggle-->
					<li class="nav-toggle">
						<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
					</li>
					<!-- / Mobile nav toggle -->
				</ul>
			</div>
		</div>
		<!-- header -->
	</div>
</header>
<!-- NAVIGATION -->
<div id="navigation">
	<!-- container -->
	<div class="container">
		<div id="responsive-nav">
			<!-- category nav -->
			<div class="category-nav show-on-click">
				<span class="category-header">Categorias <i class="fa fa-list"></i></span>
				<ul class="category-list">
					@foreach(session('categorias') as $categoria)
					<li><a href="{{ route('productList') }}?id_categoria={{ $categoria->id }}">{{ $categoria->cat_nombre }}</a></li>
					@endforeach
				</ul>
			</div>
			<!-- /category nav -->

			<!-- menu nav -->
			<div class="menu-nav">
				<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
				<ul class="menu-list">
					<li><a href="/">Inicio</a></li>
					<li class="dropdown default-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Productos <i class="fa fa-caret-down"></i></a>
						<ul class="custom-menu">
							<li><a href="{{ route('productList') }}?id_marca=0&id_categoria=0&stock=1&sort=1">Lista de precios</a></li>
							<li><a href="{{ route('listBrands')}}">Productos por marca</a></li>
							{{--<li><a href="product-page.html">Product Details</a></li>--}}
						</ul>
					</li>
					<li><a href="#">Contacto</a></li>
				</ul>
			</div>
			<!-- menu nav -->
		</div>
	</div>
	<!-- /container -->
</div>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li class="active">Home</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

@section('body')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@show

<!-- FOOTER -->
<footer id="footer" class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<!-- footer copyright -->
				<div class="footer-copyright">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;{{ today()->year }} All rights reserved
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</div>
				<!-- /footer copyright -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</footer>
<!-- /FOOTER -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
