<?php /* Smarty version Smarty-3.1.11, created on 2017-01-02 10:43:37
         compiled from "templates/plantillas/modulos/almacenes/panel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102960205586a83398b0a25-16687378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '596c6592721e4dbada7d8810da950c646ab54469' => 
    array (
      0 => 'templates/plantillas/modulos/almacenes/panel.tpl',
      1 => 1483375395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102960205586a83398b0a25-16687378',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586a83398f8eb3_85980602',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586a83398f8eb3_85980602')) {function content_586a83398f8eb3_85980602($_smarty_tpl) {?><div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Almacenes</h1>
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