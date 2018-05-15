@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de categorias <a href="categoria/create"><button class="btn btn-success">Crear categoria</button></a></h3>
			@include('inventario.categoria.search')	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thread>
						<th>Identificador</th>
						<th>Nombre</th>						
						<th>Estado</th>
						<th>Opciones</th>
					</thread> 
					@foreach($categorias as $cat)
					<tr>
						<td>{{$cat->idCategoria}}</td>											
						<td>{{$cat->Nombre}}</td>						
						<td>{{$cat->Estado}}</td>
						<td>
							<a href="{{URL::action('CategoriaController@edit',$cat->idCategoria)}}"><button class="btn btn-info">Editar</button></a>
							<a href="" data-target="#modal-delete-{{$cat->idCategoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
						</td>
					</tr>
					@include('inventario.categoria.modal')
					@endforeach
				</table>
			</div>
			{{$categorias->render()}}
		</div>
	</div>
@endsection