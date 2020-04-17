<?php
require_once("../../app/models/tipo_producto.class.php");
try{
    if ($_GET['id']) {
      $tipo = new Tipo;
      $tipo->setId($_GET['id']);
      $tipo->readTipo();
      if(isset($_POST['actualizar'])){
        $_POST = $tipo->validateForm($_POST);
        if($tipo->setTipo($_POST['nombre'])){
            
            if($tipo->updateTipo()){
                Page::showMessage(1, "Tipo de producto modificado", "index.php");
            }else {
                Page::showMessage(2, "No se modifico", null);
            }
        }else{
            throw new Exception("Nombre incorrecto");
        }
    }
    }else {
      Page::showMessage(3, "Seleccione un tipo de producto", "index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/tipo_producto/update_view.php");
?>