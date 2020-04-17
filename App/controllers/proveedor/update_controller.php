<?php
require_once("../../app/models/proveedor.class.php");
try{
    
    if ($_GET['id']) {
        $proveedor = new Proveedor;
        $proveedor->setId($_GET['id']);
        $proveedor->readProveedor();
        if(isset($_POST['actualizar'])){
          $_POST = $proveedor->validateForm($_POST);
          if ($proveedor->setNombre($_POST['proveedor'])) {
            if ($proveedor->setEncargado($_POST['encargado'])) {
                if ($proveedor->setTelefono($_POST['telefono'])) {
                    if ($proveedor->setCorreo($_POST['correo'])) {
                        if ($proveedor->setDireccion($_POST['direccion'])) {
                            if ($proveedor->updateProveedor()) {
                                Page::showMessage(1, "Proveedor actualizado", "index.php");
                            } else {
                                Page::showMessage(2, "No se actualizo el proveedor", "update.php");
                            }
                        } else {
                            throw new Exception("Dirección incorrecta");
                        }
                    } else {
                        throw new Exception("Correo incorrecto");
                    }
                } else {
                    throw new Exception("Telefono incorrecto");
                }
            } else {
                throw new Exception("Encargado incorrecto");
            }
        } else {
            throw new Exception("Proveedor incorrecto");
        }
        }  
      }else {
        Page::showMessage(3, "Seleccione un proveedor", "index.php");
      }


}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/proveedor/update_view.php");
?>