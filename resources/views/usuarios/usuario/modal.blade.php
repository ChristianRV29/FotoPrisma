<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$us->Documento}}">
	{{Form::Open(array('action'=>array('UsuarioController@destroy',$us->Documento),'method'=>'delete'))}}	
	<div class="modal-dialog">
		<div class="modal-content ">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-tittle">Deshabilitar cliente</h4>				
			</div>
			<div class="modal-body">
				<p>¿Esta seguro de deshabilitar a este cliente?</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" type="submit">Confirmar</button>
				<button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button>				
			</div> 					
		</div>
	</div>
	{{Form::Close()}}
</div>