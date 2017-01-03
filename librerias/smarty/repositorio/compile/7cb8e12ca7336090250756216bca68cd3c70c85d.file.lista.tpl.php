<?php /* Smarty version Smarty-3.1.11, created on 2017-01-03 10:18:14
         compiled from "templates/plantillas/modulos/libreta/lista.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1597028381586b34996217b8-96236519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cb8e12ca7336090250756216bca68cd3c70c85d' => 
    array (
      0 => 'templates/plantillas/modulos/libreta/lista.tpl',
      1 => 1483460292,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1597028381586b34996217b8-96236519',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_586b34996b5427_03689215',
  'variables' => 
  array (
    'monto' => 0,
    'saldo' => 0,
    'lista' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586b34996b5427_03689215')) {function content_586b34996b5427_03689215($_smarty_tpl) {?><div class="box">
	<div class="box-body">
		<div class="row">
			<div class="col-md-6">
				<div class="alert alert-info"><h2><b>Monto a cobrar </b> $ <span class="text-danger"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['monto']->value);?>
</span></h2></div>
			</div>
			<div class="col-md-6">
				<div class="alert alert-warning"><h2><b>Saldo del dia </b> $ <span class="text-danger"><?php echo sprintf("%.2f",$_smarty_tpl->tpl_vars['saldo']->value);?>
</span></h2></div>
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
				<?php  $_smarty_tpl->tpl_vars["row"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["row"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['lista']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["row"]->key => $_smarty_tpl->tpl_vars["row"]->value){
$_smarty_tpl->tpl_vars["row"]->_loop = true;
?>
					<tr>
						<td <?php if ($_smarty_tpl->tpl_vars['row']->value['idTipo']!=1){?>style="border-left: 5px solid red"<?php }?>><?php echo $_smarty_tpl->tpl_vars['row']->value['nombreTipo'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['hora'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['descripcion'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['row']->value['precio'];?>
</td>
						<td style="text-align: right">
							<?php if ($_smarty_tpl->tpl_vars['row']->value['band']){?>
								<button type="button" class="btn btn-danger" action="cancelar" title="Cancelar" identificador="<?php echo $_smarty_tpl->tpl_vars['row']->value['clave'];?>
"><i class="fa fa-times"></i></button>
							<?php }?>
						</td>
					</tr>
				<?php }
if (!$_smarty_tpl->tpl_vars["row"]->_loop) {
?>
					<tr>
						<td colspan="5" class="text-center">
							Sin ventas
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div><?php }} ?>