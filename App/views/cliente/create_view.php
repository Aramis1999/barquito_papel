<div class="container">

    <div class="row">
        <div class="col">
        <h2 class="text-center">Crear cliente</h2>
        </div>
    </div>
    
    <form method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="Nombre">Nombres:</label>
      <input name="nombre" type="text" class="form-control" id="Nombre" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="Apellido">Apellidos:</label>
      <input name="apellido" type="text" class="form-control" id="Apellido" placeholder="Apellido">
    </div>
    <div class="form-group col-md-6">
      <label for="Telefono">Telefono:</label>
      <input name="telefono" type="numer" class="form-control" id="Telefono" placeholder="Telefono">
    </div>
    <div class="form-group col-md-6">
      <label for="exampleFormControlInput1">Direccion de Email</label>
      <input name="correo" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group col-md-6">
    <label for="exampleFormControlTextarea1">Motivo</label>
    <textarea name="motivo" class="form-control" id="exampleFormControlTextarea1" placeholder="Estoy interesado/a en..." rows="3"></textarea>
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