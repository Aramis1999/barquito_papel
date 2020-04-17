<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Actualizar cliente</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="proveedor">Proveedor:</label>
      <input name="proveedor" type="text" class="form-control" id="proveedor" placeholder="Proveedor" value="<?php print($proveedor->getNombre());?>">
    </div>
    <div class="form-group col-md-6">
      <label for="encargado">Encargado:</label>
      <input name="encargado" type="text" class="form-control" id="encargado" placeholder="Encargado" value="<?php print($proveedor->getEncargado());?>"> 
    </div>
    <div class="form-group col-md-6">
      <label for="Telefono">Telefono:</label>
      <input name="telefono" type="numer" class="form-control" id="Telefono" placeholder="Telefono" value="<?php print($proveedor->getTelefono());?>">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Direccion de Email</label>
      <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="<?php print($proveedor->getCorreo());?>">
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlTextarea1">Dirección</label>
    <textarea name="direccion" class="form-control" id="exampleFormControlTextarea1" placeholder="Dirercción del local" rows="3" ><?php print($proveedor->getDireccion());?></textarea>
    </div>
  </div>
 <div class="row">
 <div class="center center-text mx-auto">
      <button name="actualizar" type="submit" class=" btn btn-success">Registrar</button>
      <a class="btn btn-danger" href="index.php" role="button">Cancelar</a>
  </div>
 </div>
</form>
        
</div>