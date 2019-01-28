<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete{{ $ingreso->idingreso }}">
	{{Form::Open(array('action'=>array('IngresoController@destroy',$ingreso->idingreso),'method'=>'delete'))}}

		<div class="modal-dialog">
			
			<div class="modal-content">
				
				<div class="modal-header">
					
					<button class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">x</span>
					</button>
					<h4 class="modal-title">Cancelar Ingreso</h4>

				</div>

				<div class="modal-body">
					
					<p>En realidad desea cancelar este Ingreso?</p>

				</div>

				<div class="modal-footer">
					
					<button type="submit" class="btn btn-success">Confirmar</button>
					<button class="btn btn-default" data-dismiss="modal">Cancelar</button>

				</div>

			</div>

		</div>

	{{Form::close()}}
</div>