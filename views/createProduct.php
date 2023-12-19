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
<form action="<?= URL . '?controller=producto&action=create' ?>" method="post">
    <table border="1" style="text-align: center">
        <tr>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Precio</th>
            <th>Guardar</th>
        </tr>
        <tr>
            <td>
                <input type="text" name="nombre" value="">
            </td>
            <td>
                <select name="idCategoria">
                    <option value="1">Categoría 1</option>
                    <option value="2">Categoría 2</option>
                    <option value="3">Categoría 3</option>
                    <option value="4">Categoría 4</option>
                    <option value="5">Categoría 5</option>
                </select>
            </td>
            <td>
                <input type="text" name="precio" value="">
            </td>
            <td>
                <button type="submit">Guardar</button>
            </td>
        </tr>
    </table>  
</form> 
   
</body>
</html>
