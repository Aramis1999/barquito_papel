<?php

class Tipo extends Validator{

    private $id = null;
    private $tipo = null;

    public function setId($value){
        if($this->validateId($value)){
            $this->id = $value;
            return true;
        }else{
            return false;
        }
    }
    //Funcion para recolectar el id
    public function getId(){
        return $this->id;
    }

    public function setTipo($value){
        if($this->validateAlphanumeric($value,1,50)){
            $this->tipo = $value;
            return true;
        }else{
            return false;
        }
    }
    //Funcion para recolectar el nombre
    public function getTipo(){
        return $this->tipo;
    }

    public function searchTipo($value){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM tipos_producto WHERE nombre like  ? ORDER BY nombre";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array("%$value%");
        #Retorna los datos que devuelve el metodo getRows 
        return Database::getRows($sql, $params);
    }

    public function getTipos(){
        #Se guarda la consulta en una variable
        $sql = "SELECT * FROM tipos_producto ORDER BY nombre";
        #se guardan los parametros (datos recogidos) en una variable,como un arreglo
        $params = array(null);
        #Retorna los datos que devuelve el metodo getRows 
        return Database::getRows($sql, $params);
    }

    public function createTipo(){
        $sql = "INSERT INTO tipos_producto(nombre) VALUES(?)";
        $params = array($this->tipo);
        return Database::executeRow($sql,$params);
    }

    public function readTipo(){
        $sql = "SELECT nombre FROM tipos_producto WHERE id_tipo_producto = ? ";
        $params = array($this->id);
        $tipo = Database::getRow($sql, $params);
        if($tipo){
            #Se guardan los datos obtenidos en las variables pertenecientes a la clase
			$this->tipo = $tipo['nombre'];
			return true;
		}else{
			return null;
        }
    }

    public function deleteTipo(){
        $sql = "DELETE FROM tipos_producto WHERE id_tipo_producto = ? ";
        $params = array($this->id);
        return Database::executeRow($sql,$params);
    }

    public function updateTipo(){
        $sql = "UPDATE tipos_producto SET nombre = ? WHERE id_tipo_producto = ? ";
        $params = array($this->tipo, $this->id);
        return Database::executeRow($sql,$params);
    }

}

?>