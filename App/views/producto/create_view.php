<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Crear producto</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
        <?php
            Page::showSelect("Proveedor", "proveedor", $producto->getProveedor(), $producto->getProveedores());
        ?>
    </div>
    <div class="form-group col-md-6">
        <?php
            Page::showSelect("Tipo de producto", "tipo", $producto->getTipo(), $producto->getTipos());
        ?>
    </div>
    <div class="form-group col-md-6">
      <label for="nombre">Nombre:</label>
      <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
    </div>
    <div class="form-group col-md-4">
      <label for="precio">Precio</label>
      <input name="precio" type="number" step="any" class="form-control" id="precio" placeholder="3.99">
    </div>
    <div class="form-group col-md-2">
      <label for="existencia">Existencias</label>
      <input name="existencia" type="number"  class="form-control" id="existencia" placeholder="10">
    </div>
    <div class="form-group col-md-6">
    <label for="descripcion">Descripción</label>
    <textarea name="descripcion" class="form-control" id="descripcion" placeholder="Dirección del local" rows="3"></textarea>
    </div>
  </div>
 <div class="row">
 <div class="center center-text mx-auto">
      <button name="crear" type="submit" class=" btn btn-success">Registrar</button>
      <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </div>
 </div>
</form>
        
</div>