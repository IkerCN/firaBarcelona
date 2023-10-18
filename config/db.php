<?php

class db{
    public static function conect($host = 'localhost',$usr = 'root',$pass = '',$base = 'firabarcelona'){
        $con = new mysql($host,$usr,$pass,$base);
        return $con;
    }

}