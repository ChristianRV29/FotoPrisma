@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar servicio: {{ $servicio->Nombre}}</h3>
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
	{!! Form::model($servicio,['method'=>'PATCH','route'=>['servicio.update',$servicio->idServicio],'files'=>'true'])!!} 
	{{Form::token()}}
		<div class="row">	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div clas="form-group">
				<label>Categoría de servicio</label>
				<select name="idCategoria" class="form-control">
					@foreach($categorias as $cat)
					@if ($cat->idCategoria==$servicio->idCategoria)
					<option value="{{$cat->idCategoria}}" selected>{{$cat->Nombre}}</option>
					@else 
					<option value="{{$cat->idCategoria}}"> {{$cat->Nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Nombre">Nombre del servicio</label>
				<input type="text" name="Nombre" unique required value="{{$servicio->Nombre}}" class="form-control">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Descripcion">Descripcion del servicio</label>
				<input type="text" name="Descripcion" required value="{{$servicio->Descripcion}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Precio">Precio del servicio</label>
				<input type="text" name="Precio" required value="{{$servicio->Precio}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Imagen">Cambiar imagen del servicio</label>
				<input type="file" name="Imagen" class="form-control">
				@if (($servicio->Imagen)!="")
					<img src="{{asset('Imagenes/Servicios/'.$servicio->Imagen)}}" height="300px" width="300px">
				@endif
			</div>								
		</div>
		@if ($servicio->idCategoria==1)			
		@else
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Existencias">Existencias del servicio</label>
				<input type="text" name="Existencias" required value="{{$servicio->Existencias}}" class="form-control"  >
			</div>
		</div>
		@endif
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
			<label for="Estado">Estado del servicio</label>
				<select name="Estado" class="form-control">
				 @if($servicio->Estado='Activo')
				 <option value="Activo" selected>Activo</option>
				 <option value="Inactivo">Inactivo</option>
				 @else
				 <option value="Activo">Activo</option>
				 <option value="Inactivo" selected>Inactivo</option>
				 @endif
			    </select>
			</div>	
		</div>								
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>			
		</div>
	</div>
					
			{!! Form::close() !!}		
@endsection