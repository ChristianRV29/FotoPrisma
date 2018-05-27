@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
		<div class="form-group">
			<label for="Cliente">Cliente</label>
			<p>{{$solicitud->Nombre}}</p>
		</div>
	</div>
	<div class="colg-lg-4 col-sm-4 col-md-4- col-xs-12">
		<div class="form-group">
			<label>Fecha de realización</label>
			<p>{{$solicitud->Fecha_Solicitud}}</p>
		</div>
	</div>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<div class="form-group">
			<label>Fecha asignada para la solicitud</label>
			<p>{{$solicitud->Fecha_Efectiva}}</p>
	    </div>	   
	</div>
   </div>
   <div class="row">
   	<div class="panel panel-primary">
   		<div class="panel-body">
   			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
   				<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
   					<thread style="background-color: #A9D0F5">
   						<th>Servicio solicitado</th>
   						<th>Cantidad del servicio</th>
   						<th>Precio del servicio</th>
   						<th>Subtotal</th>
   					</thread>   
   					<tfoot>
   						<th></th>
   						<th></th>
   						<th></th>
   						<th></th>
   						<th><h4 id="total">{{$solicitud->Total}}</h4></th>
   					</tfoot>
   					<tbody>
   						@foreach($detalles as $det)
   						<tr>
   							<td>{{$det->servicio}}</td>
   							<td>{{$det->Cantidad}}</td>
   							<td>{{$det->precio}}</td>
   							<td>{{$det->Cantidad*$det->precio}}</td>	
   						</tr>
   						@endforeach
   					</tbody>				
   				</table>
   			</div>		
   		</div>   	
   </div>
</div>
@endsection