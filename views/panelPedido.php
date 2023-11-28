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
<body>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets\images\snack-2635035 (1).jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>    
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
</div>
    <!-- <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div>  </div>
            <img src="assets\images\snack-2635035 (1).jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-img" style="background-image: linear-gradient(rgba(224,23,34,0.6), rgba(0,6,39,0.2)) ,url('assets\images\pasteles.jpg');"></div>
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
         <div class="carousel-item active">
            <img src="assets\images\pasteles.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Tird slide label</h5>
              <p>Some representative placeholder content for the tird slide.</p>
            </div>
          </div> 
      </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
     </div> -->
    <div class="container py-2 my-4">
      <h3>Novedades</h3>
      <div class="row">
        <?php foreach ($newProducts as $producto){?>
            <div class="col-md-3 mb-4">
                <div class="border-0 card">
                    <img src="assets\images\<?= $producto->getImgProducto() ?>" class="object-fit-scale" alt="Producto 1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $producto->getNombre() ?></h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2"><p class="card-text"><?= $producto->getPrecio() . "€" ?></p></div>
                            <div class="p-2"><p class="card-text"><?= $producto->getIdCategoria() ?></p></div>
                        </div>

                            <!-- Botón de carrito -->

                                    <form method="post" action="<?= URL . "?controller=producto&action=index" ?>">
                                        <input type="hidden" name="idProducto" value="<?= $producto->getIdProducto() ?>">
                                        <button type="submit" class="btn btn-light boton-carrito"><img src="assets\images\carrito-de-compras.png" alt="Carrito" width="25"></button>
                                    </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
   </div>
  <section class="bg-dark-subtle container-fluid py-4">
    <div class="container mx-auto py-3">
      <h3>Explora nuestras categorias</h3>
      <div class="row">
          <div class="col-md-2 text-center">
              <div class="custom-div">
                  <img src="assets\images\oferta-8.png" alt="Imagen 1" class="custom-img">
                  <p>Ofertas</p>
              </div>   
          </div>

          <?php foreach ($categorias as $categoria){?>

          <div class="col-md-2 text-center">
              <div class="custom-div">
                  <img src="assets\images\<?= $categoria->getNombreCategoria() ?>.png" alt="Imagen 2" class="custom-img">
                  <p><?= $categoria->getNombreCategoria() ?></p>
              </div>
          </div>

          <?php } ?>
      </div>
    </div>
  </section>
  <div class="container py-2 my-4">
      <h3>Novedades</h3>
      <div class="row">
        <?php foreach ($firstProducts as $producto){?>
            <div class="col-md-3 mb-4">
                <div class="border-0 card">
                    <img src="assets\images\<?= $producto->getImgProducto() ?>" class="object-fit-scale" alt="Producto 1">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= $producto->getNombre() ?></h5>
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                        <div class="d-flex flex-column mb-3">
                            <div class="p-2"><p class="card-text"><?= $producto->getPrecio() . "€" ?></p></div>
                            <div class="p-2"><p class="card-text"><?= $producto->getIdCategoria() ?></p></div>
                        </div>

                            <!-- Botón de carrito -->

                                    <form method="post" action="<?= URL . "?controller=producto&action=index" ?>">
                                        <input type="hidden" name="idProducto" value="<?= $producto->getIdProducto() ?>">
                                        <button type="submit" class="btn btn-light boton-carrito"><img src="assets\images\carrito-de-compras.png" alt="Carrito" width="25"></button>
                                    </form>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
   </div>
</body>
</html>