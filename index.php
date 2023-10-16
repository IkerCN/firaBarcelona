<?php
include 'controlador/pedidoControlador.php';
include 'config/constantes.php';


    if(isset($_GET['controlador'])){
        
    }else{
        $nombre_controlador = $_GET['controlador'].'controlador';

        if(class_exists($nombre_controlador)){
            echo $nombre_controlador.' SI existe';
        }else{
            echo $nombre_controlador.' NO existe';
        }
    }

?>
