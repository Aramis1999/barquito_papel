<?php
class Proveedor extends Validator{
    private $id = null;
    private $nombre = null;
    private $encargado = null;
    private $telefono = null;
    private $correo = null;
    private $direccion = null;

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

    public function setNombre($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->nombre = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setEncargado($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->encargado = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getEncargado(){
        return $this->encargado;
    }


    public function setTelefono($value){
        if($this->validateNumeric($value,1,8)){
            $this->telefono = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setCorreo($value){
		if($this->validateEmail($value)){
			$this->correo = $value;
			return true;
		}else{
			return false;
		}
    }

    public function getCorreo(){
		return $this->correo;
    }

    public function setDireccion($value){
        if($this->validateAlphanumeric($value,1,255)){
            $this->direccion = $value;
            return true;
        }else{
            return false;
        }
    }
    
    public function getDireccion(){
        return $this->direccion;
    }

    public function createProveedor(){    
        $sql = "INSERT INTO proveedores(nombre,encargado,telefono,correo,direccion) VALUES(?,?,?,?,?)";
        $params = array($this->nombre,$this->encargado,$this->telefono,$this->correo,$this->direccion);
        return Database::executeRow($sql, $params);
    }
    public function readProveedor(){
		$sql = "SELECT nombre, encargado, telefono, correo, direccion FROM proveedores WHERE id_proveedor = ?";
        $params = array($this->id);
		$proveedor = Database::getRow($sql, $params);
		if($proveedor){
			$this->nombre = $proveedor['nombre'];
			$this->encargado = $proveedor['encargado'];
            $this->telefono = $proveedor['telefono'];
            $this->correo = $proveedor['correo'];
            $this->direccion = $proveedor['direccion'];   
			return true;
		}else{
			return null;
		}
	}
    public function updateProveedor(){
        $sql = "UPDATE proveedores SET nombre= ? , encargado = ? , telefono = ? , correo = ? , direccion = ? WHERE id_proveedor = ?";
        $params = array($this->nombre,$this->encargado,$this->telefono,$this->correo,$this->direccion,$this->id);
        return Database::executeRow($sql, $params);
    }
    public function deletProveedor(){
        $sql = "DELETE FROM proveedores WHERE id_proveedor = ?";
        $params = array($this->id);
		return Database::executeRow($sql, $params);
	}
    public function searchProveedor($value){
        $sql = "SELECT * FROM proveedores WHERE nombre like  ? ORDER BY nombre";
        $params = array("%$value%");
		return Database::getRows($sql, $params);
    }
    
    public function getProveedores(){
        $sql = "SELECT * FROM proveedores ORDER BY nombre";
        $params = array(null);
		return Database::getRows($sql, $params);
	}

}
?>