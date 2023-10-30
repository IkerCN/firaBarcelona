<html>
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> idProducto </th>
            <th> Nombre </th>
            <th> Categoria_id </th>
            <th> Precio </th>
            <th> Modificar </th>
            <th> Eliminar </th>
        </tr>
        <?php foreach ($allProducts as $producto){?>
            <tr>
                <td> <?= $producto->getIdProducto() ?> </td>
                <td> <?= $producto->getNombre() ?> </td>
                <td> <?= $producto->getIdCategoria()?> </td>
                <td> <?= $producto->getPrecio(). "€"?></td>
                <td>
                    <form action="<?=URL."?controller=producto&action=updateTable"?>" method="post">
                        <input hidden name="idProducto" value="<?=$producto->getIdProducto()?>">
                        <input hidden name="nombre" value="<?=$producto->getNombre()?>">
                        <input hidden name="idCategoria" value="<?=$producto->getIdCategoria()?>">
                        <input hidden name="precio" value="<?=$producto->getPrecio()?>">
                        <button type="submit">Modificar</button>
                    </form>
                </td>
                <td>
                    <form action="<?=URL."?controller=producto&action=delete"?>" method="post">
                        <input hidden name="idProducto" value="<?=$producto->getIdProducto()?>">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>        
        <?php } ?>

     </table>


</html>