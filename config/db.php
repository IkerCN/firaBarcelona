<?php

class db{
    public static function connect($host = 'localhost',$usr = 'root',$pass = '',$base = 'firabarcelona'){
        $con = new mysqli($host,$usr,$pass,$base);
        if($con == false){
            die('DATABASE ERROR');
         }else{
             return $con;
         }
    }
//    public static function getAllByCategoria($categoria){
//        $con = db::connect();
//
//        $stmt = $con->prepare("SELECT * FROM product WHERE categoria=?");
//        $stmt->bind_param("i", $categoria);
//
//        $con->close();
//
//        $listaProductos = [];
//        while($productoDB = $result->fetch_object($categoria)){
//            $listaProductos[] = $productoDB;
//        }
//        return $listaProductos;
//    }
}