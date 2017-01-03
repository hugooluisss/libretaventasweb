<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Productos</h1>
	</div>
</div>

<ul id="panelTabs" class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#listas">Lista</a></li>
	<li><a data-toggle="tab" href="#add">Agregar o Modificar</a></li>
</ul>

<div class="tab-content">
	<div id="listas" class="tab-pane fade in active">
		<div id="dvLista">
			
		</div>
	</div>
	
	<div id="add" class="tab-pane fade">
		<form role="form" id="frmAdd" class="form-horizontal" onsubmit="javascript: return false;">
			<div class="box">
				<div class="box-body">
					<div class="form-group">
						<label for="txtClave" class="col-lg-2">Clave</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtClave" name="txtClave">
						</div>
					</div>
					<div class="form-group">
						<label for="selAlmacen" class="col-lg-2">Almacen</label>
						<div class="col-lg-3">
							<select id="selAlmacen" name="selAlmacen" class="form-control">
								{foreach from=$almacenes item="row"}
									<option value="{$row.idAlmacen}">{$row.nombre}</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="txtDescripcion" class="col-lg-2">Descripción</label>
						<div class="col-lg-6">
							<input class="form-control" id="txtDescripcion" name="txtDescripcion">
						</div>
					</div>
					<div class="form-group">
						<label for="txtPrecio" class="col-lg-2">Precio</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtPrecio" name="txtPrecio">
						</div>
					</div>
					<div class="form-group">
						<label for="txtCosto" class="col-lg-2">Costo</label>
						<div class="col-lg-2">
							<input class="form-control" id="txtCosto" name="txtCosto">
						</div>
					</div>
					<div class="form-group">
						<label for="txtNota" class="col-lg-2">Notas</label>
						<div class="col-lg-3">
							<textarea id="txtNota" name="txtNota" rows="5" class="form-control"></textarea>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="reset" id="btnReset" class="btn btn-default">Cancelar</button>
					<button type="submit" class="btn btn-info pull-right">Guardar</button>
					<input type="hidden" id="id"/>
				</div>
			</div>
		</form>
	</div>
</div>