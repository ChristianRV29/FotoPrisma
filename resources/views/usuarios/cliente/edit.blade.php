@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar información de: {{ $usuario->Nombre}}</h3>
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
			{!! Form::model($usuario,['method'=>'PATCH','route'=>['cliente.update',$usuario->idUsuario]])!!} 
			{{Form::token()}}
		<div class="row">			
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Documento">Documento</label>
				<input type="text" name="Documento" required value="{{$usuario->Documento}}" class="form-control">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Nombre">Nombre</label>
				<input type="text" name="Nombre" required value="{{$usuario->Nombre}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Fecha_Nacimiento">Fecha de nacimiento</label>
				<input type="text" name="Fecha_Nacimiento" required value="{{$usuario->Fecha_Nacimiento}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Ciudad">Ciudad de residencia</label>
				<input type="text" name="Ciudad" required value="{{$usuario->Ciudad}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Correo">Correo electronico</label>
				<input type="text" name="Correo" required value="{{$usuario->Correo}}" class="form-control" >
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