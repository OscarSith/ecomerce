@extends('layouts.admin')

@section('body')
	<div class="col-md-10 col-md-offset-1">
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if (session()->has('message'))
			<div class="alert alert-success">
				{{ session('message') }}
			</div>
		@endif
		<table class="table table-hover" id="table-report">
			<thead>
				<tr>
					<th>Empresa</th>
					<th>Nro. Facturas</th>
					<th>Monto Total</th>
				</tr>
			</thead>
			<tbody>
				@if (count($reporte))
					@foreach($reporte as $fila)
						<tr id="{{$fila->id_user}}" class="main-row">
							<td>{{ $fila->nombre }}</td>
							<td>{{ $fila->facturas }}</td>
							<td>{{ $fila->total_venta }}</td>
						</tr>
						<tr class="hidden">
							<td colspan="3" class="table-detail">
								<table class="table table-striped table-bordered"></table>
							</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3">
							<p class="text-center">No hay registros que mostrar</p>
						</td>
					</tr>
				@endif
			</tbody>
		</table>
	</div>
@endsection

@section('js')
	<script>
		var $table = $('#table-report');

		$table.on('click', 'tr.main-row', function (e) {
			var url = '{{{ route('listaFacturas', ':ID') }}}';
			console.log(url);
			var $tr = $(e.currentTarget);
			var $nextTr = $tr.next();

			if ($nextTr.hasClass('hidden')) {
				$nextTr.removeClass('hidden');
			} else {
				$nextTr.addClass('hidden');
				return ;
			}

			if (!$tr.hasClass('called')) {
				var id = $tr.attr('id');
				url = url.replace(':ID', id);

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{{ csrf_token() }}}'
					}
				});
				$.get(url, function (data) {
					var html = '';

					data.forEach(function (invoice) {
						html += '<tr><td>' + invoice.nro_orden + '</td>' +
							'<td>' + invoice.nro_factura + '</td>' +
							'<td>S/ ' + parseFloat(invoice.total_venta).toFixed(2) + '</td>' +
							'<td class="text-right"><small>' + invoice.created_at + '</small></td></tr>';
					});

					$tr.addClass('called');
					$nextTr.find('table').html(html);
					console.log(id);
				});
			}
		});
	</script>
@endsection
