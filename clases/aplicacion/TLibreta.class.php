<?php
/**
* TLibreta
* Control de la libreta diaria
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TLibreta{
	private $idLibreta;
	public $usuario;
	private $fecha;
	private $monto;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TLibreta(){
		$this->getData();
		return true;
	}
	
	/**
	* Carga los datos del objeto
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	* @return boolean True si se realizó sin problemas
	*/
	
	public function getData(){
		global $userSesion;
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from libreta where fecha = '".date("Y-m-d")."' and idUsuario = ".$userSesion->getId()."");
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idUsuario':
					$this->usuario = new TUsuario($val);
				break;
				default:
					$this->$field = $val;
			}
		}
		
		return true;
	}
	
	/**
	* Retorna el identificador del objeto
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getId(){
		return $this->idLibreta;
	}
	
	/**
	* Retorna la fecha
	*
	* @autor Hugo
	* @access public
	* @return integer identificador
	*/
	
	public function getFecha(){
		return $this->fecha;
	}
			
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function crear(){
		$db = TBase::conectaDB();
		global $userSesion;
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO libreta(fecha, idUsuario, monto) VALUES(now(), ".$userSesion->getId().", 0);");
			if (!$rs) return false;
		
			$this->idLibreta = $db->Insert_ID();
			$this->usuario = new TUsuario($userSesion->getId());
			$this->monto = 0;
			$this->fecha = date("Y-m-d");
		}		
		
		return true;
	}
	
	/**
	* Agrega un movimiento a la libreta del dia de hoy
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function addMovimiento($tipo = 1, $clave, $descripcion, $precio = 0, $json){
		if ($this->getId() == ''){
			if (!$this->crear())
				return false;
		}
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("INSERT INTO movimiento(idLibreta, hora, idTipo, clave, descripcion, precio, json) VALUES(".$this->getId().", now(), ".$tipo.", '".$clave."', '".$descripcion."', ".$precio.", '".$json."');");
		
		if (!$rs) return false;
		else{
			$rs = $db->Execute("select operacion from tipomov where idTipo = ".$tipo);
			switch($rs->fields['operacion']){
				case '-': $precio = $precio * -1; break;
			}
			
			$db->Execute("update libreta set monto = monto + ".$precio." where idLibreta = ".$this->getId());
		}
		
		return true;
	}
}
?>