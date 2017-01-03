<?php /* Smarty version Smarty-3.1.11, created on 2017-01-03 12:21:38
         compiled from "templates/plantillas/modulos/productos/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54122588586595d46b9f35-94364204%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22ac6a6ed1638fe1ca74aa4bd027db4d0557e87d' => 
    array (
      0 => 'templates/plantillas/modulos/productos/panel.tpl',
      1 => 1483465789,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54122588586595d46b9f35-94364204',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586595d4734122_54528999',
  'variables' => 
  array (
    'almacenes' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586595d4734122_54528999')) {function content_586595d4734122_54528999($_smarty_tpl) {?><div class="row">
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
								<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['almacenes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['row']->value['idAlmacen'];?>
"><?php echo $_smarty_tpl->tpl_vars['row']->value['nombre'];?>
</option>
								<?php } ?>
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
</div><?php }} ?>