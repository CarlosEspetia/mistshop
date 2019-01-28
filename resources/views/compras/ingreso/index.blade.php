@extends('layouts.admin')
@section('contenido')
    <div class="row">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    		@include('compras.ingreso.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>Fecha</th>
    					<th>Proveedor</th>
						<th>Comprobante</th>
						<th>Impesto</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>
    				</thead>
    				<tbody>
    					@foreach ($ingresos as $ingreso)
							<tr>
								<td>{{ $ingreso->fecha_hora }}</td>
								<td>{{ $ingreso->nombre }}</td>
								<td>{{ $ingreso->tipo_comprobante . ': '. $ingreso->serie_comprobante .' - #'.$ingreso->num_comprobante }}</td>
								<td>{{ $ingreso->impuesto }}</td>
								<td>{{ $ingreso->total }}</td>
								
								@if($ingreso->estado == 'A')
									<td style="color:green; font-size: 16px"><span class="fa fa-circle"></span> Activo</td>
								@else
									<td style="color:red; font-size: 16px"><span class="fa fa-circle"></span> Cancelado</td>
								@endif

								<td>
									<a href="{{ URL::action('IngresoController@show',$ingreso->idingreso) }}"><button class="btn btn-success"><span class="fa fa-eye "></span> Detalles</button></a>
									<a href="" data-target="#modal-delete{{ $ingreso->idingreso}}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span> Cancelar</button></a>
								</td>
							</tr>
							@include('compras.ingreso.modal')
						@endforeach
    				</tbody>
    			</table>
				{{$ingresos->render()}}
			</div><!--Fin tabla-->
			
    	</div>
    </div>
@endsection