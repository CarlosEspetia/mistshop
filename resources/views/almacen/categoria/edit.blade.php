@extends('layouts.admin')
@section('contenido')
    <div class="row">

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
    		
    		<h3>Editar Categoria:  <span class="bg-primary" style="border-radius:5px; padding: 5px;"> {{ $categoria->nombre }} </span> </h3>

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($categoria,['method'=>'PATCH','route'=>['almacen.categoria.update',$categoria->idcategoria]])!!}
            {{Form::token()}}

                <div class="form-group">
                	<label for="nombre">Nombre</label>
                	<input type="text" name="nombre" class="form-control" value="{{$categoria->nombre}}" placeholder="Nombre...">
                </div>
                <div class="form-group">
                	<label for="descripcion">Descripción</label>
                	<input type="text" name="descripcion" class="form-control" value="{{$categoria->descripcion}}" placeholder="Descripción...">
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-primary">Guardar cambios</button>
                	<button type="reset" class="btn btn-warning">Cancelar</button>
                </div>

            {!!Form::close()!!}

    	</div>	
    	
    </div>
@endsection