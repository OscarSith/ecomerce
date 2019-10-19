@extends('layouts.master')

@section('body')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Ultimos Productos agregados</h2>
                </div>
            </div>

            @foreach($productList as $product)
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                    <div class="product-thumb">
                        <img src="{{ asset('img/products/' . $product->prod_imagen) }}" alt="{{ $product->prod_nombre }}" class="img-responsive">
                    </div>
                    <div class="product-body">
                        @auth
                            <h3 class="product-price">$ {{ $product->prod_precio }}</h3>
                        @endauth
                        <h2 class="product-name">
                            <a href="{{ route('detalleProducto', $product->id) }}">{{ $product->prod_nombre }}</a>
                        </h2>
                        <div class="product-btns clearfix">
                            @auth
                            <form action="{{ route('agregarProducto', $product->id) }}" method="post" style="display: inline">
                                @csrf
                                <button class="primary-btn add-to-cart pull-right"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection