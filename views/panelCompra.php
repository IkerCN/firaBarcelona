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
            <table class="aling-items-center " >
            <?php
    
    if (empty($_SESSION['selecciones'])) {
        // El carrito está vacío
        echo '<tr><td colspan="6">No hay productos en el carrito</td></tr>';
    } else {
            $pos = 0;
            foreach ($_SESSION['selecciones'] as $pedido){?>
                <tr>
                    <td class="col-2"> <img src="assets\images\<?= $pedido->getProducto()->getImgProducto() ?>" class="object-fit-scale" alt="Imagen del producto: ."<?= $pedido->getProducto()->getNombre() ?>> </td>
                    <td class="col-3"> <?= $pedido->getProducto()->getNombre() ?> <br><?= $pedido->getProducto()->getIdCategoria() ?> </td>
                    <td class="col-1"> <?= $pedido->getProducto()->getPrecio(). "€"?></td>

                    <td class="col-2 text-center">
                        <form action="<?=URL ."?controller=producto&action=compra"?>" method="post" class="form-inline">
                            <button type="submit" class="btn btn-sm btn-light" name="del" value="<?=$pos?>"> - </button>
                            <div class="mx-2"> <?= $pedido->getCantidad()?> </div> 
                            <button type="submit" class="btn btn-sm btn-light" name="add" value="<?=$pos?>"> + </button>
                        </form>
                    </td>
                    <!-- Calculamos precio totoal -->
                    <td class="col-1"> <?= $pedido->precioTotal(). "€"?></td>
                    <td class="col-2  align-self-center">
                    <form action="<?=URL ."?controller=producto&action=compra"?>" method="post">
                            <input hidden name="borrar" value="<?=$pedido->getProducto()->getIdProducto()?>">
                            <button type="submit" class="btn text-decoration-underline" name="borrar" value="<?=$pos?>">Borrar</button>
                    </form>
                    </td>
                </tr>        
            <?php 
            $pos++;
		}
            } ?>

        </table>
        </div>
            <!-- Fin del bloque de producto -->
    </div>

    <!-- Div para resumen del pedido -->
    <div class="col-lg-4">
        <h3>Resumen del Pedido</h3>
        <div class="resumenPedido p-2">
          <p>Subtotal: <?=number_format($precioSinIva, 2)?> €</p>
          <p>IVA (16%): <?=number_format($precioIva, 2)?> €</p>
          <p>Total: <?=$precioTotal?> €</p>
          <?php
    
    if (empty($_SESSION['selecciones'])) { ?>
        <form action="#" method="post">
            <button type="submit" class="btn btn-primary" disabled> CONFIRMAR PEDIDO </button>
          </form>
        
        <?php } else {?>
          <form action="<?=URL ."?controller=producto&action=confirmar"?>" method="post" id="finalizarCompra">
                        <input hidden name="cantidadFinal" id="cantidadFinal" value="<?=$precioTotal?>">
                        <input hidden name="idUsr" id="idUsr" value="<?=$_SESSION['id_usuari']?>">
                        <button type="button" class="btn btn-primary" onclick="procesarCompra()"> CONFIRMAR PEDIDO </button>
          </form>
          <?php 
		}?>
    <p id="puntos-usuario">Puntos del usuario: Cargando...</p>
    
        </div>
    </div>
  </div>
</div>
<script src="https://unpkg.com/notie"></script>
<script src="assets/js/scriptPuntos.js"></script>
</body>
</html>