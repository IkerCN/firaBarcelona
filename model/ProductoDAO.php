<?php
    include_once 'config/db.php';
    include_once 'Productos.php';
    include_once 'categorias.php';
    include_once 'bebida.php';
    include_once 'pedidosUsr.php';
    
class ProductoDAO{    
    
    public static function getAllProducts (){

        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM productos");
   
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res =[];

        while($producto = $result->fetch_object('Productos')){
            $res[] = $producto;
        }

        return $res;
    }

    public static function getNewProducts (){

        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM productos ORDER BY idProducto DESC LIMIT 4;");

        $stmt->execute();
        $result = $stmt->get_result();
        
        $res =[];

        while($producto = $result->fetch_object('Productos')){
            $res[] = $producto;
        }

        return $res;
        
    }

    public static function getFirstProducts (){

        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM productos ORDER BY idProducto LIMIT 4;");
   
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res =[];

        while($producto = $result->fetch_object('Productos')){
            $res[] = $producto;
        }

        return $res;
        
    }
    
    public static function getAllByCategoria($idCategoria){
        $con = db::connect();

        $stmt = $con-> prepare("SELECT * FROM productos WHERE idCategoria=?");
        $stmt->bind_param("i", $idCategoria);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        $listaProductos = [];
        while($productoDB = $result->fetch_object('categorias')){
            $listaProductos[] = $productoDB;
        }
        return $listaProductos;
    }

    public static function getProductByIdProducto($idProducto){
        $con = db::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE `idProducto` = ?"); 
        $stmt->bind_param("i",$idProducto);


        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();

        $producto = $result->fetch_object('productos');

        return $producto;
    }

    public static function deleteProduct($idProducto){
        $con = db::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE `idProducto`=?");
        $stmt->bind_param("i",$idProducto);

        $stmt->execute();
        $result=$stmt->get_result();

        $con->close();
        return $result;
    }

    public static function updateProduct($idProducto,$nombre,$precio){
        $con = db::connect();

        $stmt = $con->prepare("UPDATE `productos` SET `nombre` = ?, `precio` = ? WHERE `idProducto` = ?");
        $stmt->bind_param("sdi", $nombre, $precio, $idProducto);

        $stmt->execute();

        $con->close();

    }

    public static function createProduct($nombre, $precio, $idCategoria){
        $con = db::connect();
        $stmt = $con->prepare("INSERT into `productos` (`nombre`, `precio`, `idCategoria`) values (?, ?, ?) ");
        $stmt->bind_param("sdi", $nombre, $precio, $idCategoria);

        $stmt->execute();

        $con->close();

    }

    public static function getAllCategorias (){

        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM categorias");
   
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res =[];

        while($categoria = $result->fetch_object('categorias')){
            $res[] = $categoria;
        }

        return $res;
        
    }
    public static function getAllBebidas(){

        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM productos where idCategoria = 4");
   
        $stmt->execute();
        $result = $stmt->get_result();
        
        $res =[];

        while($bebida = $result->fetch_object('bebida')){
            $res[] = $bebida;
        }

        return $res;
        
    }

    public static function createPedido($idUsr, $precioFinal, $porcentajePropina = null, $totalConPropina = null, $propina = false, $articulos){
        $con = db::connect();
        
        //Confirmamos si se le pasa propina
        if($propina){
            $stmtPedidos = $con->prepare("INSERT into `pedidos` (`idUsr`, `precioTotal`, `propina`, `totalConPropina`) values (?, ?, ?, ?) ");
            $stmtPedidos->bind_param("idsd", $idUsr, $precioFinal, $porcentajePropina, $totalConPropina);
        }else{
            $stmtPedidos = $con->prepare("INSERT into `pedidos` (`idUsr`, `precioTotal`) values (?, ?) ");
            $stmtPedidos->bind_param("id", $idUsr, $precioFinal);
        }

        $stmtPedidos->execute();

        $pedido = $con->query("SELECT idPedido FROM pedidos ORDER BY fecha DESC LIMIT 1");
        $fila = $pedido->fetch_assoc();
        $idPedido = intval($fila['idPedido']);
        foreach ($articulos as $articulo) {
            $precioArt = $articulo['precioArt'];
            $unidadesArt = $articulo['unidadesArt'];
            $idArt = $articulo['idArt'];

            $stmtArticulo = $con->prepare("INSERT into `pedidos_articulos` (`idPedido`, `idProducto`, `cantidad`, `precioUnidad`) values (?, ?, ?, ?) ");
            $stmtArticulo->bind_param("iiid", $idPedido, $idArt, $unidadesArt, $precioArt);
            $stmtArticulo->execute();
        }

        $con->close();

        return $idPedido; 

    }

    public static function selectPedidos($idUsr){
        $con = db::connect();
        $stmt = $con->prepare("SELECT * FROM `pedidos` WHERE `idUsr` = ? ");
        $stmt->bind_param("i", $idUsr);
        $stmt->execute();
        $result = $stmt->get_result();
        $res =[];

        while($pedido = $result->fetch_object('pedidosUsr')){
            $res[] = $pedido;
        }

        return $res;

        $con->close();

    }
    

}
