@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de servicios  <a href="producto/create"><button class="btn btn-success">Crear servicio</button></a></h3>
			@include('inventario.producto.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Identificador</th>
						<th>Nombre</th>
						<th>Descripcion</th>
						<th>Precio unitario</th>
						<th>Imagen</th>
						<th>Existencias</th>
						<th>Estado</th>
						<th>Opciones</th>
					</thread> 
					@foreach($productos as $product)
					<tr>
						<td>{{$product->idProducto}}</td>											
						<td>{{$product->Nombre}}</td>
						<td>{{$product->Descripcion}}</td>
						<td>{{$product->Precio}}</td>
						<td>{{$product->Imagen}}</td>
						<td>{{$product->Existencias}}</td>
						<td>{{$product->Estado}}</td>
						<td>
							<a href="{{URL::action('ProductoController@edit',$product->idProducto)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$product->idProducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('inventario.producto.modal')
					@endforeach
				</table>
			</div>
			{{$productos->render()}}
		</div>
	</div>
@endsection