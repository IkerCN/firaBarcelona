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
    <h3>Pedidos</h3>
    <div class="table-responsive">
    <table class="aling-items-center " >
    <tr>
        <th> Pedido_id </th>
        <th> Precio total </th>
        <th> Fecha </th>
        <th> Id_Reseña </th>

    </tr>
    <?php
        if (empty($pedidos)) {
            // El carrito está vacío
            echo '<tr><td colspan="12">No has hecho ningun pedido</td></tr>';
        } else {
            foreach ($pedidos as $pedido){
    ?>
      <tr>
          <td class="col-3"> <?= $pedido->getIdPedido() ?> </td>
          <td class="col-3"> <?= $pedido->getPrecioTotal(). "€" ?> </td>
          <td class="col-3"> <?= $pedido->getFecha() ?> </td>
          <td class="col-3"> <?= $pedido->getResena()?></td>
      </tr>        
      <?php 
          } 
      }?>
    <table>
    </div>
</div>
</body>
</html>