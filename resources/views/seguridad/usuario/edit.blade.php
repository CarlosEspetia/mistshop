@extends('layouts.admin')
@section('contenido')
    <div class="row">

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
    		
    		<h3>Editar Usuario:  <span class="bg-primary" style="border-radius:5px; padding: 5px;"> {{ $usuario->name }} </span> </h3>

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usuario->id]])!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre..." value="{{ $usuario->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email..." value="{{ $usuario->email }}">
            </div>
            <div class="form-group">
                <label for="password">Clave</label>
                <input type="password" name="password" class="form-control" placeholder="clave...">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmar Clave</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repetir Clave...">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="reset" class="btn btn-warning">Cancelar</button>
            </div>

            {!!Form::close()!!}

    	</div>	
    	
    </div>
@endsection