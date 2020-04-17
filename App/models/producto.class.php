<?php
class Producto extends Validator{
	//Declaración de propiedades
	private $id = null;
  	private $proveedor = null;
  	private $tipo = null;
	private $nombre = null;
	private $descripcion = null;
	private $precio = null;
  	private $existencia = null;
	private $imagen = null;


	//Métodos para sobrecarga de propiedades
	public function setId($value){
		if($this->validateId($value)){
			$this->id = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId(){
		return $this->id;
	}

  public function setProveedor($value){
    if($this->validateId($value)){
      $this->proveedor = $value;
      return true;
    }else{
      return false;
    }
  }
  public function getProveedor(){
    return $this->proveedor;
  }

  public function setTipo($value){
    if($this->validateId($value)){
      $this->tipo = $value;
      return true;
    }else{
      return false;
    }
  }
  public function getTipo(){
    return $this->tipo;
  }

	public function setNombre($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->nombre = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function setDescripcion($value){
		if($this->validateAlphanumeric($value, 1, 200)){
			$this->descripcion = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setPrecio($value){
		if($this->validateMoney($value)){
			$this->precio = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPrecio(){
		return $this->precio;
	}

  public function setExistencia($value){
		if($this->validateId($value)){
			$this->existencia = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getExistencia(){
		return $this->existencia;
	}

	//Elementos de la imagen
	public function setImagen($file){
		if($this->validateImage($file, $this->imagen, "../../web/img/productos/", 500, 500)){
			$this->imagen = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/productos/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
	}



	//Metodos para el manejo del CRUD
	public function getProveedores(){
		$sql = "SELECT id_proveedor, nombre FROM proveedores";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

  public function getTipos(){
		$sql = "SELECT id_tipo_producto, nombre FROM tipos_producto";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	
	public function getProductos(){
		$sql = "SELECT id_producto, pv.nombre AS nombre_pv, tp.nombre AS nombre_tp, p.nombre AS nombre_p, descripcion, precio, existencias FROM productos p INNER JOIN proveedores pv USING(id_proveedor) INNER JOIN tipos_producto tp USING(id_tipo_producto) ORDER BY p.nombre";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchProducto($value){
		$sql = "SELECT id_producto, pv.nombre AS nombre_pv, tp.nombre AS nombre_tp, p.nombre AS nombre_p, descripcion, precio, existencias FROM productos p INNER JOIN proveedores pv USING(id_proveedor) INNER JOIN tipos_producto tp USING(id_tipo_producto) WHERE p.nombre LIKE ? ORDER BY p.nombre";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createProducto(){
		$sql = "INSERT INTO productos (id_proveedor, id_tipo_producto, nombre, descripcion, precio, existencias) VALUES (?, ?, ?, ?, ?, ?)";
		$params = array($this->proveedor, $this->tipo, $this->nombre, $this->descripcion, $this->precio, $this->existencia);
		return Database::executeRow($sql, $params);
	}

	public function readProducto(){
		$sql = "SELECT id_proveedor, id_tipo_producto, nombre, descripcion, precio, existencias FROM productos WHERE id_producto = ?";
		$params = array($this->id);
		$producto = Database::getRow($sql, $params);
		if($producto){
			$this->proveedor = $producto['id_proveedor'];
			$this->tipo = $producto['id_tipo_producto'];
			$this->nombre = $producto['nombre'];
			$this->descripcion = $producto['descripcion'];
			$this->existencia = $producto['existencias'];
			$this->precio = $producto['precio'];
			return true;
		}else{
			return null;
		}
	}

	public function updateProducto(){
		$sql = "UPDATE productos SET id_proveedor = ? , id_tipo_producto= ? , nombre= ? , descripcion= ? , precio = ? , existencias= ? WHERE id_producto = ?";
		$params = array($this->proveedor, $this->tipo, $this->nombre, $this->descripcion, $this->precio, $this->existencia, $this->id);
		return Database::executeRow($sql, $params);
	}

	public function deleteProducto(){
		$sql = "DELETE FROM productos WHERE id_producto = ?";
		$params = array($this->id);
		return Database::executeRow($sql, $params);
	}

	
}
?>
