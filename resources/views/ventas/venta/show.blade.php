@extends('layouts.admin')
@section('contenido')    
<div class="row">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label for="proveedor">Cliente</label>
            <p>{{$venta->nombre}}</p>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label>Tipo de Comprobante</label>
            <p>{{$venta->tipo_comprobante}}</p>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="serie_comprobante">Serie Comprobante</label>
            <p>{{$venta->serie_comprobante}}</p>
        </div>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <div class="form-group">
            <label for="num_comprobante">Número Comprobante</label>
            <p>{{$venta->num_comprobante}}</p>
        </div>
    </div>

</div>

<div class="row">

    <div class="panel panel-success" style="margin-top:25px; margin-left:15px; margin-right:15px">

        <div class="panel-heading">Detalle</div>

        <div class="panel-body">

            <div class="table-responsive col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#428bca; color:#f2f2f2">
                        <tr>
                            <th>Artículo</th>
                            <th>Cantidad</th>
                            <th>Precio Venta</th>
                            <th>Descuento</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>TOTAL</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th><h4 id="total">{{$venta->total_venta}}</h4></th>
                    </tfoot>
                    <tbody>
                        @foreach ($detalles as $detalle)
                            <tr>
                                <td>{{$detalle->articulo}}</td>
                                <td>{{$detalle->cantidad}}</td>
                                <td>{{$detalle->precio_venta}}</td>
                                <td>{{$detalle->descuento}}</td>
                                <td>{{$detalle->cantidad*$detalle->precio_venta-$detalle->descuento}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>
@endsection