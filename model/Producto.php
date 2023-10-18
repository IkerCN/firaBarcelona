<?php
include 'config/db.php';

abstract class Producto{execute_query()

    public static function getAllProducts(){
        $con = db::conect();
        $start = $con->query("SELECT * FROM productos");
while($producto = $start->fetch_array()){
    echo $producto['nombre'];
}
        var_dump($start->get_result());
    }

}