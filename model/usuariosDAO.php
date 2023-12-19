<?php
    include_once 'config/db.php';
    include_once 'usuarios.php';

class usuariosDAO{    
    
    public static function insertUser (){

        $insert = "select * from usuarios;";
        if((isset($_POST['nom'])) && (isset($_POST['cognom'])) && (isset($_POST['staticEmail'])) && (isset($_POST['inputPassword'])) && (isset($_POST['inputPassword2'])) ){
        
            $nom = $_POST['nom'];
            $cognom = $_POST['cognom'];
            $mail = $_POST['staticEmail'];
            $psw = $_POST['inputPassword'];
            $psw2 = $_POST['inputPassword2'];
            
            if($psw == $psw2){
                //Creamos el insert bueno
                $insert = "INSERT into usuarios (nombre, apellido, email, password, admin) values (\"$nom\", \"$cognom\", \"$mail\", \"$psw\", 0);";
            }
        }
        $con = db::connect();
        //RECOGEMOS LA CONSULTA EN $RESULT
        $result = mysqli_query($con, $insert);
        if(!$result){
            echo ("ERROR: No s'ha trobat cap resultat.");
        }
        //CERRAMOS CONEXIÓN
        mysqli_close($con);    
        
    }

    public static function autentificarSesion(){
        if(isset($_POST['staticEmail'], $_POST['inputPassword'])){ //Comprovem que les dades rebudes per POST existeixen 

        $consulta =  "SELECT idUsr, nombre, apellido, email, password FROM usuarios where email = \"".$_POST['staticEmail']."\" and password = \"".$_POST['inputPassword']."\"";
        
        $con = db::connect();
        $result = mysqli_query($con, $consulta);
     
         if($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
             
             session_start();
             
             //Paso los datos del usuario a variables de sesion
             $_SESSION['id_usuari']=$row['idUsr']; 
             $_SESSION['email'] = $_POST['staticEmail']; 		
             $_SESSION['cognom']=$row['apellido'];
             $_SESSION['contra'] = $_POST['inputPassword'];
             $_SESSION['nom']=$row['nombre'];
             
             return true;
              
         }else{
            return false;
         }  	  
             
       }
    }

    public static function getUser(){     
        
        $consulta =  "SELECT nombre, apellido, email, password FROM usuarios where idUsr = \"".$_SESSION['id_usuari']."\" ";

        $con = db::connect();

        $result = mysqli_query($con, $consulta);

        $con->close();

        $usuario = $result->fetch_object('usuarios');

        return $usuario;

    }

    public static function salirSesion(){
        session_start();
        session_destroy();  
    }

    public static function modificarUsr(){
        
        if( $_POST['nContra'] == $_POST['nContra2']){
            $con = db::connect();

            $consulta =  "UPDATE usuarios SET nombre = \"".$_POST['nNom']."\", apellido = \"".$_POST['nCognom']."\", email = \"".$_POST['nEmail']."\", password = \"".$_POST['nContra']."\"  where idUsr = \"".$_SESSION['id_usuari']."\" ";
            $result = mysqli_query($con, $consulta);

            $con->close();
         }
    }


}