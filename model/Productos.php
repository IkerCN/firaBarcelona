<?php

    class Productos{
    
        protected $idProducto;
        protected $nombre;
        protected $idCategoria;
        protected $precio;



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
                return $this->idCategoria;
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
}
?>
