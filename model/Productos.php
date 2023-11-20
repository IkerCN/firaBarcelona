<?php

    class Productos{
    
        protected $idProducto;
        protected $nombre;
        protected $idCategoria;
        protected $precio;
        protected $imgProducto;



        public function __construct(){
        }


        public function getIdProducto()
        {
                return $this->idProducto;
        }

        public function setIdProducto($idProducto)
        {
                $this->idProducto = $idProducto;

                return $this;
        }


        public function getNombre()
        {
                return $this->nombre;
        }

        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }


        public function getIdCategoria()
        {
                if($this->idCategoria == 1) {
                        return "Menus";
                }elseif ($this->idCategoria == 2) {
                        return "Individuales";
                }elseif ($this->idCategoria == 3) {
                        return "Entrantes";
                }elseif ($this->idCategoria == 4) {
                        return "Bebidas";
                }elseif ($this->idCategoria == 5) {
                        return "Postres";
                }
        }

        public function setIdCategoria($idCategoria)
        {
                $this->idCategoria = $idCategoria;

                return $this;
        }

        public function getPrecio()
        {
                return $this->precio;
        }

        public function setPrecio($precio)
        {
                $this->precio = $precio;

                return $this;
        }

        public function getImgProducto()
        {
                return $this->imgProducto;
        }

        public function setImgProducto($imgProducto)
        {
                $this->imgProducto = $imgProducto;

                return $this;
        }
}
?>
