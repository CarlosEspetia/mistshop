{!! Form::open(array('url'=>'almacen/articulo','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}

<div class="fom-group">
	<div class="input-group">
		<input type="text" name="searchText" class="form-control" placeholder="Buscar por nombre o codigo..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default"><span class="fa fa-search"></span></button>
		</span>
	</div>
</div>
<br>

{{Form::close()}}