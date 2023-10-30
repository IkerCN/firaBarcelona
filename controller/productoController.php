<?php
    //Creamos el controlador de pedidos
    include 'model/ProductoDAO.php';
    
    class productoController{
        
        public function index(){
            $allProducts = ProductoDAO::getAllProducts();

            include_once 'views/panelPedido.php';
        }

        public function compra(){
            echo 'Pagina de compra';
        }
        public function eliminar(){
            $idProducto = $_POST['idProducto'];
    
            ProductoDAO::deleteProduct($idProducto);
    
            header("Location:".URL."?controller=producto");
        }
    
        public function updateTable(){
    
            $idProducto = $_POST['idProducto'];
         
            $producto = ProductoDAO::getProductByIdProducto($idProducto);
    
            include_once "views/editProduct.php";
        }
    
        public function update(){
    
            $idProducto = $_POST['idProducto'];
            $nombre = $_POST['nombre'];
            $idcategoria = $_POST['idcategoria'];
            $precio = $_POST['precio'];
        
            $producto = ProductoDAO::updateProduct($idProducto,$nombre,$idcategoria,$precio);
    
            include_once "views/editProduct.php";
        }
    }
    
    
    ?>