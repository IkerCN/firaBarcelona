<?php
//localhost:3306  iker  ~979xy6Qy  firabarcelona_bd
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