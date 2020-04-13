<?php
require_once("../../app/models/tipo_producto.class.php");
try{
	#isset se ocupa para saber si una variable esta definida en este caso el $_POST['id'] 
	#En este caso solo se definira cuando manden datos por get a travez de la url 
	if(isset($_GET['id'])){
		#Se crea una instancia de la clase Usuarios
		$tipo = new Tipo;
		#Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
		if($tipo->setId($_GET['id'])){
            echo ("si lo agarre");
			 #Se ejecuta el metodo para leer usuario
			if($tipo->readTipo()){
                echo ("si lo lei");
				#isset se ocupa para saber si una variable esta definida en este caso el $_POST['delete'] 
				#En este caso solo se definira cuando manden datos por Post a travez de un submit 
				if(isset($_POST['delete'])){
					#Se ejecuta el metodo eliminar usuario
					if($tipo->deleteTipo()){
						#Se llama al metodo showMessage y se le pasan los argumentos indicados
						Page::showMessage(1, "Tipo de producto eliminado", "index.php");
					}else{
						#Se lanza una Exception obteniendo su argumento de la clase Database
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Tipo de producto inexistente");
			}
		}else{
			throw new Exception("Tipo de producto incorrecto");
		}
	}else{
		Page::showMessage(3, "Seleccione un Tipo de producto", "index.php");
	}
	#Se captura la exception
}catch(Exception $error){
	 #Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/tipo_producto/delete_view.php");
?>