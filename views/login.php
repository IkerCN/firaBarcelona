<html>
<head>
    <title>Fira Barcelona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">

  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<section class="container-lg mt-5">  
  <div class="row">
    
      <div class="col-sm-12 col-md-6" >
        <div class="formulario bg-color5 rounded-3">
          <h2 class="text-center mb-5 fs-1">Inicia sessió</h2>
          <form action="<?=URL ."?controller=usuario&action=autentificarse"?>" method="post">
            <div class="mb-3 row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Email*</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="staticEmail" name="staticEmail" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label mw-300">Contrasenya*</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
              </div>
            </div>
            <p class="text-color2">*Camps oblitatoris</p>

            <input class="btn btn-secondary" type="submit" value="Iniciar sessió">
          </form>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="formulario bg-color5 rounded-3">
          <h2 class="text-center mb-5 fs-1">Registrar-se</h2>
          <form action="<?=URL ."?controller=usuario&action=login"?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
              <label for="nom" class="col-sm-2 col-form-label">Nom*</label>
              <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" id="nom" name="nom" required>
              </div>
              <label for="cognom" class="col-sm-2 col-form-label">Cognom*</label>
              <div class="col-sm-10 mb-3">
                <input type="text" class="form-control" id="cognom" name="cognom" required>
              </div>
              <label for="staticEmail" class="col-sm-2 col-form-label">Email*</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="staticEmail" name="staticEmail" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Contrasenya*</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="inputPassword" required>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="inputPassword2" class="col-sm-2 col-form-label">Repeteix contrasenya*</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" required>
              </div>
            </div>
            <p class="text-color2">*Camps oblitatoris</p>
			<?php 
			  	if((isset($_POST['nom'])) && (isset($_POST['cognom'])) && (isset($_POST['staticEmail'])) && (isset($_POST['inputPassword'])) && (isset($_POST['inputPassword2'])) ){
					if($_POST['inputPassword'] != $_POST['inputPassword2']){
						echo ("<p><b>Les contrasenyes no coincideixen</b></p>");	
					}else{
						echo("<p><b>L'usari s'ha creat correctament</b></p>");
					}
				}
			?>
            <input class="btn btn-secondary" type="submit" value="Registrar-se">
          </form>
        </div>
      </div> 
  </div>
</section>
</body>
</html>