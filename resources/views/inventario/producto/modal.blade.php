<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$product->idProducto}}">
	{{Form::Open(array('action'=>array('ProductoController@destroy',$product->idProducto),'method'=>'delete'))}}	
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-tittle">Eliminar servicio</h4>				
			</div>
			<div class="modal-body">
				<p>¿Esta seguro de eliminar este servicio?</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">Confirmar</button>
				<button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>				
			</div> 					
		</div>
	</div>
	{{Form::Close()}}
</div>
