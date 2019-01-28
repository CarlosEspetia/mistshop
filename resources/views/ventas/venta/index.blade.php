@extends('layouts.admin')
@section('contenido')
    <div class="row">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    		@include('ventas.venta.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Fecha</th>
    					<th>Cliente</th>
						<th>Comprobante</th>
						<th>Impesto</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
    				</thead>
    				<tbody>
    					@foreach ($ventas as $venta)
							<tr>
								<td>{{ $venta->fecha_hora }}</td>
								<td>{{ $venta->nombre }}</td>
								<td>{{ $venta->tipo_comprobante . ': '. $venta->serie_comprobante .' - #'.$venta->num_comprobante }}</td>
								<td>{{ $venta->impuesto }}</td>
								<td>{{ $venta->total_venta }}</td>
								
								@if($venta->estado == 'A')
									<td style="color:green; font-size: 16px"><span class="fa fa-circle"></span> Activo</td>
								@else
									<td style="color:red; font-size: 16px"><span class="fa fa-circle"></span> Cancelado</td>
								@endif

								<td>
									<a href="{{ URL::action('VentaController@show',$venta->idventa) }}"><button class="btn btn-success"><span class="fa fa-eye "></span> Detalles</button></a>
									<a href="" data-target="#modal-delete{{ $venta->idventa }}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span> Cancelar</button></a>
								</td>
							</tr>
							@include('ventas.venta.modal')
						@endforeach
    				</tbody>
    			</table>
				{{$ventas->render()}}
			</div><!--Fin tabla-->
			
    	</div>
    </div>
@endsection