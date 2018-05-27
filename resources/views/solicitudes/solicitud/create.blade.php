@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Registrar nueva solicitud</h3>
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
	{!!Form::open(array('url'=>'solicitudes/solicitud','method'=>'POST','autocomplete'=>'off'))!!} 
	{{Form::token()}}	
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div clas="form-group">				
				<label for="Usuario">A nombre del cliente</label>
				<select name="Documento" id="Documento" class="form-control">											
					@foreach ($usuarios as $us)										
					<option value="{{$us->usuario}}">{{$us->usuario}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Fecha efectiva para la solicitud</label>
				<input type="datetime-local" name="Fecha_Efectiva" id="Fecha_Efectiva" class="form-control">				
		</div>
	</div>
</div>
	<div class="row">	
		<div class="panel panel-primary">
			<div class="panel-body">
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="Servicio">Servicio solicitado</label>
						<select name="idServicio" id="idServicio" class="form-control selectpicker" data-live-search="true">		
							@foreach ($servicios as $serv)
							<option value="{{$serv->idServicio}}_{{$serv->Existencias}}_{{$serv->Precio}}">{{$serv->servicio}}</option>
							@endforeach												
						</select>
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="Cantidad">Cantidad solicitada</label>
						<input type="number" name="Cantidad" id="Cantidad" class="form-control" placeholder="#Cantidad">				
					</div>
				</div>
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="Existencias">Existencias del servicio</label>
						<input type="number" disabled name="Existencias" id="Existencias" class="form-control">				
					</div>
				</div>				
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<label for="Precio">Precio del servicio</label>
						<input type="text" disabled name="Cantidad" id="Cantidad" class="form-control" placeholder="$0.00">				
					</div>
				</div>				
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
					<div class="form-group">
						<button type="button" id="bt_add" class="btb btn-primary">Agregar</button>
					</div>				
				</div>
				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thread style="background-color:#A9D0F5">
							<th>Opciones</th>
							<th>Servicio</th>						
							<th>Precio</th>
							<th>Cantidad</th>
							<th>Subtotal</th>								
						</thread>
						<tfoot>
							<th>TOTAL</th>
							<th></th>
							<th></th>
							<th></th>							
							<th><h4 id="total">S/. 0.00</h4></th>
						</tfoot>
					</table>
				</div>
			</div>

		</div>
		<div class="form-group">
				<button class="btn btn-primary" type="submit">Finalizar solicitud</button>
				<button class="btn btn-primary" type="reset">Cancelar solicitud</button>
			</div>				
					
		</div>		
	</div>
	{!! Form::close() !!}

	@push ('scripts')
         <script>
           $(document).ready(function(){
        $('#bt_add').click(function(){
         agregar();
         });
       });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
  $("#idServicio").change(mostrarValores);

  function mostrarValores(){

  	datosServicio=document.getElementById('idServicio').value.split('_');
  	$('#Precio').val(datosServicio[2]);
  	$('#Existencias')val(datosServicio[1])
  }

  function agregar(){

  	datosServicio=document.getElementById('idServicio').value.split('_');
    idServicio=datosServicio[0];
    Servicio=$("#idServicio option:selected").text();
    Cantidad=$("#Cantidad").val();    
    Precio=$("#Precio").val();

    Existencias=$("#Existencias").val();

    if (idServicio!="" && Cantidad!="" && Cantidad>0 && Precio!="")
    {

    	if (Existencias>=Cantidad){
    		subtotal[cont]=(Cantidad*Precio);
       		total=total+subtotal[cont];

       		var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="idServicio[]" value="'+idServicio+'">'+Servicio+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="Precio[]" value="'+Precio+'"></td><td>'+subtotal[cont]+'</td></tr>';
       			cont++;
       			limpiar();
       			$('#total').html("$/ " + total);
       			$('#Total').val(total);
       			evaluar();
       			$('#Detalles').append(fila);

    	}
    	else {

    		alert('La cantidad solicitada supera las existencias');
    	}
    }
    else
    {
      alert("Error al ingresar el detalle del ingreso, revise los datos del articulo");
    }
  
  }
  function limpiar(){
    $("#Cantidad").val("");    
    $("#Precio").val("");
  }

  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }

   function eliminar(index){

    total=total-subtotal[index]; 
    $("#total").html("S/. " + total);
    $("#Total").val(Total);
    $("#fila" + index).remove();
    evaluar();

  }
         </script>

@endpush
@endsection