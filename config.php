<?php
define('SISTEMA', 'Domi');
define('VERSION', 'v 1.0');
define('ALIAS', '');
define('AUTOR', 'Hugo Luis Santiago Altamirano');
define('EMAIL', 'hugooluisss@gmail.com');
define('EMAILSOPORTE', 'hugooluisss@gmail.com');
define('STATUS', 'En desarrollo');

define('LAYOUT_DEFECTO', 'layout/default.tpl');
define('LAYOUT_AJAX', 'layout/update.tpl');
define('LAYOUT_JSON', 'layout/json.tpl');

#Login y su controlador
$conf['inicio'] = array(
	'descripcion' => '',
	'seguridad' => false,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('login.js'),
	'capa' => 'layout/login.tpl');

$conf['logout'] = array(
	'controlador' => 'login.php',
	#'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Salir del sistema',
	'seguridad' => false,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);
	
$conf['clogin'] = array(
	'controlador' => 'login.php',
	'descripcion' => 'Inicio de sesion',
	'seguridad' => false,
	'capa' => LAYOUT_JSON);
	
$conf['bienvenida'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/bienvenida.tpl',
	'descripcion' => 'Bienvenida al sistema',
	'seguridad' => true,
	'capa' => LAYOUT_DEFECTO);

$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'perfiles' => array(1),
	'capa' => LAYOUT_DEFECTO);

$conf['listaUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/lista.tpl',
	'descripcion' => 'Lista de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_AJAX);
	
$conf['cusuarios'] = array(
	'controlador' => 'usuarios.php',
	'descripcion' => 'Controlador de usuarios',
	'seguridad' => true,
	'capa' => LAYOUT_JSON);
	
/*Datos de usuario desde el panel*/
$conf['usuarioDatosPersonales'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/datosPersonales.tpl',
	'descripcion' => 'Cambiar datos personales',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('datosUsuario.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['admonUsuarios'] = array(
	'controlador' => 'usuarios.php',
	'vista' => 'usuarios/panel.tpl',
	'descripcion' => 'Administración de usuarios',
	'seguridad' => true,
	'js' => array('usuario.class.js'),
	'jsTemplate' => array('usuarios.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['panelPrincipal'] = array(
	#'controlador' => 'index.php',
	'vista' => 'inicio.tpl',
	'descripcion' => 'Vista del panel',
	'seguridad' => true,
	'js' => array(),
	'capa' => LAYOUT_DEFECTO);

/*Productos*/
$conf['productos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/panel.tpl',
	'descripcion' => 'Administración de productos',
	'js' => array('producto.class.js'),
	'jsTemplate' => array('productos.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaProductos'] = array(
	'controlador' => 'productos.php',
	'vista' => 'productos/lista.tpl',
	'descripcion' => 'Lista de productos',
	'capa' => LAYOUT_AJAX);

$conf['cproductos'] = array(
	'controlador' => 'productos.php',
	'descripcion' => 'Controlador de productos',
	'capa' => LAYOUT_JSON);
	
/*Terminales*/
$conf['terminales'] = array(
	'controlador' => 'terminales.php',
	'vista' => 'terminales/panel.tpl',
	'descripcion' => 'Administración de las terminales',
	'js' => array('terminal.class.js'),
	'jsTemplate' => array('terminales.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaTerminales'] = array(
	'controlador' => 'terminales.php',
	'vista' => 'terminales/lista.tpl',
	'descripcion' => 'Lista de terminales',
	'capa' => LAYOUT_AJAX);

$conf['cterminales'] = array(
	'controlador' => 'terminales.php',
	'descripcion' => 'Controlador de terminales',
	'capa' => LAYOUT_JSON);
	
/*Terminales*/
$conf['almacenes'] = array(
	'controlador' => 'almacenes.php',
	'vista' => 'almacenes/panel.tpl',
	'descripcion' => 'Administración de los almacenes',
	'js' => array('almacen.class.js'),
	'jsTemplate' => array('almacenes.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaAlmacenes'] = array(
	'controlador' => 'almacenes.php',
	'vista' => 'almacenes/lista.tpl',
	'descripcion' => 'Lista de almacenes',
	'capa' => LAYOUT_AJAX);

$conf['calmacenes'] = array(
	'controlador' => 'almacenes.php',
	'descripcion' => 'Controlador de almacenes',
	'capa' => LAYOUT_JSON);
	
/*Productos*/
$conf['libreta'] = array(
	'controlador' => 'libreta.php',
	'vista' => 'libreta/panel.tpl',
	'descripcion' => 'Administración de la libreta',
	'js' => array('libreta.class.js', 'producto.class.js'),
	'jsTemplate' => array('libreta.js'),
	'capa' => LAYOUT_DEFECTO);
	
$conf['listaLibreta'] = array(
	'controlador' => 'libreta.php',
	'vista' => 'libreta/lista.tpl',
	'descripcion' => 'Lista de ventas en la libreta',
	'capa' => LAYOUT_AJAX);

$conf['clibreta'] = array(
	'controlador' => 'libreta.php',
	'descripcion' => 'Controlador de libreta',
	'capa' => LAYOUT_JSON);
?>