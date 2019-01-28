@extends('layouts.admin')
@section('contenido')
    <div class="row">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Listado de categorías <a href="categoria/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    		@include('almacen.categoria.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>#Numero</th>
    					<th>Nombre</th>
    					<th>Descripcion</th>
    					<th>Opciones</th>
    				</thead>
    				<tbody>
    					@foreach ($categorias as $categoria)
							<tr>
								<td>{{ $categoria->idcategoria }}</td>
								<td>{{ $categoria->nombre }}</td>
								<td>{{ $categoria->descripcion }}</td>
								<td>
									<a href="{{ URL::action('CategoriaController@edit',$categoria->idcategoria) }}"><button class="btn btn-success"><span class="fa fa-edit"></span></button></a>
									<a href="" data-target="#modal-delete{{ $categoria->idcategoria }}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span></button></a>
								</td>
							</tr>
							@include('almacen.categoria.modal')
						@endforeach
    				</tbody>
    			</table>
				{{$categorias->render()}}
			</div><!--Fin tabla-->
			
    	</div>
    </div>
@endsection