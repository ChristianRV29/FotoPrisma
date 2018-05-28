@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de usuarios <a href="usuario/create"><button class="btn btn-success">Crear un nuevo usuario</button></a></h3>
			@include('usuarios.usuario.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Documento</th>
						<th>Tipo de documento</th>
						<th>Rol asignado</th>						
						<th>Nombre</th>																
						<th>Ciudad</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Estado</th>						
						<th>Opciones</th>
					</thread> 
					@foreach($usuarios as $us)					
					<tr>
						<td>{{$us->Documento}}</td>
						<td>{{$us->Tipo_Documento}}</td>
						<td>{{$us->Rol}}</td>																	
						<td>{{$us->Nombre}}</td>
						<td>{{$us->Ciudad}}</td>
						<td>{{$us->Telefono}}</td>
						<td>{{$us->Correo}}</td>												
						<td>{{$us->Estado}}</td>
						<td>
							<a href="{{URL::action('UsuarioController@edit',$us->Documento)}}"><button class="btn btn-info">Editar</button></a>						
							<a href="" data-target="#modal-delete-{{$us->Documento}}" data-toggle="modal"><button class="btn btn-danger">Deshabilitar</button></a>
						</td>
					</tr>
					@include('usuarios.usuario.modal')
					@endforeach
				</table>
			</div>
			{{$usuarios->render()}}
		</div>
	</div>
@endsection