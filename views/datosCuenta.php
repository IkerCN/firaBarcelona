<html>
<head>
    <title>Fira Barcelona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>
<body>
<div class="container mt-4">
  <div class="row">
    <!-- Div para productos -->
    <div class="col-lg-8">
      <div class="formulario bg-color5 rounded-3">
        <h3 class="text-center mb-4 fs-1">Modificar dades</h3>
        <form action="<?=URL ."?controller=usuario&action=modificarUsuario"?>" method="post">
            <label for="nom" class="col-sm-2 col-form-label">Nom*</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control" id="nom" name="nNom" value="<?= $user->getNombre()?>" required>
            </div>
            <label for="cognom" class="col-sm-2 col-form-label">Cognom*</label>
            <div class="col-sm-10 mb-3">
              <input type="text" class="form-control" id="cognom" name="nCognom" value="<?= $user->getApellido()?>" required>
            </div>
            <label for="staticEmail" class="col-sm-2 col-form-label">Email*</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="staticEmail" name="nEmail" value="<?= $user->getEmail()?>" required>
            </div>
            <label for="inputPassword" class="col-sm-2 col-form-label">Contrasenya*</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword" name="nContra" value="<?= $user->getPassword()?>" required>
            </div>
            <label for="inputPassword2" class="col-sm-2 col-form-label">Repeteix contrasenya*</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword2" name="nContra2" value="<?= $user->getPassword()?>" required>
            </div>
          <p class="text-color2">*Camps oblitatoris</p>
          <?php //RESPOSTES o ERRORS 
		        if(isset($_POST['nNom'], $_POST['nCognom'], $_POST['nEmail'], $_POST['nContra'],$_POST['nContra2'])){
		      	  if($_POST['nContra'] != $_POST['nContra2']){
		      		  echo ("<p><b>Les contrasenyes no coincideixen</b></p>");
		      	  }
		        }
		      ?>
          <input class="btn btn-secondary" type="submit" name="modificardades" value="Modificar dades">
        </form>
      </div>
    </div>
    <!-- Div situado a la derecha -->
    <div class="col-lg-4">
      <div class="mb-5" >
        <h3 class="text-center mb-3 fs-1">Acciones Usuario</h3>
        <div class="resumenPedido p-2">
        <form action="<?=URL ."?controller=usuario&action=cerrarSesion"?>" method="post" class="mt-2">
            <button type="submit" class="btn btn-success mt-2"> CERRAR SESION </button>
          </form>
        </div>
      </div>
      <div>
        <h3 class="text-center mb-3 fs-1">Acciones Admin</h3>
        <div class="resumenPedido p-2">
        <form action="<?=URL ."?controller=producto&action=crearProducto"?>" method="post" class="mt-2">
            <button type="submit" class="btn btn-success mt-2"> CREAR PRODUCTO </button>
          </form>
          <form action="<?=URL ."?controller=producto&action=editarProducto"?>" method="post" class="mt-2">
            <button type="submit" class="btn btn-success mt-2"> MODIFICAR PRODUCTOS </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>  
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</html>