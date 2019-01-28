@extends('layouts.admin')
@section('contenido')
    <div class="row">

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xm-12">
    		
    		<h3>Editar Articulo:  <span class="bg-primary" style="border-radius:5px; padding: 5px;"> {{ $articulo->nombre }} </span> </h3>

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

    {!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
    {{Form::token()}}

    <div class="row">
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre..." required value="{{$articulo->nombre}}">
                </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="idcategoria" class="form-control">
                        @foreach($categorias as $categoria)

                            @if($categoria->idcategoria == $articulo->idcategoria)
                                <option value="{{$categoria->idcategoria}}" selected>{{$categoria->nombre}}</option>
                            @else
                                <option value="{{$categoria->idcategoria}}">{{$categoria->nombre}}</option> 
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="codigo">Codigo</label>
                    <input type="text" name="codigo" class="form-control" placeholder="Codigo..." required value="{{$articulo->codigo}}">
                </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" class="form-control" placeholder="stock..." required value="{{$articulo->stock}}">
                </div>
            </div>
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripción..." value="{{$articulo->descripcion}}">
                </div>
            </div>   
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen" class="form-control">

                    @if($articulo->imagen != "")
                        <br>
                        <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="200px" width="200px" style="border-radius: 5px; border: 1px solid #000">
                    @endif

                </div>
            </div>  
    
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <button type="reset" class="btn btn-warning">Cancelar</button>
                </div>  
            </div>
    
        </div>

    {!!Form::close()!!}
@endsection