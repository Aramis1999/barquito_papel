<?php
require_once("../../app/models/cliente.class.php");
try{
    
    if ($_GET['id']) {
        $cliente = new Cliente;
        $cliente->setId($_GET['id']);
        $cliente->readCliente();
        if(isset($_POST['actualizar'])){
          $_POST = $cliente->validateForm($_POST);
          if ($cliente->setNombre($_POST['nombre'])) {
            if ($cliente->setApellido($_POST['apellido'])) {
                if ($cliente->setTelefono($_POST['telefono'])) {
                    if ($cliente->setCorreo($_POST['correo'])) {
                        if ($cliente->setMotivo($_POST['motivo'])) {
                            if ($cliente->updateCliente()) {
                                Page::showMessage(1, "Cliente modificado", "index.php");
                            } else {
                                Page::showMessage(2, "No se modifico el cliente", "update.php");
                            }
                        } else {
                            throw new Exception("Motivo incorrecto");
                        }
                    } else {
                        throw new Exception("Correo incorrecto");
                    }
                } else {
                    throw new Exception("Telefono incorrecto");
                }
            } else {
                throw new Exception("Apellido incorrecto");
            }
        } else {
            throw new Exception("Nombre incorrecto");
        }
        }  
      }else {
        Page::showMessage(3, "Seleccione usuario", "index.php");
      }


}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/cliente/update_view.php");
?>