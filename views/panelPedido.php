<!DOCTYPE html>
<html lang="es">
<head>
    <title>Fira Barcelona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
  <header>
    <div class="banner" style="background-image: url('assets/images/banner-prof.jpg');" role="img" aria-label="Banner con imagen profesional"></div>
  </header>
   
  <main>
    <section class="container section my-4">
      <h3>Novedades</h3>
      <div class="row">
        <?php foreach ($newProducts as $producto) { ?>
          <article class="col-md-3 mb-4">
            <div class="border-0 card">
              <img src="assets/images/<?= htmlspecialchars($producto->getImgProducto(), ENT_QUOTES, 'UTF-8') ?>" class="object-fit-scale" alt="Imagen del producto: <?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?></h5>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                  <div class="d-flex flex-column mb-3">
                    <div><p class="card-text"><?= htmlspecialchars($producto->getPrecio(), ENT_QUOTES, 'UTF-8') ?>€</p></div>
                    <div><p class="card-text"><?= htmlspecialchars($producto->getIdCategoria(), ENT_QUOTES, 'UTF-8') ?></p></div>
                  </div>
                  <form method="post" action="<?= URL . "?controller=producto&action=index" ?>" class="px-2">
                    <input type="hidden" name="idProducto" value="<?= htmlspecialchars($producto->getIdProducto(), ENT_QUOTES, 'UTF-8') ?>">
                    <button type="submit" class="btn btn-light boton-carrito" aria-label="Añadir <?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?> al carrito"><img src="assets/images/carrito-de-compras.png" alt="Carrito" width="25"></button>
                  </form>
                </div>
              </div>
            </div>
          </article>
        <?php } ?>
      </div>
    </section>

    <section class="bg-dark-subtle container-fluid py-4">
      <div class="container section mx-auto py-3">
        <h3>Explora nuestras categorías</h3>
        <div class="row">
          <div class="col-lg-2 col-sm-4 col-xs-6 text-center">
            <div class="custom-div">
              <img src="assets/images/oferta-8.png" alt="Imagen de Ofertas" class="custom-img">
              <p>Ofertas</p>
            </div>   
          </div>

          <?php foreach ($categorias as $categoria) { ?>
            <article class="col-lg-2 col-sm-4 col-xs-6 text-center">
              <div class="custom-div">
                <img src="assets/images/<?= htmlspecialchars($categoria->getNombreCategoria(), ENT_QUOTES, 'UTF-8') ?>.png" alt="Categoría: <?= htmlspecialchars($categoria->getNombreCategoria(), ENT_QUOTES, 'UTF-8') ?>" class="custom-img">
                <p><?= htmlspecialchars($categoria->getNombreCategoria(), ENT_QUOTES, 'UTF-8') ?></p>
              </div>
            </article>
          <?php } ?>
        </div>
      </div>
    </section>

    <section class="container section my-4">
      <h3>Productos más vendidos</h3>
      <div class="row">
        <?php foreach ($firstProducts as $producto) { ?>
          <article class="col-md-3 mb-4">
            <div class="border-0 card">
              <img src="assets/images/<?= htmlspecialchars($producto->getImgProducto(), ENT_QUOTES, 'UTF-8') ?>" class="object-fit-scale" alt="Imagen del producto: <?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?></h5>
                <div class="d-flex justify-content-between align-items-center mt-auto">
                  <div class="d-flex flex-column mb-3">
                    <div><p class="card-text"><?= htmlspecialchars($producto->getPrecio(), ENT_QUOTES, 'UTF-8') ?>€</p></div>
                    <div><p class="card-text"><?= htmlspecialchars($producto->getIdCategoria(), ENT_QUOTES, 'UTF-8') ?></p></div>
                  </div>
                  <form method="post" action="<?= URL . "?controller=producto&action=index" ?>" class="px-2">
                    <input type="hidden" name="idProducto" value="<?= htmlspecialchars($producto->getIdProducto(), ENT_QUOTES, 'UTF-8') ?>">
                    <button type="submit" class="btn btn-light boton-carrito" aria-label="Añadir <?= htmlspecialchars($producto->getNombre(), ENT_QUOTES, 'UTF-8') ?> al carrito"><img src="assets/images/carrito-de-compras.png" alt="Carrito" width="25"></button>
                  </form>
                </div>
              </div>
            </div>
          </article>
        <?php } ?>
      </div>
    </section>
  </main>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
