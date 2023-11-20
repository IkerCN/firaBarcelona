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
    <?php
    if(isset($_SESSION["selecciones"])) {
    ?>
        <form action="<?=URL."?controller=producto&action=compra"?>" method= "post">
            <button type="submit">Carrito <?= count($_SESSION["selecciones"])?> </button>
        </form>
    <?php } ?>
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> idProducto </th>
            <th> Nombre </th>
            <th> Categoria_id </th>
            <th> Precio </th>
            <th> Img </th>
            <th> Añadir </th>
        </tr>
        <?php foreach ($allProducts as $producto){?>
          <div class="col-md-3 mb-4">
              <div class="card">
                  <img src="assets\images\<?= $producto->getImgProducto() ?>" class="object-fit-scale" alt="Producto 1">
                  <div class="card-body d-flex flex-column">
                      <h5 class="card-title"><?=$producto->getNombre()?></h5>
                      <p class="card-text"><?=$producto->getPrecio(). "€"?></p>
                      <p class="card-text"><?= $producto->getIdCategoria()?></p>
                      <a href="<?=URL ."?controller=producto&action=index"?>" class="btn btn-primary">
                          <div class="btn btn-light light-border-subtle">
                              <img src="assets\images\carrito-de-compras.png" alt="Carrito" width="30">
                              <form method="post" style="display: none;">
                                  <input type="hidden" name="idProducto" value="<?=$producto->getIdProducto()?>">
                                  <button type="submit">Añadir</button>
                              </form>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
        <?php } ?>

     </table>

</body>
</html>