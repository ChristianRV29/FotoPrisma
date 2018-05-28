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
			{!! Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->Documento]])!!} 
			{{Form::token()}}
		<div class="row">			
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Tipo_Documento">Tipo de documento</label>
				<select name="Tipo_Documento" class="form-control">
					<option value="CC">Cédula de ciudadanía</option>
					<option value="CE">Cédula de extranjería</option>
					<option value="TI">Tarjeta de identidad</option>
				</select>				
			</div>		
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Documento">Documento(*)</label>
				<input type="text" name="Documento" required value="{{$usuario->Documento}}" class="form-control"  placeholder="Numero de documento...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Nombre">Nombre y apellido(*)</label>
				<input type="text" name="Nombre" required value="{{$usuario->Nombre}}" class="form-control" >
			</div>	
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Ciudad">Ciudad de residencia(*)</label>
				<input type="text" name="Ciudad" required value="{{$usuario->Ciudad}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Telefono">Telefono celular</label>
				<input type="text" name="Telefono" required value="{{$usuario->Telefono}}" class="form-control" >
			</div>	
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="Correo">Correo electronico</label>
				<input type="text" name="Correo" required value="{{$usuario->Correo}}" class="form-control" >
			</div>	
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Clave">Contraseña(*)</label>
				<input type="password" name="Clave" required value="{{$usuario->Clave}}" class="form-control" id="pass">
				<input type="checkbox" onclick="myFunction()">Mostrar contraseña
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Estado">Estado del usuario</label>
				<select name="Estado" class="form-control">
					<option value="Activo">Activo</option>
					<option value="Inactivo">Inactivo</option>					
				</select>				
			</div>		
		</div>		

		<script type="text/javascript">
			
			function myFunction(){

				var x = document.getElementById("pass");

				if(x.type === "password"){

					x.type = "text";
				
				}else{

					x.type = "password";

				}
			}

		</script>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>			
		</div>
	</div>
					
			{!! Form::close() !!}		
@endsection