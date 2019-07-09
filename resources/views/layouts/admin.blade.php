<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>E-Comerce - ADMIN</title>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
	<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
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
			</div>
			<div class="pull-right">
				<ul class="header-btns">
					<!-- Account -->
					<li class="header-account dropdown default-dropdown">
						<div>
							<div class="header-btns-icon">
								<i class="fa fa-user-o"></i>
							</div>
							<strong class="text-uppercase">
								{{ Auth::user()->nombre }}
							</strong>
						</div>
					</li>
					<!-- /Account -->

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
			<!-- menu nav -->
			<div class="menu-nav">
				<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
				<ul class="menu-list">
					<li><a href="{{ route('adminHome') }}">Inicio</a></li>
					<li><a href="{{ route('register') }}">Registrar</a></li>
					<li><a href="{{ route('reporteDeVentas') }}">Reporte</a></li>
					<li><a href="{{ route('home') }}">Ir a la página web</a></li>
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
			<li class="active">Inicio</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			@section('body')
			@show
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<!-- FOOTER -->
<footer id="footer" class="section section-grey">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<!-- footer copyright -->
				<div class="footer-copyright">
					Copyright &copy;{{ today()->year }} All rights reserved
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
@yield('js')
</body>
</html>
