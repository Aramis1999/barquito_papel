<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="text-center">Eliminar Tipo de producto</h2>
            <!--Obtiene el nombre por el metodo get-->
            <h5 class="text-center">Nombre: <?php print($tipo->getTipo());?></h5>
        </div>
    </div>
    <div class="row">
        <div class="center center-text mx-auto">
            <form method="post">
                <button name="delete" type="submit" class=" btn btn-success">Eliminar</button>
                <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>