@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de productos <a href="producto/create"><button class="btn btn-success">Crear un nuevo producto</button></a></h3>
			@include('inventario.producto.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Identificador</th>
						<th>Categoria</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio unitario</th>
						<th>Imagen</th>
						<th>Existencias</th>						
						<th>Estado</th>
						<th>Opciones</th>
					</thread> 
					@foreach($servicios as $serv)
					<tr>
						<td>{{$serv->idServicio}}</td>
						<td>{{$serv->Categoria}}</td>											
						<td>{{$serv->Nombre}}</td>
						<td>{{$serv->Descripcion}}</td>
						<td>{{$serv->Existencias}}</td>
						<td>{{$serv->Precio}}</td>
						<td>
							<img src="{{asset('Imagenes/Servicios/'.$serv->Imagen)}}" alt="{{$serv->Nombre}}" height="100px" width="100px" class="img-thumbnail">							
						</td>						
						<td>{{$serv->Estado}}</td>
						<td>
							<a href="{{URL::action('ProductoController@edit',$serv->idServicio)}}"><button class="btn btn-info">Editar</button></a>						
							<a href="" data-target="#modal-delete-{{$serv->idServicio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('inventario.producto.modal')
					@endforeach
				</table>
			</div>
			{{$servicios->render()}}
		</div>
	</div>
@endsection