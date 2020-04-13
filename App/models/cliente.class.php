<?php
class Cliente extends Validator{
    private $id = null;
    private $nombre = null;
    private $apellido = null;
    private $telefono = null;
    private $correo = null;
    private $motivo = null;

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

    public function setApellido($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->apellido = $value;
            return true;
        }else{
            return false;
        }
    }

    public function getApellido(){
        return $this->apellido;
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

    public function setMotivo($value){
        if($this->validateAlphanumeric($value,1,500)){
            $this->motivo = $value;
            return true;
        }else{
            return false;
        }
    }
    
    public function getMotivo(){
        return $this->motivo;
    }

    public function createCliente(){    
        $sql = "INSERT INTO clientes(nombres,apellidos,telefono,correo,motivo) VALUES(?,?,?,?,?)";
        $params = array($this->nombre,$this->apellido,$this->telefono,$this->correo,$this->motivo);
        return Database::executeRow($sql, $params);
    }
    public function readCliente(){
		$sql = "SELECT nombres, apellidos, telefono, correo, motivo FROM clientes WHERE id_cliente = ?";
        $params = array($this->id);
		$cliente = Database::getRow($sql, $params);
		if($cliente){
			$this->nombre = $cliente['nombres'];
			$this->apellido = $cliente['apellidos'];
            $this->telefono = $cliente['telefono'];
            $this->correo = $cliente['correo'];
            $this->motivo = $cliente['motivo'];   
			return true;
		}else{
			return null;
		}
	}
    public function updateCliente(){
        $sql = "UPDATE clientes SET nombres = ? , apellidos = ? , telefono = ? , correo = ? , motivo = ? WHERE id_cliente = ?";
        $params = array($this->nombre,$this->apellido,$this->telefono,$this->correo,$this->motivo,$this->id);
        return Database::executeRow($sql, $params);
    }
    public function deleteCliente(){
        $sql = "DELETE FROM clientes WHERE id_cliente = ?";
        $params = array($this->id);
		return Database::executeRow($sql, $params);
	}
    public function searchCliente($value){
        $sql = "SELECT * FROM clientes WHERE apellidos like  ? ORDER BY apellidos";
        $params = array("%$value%");
		return Database::getRows($sql, $params);
    }
    
    public function getClientes(){
        $sql = "SELECT * FROM clientes ORDER BY apellidos";
        $params = array(null);
		return Database::getRows($sql, $params);
	}

}
?>