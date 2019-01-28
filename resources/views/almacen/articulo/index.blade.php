@extends('layouts.admin')
@section('contenido')
    <div class="row">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    		@include('almacen.articulo.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>#Numero</th>
    					<th>Nombre</th>
    					<th>Codigo</th>
						<th>Categoria</th>
						<th>Stock</th>
						<th>Imagen</th>
						<th>Estado</th>
						<th>Opciones</th>
    				</thead>
    				<tbody>
    					@foreach ($articulos as $articulo)
							<tr>
								<td>{{ $articulo->idarticulo }}</td>
								<td>{{ $articulo->nombre }}</td>
								<td>{{ $articulo->codigo }}</td>
								<td>{{ $articulo->categoria }}</td>
								<td>{{ $articulo->stock }}</td>
								<td>
									<img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" alt="{{$articulo->nombre}}" height="100px" width="100px" class="img-thumbnail">
								</td>
								@if($articulo->estado == 'Activo')
									<td style="color:green; font-size: 16px"><span class="fa  fa-circle"></span> Activo</td>
								@else
									<td style="color:grey; font-size: 16px"><span class="fa  fa-circle"></span> Inactivo</td>
								@endif
								<td>
									<a href="{{ URL::action('ArticuloController@edit',$articulo->idarticulo) }}"><button class="btn btn-success"><span class="fa fa-edit"></span></button></a>
									<a href="" data-target="#modal-delete{{ $articulo->idarticulo }}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span></button></a>
								</td>
							</tr>
							@include('almacen.articulo.modal')
						@endforeach
    				</tbody>
    			</table>
				{{$articulos->render()}}
			</div><!--Fin tabla-->
			
    	</div>
    </div>
@endsection