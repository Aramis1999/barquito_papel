<?php
require_once("../../app/models/tipo_producto.class.php");
try{
    if ($_GET['id']) {
        #Se crea una instancia de la clase Usuarios
      $tipo = new Tipo;
      #Se manda el id al metodo correspondiente
      $tipo->setId($_GET['id']);
       #Se ejecuta el metodo para leer usuario
      $tipo->readTipo();
      #isset se ocupa para saber si una variable esta definida en este caso el $_POST['actualizar'] 
	#En este caso solo se definira cuando manden datos por get a travez de la url
      if(isset($_POST['actualizar'])){
        $_POST = $tipo->validateForm($_POST);
            #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
        if($tipo->setTipo($_POST['nombre'])){
            
            #Se ejecuta el metodo para actualizar usuario
            if($tipo->updateTipo()){
                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(1, "Tipo de producto modificado", "index.php");
            }else {
                    #Se llama al metodo showMessage y se le pasan los argumentos indicados
                Page::showMessage(2, "No se modifico", null);
            }
        }else{
            throw new Exception("Nombre incorrecto");
        }
    }
    }else {
      Page::showMessage(3, "Seleccione un tipo de producto", "index.php");
    }
    #Se captura la exception
}catch(Exception $error){
    #Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/tipo_producto/update_view.php");
?>