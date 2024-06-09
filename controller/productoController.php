<?php
    //Creamos el controlador de pedidos
    include_once 'config/db.php';
    include_once 'model/ProductoDAO.php';
    include_once 'model/Pedido.php';
    include_once 'utils/CalculadoraPrecios.php';
    
    class productoController{
        
        public function index(){

            $sesion = false;

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
                        $sesion = true;
                    }

                }
            }

            $newProducts = ProductoDAO::getNewProducts();
            $firstProducts = ProductoDAO::getFirstProducts();
            $categorias = ProductoDAO::getAllCategorias();

            if(isset($_COOKIE['UltimoPedido'])){
                echo '<div class="ultimo-pedido"> Tu ultimo pedido fue de '.$_COOKIE['UltimoPedido'].'€ </div>';
                setcookie('UltimoPedido','',time()-3600);
            }            

            include_once 'views/header.php';
            if($sesion){
                include_once 'views/login.php';
            }else{
                include_once 'views/panelPedido.php';
            }
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
           $bebidas = ProductoDAO::getAllBebidas();
           
           include_once 'views/header.php';
           include_once 'views/carta.php';
           include_once 'views/footer.php';
       }

       public function editarProducto(){

            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/header.php';
            include_once 'views/panelProductos.php';
            include_once 'views/footer.php';

       }

       public function crearProducto(){

        include_once 'views/header.php';
        include_once 'views/createProduct.php';
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
            if (isset($_POST['borrar'])) {
                unset ($_SESSION['selecciones'][$_POST['borrar']]);
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }

            $precioTotal = CalculadoraPrecios::CalculadoraPrecioPedido($_SESSION['selecciones']);
	        $precioSinIva = CalculadoraPrecios::CalculadoraPrecioSinIva($precioTotal);
	        $precioIva = CalculadoraPrecios::CalculadoraPrecioIva($precioTotal, $precioSinIva);

            include_once 'views/header.php';
            include_once 'views/panelCompra.php';
            include_once 'views/footer.php';
        }
        public function eliminar(){
            $idProducto = $_POST['idProducto'];
    
            ProductoDAO::deleteProduct($idProducto);
    
            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/header.php';
            include_once 'views/panelProductos.php';
            include_once 'views/footer.php';
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
    
            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/header.php';
            include_once 'views/panelProductos.php';
            include_once 'views/footer.php';
        }

        public function create(){
    
            $nombre = $_POST['nombre'];
            $idCategoria = $_POST['idCategoria'];
            $precio = $_POST['precio'];
        
            $producto = ProductoDAO::createProduct($nombre, $precio, $idCategoria);
    
            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/header.php';
            include_once 'views/panelProductos.php';
            include_once 'views/footer.php';
        }

        public function crearPedido(){
    
            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/header.php';
            include_once 'views/panelProductos.php';
            include_once 'views/footer.php';
        }

        public function confirmar(){
           //editar para el QR
            session_start();

            //Borrmos sesion de pedido
            unset($_SESSION['selecciones']);

            //Guardo la cookie
            setcookie('UltimoPedido',$precioFinal,time()+3600);
            header("Location:". URL ."?controller=producto");
        }

        public function mostrarPedidos(){

            //iniciamos sesion
           session_start();

           $pedidos = ProductoDAO::selectPedidos($_SESSION['id_usuari']);
           
           include_once 'views/header.php';
           include_once 'views/pedidos.php';
           include_once 'views/footer.php';
       }

       public function resenas(){
        session_start();
        
        $pedidos = ProductoDAO::selectPedidos($_SESSION['id_usuari']);

        include_once 'views/header.php';
        include_once 'views/resenas.php';
        include_once 'views/footer.php';
    }
    }
    
    
    ?>