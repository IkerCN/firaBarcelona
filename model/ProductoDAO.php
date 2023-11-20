<?php
    include_once 'config/db.php';
    include_once 'Productos.php';
    include_once 'categorias.php';

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
        $stmt->bind_param("sii", $nombre, $precio, $idProducto);

        $stmt->execute();

        $con->close();

    }
    
}
