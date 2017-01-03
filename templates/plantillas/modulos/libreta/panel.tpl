<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Libreta</h1>
	</div>
</div>


<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="box">
		<div class="box-body">
			<div class="form-group">
				<label for="txtClave" class="col-lg-2">Código</label>
				<div class="col-lg-3">
					<input class="form-control" id="txtClave" name="txtClave">
				</div>
			</div>
		</div>
	</div>
</form>

<div id="listas" class="tab-pane fade in active">
	<div id="dvLista">
		
	</div>
</div>

<form role="form" id="frmRetiro" class="form-horizontal" onsubmit="javascript: return false;">
	<div class="modal fade" id="winRetiros" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Retiros de efectivo</h3>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="txtConcepto" class="col-lg-2">Concepto</label>
						<div class="col-lg-10">
							<input class="form-control" id="txtConcepto" name="txtConcepto">
						</div>
					</div>
					<div class="form-group">
						<label for="txtMonto" class="col-lg-2">Monto</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtMonto" name="txtMonto">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</div>
		</div>
	</div>
</form>