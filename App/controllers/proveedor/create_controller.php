<?php
require_once("../../app/models/proveedor.class.php");
try{
    $proveedor = new Proveedor;
    
    if(isset($_POST['crear'])){
        $_POST = $proveedor->validateForm($_POST);
        if ($proveedor->setNombre($_POST['proveedor'])) {
            if ($proveedor->setEncargado($_POST['encargado'])) {
                if ($proveedor->setTelefono($_POST['telefono'])) {
                    if ($proveedor->setCorreo($_POST['correo'])) {
                        if ($proveedor->setDireccion($_POST['direccion'])) {
                            if ($proveedor->createProveedor()) {
                                Page::showMessage(1, "Proveedor creado", "index.php");
                            } else {
                                Page::showMessage(2, "No se creo el usuario", "create.php");
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
}catch(Exception $error){
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/proveedor/create_view.php");
?>