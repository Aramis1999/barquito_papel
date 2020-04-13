<?php
require_once("../../app/models/cliente.class.php");
try{
    $cliente = new Cliente;
    
    if(isset($_POST['crear'])){
        $_POST = $cliente->validateForm($_POST);
        if ($cliente->setNombre($_POST['nombre'])) {
            if ($cliente->setApellido($_POST['apellido'])) {
                if ($cliente->setTelefono($_POST['telefono'])) {
                    if ($cliente->setCorreo($_POST['correo'])) {
                        if ($cliente->setMotivo($_POST['motivo'])) {
                            if ($cliente->createCliente()) {
                                Page::showMessage(1, "Cliente creado", "index.php");
                            } else {
                                Page::showMessage(2, "No se creo el usuario", "create.php");
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
}catch(Exception $error){
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/cliente/create_view.php");
?>