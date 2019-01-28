@extends('layouts.admin')
@section('contenido')
    <div class="row">

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
    		
    		<h3>Crear Nueva Categoria</h3>

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::open(array('url'=>'almacen/categoria','method'=>'POST','autocomplite'=>'off'))!!}
            {{Form::token()}}

                <div class="form-group">
                	<label for="nombre">Nombre</label>
                	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
                </div>
                <div class="form-group">
                	<label for="descripcion">Descripción</label>
                	<input type="text" name="descripcion" class="form-control" placeholder="Descripción...">
                </div>
                <div class="form-group">
                	<button type="submit" class="btn btn-primary">Crear</button>
                	<button type="reset" class="btn btn-warning">Cancelar</button>
                </div>

            {!!Form::close()!!}

    	</div>	
    	
    </div>
@endsection