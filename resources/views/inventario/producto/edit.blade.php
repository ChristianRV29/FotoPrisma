@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar producto: {{ $producto->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error) 
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!! Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idProducto]])!!} 
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre: </label>
				<input type="text" name="Nombre" class="form-control" value="{{$producto->Nombre}}" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="descripcion">Descripcion: </label>
				<input type="text" name="Descripcion" class="form-control" value="{{$producto->Descripcion}}" placeholder="Descripcion...">				
			</div>
			<div class="form-group">
				<label for="precio">Precio: </label>
				<input type="text" name="Precio" class="form-control" value="{{$producto->Precio}}" placeholder="Precio...">				
			</div>
			<div class="form-group">
				<label for="imagen">Ubicación de la imagen: </label>
				<input type="imagen" name="Imagen" class="form-control">				
			</div>
			<div class="form-group">
				<label for="Existencias">Existencias: </label>
				<input type="text" name="Existencias" class="form-control" value="{{$producto->Existencias}}" placeholder="Existencias...">				
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Editar</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>						
			{!! Form::close() !!}
		</div>
	</div>
@endsection
