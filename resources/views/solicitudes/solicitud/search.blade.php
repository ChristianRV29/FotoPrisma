{!! Form::open(array('url'=>'solicitudes/solicitud','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar una solicitud..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar una solicitud</button>

			</button>							
		</span>
</div>

{{Form::close()}}
