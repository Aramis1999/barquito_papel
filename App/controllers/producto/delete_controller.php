<?php
require_once("../../app/models/producto.class.php");
try{
	if(isset($_GET['id'])){
		$producto = new Producto;
		if($producto->setId($_GET['id'])){
			if($producto->readProducto()){
				if(isset($_POST['delete'])){
					if($producto->deleteProducto()){
						Page::showMessage(1, "Producto eliminado", "index.php");
					}else{
						throw new Exception(Database::getException());
					}
				}
			}else{
				throw new Exception("Producto inexistente");
			}
		}else{
			throw new Exception("Producto incorrecta");
		}
	}else{
		Page::showMessage(3, "Seleccione un producto", "index.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "index.php");
}
require_once("../../app/views/producto/delete_view.php");
?>