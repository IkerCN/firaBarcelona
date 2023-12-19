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
    <form action="<?=URL.'?controller=producto&action=update'?>" method="post">
    <table border=1 style= 'text-align: center'>
        <tr>
            <th> Nombre </th>
            <th> Categoria_id </th>
            <th> Precio </th>
            <th> Guardar </th>
        </tr>
            <tr>

                <input hidden name='idProducto' value="<?=$producto->getIdProducto()?>">
                <td>
                    <input name='nombre' value="<?=$producto->getNombre()?>">
                </td>
                <td>
                    <input name='idCategoria' value="<?=$producto->getIdCategoria()?>">
                </td>
                <td>
                    <input name='precio' value="<?=$producto->getPrecio()?>">
                </td>
                <td>
                        <button type="submit">Guardar</button>
                </td>   
                
            </tr> 
                   
     </table>
     
</form> 
   
</body>
</html>
