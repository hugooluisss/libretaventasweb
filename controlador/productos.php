<?php
global $objModulo;

switch($objModulo->getId()){
	case 'productos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from almacen where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("almacenes", $datos);
	break;
	case 'listaProductos':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from producto where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cproductos':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TProducto();
				
				$obj->setId($_POST['id']);
				$obj->almacen->setId($_POST['almacen']);
				$obj->setDescripcion($_POST['descripcion']);
				$obj->setPrecio($_POST['precio']);
				$obj->setCosto($_POST['costo']);
				$obj->setNota($_POST['nota']);
				$obj->setClave($_POST['clave']);
				
				if ($obj->guardar())
					$smarty->assign("json", array("band" => true, "identificador" => $obj->getId()));
				else
					$smarty->assign("json", array("band" => false));
				
			break;
			case 'del':
				$obj = new TProducto($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
			case 'validar':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select idProducto from producto where clave = '".$_POST['txtClave']."'");
				
				$result = true;
				if ($rs->EOF)
					$result = true;
				else{
					$result = ($rs->fields['idProducto'] == $_POST['id']);
				}
				
				$smarty->assign("json", $result);
			break;
			case 'get':
				$db = TBase::conectaDB();
				$rs = $db->Execute("select * from producto where clave = '".$_POST['clave']."'");
				
				$smarty->assign("json", $rs->fields);
			break;
		}
	break;
}
?>