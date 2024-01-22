<?php
    //Creamos el controlador de pedidos
    include_once 'model/usuariosDAO.php';
    include_once 'model/ProductoDAO.php';
    include_once 'model/Pedido.php';
    include_once 'utils/CalculadoraPrecios.php';
    
    class usuarioController{

        public function index(){

            //iniciamos sesion
           session_start();
           if(!isset($_SESSION['selecciones'])){
              $_SESSION['selecciones']= array();
           }else{
               if(isset($_POST['idProducto'])){
                   if(isset($_SESSION['id_usuari'])){
                       $pedido = new Pedido(ProductoDAO::getProductByIdProducto($_POST['idProducto']));
                   
                       $cioncide = false;
                       foreach ($_SESSION['selecciones'] as $producto) {
                           if($producto->getProducto()->getIdProducto() == $_POST['idProducto']){
                               $producto->setCantidad($producto->getCantidad()+1);
                               $cioncide = True;
                               break;
                           }
                       }
                       if ($cioncide == false) {
                           array_push($_SESSION['selecciones'], $pedido);
                       }
                   }else{
                       include_once 'views/header.php';
                       include_once 'views/login.php';
                       include_once 'views/footer.php';
                   }
                   
                   
               }
           }

           $allProducts = ProductoDAO::getAllProducts();
           $newProducts = ProductoDAO::getNewProducts();
           $firstProducts = ProductoDAO::getFirstProducts();
           $categorias = ProductoDAO::getAllCategorias();

           if(isset($_COOKIE['UltimoPedido'])){
               echo 'Tu ultimo pedido fue de '.$_COOKIE['UltimoPedido'].'€';
               setcookie('UltimoPedido','',time()-3600);
           }            

           include_once 'views/header.php';
           include_once 'views/panelPedido.php';
           include_once 'views/footer.php';
       }

        public function login(){
            include_once 'config/db.php';

            if((isset($_POST['nom'])) && (isset($_POST['cognom'])) && (isset($_POST['staticEmail'])) && (isset($_POST['inputPassword'])) && (isset($_POST['inputPassword2'])) ){
                usuariosDAO::insertUser();
            }

            include_once 'views/header.php';
            include_once 'views/login.php';
            include_once 'views/footer.php';
        }

        public function autentificarse(){

            $autentificado = false;
            if(isset($_POST['staticEmail'], $_POST['inputPassword'])){ 
                $autentificado = usuariosDAO::autentificarSesion();
            }

            if($autentificado == true){
                
                $user = usuariosDAO::getUser();

                include_once 'views/header.php';
                include_once 'views/datosCuenta.php';
                include_once 'views/footer.php';
            }else{
                include_once 'views/header.php';
                include_once 'views/login.php';
                include_once 'views/footer.php';
            }

        }

        public function modificarUsuario(){
            session_start();

            if(isset($_POST['nNom'], $_POST['nCognom'], $_POST['nEmail'], $_POST['nContra'],$_POST['nContra2'])){
                usuariosDAO::modificarUsr();
            }

            $user = usuariosDAO::getUser();
            include_once 'views/header.php';
            include_once 'views/datosCuenta.php';
            include_once 'views/footer.php';

        }

        public function cerrarSesion(){

            usuariosDAO::salirSesion();

            header("Location:".URL."?controller=producto");

        }

        public function resenas(){
            session_start();
            include_once 'views/header.php';
            include_once 'views/resenas.html';
            include_once 'views/footer.php';
        }
    }