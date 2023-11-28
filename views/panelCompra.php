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
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> idProducto </th>
            <th> Nombre </th>
            <th> Precio </th>
            <th> Img </th>
            <th> Cantidad </th>
            <th> Precio Total</th>
            <th> Edita Candtidad </th>
            <th> Modificar </th>
            <th> Eliminar </th>
        </tr>
        <?php
        $pos = 0;
        foreach ($_SESSION['selecciones'] as $pedido){?>
            <tr>
                <td> <?= $pedido->getProducto()->getIdProducto() ?> </td>
                <td> <?= $pedido->getProducto()->getNombre() ?> </td>
                <td> <?= $pedido->getProducto()->getPrecio(). "€"?></td>
                <td> <?= $pedido->getProducto()->getImgProducto()?></td>

                <!-- Añadimos la cantidad de unidades -->
                <td> <?= $pedido->getCantidad()?></td>
                <!-- Calculamos precio totoal -->
                <td> <?= $pedido->precioTotal()?></td>

                <td>
                    <form action="<?=URL ."?controller=producto&action=compra"?>" method="post">
                        <button type="submit" name="add" value="<?=$pos?>"> + </button>
                        <button type="submit" name="del" value="<?=$pos?>"> - </button>
                    </form>
                </td>

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
                </td>
            </tr>        
        <?php 
        $pos++;
        } ?>
        <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>PRECIO FINAL PEDIDO</td>
                <td><?=CalculadoraPrecios::CalculadoraPrecioPedido($_SESSION['selecciones'])?></td>
                <td>
                    <form action="<?=URL ."?controller=producto&action=confirmar"?>" method="post">
                        <button type="submit"> CONFIRMAR </button>
                    </form>
                </td>
                <td></td>
        </tr>
     </table>

     </body>
</html>