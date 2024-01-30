<?php

class pedidosUsr{

    protected $idPedido;
    protected $idUsr;
    protected $precioTotal;
    protected $fecha;
    protected $resena;

    public function __construct(){
    }



    /**
     * Get the value of idPedido
     */ 
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set the value of idPedido
     *
     * @return  self
     */ 
    public function setIdPedido($idPedido)
    {
        $this->idPedido = $idPedido;

        return $this;
    }

    /**
     * Get the value of idUsr
     */ 
    public function getIdUsr()
    {
        return $this->idUsr;
    }

    /**
     * Set the value of idUsr
     *
     * @return  self
     */ 
    public function setIdUsr($idUsr)
    {
        $this->idUsr = $idUsr;

        return $this;
    }

    /**
     * Get the value of precioTotal
     */ 
    public function getPrecioTotal()
    {
        return $this->precioTotal;
    }

    /**
     * Set the value of precioTotal
     *
     * @return  self
     */ 
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of resena
     */ 
    public function getResena()
    {
        return $this->resena;
    }

    /**
     * Set the value of resena
     *
     * @return  self
     */ 
    public function setResena($resena)
    {
        $this->resena = $resena;

        return $this;
    }
}