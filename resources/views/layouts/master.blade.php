<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>E-Comerce</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

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
						<img src="{{asset('img/logo.png')}}" alt="">
					</a>
				</div>
				<!-- /Logo -->
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
								Account
								@endguest
								@auth
								{{ Auth::user()->nombre }} <i class="fa fa-caret-down"></i>
								@endauth
							</strong>
						</div>
						@guest
						<a href="login" class="text-uppercase">Login</a>
						@endguest
						@auth
						<ul class="custom-menu">
							<li><a href="#"><i class="fa fa-user-o"></i> Mi Cuenta</a></li>
							<li><a href="{{ route('venta') }}"><i class="fa fa-check"></i> Checkout</a></li>
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
								<div class="shopping-cart-list">
									@if (session()->has('products'))
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
											<button class="cancel-btn"><i class="fa fa-trash"></i></button>
										</div>
										@endforeach
									@endif
								</div>
								<div class="shopping-cart-btns">
									<a href="{{route('listarCarrito')}}" class="main-btn">View Cart</a>
									<button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button>
								</div>
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
				<span class="category-header">Categories <i class="fa fa-list"></i></span>
				<ul class="category-list">
					<li class="dropdown side-dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Computadoras <i class="fa fa-angle-right"></i></a>
						<div class="custom-menu">
							<div class="row">
								<div class="col-md-4">
									<ul class="list-links">
										<li>
											<h3 class="list-links-title">Categories</h3></li>
										<li><a href="#">Women’s Clothing</a></li>
										<li><a href="#">Men’s Clothing</a></li>
										<li><a href="#">Phones & Accessories</a></li>
										<li><a href="#">Jewelry & Watches</a></li>
										<li><a href="#">Bags & Shoes</a></li>
									</ul>
									<hr class="hidden-md hidden-lg">
								</div>
								<div class="col-md-4">
									<ul class="list-links">
										<li>
											<h3 class="list-links-title">Categories</h3></li>
										<li><a href="#">Women’s Clothing</a></li>
										<li><a href="#">Men’s Clothing</a></li>
										<li><a href="#">Phones & Accessories</a></li>
										<li><a href="#">Jewelry & Watches</a></li>
										<li><a href="#">Bags & Shoes</a></li>
									</ul>
									<hr class="hidden-md hidden-lg">
								</div>
								<div class="col-md-4">
									<ul class="list-links">
										<li>
											<h3 class="list-links-title">Categories</h3></li>
										<li><a href="#">Women’s Clothing</a></li>
										<li><a href="#">Men’s Clothing</a></li>
										<li><a href="#">Phones & Accessories</a></li>
										<li><a href="#">Jewelry & Watches</a></li>
										<li><a href="#">Bags & Shoes</a></li>
									</ul>
								</div>
							</div>
							<div class="row hidden-sm hidden-xs">
								<div class="col-md-12">
									<hr>
									<a class="banner banner-1" href="#">
										<img src="./img/banner05.jpg" alt="">
										<div class="banner-caption text-center">
											<h2 class="white-color">NEW COLLECTION</h2>
											<h3 class="white-color font-weak">HOT DEAL</h3>
										</div>
									</a>
								</div>
							</div>
						</div>
					</li>
					<li><a href="#">Laptops</a></li>
					<li><a href="#">Impresoras</a></li>
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
							<li><a href="index.html">Lista de precios</a></li>
							<li><a href="products.html">Productos por categoria</a></li>
							<li><a href="product-page.html">Product Details</a></li>
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
			<li><a href="#">Home</a></li>
			<li class="active">Blank</li>
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
			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<!-- footer logo -->
					<div class="footer-logo">
						<a class="logo" href="#">
							<img src="./img/logo.png" alt="">
						</a>
					</div>
					<!-- /footer logo -->

					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

					<!-- footer social -->
					<ul class="footer-social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
					</ul>
					<!-- /footer social -->
				</div>
			</div>
			<!-- /footer widget -->

			<!-- footer widget -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">My Account</h3>
					<ul class="list-links">
						<li><a href="#">My Account</a></li>
						<li><a href="#">My Wishlist</a></li>
						<li><a href="#">Compare</a></li>
						<li><a href="#">Checkout</a></li>
						<li><a href="#">Login</a></li>
					</ul>
				</div>
			</div>
			<!-- /footer widget -->

			<div class="clearfix visible-sm visible-xs"></div>

			<!-- footer subscribe -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="footer">
					<h3 class="footer-header">Stay Connected</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
					<form>
						<div class="form-group">
							<input class="input" placeholder="Enter Email Address">
						</div>
						<button class="primary-btn">Join Newslatter</button>
					</form>
				</div>
			</div>
			<!-- /footer subscribe -->
		</div>
		<!-- /row -->
		<hr>
		<!-- row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<!-- footer copyright -->
				<div class="footer-copyright">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
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
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
