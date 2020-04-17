<div class="container">
  <div class="h2 text-center">
    <p>Proveedores</p>
  </div>
  <div class="row" style="margin-bottom:10px;">
    <div class="col">
      <form method="post">
        <div class="row">
          <div class="col col-lg-4 col-md-4 col-sm-4 col-xs-6">
            <input name="producto" type="text" class="form-control" placeholder="Buscar por Nombre">
          </div>
          <div class="col col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <button name="buscar" type="submit" class="btn btn-success">Buscar</button>
          </div>
          <div class="col text-right">
            <a href="create.php">Agregar <img src="../../web/img/iconos/add.png"></a>
          </div>
        </div>
      </form>

    </div>
  </div>

  <div class="row">
    <div class="col col-sm-12 col-lg-12 col-md-12 table-responsive">

      <table class="table table-bordered text-center table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Tipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Existencias</th>
            <th scope="col">Precio</th>
            <th scope="col">Acción</th>
          </tr>
        </thead>
        <tbody>
          <!--Se generan los datos de la tabla a partir del recorrido de un foreach-->
          <?php
            foreach($data as $row){
            print('
            <tr>
                <td>'.$row['id_producto'].'</td>
                <td>'.$row['nombre_pv'].'</td>
                <td>'.$row['nombre_tp'].'</td>
                <td>'.$row['nombre_p'].'</td>
                <td>'.$row['descripcion'].'</td>
                <td>'.$row['existencias'].'</td>
                <td>'.$row['precio'].'</td>
                <td>
                <a href="update.php?id='.$row['id_producto'].'"><img src="../../web/img/iconos/edit.png"></a>
                <a href="delete.php?id='.$row['id_producto'].'"><img src="../../web/img/iconos/delete.png"></a>
                </td>
            </tr>
            ');
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>