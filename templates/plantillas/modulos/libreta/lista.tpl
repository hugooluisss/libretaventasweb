<div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-info"><h2><b>Monto a cobrar </b> $ <span class="text-danger">{$monto|string_format:"%.2f"}</span></h2></div>
			</div>
			<div class="col-md-6">
				<div class="alert alert-warning"><h2><b>Saldo del dia </b> $ <span class="text-danger">{$saldo|string_format:"%.2f"}</span></h2></div>
			</div>
		</div>
		<table id="tblDatos" class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>Tipo</th>
					<th>Hora</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$lista item="row"}
					<tr>
						<td {if $row.idTipo neq 1}style="border-left: 5px solid red"{/if}>{$row.nombreTipo}</td>
						<td>{$row.hora}</td>
						<td>{$row.clave}</td>
						<td>{$row.descripcion}</td>
						<td>{$row.precio}</td>
						<td style="text-align: right">
							{if $row.band}
								<button type="button" class="btn btn-danger" action="cancelar" title="Cancelar" identificador="{$row.clave}"><i class="fa fa-times"></i></button>
							{/if}
						</td>
					</tr>
				{foreachelse}
					<tr>
						<td colspan="5" class="text-center">
							Sin ventas
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
	</div>
</div>