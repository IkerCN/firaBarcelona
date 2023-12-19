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

}