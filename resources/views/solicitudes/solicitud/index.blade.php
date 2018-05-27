@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de solicitudes <a href="solicitud/create"><button class="btn btn-success">Crear una nueva solicitud</button></a></h3>
			@include('solicitudes.solicitud.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Fecha de realizacion</th>
						<th>Fecha de asignación</th>
						<th>Cliente</th>
						<th>Impuesto</th>
						<th>Total</th>
						<th>Estado</th>
						<th>Opciones</th>											
					</thread> 
					@foreach($solicitudes as $sol)
					<tr>
						<td>{{$sol->Fecha_Solicitud}}</td>
						<td>{{$sol->Fecha_Efectiva}}</td>
						<td>{{$sol->Nombre}}</td>											
						<td>{{$sol->Impuesto}}</td>
						<td>{{$sol->Total}}</td>												
						<td>{{$sol->Estado}}</td>
						<td>
							<a href="{{URL::action('SolicitudController@show',$sol->idSolicitud)}}"><button class="btn btn-info">Detalles</button></a>						
							<a href="" data-target="#modal-delete-{{$sol->idSolicitud}}" data-toggle="modal"><button class="btn btn-danger">Rechazar</button></a>							
						</td>
					</tr>
					@include('solicitudes.solicitud.modal')
					@endforeach
				</table>
			</div>
			{{$solicitudes->render()}}
		</div>
	</div>
@endsection