@extends('layouts.admin')
@section('contenido')
    <div class="row">
    	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    		<h3>Listado de Usuarios <a href="usuario/create"><button class="btn btn-primary">Nuevo</button></a></h3>
    		@include('seguridad.usuario.search')
    	</div>
    </div>

    <div class="row">
    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    		<div class="table-responsive">
    			
    			<table class="table table-striped table-bordered table-condensed table-hover">
    				<thead>
    					<th>#Numero</th>
    					<th>Nombre</th>
    					<th>Email</th>
    					<th>Opciones</th>
    				</thead>
    				<tbody>
    					@foreach ($usuarios as $usuario)
							<tr>
								<td>{{ $usuario->id }}</td>
								<td>{{ $usuario->name }}</td>
								<td>{{ $usuario->email }}</td>
								<td>
									<a href="{{ URL::action('UsuarioController@edit',$usuario->id) }}"><button class="btn btn-success"><span class="fa fa-edit"></span></button></a>
									<a href="" data-target="#modal-delete{{ $usuario->id }}" data-toggle="modal"><button class="btn btn-danger"><span class="fa fa-remove"></span></button></a>
								</td>
							</tr>
							@include('seguridad.usuario.modal')
						@endforeach
    				</tbody>
    			</table>
				{{$usuarios->render()}}
			</div><!--Fin tabla-->
			
    	</div>
    </div>
@endsection