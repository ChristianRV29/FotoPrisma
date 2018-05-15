@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo servicio</h3>
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
	{!!Form::open(array('url'=>'inventario/servicio','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!} 
	{{Form::token()}}	
	<div class="row">	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div clas="form-group">
				<label>Categoría del servicio</label>
				<select name="idCategoria" class="form-control">
					@foreach($categorias as $cat)
					<option value="{{$cat->idCategoria}}">{{$cat->Nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Nombre">Asignale un nombre a tu servicio(*)</label>
				<input type="text" name="Nombre" required value="{{old('Nombre')}}" class="form-control"  placeholder="Nombre...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Descripcion">Describe tu servicio</label>
				<input type="text" name="Descripcion" required value="{{old('Descripcion')}}" class="form-control"  placeholder="Descripcion...">
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Precio">Precio del servicio(*)</label>
				<input type="text" name="Precio" required value="{{old('Precio')}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Imagen">Agrega una imagen del servicio(*)</label>
				<input type="file" name="Imagen" required class="form-control">
			</div>								
		</div>	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Existencias">Existencias del servicio</label>
				<input type="text" name="Existencias" value="{{old('Existencias')}}" class="form-control"  placeholder="Existencias...">
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