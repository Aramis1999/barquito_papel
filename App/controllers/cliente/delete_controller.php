<?php
require_once("../../app/models/cliente.class.php");
try{
	if(isset($_GET['id'])){
		$cliente = new Cliente;
		if($cliente->setId($_GET['id'])){
			if($cliente->readCliente()){
				if(isset($_POST['delete'])){
					if($cliente->deleteCliente()){
						Page::showMessage(1, "Cliente eliminado", "index.php");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Cliente inexistente");
			}
		}else{
			throw new Exception("Cliente incorrecta");
		}
	}else{
		Page::showMessage(3, "Seleccione un cliente", "index.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/cliente/delete_view.php");
?>