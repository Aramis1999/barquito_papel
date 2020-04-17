<?php
require_once("../../app/models/producto.class.php");
try{
    $producto = new Producto;
    if(isset($_POST['crear'])){
        $_POST = $producto->validateForm($_POST);
        if ($producto->setProveedor($_POST['proveedor'])) {
              if ($producto->setTipo($_POST['tipo'])) {
                  if($producto->setNombre($_POST['nombre'])){
                      if($producto->setDescripcion($_POST['descripcion'])){
                          if($producto->setPrecio($_POST['precio'])){
                              if ($producto->setExistencia($_POST['existencia'])){
                                if ($producto->createProducto()) {
                                    Page::showMessage(1, "Producto creado", "index.php");
                                } else {
                                    Page::showMessage(2, "No se creo el producto", "create.php");
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
}catch (Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/producto/create_view.php");
?>
