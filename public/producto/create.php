<?php
require_once("../../app/controllers/dashboard_controller.php");
$Mvcplantilla = new MvcController();
$Mvcplantilla -> plantilla();
Page::templateHeader("Productos");
require_once("../../app/controllers/producto/create_controller.php");
Page::templateFooter();
?>

