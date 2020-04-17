<?php
require_once("../../app/models/cliente.class.php");
try{
	$cliente = new Cliente;
	if(isset($_POST['buscar'])){
		$_POST = $cliente->validateForm($_POST);
        $data = $cliente->searchCliente($_POST['apellido']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $cliente->getClientes();
		}
	}else{
		$data = $cliente->getClientes();
	}
	if($data){
		require_once("../../app/views/cliente/index_view.php");
	}else{
		Page::showMessage(3, "No hay clientes disponibles", "create.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}
?>