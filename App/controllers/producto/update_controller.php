<?php
require_once("../../app/models/producto.class.php");
try{
    if ($_GET['id']) {
      $producto = new Producto;
      $producto->setId($_GET['id']);
      $producto->readProducto();
      if(isset($_POST['actualizar'])){
        $_POST = $producto->validateForm($_POST);
        if ($producto->setProveedor($_POST['proveedor'])) {
          if ($producto->setTipo($_POST['tipo'])) {
              if($producto->setNombre($_POST['nombre'])){
                  if($producto->setDescripcion($_POST['descripcion'])){
                      if($producto->setPrecio($_POST['precio'])){
                          if ($producto->setExistencia($_POST['existencia'])){
                            if ($producto->updateProducto()) {
                                Page::showMessage(1, "Producto actualizado", "index.php");
                            } else {
                                Page::showMessage(2, "No se actualizo el producto", "create.php");
                            }
                          } else {
                            throw new Exception("Existencias incorrecta");
                          }
                      }else{
                          throw new Exception("Precio incorrecto");
                      }
                  }else{
                      throw new Exception("Descripción incorrecta");
                  }
              }else{
                  throw new Exception("Nombre incorrecto");
              }
          } else {
            throw new Exception("Seleccione un tipo");
          }
    } else {
      throw new Exception("Seleccione un proveedor");
    }
    }
    }else {
      Page::showMessage(3, "Seleccione un producto", "index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/producto/update_view.php");
?>