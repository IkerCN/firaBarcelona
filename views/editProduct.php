<form action="<?=URL.'?controller=producto&action=update'?>" method="post">
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> Producto_id </th>
            <th> Nombre </th>
            <th> Categoria_id </th>
            <th> Precio </th>
            <th> Guardar </th>
        </tr>
            <tr>
                <td>
                    <input disabled name='idProducto' value="<?=$producto->getIdProducto()?>">
                </td>
                <td>
                    <input name='nombre' value="<?=$producto->getNombre()?>">
                </td>
                <td>
                    <input disabled name='idCategoria' value="<?=$producto->getIdCategoria()?>">
                </td>
                <td>
                    <input name='precio' value="<?=$producto->getPrecio()?>">
                </td>
                <td>
                    <form action="<?=URL."?controller=producto&action=update"?>" method="post">
                        <input hidden name="idProducto" value="<?=$producto->getIdProducto()?>">
                        <input hidden name="nombre" value="<?=$producto->getNombre()?>">
                        <input hidden name="idCategoria" value="<?=$producto->getIdCategoria()?>">
                        <input hidden name="precio" value="<?=$producto->getPrecio()?>">
                        <button type="submit">Guardar</button>
                    </form>
                </td>   
            </tr> 
                   
     </table>
     
</form> 