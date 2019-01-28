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

        </div>

    </div>
    {!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplite'=>'off','files'=>'true'))!!}
    {{Form::token()}}
    
    <div class="row">
    
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre..." required value="{{old('nombre')}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Categoría</label>
                <select name="idcategoria" class="form-control">
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo" class="form-control" placeholder="Codigo..." required value="{{old('codigo')}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock" class="form-control" placeholder="stock..." required value="{{old('stock')}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripción..." value="{{old('descripcion')}}">
            </div>
        </div>   

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
            </div>
        </div>  

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Crear</button>
                <button type="reset" class="btn btn-warning">Cancelar</button>
            </div>  
        </div>

    </div>

    {!!Form::close()!!}

@endsection