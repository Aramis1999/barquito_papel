<?php
require_once("../../app/models/tipo_producto.class.php");
try{
    #Se crea una instancia de la clase Usuarios
$tipo = new Tipo;
#isset se ocupa para saber si una variable esta definida en este caso el $_POST['crear'] 
	#En este caso solo se definira cuando manden datos por post a travez de un submit 
if(isset($_POST['crear'])){
    $_POST = $tipo->validateForm($_POST);
    #Se le pasa el argumento indicado (Dato del formulario) y se ejecuta el metodo
    if($tipo->setTipo($_POST['nombre'])){
        if($tipo->createTipo()){
            #Se llama al metodo showMessage y se le pasan los argumentos indicados
            Page::showMessage(1, "Tipo de producto creado", "index.php");
        }else {
            #Se llama al metodo showMessage y se le pasan los argumentos indicados
            Page::showMessage(2, "No se creo", null);
        }
    }else{
        throw new Exception("Nombre incorrecto");
    }
}
#Captura la exception 
}catch(Exception $error){
#Se llama al metodo showMessage y se le pasan los argumentos indicados en este caso mensaje de error
Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/tipo_producto/create_view.php");
?>