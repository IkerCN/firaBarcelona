<html>
<head>
    <title>Fira Barcelona</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">

     <script src="./assets/js/bootstrap.bundle.min.js"></script>
  <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
</head>
<body>
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
     </body>
</html>