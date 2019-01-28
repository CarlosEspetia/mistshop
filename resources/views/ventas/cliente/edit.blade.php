@extends('layouts.admin')
@section('contenido')
    <div class="row">

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
    		
    		<h3>Editar Cliente:  <span class="bg-primary" style="border-radius:5px; padding: 5px;"> {{ $persona->nombre }} </span> </h3>

            @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>

    {!!Form::model($persona,['method'=>'PATCH','route'=>['ventas.cliente.update',$persona->idpersona]])!!}
    {{Form::token()}}

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre..." required value="{{$persona->nombre}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Direción</label>
                <input type="text" name="direccion" class="form-control" placeholder="Dirección..." value="{{$persona->direccion}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Documento</label>
                <select name="tipo_documento" class="form-control">
                    @if($persona->tipo_documento == 'INE')
                        <option value="INE" selected>INE</option>
                        <option value="RFC">RFC</option>
                        <option value="PASS">Pasaporte</option>
                    @elseif($persona->tipo_documento == 'RFC')
                        <option value="INE">INE</option>
                        <option value="RFC" selected>RFC</option>
                        <option value="PASS">Pasaporte</option>
                    @else
                        <option value="INE">INE</option>
                        <option value="RFC">RFC</option>
                        <option value="PASS" selected>Pasaporte</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento">Número de documento</label>
                <input type="text" name="num_documento" class="form-control" placeholder="Número de documento..." required value="{{$persona->num_documento}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" class="form-control" placeholder="Teléfono..." value="{{$persona->telefono}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email..." value="{{$persona->email}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="reset" class="btn btn-warning">Cancelar</button>
            </div>
        </div>

    </div>

    {!!Form::close()!!}
@endsection