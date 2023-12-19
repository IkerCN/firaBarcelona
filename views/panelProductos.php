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
<div class="container mt-4">
    <!-- Div para productos -->
    <h3>Productos</h3>
    <div class="table-responsive">
    <table class="aling-items-center " >
    <tr>
        <th> Producto_id </th>
        <th> Imagen </th>
        <th> Nombre </th>
        <th> Categoria </th>
        <th> Precio </th>

    </tr>
    <?php
    foreach ($allProducts as $producto){?>
        <tr>
            <td class="col-1"> <?= $producto->getIdProducto() ?> </td>
            <td class="col-2"> <img src="assets\images\<?= $producto->getImgProducto() ?>" class="object-fit-scale" alt="Imagen del producto: ."<?= $producto->getNombre() ?>> </td>
            <td class="col-2"> <?= $producto->getNombre() ?> </td>
            <td class="col-2"> <?= $producto->getIdCategoria() ?> </td>
            <td class="col-1"> <?= $producto->getPrecio(). "€"?></td>

            <!-- BOTON DE MODIFICAR Y ELIMINAR PRODUCTO EN BASE DE DATOS -->
            <td>
                <form action="<?=URL ."?controller=producto&action=updateTable"?>" method="post">
                    <input hidden name="idProducto" value="<?=$producto->getIdProducto()?>">
                    <input hidden name="nombre" value="<?=$producto->getNombre()?>">
                    <input hidden name="idCategoria" value="<?=$producto->getIdCategoria()?>">
                    <input hidden name="precio" value="<?=$producto->getPrecio()?>">
                    <button type="submit">Modificar</button>
                </form>
            </td>
            <td>
                <form action="<?=URL ."?controller=producto&action=eliminar"?>" method="post">
                    <input hidden name="idProducto" value="<?=$producto->getIdProducto()?>">
                    <button type="submit">Eliminar</button>
                </form>
            </td> 
        </tr>        
    <?php 
    } ?>
    </table>
    </div>
</div>
</body>
</html>