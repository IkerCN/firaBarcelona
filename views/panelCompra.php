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
  <div class="row">
    <!-- Div para productos -->
    <div class="col-lg-8">
    <h3>Carrito</h3>
        <div class="table-responsive">
            <table class="table" style="text-align: center">
            <?php
            $pos = 0;
            foreach ($_SESSION['selecciones'] as $pedido){?>
                <tr>
                    <td> <div><img src="assets\images\<?= $pedido->getProducto()->getImgProducto() ?>" class="object-fit-scale" alt="Imagen del producto: ."<?= $pedido->getProducto()->getNombre() ?>></div> </td>
                    <td> <?= $pedido->getProducto()->getNombre() ?> <br><?= $pedido->getProducto()->getIdCategoria() ?> </td>
                    <td> <?= $pedido->getProducto()->getPrecio(). "€"?></td>

                    <td>
                        <form action="<?=URL ."?controller=producto&action=compra"?>" method="post" class="form-inline">
                            <button type="submit" class="btn btn-sm btn-light" name="del" value="<?=$pos?>"> - </button>
                            <div class="mx-2"> <?= $pedido->getCantidad()?> </div> 
                            <button type="submit" class="btn btn-sm btn-light" name="add" value="<?=$pos?>"> + </button>
                        </form>
                    </td>
                    <!-- Calculamos precio totoal -->
                    <td> <?= $pedido->precioTotal()?></td>

                    <!-- BOTON DE MODIFICAR Y ELIMINAR PRODUCTO EN BASE DE DATOS
                    <td>
                        <form action="<?=URL ."?controller=producto&action=updateTable"?>" method="post">
                            <input hidden name="idProducto" value="<?=$pedido->getProducto()->getIdProducto()?>">
                            <input hidden name="nombre" value="<?=$pedido->getProducto()->getNombre()?>">
                            <input hidden name="idCategoria" value="<?=$pedido->getProducto()->getIdCategoria()?>">
                            <input hidden name="precio" value="<?=$pedido->getProducto()->getPrecio()?>">
                            <button type="submit">Modificar</button>
                        </form>
                    </td>
                    <td>
                        <form action="<?=URL ."?controller=producto&action=eliminar"?>" method="post">
                            <input hidden name="idProducto" value="<?=$pedido->getProducto()->getIdProducto()?>">
                            <button type="submit">Eliminar</button>
                        </form>
                    </td> -->
                </tr>        
            <?php 
            $pos++;
            } ?>

        </table>
        </div>
            <!-- Fin del bloque de producto -->
    </div>

    <!-- Div para resumen del pedido -->
    <div class="col-lg-4">
        <h3>Resumen del Pedido</h3>
        <div class="resumenPedido p-2">
          <p>Subtotal: $10.00</p>
          <p>IVA (16%): $1.60</p>
          <p>Total: <?=$precioTotal?></p>
          <form action="<?=URL ."?controller=producto&action=confirmar"?>" method="post">
                        <input hidden name="cantidadFinal" value="<?=$precioTotal?>">
                        <button type="submit" class="btn btn-success"> CONFIRMAR PEDIDO </button>
          </form>
        </div>
    </div>
  </div>
</div>
</body>
</html>