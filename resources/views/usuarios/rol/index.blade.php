@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Roles dentro del sistema</h3>
			@include('usuarios.rol.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Identificador</th>						
						<th>Nombre del rol</th>												
					</thread> 
					@foreach($roles as $rol)
					<tr>
						<td>{{$rol->idRol}}</td>																	
						<td>{{$rol->Nombre}}</td>												
					</tr>					
					@endforeach
				</table>
			</div>
			{{$roles->render()}}
		</div>
	</div>
@endsection