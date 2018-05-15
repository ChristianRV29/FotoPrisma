@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo administrador</h3>
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
	
	{!!Form::open(array('url'=>'usuarios/administrador','method'=>'POST','autocomplete'=>'off'))!!} 
	{{Form::token()}}	
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Tipo_Documento">Tipo de documento</label>
				<select name="Tipo_Documento" class="form-control">
					<option value="CC">Cédula de ciudadanía</option>
					<option value="CE">Cédula de extranjería</option>
				</select>				
			</div>		
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Documento">Documento(*)</label>
				<input type="text" name="Documento" required value="{{old('Documento')}}" class="form-control"  placeholder="Numero de documento...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Nombre">Nombres y apellidos(*)</label>
				<input type="text" name="Nombre" required value="{{old('Nombre')}}" class="form-control"  placeholder="Nombre...">
			</div>		
		</div>		
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Ciudad">Ciudad de residencia(*)</label>
				<input type="text" name="Ciudad" required value="{{old('Ciudad')}}" class="form-control"  placeholder="Ciudad...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Correo">Correo electronico(*)</label>
				<input type="text" name="Correo" required value="{{old('Correo')}}" class="form-control"  placeholder="Correo...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Telefono">Telefono celular(*)</label>
				<input type="text" name="Telefono" required value="{{old('Telefono')}}" class="form-control"  placeholder="Telefono...">
			</div>		
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">		
			<div class="form-group">
				<label for="Clave">Contraseña(*)</label>
				<input type="password" name="Clave" required value="{{old('Clave')}}" class="form-control"  placeholder="Contraseña..." id="pass">
				<input type="checkbox" onclick="myFunction()">Mostrar contraseña
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
				<button class="btn btn-primary" type="submit">Crear</button>
				<button class="btn btn-primary" type="reset">Cancelar</button>
			</div>				
	
			{!! Form::close() !!}			

		</div>
	</div>
@endsection