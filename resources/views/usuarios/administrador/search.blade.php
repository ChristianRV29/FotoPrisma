{!! Form::open(array('url'=>'usuarios/administrador','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}

<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar administrador..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar un administrador</button>

			</button>							
		</span>
</div>

{{Form::close()}}
