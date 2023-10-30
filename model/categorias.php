<?php

    class Categorias{
    
        protected $idCategoria;
        protected $nombreCategoriaCategoria;



        public function getIdCategoria()
        {
                return $this->idCategoria;
        }

        public function setIdCategoria($idCategoria)
        {
                $this->idCategoria = $idCategoria;

                return $this;
        }

        public function __construct(){
        }

        public function getNombreCategoria()
        {
                return $this->nombreCategoria;
        }

        public function setNombreCategoria($nombreCategoria)
        {
                $this->nombreCategoria = $nombreCategoria;

                return $this;
        }

    }