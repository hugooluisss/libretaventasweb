<?php
global $objModulo;

switch($objModulo->getId()){
	case 'libreta':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from producto where visible = true");
		$datos = array();
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("productos", $datos);
	break;
	case 'listaLibreta':
		$db = TBase::conectaDB();
		$rs = $db->Execute("select a.monto as saldo, b.*, c.nombre as nombreTipo, c.operacion from libreta a join movimiento b using(idLibreta) join tipomov c using(idTipo) where fecha = '".date("Y-m-d")."' order by hora desc");
		$datos = array();
		$monto = 0;
		$band = true;
		$anterior = 0;
		
		$smarty->assign("saldo", $rs->fields['saldo']);
		
		while(!$rs->EOF){
			$rs->fields['json'] = json_encode($rs->fields);
			if ($band){
				switch($rs->fields['operacion']){
					case '-': $precio = $rs->fields['precio'] * -1; break;
					default: $precio = $rs->fields['precio']; break;
				}
				
				$monto += $precio;
				$band = $rs->fields['clave'] == '---'?false:true;
			}
			$rs->fields["band"] = $band;
			array_push($datos, $rs->fields);
			$rs->moveNext();
		}
		
		$smarty->assign("lista", $datos);
		$smarty->assign("monto", $monto);
	break;
	case 'clibreta':
		switch($objModulo->getAction()){
			case 'addMovimiento':
				$db = TBase::conectaDB();
				$obj = new TProducto;
				$libreta = new TLibreta();
				
				switch($_POST['tipo']){
					case 3:
						$band = $libreta->addMovimiento(3, "---", "Nueva venta", 0, "");
					break;
					case 1:
						$obj->setId($_POST['producto']);
						$band = $libreta->addMovimiento(1, $obj->getClave(), $obj->getDescripcion()." ".($_POST['nota'] == ''?'':('<b>'.$_POST['nota'].'</b>')), $obj->getPrecio(), $obj->json);
					break;
					case 2:
						$band = $libreta->addMovimiento($_POST['tipo'], "", $_POST['nota'], $_POST['monto'], "");
					break;
					default:
						$rs = $db->Execute("select idProducto from producto where clave = '".$_POST['clave']."'");
						$obj = new TProducto($rs->fields['idProducto']);
						$band = $libreta->addMovimiento($_POST['tipo'], $obj->getClave(), $obj->getDescripcion()." ".$_POST['nota'], $obj->getPrecio(), "");
					break;
				}
				
				$smarty->assign("json", array("band" => $band));
			break;
		}
	break;
}
?>