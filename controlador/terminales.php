<?php
global $objModulo;

switch($objModulo->getId()){
	case 'listaTerminales':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from terminal");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		$smarty->assign("lista", $datos);
	break;
	case 'cterminales':
		switch($objModulo->getAction()){
			case 'add':
				$db = TBase::conectaDB();
				$obj = new TTerminal();
				
				$obj->setId($_POST['id']);
				$obj->setNombre($_POST['nombre']);
				
				if ($obj->guardar())
					$smarty->assign("json", array("band" => true));
				else
					$smarty->assign("json", array("band" => false));
				
			break;
			case 'del':
				$obj = new TTerminal($_POST['id']);
				$smarty->assign("json", array("band" => $obj->eliminar()));
			break;
		}
	break;
}
?>