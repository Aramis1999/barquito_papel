<?php
#Incluye una unica vez el archivo el cual se esta llamando
require_once("../../app/controllers/dashboard_controller.php");
#Genera una nueva instancia de la clase 
$Mvcplantilla = new MvcController();
#Ejecuta el metodo plantilla
$Mvcplantilla -> plantilla();
#Ejecuta el metodo estatico y le manda un texto como argumento
Page::templateHeader("Proveedores");
require_once("../../app/controllers/proveedor/delete_controller.php");
Page::templateFooter();
?>