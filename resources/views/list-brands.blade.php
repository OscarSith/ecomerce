@extends('layouts.master')

@section('body')
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Productos Por Marca</h2>
					</div>
				</div>
				<div class="col-md-12">
					<table class="table table-bordered table-hover" style="width: 60%">
						<tbody>
							@foreach($brands as $brand)
								<tr>
									<td style="width: 30%">
										<a href="{{ route('productList') }}?id_marca={{ $brand->id }}">
											<img src="{{ asset('img/marcas/' . $brand->brand_imagen) }}" alt="{{ $brand->brand_name }}">
										</a>
									</td>
									<td style="width: 70%;vertical-align: center">{{$brand->brand_name}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection