{!! Form::open(array('url'=>'ventas/venta','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="fom-group">
	<div class="input-group">
		<input type="text" name="searchText" class="form-control" placeholder="Buscar por número de comprobante..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
		</span>
	</div>
</div>
<br>

{{Form::close()}}