<?php /* Smarty version Smarty-3.1.11, created on 2017-01-02 10:31:06
         compiled from "templates/plantillas/modulos/terminales/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1984107597586a804a5259d2-23848831%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0920e0651b910b1405f2c42226753d7e8c425a21' => 
    array (
      0 => 'templates/plantillas/modulos/terminales/panel.tpl',
      1 => 1483374631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1984107597586a804a5259d2-23848831',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586a804a5829a5_67683407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586a804a5829a5_67683407')) {function content_586a804a5829a5_67683407($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Terminales</h1>
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
						<label for="txtNombre" class="col-lg-2">Nombre</label>
						<div class="col-lg-3">
							<input class="form-control" id="txtNombre" name="txtNombre">
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