<?php
/**
* TProductos
* Productos
* @package aplicacion
* @autor Hugo Santiago hugooluisss@gmail.com
**/

class TProducto{
	private $idProducto;
	public $almacen;
	private $descripcion;
	private $clave;
	private $precio;
	private $costo;
	private $nota;
	public $json;
	
	/**
	* Constructor de la clase
	*
	* @autor Hugo
	* @access public
	* @param int $id identificador del objeto
	*/
	public function TProducto($id = ''){
		$this->almacen = new TAlmacen;
		$this->setId($id);		
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
	
	public function setId($id = ''){
		if ($id == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("select * from producto where idProducto = ".$id);
		
		foreach($rs->fields as $field => $val){
			switch($field){
				case 'idAlmacen':
					$this->almacen = new TAlmacen($val);
				break;
				default:
					$this->$field = $val;
				break;
			}
		}
		
		$this->json = json_encode($this->fields);
		
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
		return $this->idProducto;
	}
	
	/**
	* Establece la clave
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setClave($val = ''){
		$this->clave = $val;
		return true;
	}
	
	/**
	* Retorna la clave
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getClave(){
		return $this->clave;
	}
	
	/**
	* Establece la descripción
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setDescripcion($val = ''){
		$this->descripcion = $val;
		return true;
	}
	
	/**
	* Retorna la descripcion
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getDescripcion(){
		return $this->descripcion;
	}
	
	/**
	* Establece el precio
	*
	* @autor Hugo
	* @access public
	* @param float $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setPrecio($val = 0){
		$this->precio = $val;
		return true;
	}
	
	/**
	* Retorna el precio
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getPrecio(){
		return $this->precio == ''?0:$this->precio;
	}
	
	/**
	* Establece el costo
	*
	* @autor Hugo
	* @access public
	* @param float $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setCosto($val = 0){
		$this->costo = $val;
		return true;
	}
	
	/**
	* Retorna el costo
	*
	* @autor Hugo
	* @access public
	* @return float Texto
	*/
	
	public function getCosto(){
		return $this->costo == ''?0:$this->costo;
	}
	
	/**
	* Establece la nota
	*
	* @autor Hugo
	* @access public
	* @param string $val Valor a asignar
	* @return boolean True si se realizó sin problemas
	*/
	
	public function setNota($val = ''){
		$this->nota = $val;
		return true;
	}
	
	/**
	* Retorna la nota
	*
	* @autor Hugo
	* @access public
	* @return string Texto
	*/
	
	public function getNota(){
		return $this->nota;
	}
		
	/**
	* Guarda los datos en la base de datos, si no existe un identificador entonces crea el objeto
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function guardar(){
		if ($this->almacen->getId() == '') return false;
		$db = TBase::conectaDB();
		
		if ($this->getId() == ''){
			$rs = $db->Execute("INSERT INTO producto(idAlmacen, clave) VALUES(".$this->almacen->getId().", '".$this->getClave()."');");
			if (!$rs) return false;
				
			$this->idProducto = $db->Insert_ID();
		}		
		
		if ($this->getId() == '')
			return false;
			
		$rs = $db->Execute("UPDATE producto
			SET
				clave = '".$this->getClave()."',
				idAlmacen = ".$this->almacen->getId().",
				descripcion = '".$this->getDescripcion()."',
				precio = ".$this->getPrecio().",
				costo = ".$this->getCosto().",
				nota = '".$this->getNota()."'
			WHERE idProducto = ".$this->getId());
			
			$db->Execute("update movimiento set descripcion = '".$this->getDescripcion()."' where clave = '".$this->getClave()."' and descripcion = ''");
			
		return $rs?true:false;
	}
	
	/**
	* Elimina el objeto de la base de datos
	*
	* @autor Hugo
	* @access public
	* @return boolean True si se realizó sin problemas
	*/
	
	public function eliminar(){
		if ($this->getId() == '') return false;
		
		$db = TBase::conectaDB();
		$rs = $db->Execute("update producto set visible = false where idProducto = ".$this->getId());
		
		return $rs?true:false;
	}
}
?>