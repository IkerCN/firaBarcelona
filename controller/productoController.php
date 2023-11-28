<?php
    //Creamos el controlador de pedidos
    include 'model/ProductoDAO.php';
    include 'model/Pedido.php';
    include 'utils/CalculadoraPrecios.php';
    
    class productoController{
        
        public function index(){

             //iniciamos sesion
            session_start();
            if(!isset($_SESSION['selecciones'])){
               $_SESSION['selecciones']= array();
            }else{
                if(isset($_POST['idProducto'])){
                    $pedido = new Pedido(ProductoDAO::getProductByIdProducto($_POST['idProducto']));
                    array_push($_SESSION['selecciones'], $pedido);
                }
            }

            $allProducts = ProductoDAO::getAllProducts();
            $newProducts = ProductoDAO::getNewProducts();
            $firstProducts = ProductoDAO::getFirstProducts();
            $categorias = ProductoDAO::getAllCategorias();
            
            include_once 'views/header.php';
            include_once 'views/panelPedido.php';
            include_once 'views/footer.php';
        }

        public function carta(){

            //iniciamos sesion
           session_start();
           if(!isset($_SESSION['selecciones'])){
              $_SESSION['selecciones']= array();
           }else{
               if(isset($_POST['idProducto'])){
                   $pedido = new Pedido(ProductoDAO::getProductByIdProducto($_POST['idProducto']));
                   array_push($_SESSION['selecciones'], $pedido);
               }
           }

           $allProducts = ProductoDAO::getAllProducts();
           $categorias = ProductoDAO::getAllCategorias();
           
           include_once 'views/header.php';
           include_once 'views/carta.php';
           include_once 'views/footer.php';
       }

        public function compra(){
            session_start();

            if (isset($_POST['add'])) {
                $pedido = $_SESSION["selecciones"][$_POST['add']];
                $pedido->setCantidad($pedido->getCantidad()+1);
            }elseif (isset($_POST['del'])) {
                $pedido = $_SESSION["selecciones"][$_POST['del']];

                if ($pedido->getCantidad()==1){
                    unset ($_SESSION['selecciones'][$_POST['del']]);
                    //tenemos que re-indexar el array
                    $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
                }else{
                    $pedido->setCantidad ($pedido->getCantidad()-1);
                }
            }
            include_once 'views/header.php';
            include_once 'views/panelCompra.php';
            include_once 'views/footer.php';
        }
        public function eliminar(){
            $idProducto = $_POST['idProducto'];
    
            ProductoDAO::deleteProduct($idProducto);
    
            header("Location:".URL."?controller=producto");
        }
    
        public function updateTable(){
            $idProducto = $_POST['idProducto'];
         
            $producto = ProductoDAO::getProductByIdProducto($idProducto);
    
            include_once 'views/header.php';
            include_once "views/editProduct.php";
            include_once 'views/footer.php';
        }
    
        public function update(){
    
            $idProducto = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $idCategoria = $_POST['idCategoria'];
            $precio = $_POST['precio'];
        
            $producto = ProductoDAO::updateProduct($idProducto,$nombre,$precio);
    
            include_once 'views/header.php';
            include_once 'views/panelPedido.php';
            include_once 'views/footer.php';
        }
    }
    
    
    ?>