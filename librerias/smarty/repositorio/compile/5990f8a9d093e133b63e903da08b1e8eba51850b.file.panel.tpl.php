<?php /* Smarty version Smarty-3.1.11, created on 2017-01-03 22:20:37
         compiled from "templates/plantillas/modulos/libreta/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1009288986586b33f1a58049-38632940%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5990f8a9d093e133b63e903da08b1e8eba51850b' => 
    array (
      0 => 'templates/plantillas/modulos/libreta/panel.tpl',
      1 => 1483503571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1009288986586b33f1a58049-38632940',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586b33f1aa6fc2_37293729',
  'variables' => 
  array (
    'productos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586b33f1aa6fc2_37293729')) {function content_586b33f1aa6fc2_37293729($_smarty_tpl) {?><div class="row">
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

<div class="modal fade" id="winProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3>Productos</h3>
			</div>
			<div class="modal-body">
				<table id="tblDatos" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Código</th>
							<th>Descripción</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['productos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
							<tr datos='<?php echo $_smarty_tpl->tpl_vars['row']->value['json'];?>
'>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
							</tr>
						<?php }
if (!$_smarty_tpl->tpl_vars["row"]->_loop) {
?>
							<tr>
								<td colspan="3" class="text-center">
									Sin productos en el catálogo
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Guardar</button>
			</div>
		</div>
	</div>
</div><?php }} ?>