<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaAlmacenes':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from almacen where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'calmacenes':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TAlmacen();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				
				if ($obj->guardar())
					$smarty->assign("json", array("band" => true));
				else
					$smarty->assign("json", array("band" => false));
				
			break;
			case 'del':
				$obj = new TAlmacen($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>