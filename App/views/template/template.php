<?php
#se requieren los archivos de la conexion, validacion y componentes una unica vez
require_once('../../app/models/database.class.php');
require_once('../../app/helpers/validator.class.php');
require_once('../../app/helpers/component.class.php');
#Se crea la clase Page y se hereda los elementos de Component
class Page extends Component{
	public static function templateHeader($title){
    #Se añade codigo html dentro de las etiquetas de php, esto lo haremos con un print
      print("
      <!DOCTYPE html>
      <html lang='en'>
      <head>
          <meta charset='UTF-8'>
          <meta http-equiv='X-UA-Compatible' content='ie=edge'>
          <link rel='stylesheet' href='../../web/css/bootstrap.min.css'>
          <link rel='stylesheet' href='../../web/css/bootstrap-grid.min.css'>
          <link rel='stylesheet' href='../../web/css/style.css'>
          <script src='../../web/js/sweetalert.min.js'></script>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      
          <title>$title</title>
          <link rel='shortcut icon' href='../../web/img/iconos/boat.svg' />
      </head>
      <body>   
      <nav class='navbar navbar-expand-md navbar-dark bg-primary'>
          <a class='navbar-brand' href=''><img src='../../web/img/iconos/boat.svg' width='30' height='30' alt='Barquito de papel Dashboard'></a>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
            aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse' id='navbarSupportedContent'>
            <div class='navbar-nav'>
              <a class='nav-item nav-link active' href='#'>Dashboard</a>
              <a class='nav-item nav-link active' href='#'>Ventas</a>
              <a class='nav-item nav-link active' href='../../public/producto'>Productos</a>
              <a class='nav-item nav-link active' href='../../public/tipo_producto'>Tipos de producto</a>
              <a class='nav-item nav-link active' href='../../public/cliente'>Clientes</a>
              <a class='nav-item nav-link active' href='../../public/proveedor'>Proveedores</a>
              <a class='nav-item nav-link active' href='../../public/usuario'>Usuarios</a>
            </div>
          </div>
        </nav>
  ");	

	}

	public static function templateFooter(){
		print("     
<script src='../../web/js/jquery-3.4.1.min.js'></script>     
<script src='../../web/js/bootstrap.min.js'></script>
<script src='../../web/js/script.js'></script>
</body>
</html>
		");
	}
}
?>

