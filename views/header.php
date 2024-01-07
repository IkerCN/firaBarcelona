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
  
    <div class="menu-principal container">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
              <a class="navbar-brand" href="http://localhost/firaBarcelona/firaBarcelona/"><img src="assets\images\logo-fira-blue.png" alt="logo de la web fira de barcelona"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/firaBarcelona/firaBarcelona/">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?=URL."?controller=producto&action=carta"?>">Carta</a>
                  </li>
                </ul>
                <div class="d-flex align-items-center">
                <form action="#" method= "post">
                    <button type="submit" class="carrito-btn transparent-bg"><img src="assets\images\lupa.png" alt="lupa de busqueda" class="carrito-icon"></button>
                </form>
                <?php if(isset($_SESSION["id_usuari"])) { ?>
                <form action="<?=URL."?controller=usuario&action=modificarUsuario"?>" method= "post">
                    <button type="submit" class="carrito-btn transparent-bg"><img src="assets\images\usuarioSesion.png" alt="Boton para iniciar sesion" class="carrito-icon"></button>
                </form>
                <?php }else{ ?>
                  <form action="<?=URL."?controller=usuario&action=login"?>" method= "post">
                    <button type="submit" class="carrito-btn transparent-bg"><img src="assets\images\usuario.png" alt="Boton para iniciar sesion" class="carrito-icon"></button>
                </form>
                <?php } ?>
                <?php if(isset($_SESSION["selecciones"])) { ?>
                  <form action="<?=URL."?controller=producto&action=compra"?>" method= "post">
                    <button type="submit" class="carrito-btn transparent-bg"><img src="assets\images\carrito-de-compras.png" alt="Carrito" class="carrito-icon">
                      <span class="position-absolute top-10 start-10 translate-middle badge rounded-pill bg-primary"><?= count($_SESSION["selecciones"])?></span>
                    </button>
                  </form>
                <?php }else{ ?>
                  <form action="<?=URL."?controller=producto&action=compra"?>" method= "post">
                    <button type="submit" class="carrito-btn transparent-bg"><img src="assets\images\carrito-de-compras.png" alt="Carrito" class="carrito-icon">
                      <span class="position-absolute top-10 start-10 translate-middle badge rounded-pill bg-primary">0</span>
                    </button>
                  </form>
                <?php } ?>
                </div>
              </div>
            </div>
          </nav>
        </div>
    </div>
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</html>